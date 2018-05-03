var tabla;

//Funcion que se va a ejecutar al inicio
function init(){ 
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function(e){
		guardaryeditar(e);
	});

	$.post("../ajax/C_Control.php?op=selectCodigoUsuario", function(r){
		$("#id_usuario").html(r);
		$('#id_usuario').selectpicker('refresh');
	});

}

//Funcion limpiar
function limpiar(){
	$("#id_control").val("");
	$("#fecha_entrada").val("");
	$("#hora_entrada").val("");
	$("#fecha_salida").val("");
	$("#hora_salida").val("");
	$("#motivo").val("");
	$("#id_usuario").val("");

}



//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
    if (flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}


//Funcion cancelarform
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//Funcion Listar
function listar(){
	tabla = $('#tbllistado').dataTable(
	{
		"aProcessing": true, //Activamos el procesamiento de datatables
		"aServerSide": true, //Paginacion y filtrado realizados por el servidor
		dom: "Bfrtip", //Definimos los elementos del control de tabla
		buttons: [
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdf'
				],
		"ajax":
				{
					url: '../ajax/C_Control.php?op=listar',
					type: "get",
					dataType: "json",
					error: function(e){
						console.log(e.responseText);
					}
				},
		"bDestroy": true,
		"iDisplayLength": 15, //Paginacion de 15 en 15
		"order": [[ 0, "desc" ]] //Ordenar(columna, orden)

	}).DataTable();
}

//Función cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}

function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
 
    $.ajax({
        url: "../ajax/C_Control.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
 
        success: function(datos)
        {                    
              bootbox.alert(datos);           
              mostrarform(false);
              tabla.ajax.reload();
        }
 
    });
    limpiar();
}

function mostrar(id_control){
	$.post("../ajax/C_Control.php?op=mostrar", {id_control : id_control}, function(data, status){
		data = JSON.parse(data);
		mostrarform(true);

		$("#id_usuario").val(data.id_usuario);
        $('#id_usuario').selectpicker('refresh');

		$("#fecha_entrada").val(data.fecha_entrada);
		$("#hora_entrada").val(data.hora_entrada);
		$("#fecha_salida").val(data.fecha_salida);
		$("#hora_salida").val(data.hora_salida);
//		$("#motivo").val(data.motivo);
		$("#id_usuario").val(data.id_usuario);

		$("#id_control").val(data.id_control);	
	});


}

init();