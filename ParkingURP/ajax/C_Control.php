<?php

require_once "../modelos/M_Control.php";

$m_control = new M_Control();

$id_control = isset($_POST["id_control"])? limpiarCadena($_POST["id_control"]):"";
$fecha_entrada = isset($_POST["fecha_entrada"])? limpiarCadena($_POST["fecha_entrada"]):"";
$hora_entrada = isset($_POST["hora_entrada"])? limpiarCadena($_POST["hora_entrada"]):"";
$fecha_salida = isset($_POST["fecha_salida"])? limpiarCadena($_POST["fecha_salida"]):"";
$hora_salida = isset($_POST["hora_salida"])? limpiarCadena($_POST["hora_salida"]):"";
$motivo = isset($_POST["motivo"])? limpiarCadena($_POST["motivo"]):"";
$id_usuario = isset($_POST["id_usuario"])? limpiarCadena($_POST["id_usuario"]):"";

switch ($_GET["op"]) {
	
	case 'guardaryeditar':
		if(empty($id_control)){
			$rspta = $m_control->insertar($fecha_entrada, $hora_entrada, $motivo, $id_usuario);
			echo $rspta;
		}else{
			$rspta = $m_control->editar($id_control, $fecha_salida, $hora_salida, $motivo);
			echo $rspta ? "Control actualizado" : "Control no se pudo actualizar";
		}
		break;

	case 'selectCodigoUsuario':

			$rspta = $m_control->selectCodigoUsuario();

			while ($reg = $rspta->fetch_object()) {
				echo '<option value="' . $reg->id_usuario . '">' . $reg->codigo .' '. $reg->nombre .' '. $reg->ape_paterno .' '. $reg->ape_materno .'</option>';
			}
			break;
	
	
/*
	case 'listar': 
        $rspta=$m_control->listar();
        //Vamos a declarar un array
        $data= Array();
 
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                
                "0"=>$reg->fecha_entrada,
                "1"=>$reg->hora_entrada,
                "2"=>$reg->fecha_salida,
                "3"=>$reg->hora_salida,
                "4"=>$reg->usuario,
                "5"=>($reg->flag_quedarse)?'<span class="label bg-green">SE QUEDA</span>':
                '<span class="label bg-red">NO SE QUEDA</span>',
                "6"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_control.')"><i class="fa fa-pencil"></i></button>'

                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
 
    break;
*/
    case 'mostrar':
		$rspta = $m_control->mostrar($id_control);
		//Codificar el resultado utilizando json
			echo json_encode($rspta);
		break;

    case 'listar':
		$rspta = $m_control->listar();
		//Vamos a declarar un Array para almacenar todos los registros que voy  listar
		$data = Array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => $reg->fecha_entrada,
				"1" => $reg->hora_entrada,
				"2" => $reg->fecha_salida,
				"3" => $reg->hora_salida,
				"4" => ($reg->flag_quedarse)?'<span class="label bg-green">SE QUEDA</span>':
                '<span class="label bg-red">NO SE QUEDA</span>',
				"5" => $reg->codigo,
				"6" => '<button class="btn btn-warning" onclick="mostrar('.$reg->id_control.')"><i class="fa fa-pencil"></i></button>'
				);
		}
		$results = array(
			"sEcho" => 1, //Informacion para el datatables
			"iTotalRecords" => count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data);
		echo json_encode($results);
		break;
}

?>