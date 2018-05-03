<?php 
require 'header.php';
?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Controlar Ingreso Salida
        <small>Aqui podrá controlar el ingreso y salida de usuarios del estacionamiento</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Controlar Ingreso Salida</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h1 class="box-title">Control <button class="btn btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i>Agregar</button></h1>
                <div class="box-tools pull-right">
                </div>
              </div>

              <div class="panel-body table-responsive" id="listadoregistros">
                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                            <th>Fecha Entrada</th>
                            <th>Hora Entrada</th>
                            <th>Fecha Salida</th>
                            <th>Hora Salida</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                            <th>Editar</th>

                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Fecha Entrada</th>
                            <th>Hora Entrada</th>
                            <th>Fecha Salida</th>
                            <th>Hora Salida</th>
                            <th>Estado</th>
                            <th>Usuario</th>
                            <th>Editar</th>
                            
                          </tfoot>
                </table>
              </div>
              <div class="panel-body" id="formularioregistros">
                <form name="formulario" id="formulario" method="POST">

                <div class="col-md-12">
                  <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">Control</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">

                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label></label>
                        <input type="hidden" name="id_control" id="id_control">
                        <input type="hidden" class="form-control" name="fecha_entrada" id="fecha_entrada">
                      </div>

                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label></label>
                        <input type="hidden" class="form-control" name="hora_entrada" id="hora_entrada">
                      </div>

                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label></label>
                        <input type="hidden" class="form-control" name="fecha_salida" id="fecha_salida" placeholder="Fecha Salida" >
                      </div>
                      
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label></label>
                        <input type="hidden" class="form-control" name="hora_salida" id="hora_salida"  placeholder="Hora Salida" >
                      </div>



                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Motivo:</label>
                        <input type="text" class="form-control" name="motivo" id="motivo" maxlength="255" placeholder="Motivo" >
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Usuario:</label>
                        
                          <select id="id_usuario" name="id_usuario" class="form-control selectpicker" data-live-search="true" ></select>
                        
                      </div>

                      <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
 
                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                      
                    
                </form>
              </div>
            </div>
          </div>
        </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  
<?php
require 'footer.php';
?>

<script type="text/javascript" src="scripts/controlarIngresoSalida.js"></script>