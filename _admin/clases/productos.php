<?
Class Producto{

    /*conexion a la base*/
	private $con;
	
	
	public function __construct($con){
		$this->con = $con;
	}
        /**
        * Obtengo todos los productos
        */
	public function getList(){
		$query = "SELECT p.id_producto, m.txt_desc tipoProducto, c.txt_desc categoria, p.txt_desc nombre,
					alt, img, descripcion, 
					case when sn_destacado = -1 then 'Si' else 'No' end sn_destacado, 
					case when sn_habilitado  = -1 then 'Si' else 'No' end sn_habilitado 
					from productos p
					join categorias c on c.id_categoria = p.categoria 
                    join marcas m on m.id_marca = p.marca
					order by 2, 3, 1";
		$resultado = array();
		foreach($this->con->query($query) as $key=>$producto){
			$resultado[$key] = $producto;
			//var_dump($resultado);
		
			
		}
			/* echo '<pre>';
			var_dump($resultado);echo '</pre>'; */
            return $resultado; 
	}
	
	/**
	* obtengo un producto
	*/
	public function get($id){
	    $query = "SELECT p.id_producto, p.marca, p.categoria, p.txt_desc, p.alt, p.img, p.descripcion, p.sn_destacado, p.sn_habilitado, pp.precio 
					from productos p
					JOIN precios pp ON pp.id_producto = p.id_producto
								AND pp.fecha_desde = (SELECT MAX(tmp.fecha_desde)
														FROM precios tmp
														WHERE tmp.id_producto = pp.id_producto
														AND DATE(tmp.fecha_desde) <= DATE(NOW()))
					where p.id_producto = ".$id;
        $query = $this->con->query($query); 
			
		$producto = $query->fetch(PDO::FETCH_OBJ);

        return $producto;
	}
	
	
	/**
	* Guardo los datos en la base de datos
	*/
	public function save($data){
		/*$log_filename = $_SERVER['DOCUMENT_ROOT']."/log";
		if (!file_exists($log_filename))
		{
			// create directory/folder uploads.
			mkdir($log_filename, 0777, true);
		}
		$log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
		file_put_contents($log_file_data, print_r($data,true) . "\n\n", FILE_APPEND);*/

		foreach($data as $key => $value){
			if(!is_array($value)){
				if($value != null){
					$columns[]=$key;
					$datos[]=$value;
				}
			}
		}
		$sql = "INSERT INTO productos(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
		$this->con->exec($sql);
		$id_producto = $this->con->lastInsertId();
		
		$sql = "update productos set img = 'img/productos/producto$id_producto.png' where id_producto = $id_producto";
		$this->con->exec($sql);
					
		$sql = '';
		foreach($data['precio'] as $precio){
			if($precio == ""){
				$precio = 0;
			}
			$sql .= 'INSERT INTO precios(id_producto, fecha_desde, precio) 
						VALUES ('.$id_producto.', DATE(NOW()), '.$precio.');';
		}
		$this->con->exec($sql);
		return $id_producto;
	} 
	
	/**
	* Actualizo los datos en la base de datos
	*/
	public function edit($data){
	    $id_producto = $data['id_producto'];
	    unset($data['id_producto']);
	    $producto = $this->get($id_producto);
           
		foreach($data as $key => $value){
			if(!is_array($value)){
				if($value != null){
					$columns[]=$key." = '".$value."'"; 
				}
			}
		}
		
		$sql = "UPDATE productos SET ".implode(',',$columns)." WHERE id_producto = ".$id_producto;
		$this->con->exec($sql);
		 
		$sql = 'DELETE FROM precios WHERE id_producto = '.$id_producto.' and fecha_desde = DATE(NOW())';
		$this->con->exec($sql);
		
		$sql = '';
		foreach($data['precio'] as $precio){
			$sql .= 'INSERT INTO precios(id_producto, fecha_desde, precio) 
						VALUES ('.$id_producto.', DATE(NOW()), '.$precio.');';
		}
		$this->con->exec($sql);
	} 
	
	
	/**
	* borrado de producto
	*/
	
	public function del($id){
		$sql = "DELETE FROM comentarios where id_producto = ".$id.";
				DELETE FROM precios where id_producto = ".$id.";  
				DELETE FROM productos WHERE id_producto = ".$id;
		$this->con->exec($sql);
		
		$directorio = dirname(dirname(dirname(__FILE__))).'\img\productos'; // directorio de tu elección
		$foto = 'producto'.$id.'.png';
		unlink($directorio.'/'.$foto);
	}
		
}
?>
