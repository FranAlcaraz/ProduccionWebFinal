<?
Class Marca{

    /*conexion a la base*/
	private $con;
	
	public function __construct($con){
		$this->con = $con;
	}

	public function getList(){
		$query = "SELECT id_marca, txt_desc from marcas";
        return $this->con->query($query); 
	}
	
	public function del($id){
		$query = 'SELECT count(1) as cantidad FROM productos WHERE marca = '.$id;
		$consulta = $this->con->query($query)->fetch(PDO::FETCH_OBJ);
		if($consulta->cantidad == 0){
			$query = "DELETE FROM marcas WHERE id_marca = ".$id;
			return $this->con->exec($query); 
		}
		return 'marca asignada a uno o mas productos';
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
            $sql = "INSERT INTO marcas(".implode(',',$columns).") VALUES('".implode("','",$datos)."')";
			echo $sql;
			
            $this->con->exec($sql);
			$id = $this->con->lastInsertId();
		
	} 
	
	public function get($id){
	    $query = "SELECT id_marca, txt_desc
		           FROM marcas WHERE id_marcas = ".$id;
        $marca = $this->con->query($query)->fetch(PDO::FETCH_OBJ); 
		
        return $marca;
	}
		
	public function edit($data){
			$id_marca = $data['id_marca'];
			unset($data['id_marca']);
            
            foreach($data as $key => $value){
				if(!is_array($value)){
					if($value != null){	
						$columns[]=$key." = '".$value."'"; 
					}
				}
            }
            $sql = "UPDATE marcas SET ".implode(',',$columns)." WHERE id_marca = ".$id_marca;
            
            $this->con->exec($sql);			 
	} 
}
?>