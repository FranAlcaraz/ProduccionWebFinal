<?
Class Categoria{

    /*conexion a la base*/
	private $con;
	
	public function __construct($con){
		$this->con = $con;
	}

	public function getList(){
		$query = "SELECT c.id_categoria, c.txt_desc, c.txt_icon, c.id_padre, c.sn_habilitada, case when c.sn_habilitada = -1 then 'Si' else 'No' end txt_habilitada, IFNULL((select cc.txt_desc from categorias cc where cc.id_categoria = c.id_padre), 'Ninguna') txt_padre 
					 FROM categorias c";
        return $this->con->query($query); 
	}
	
	public function del($id){
		$query = 'SELECT count(1) as cantidad FROM productos WHERE categoria = '.$id;
		$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad == 0){
			$query = 'SELECT count(1) as cantidad FROM categorias WHERE id_padre = '.$id;
			$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
			if($consulta->cantidad == 0){
				$query = "DELETE FROM categorias WHERE id_categoria = ".$id;
				return $this->con->exec($query); 
			}else{
				return 'La categoria esta siendo utilizada como padre de otra';
			}
		}
		return 'Categoria asignada a uno o mas productos';
	}
	
	/**
	* Guardo los datos en la base de datos
	*/
	public function save($data){
		
            foreach($data as $key => $value){
				
				if(!is_array($value)){
					if($value != null){
						$columns[]=$key;
						$datos[]=$value;
					}
				}
            }
            $sql = "INSERT INTO categorias(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			echo $sql;
			
            $this->con->exec($sql);
			$id = $this->con->lastInsertId();
		
	} 
	
	public function get($id){
	    $query = "SELECT *
		           FROM categorias WHERE id_categoria = ".$id;
        $categoria = $this->con->query($query)->fetch(PDO::FETCH_OBJ); 
		
        return $categoria;
	}
		
	public function edit($data){
			$id_categoria = $data['id_categoria'];
			unset($data['id_categoria']);
            
            foreach($data as $key => $value){
				if(!is_array($value)){
					if($value != null){	
						$columns[]=$key." = '".$value."'"; 
					}
				}
            }
            $sql = "UPDATE categorias SET ".implode(',',$columns)." WHERE id_categoria = ".$id_categoria;
            
            $this->con->exec($sql);			 
	} 
}
?>