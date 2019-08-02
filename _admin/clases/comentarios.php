<?
Class Comentario{

    /*conexion a la base*/
	private $con;
	
	public function __construct($con){
		$this->con = $con;
	}

	public function getList(){
		$query = "SELECT c.id_comentario, c.id_producto, p.txt_desc, c.ip_origen, c.fecha, c.txt_nombre, c.txt_email, c.txt_comentario, c.cant_estrellas, 
		case when c.sn_aprobado = -1 then 'Si' else 'No' end sn_aprobado
		from comentarios c
		join productos p on p.id_producto = c.id_producto order by 1 desc";
        return $this->con->query($query); 
	}
		
	public function get($id){
	    $query = "SELECT *
		           FROM comentarios WHERE id_comentario = ".$id;
        $comentario = $this->con->query($query)->fetch(PDO::FETCH_OBJ); 
		
        return $comentario;
	}
	public function app($id){
		$query = "update comentarios set sn_aprobado = -1 where id_comentario=".$id;
        $comentario = $this->con->query($query);
        return "Comentario aprobado!";
	}	

	public function dis($id){
		$query = "update comentarios set sn_aprobado = 0 where id_comentario=".$id;
        $comentario = $this->con->query($query);
        return "Comentario des-aprobado!";
	}
	
}
?>