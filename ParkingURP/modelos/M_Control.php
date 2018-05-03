<?php

//Incluimos inicialmente la conexion a la base de datos
require "../config/Conexion.php";

Class M_Control{
	//Implementamos nuestro constructor
	public function __construct(){

	}

	public function insertar($fecha_entrada, $hora_entrada, $motivo, $id_usuario){
		$sql = "INSERT INTO T_Control(fecha_entrada, hora_entrada,flag_quedarse, motivo, id_usuario) VALUES (curdate(), now(), '0', '$motivo', '$id_usuario')";

		return ejecutarConsulta($sql);
	}

	public function editar($id_control, $fecha_salida, $hora_salida, $motivo){
		$sql = "UPDATE T_Control SET fecha_salida = curdate(), hora_salida = now(), motivo = '$motivo' WHERE id_control = '$id_control'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
    public function desactivar($id_control)
    {
        $sql="UPDATE T_Control SET flag_quedarse='0' WHERE id_control='$id_control'";
        return ejecutarConsulta($sql);
    }
 
    //Implementamos un método para activar registros
    public function activar($id_control)
    {
        $sql="UPDATE T_Control SET flag_quedarse='1' WHERE id_control='$id_control'";
        return ejecutarConsulta($sql);
    }

    public function selectCodigoUsuario(){
		$sql = "SELECT u.codigo,p.nombre, p.ape_paterno, p.ape_materno FROM T_Persona p INNER JOIN T_Usuario u ON p.id_persona = u.id_usuario";
		return ejecutarConsulta($sql);
	}

	//Implementamos un metodo para mostrar los datos de un registro o modificar
	public function mostrar($id_control){
		$sql = "SELECT * FROM T_Control WHERE id_control = '$id_control'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un metodo para listar los registros
	public function listar(){

		$sql="SELECT c.id_control, c.fecha_entrada, c.hora_entrada, c.fecha_salida, c.hora_salida, c.flag_quedarse, u.codigo FROM T_Control c INNER JOIN T_Usuario u ON c.id_usuario=u.id_usuario";
        return ejecutarConsulta($sql); 
	}

	

}

?>