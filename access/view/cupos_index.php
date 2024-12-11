 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Cupos

        <small>Versión 1.0</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Cupos</li>

      </ol>

    </section>



    <!-- Main content -->

 <!-- Info boxes -->

 <section class="content">

      <div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">

              <h3 class="box-title">Cupos</h3>

			</div>

			

      <?php if(isset($this->valor[0]) && $this->valor[0]>0){

?>

<div class="alert alert-info alert-dismissible">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <h4><i class="icon fa fa-info"></i> Alerta!</h4>

                El cupo se agrego con exito

              </div>



<?php



            } ?>

            <div class="box box-default collapsed-box">

            <div class="box-header with-border">

              <h3 class="box-title">Agregar Cupo</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

            <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>cupos/agregando/" enctype="multipart/form-data">

          <div class="box-body">

                <div class="form-group">

                  <label for="exampleInputEmail1">Nombre</label>

                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">

                </div>

                <div class="form-group">

                  <label for="exampleInputEmail1">Inicio</label>

                  <input type="date" class="form-control" name="inicio" id="inicio" placeholder="Inicio">

                </div>

                <div class="form-group">

                  <label for="exampleInputEmail1">Fin</label>

                  <input type="date" class="form-control" name="fin" id="fin" placeholder="Fin">

                </div>

                <div class="form-group">

                <label>límite de pago:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-calendar"></i>

                  </div>

                  <input type="date" id="fecha_limite" name="fecha_limite"  class="form-control"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>

                               </div>

                <!-- /.input group -->

        </div>

        <div class="form-group">

                <label>Interes mensual por mora:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-percent"></i>

                  </div>

                  <input type="number" id="interes" name="interes"  class="form-control" data-placeholder="Interes mensual">

                                   </div>

                <!-- /.input group -->

        </div>



                <div class="form-group">

                  <label for="exampleInputEmail1">Gramos ilimitados</label>

                  <br>

                  <label class="radio-inline"><input type="radio" value="1" onclick="escondergramos()"  name="grm_ilimitados" >Si</label>

<label class="radio-inline"><input type="radio" value="0" onclick="mostrargramos()" name="grm_ilimitados" checked>No</label>

                </div>

                <div class="form-group" id="gramosm">

                  <label for="exampleInputPassword1">Gramos asignados</label>

                  <input type="number" class="form-control" id="grm_asignados" name="grm_asignados" placeholder="Gramos">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">% descuento para extras</label>

                  <input type="number" class="form-control" id="descuento_extra" name="descuento_extra" placeholder="Descuento">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Entregas Mensuales</label>

                  <input type="number" class="form-control" id="num_recibidos" name="num_recibidos" placeholder="Entregas Mensuales">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Días Promesa Entrega</label>

                  <input type="number" class="form-control" id="dias" name="dias" placeholder="Dias Promesas">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Valor</label>

                  <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor">

                </div>

                <div class="form-group">

                  <label for="exampleInputPassword1">Iva</label>

                  <input type="number" class="form-control" id="iva" name="iva" placeholder="Iva">

                </div>
    <div class="form-group">

                <label>Contrato del Cupo:</label>



                <div class="input-group">

              

         <textarea id="texto_contrato" name="texto_contrato" rows="10" cols="120"></textarea> </div>

                <!-- /.input group -->

              </div>
              

              

              </div>

              <!-- /.box-body -->



              <div class="box-footer">

                <button type="submit" class="btn btn-primary">Agregar</button>

              </div>

            </form>

            </div>

            <!-- /.box-body -->

          </div>

			<!-- /.box-header -->

			

            <div class="box-body">

              <table id="example2" class="table table-bordered table-hover">

                <thead>

                <tr>

                <th>Id Cupo</th>

				  <th>Nombre</th>

          <th>Gramos asignados</th>

          <th># Entregas/Mes</th>

          <th>Inicio</th>

          <th>Fin</th>

          <th>Días de entrega</th>

          <th>Valor</th>

          <th>Ver</th>
          <th>Duplicar</th>

				 

				 

				 

                  

                 

                </tr>

                </thead>

                <tbody>

				<?php

$j=1;$i=0;

	while(!$sale->EOF){ ?>

         

         <tr>

         <td><?php echo $sale->fields["id"]; ?></td>

				  <td><?php echo $sale->fields["nombre"]; ?></td>

          <td><?php if($sale->fields["grm_ilimitados"]==0){ echo $sale->fields["grm_asignados"]; }else{ echo "<strong>ILIMITADOS</strong>"; }  ?></td>

          <td><?php echo $sale->fields["num_recibidos"]; ?></td>

          <td><?php echo $sale->fields["inicio"]; ?></td>

          <td><?php echo $sale->fields["fin"]; ?></td>

          <td><?php echo $sale->fields["dias"]; ?></td>

          <td><?php echo number_format($sale->fields["valor"],0,',','.'); ?></td>

          <td> <button type="button" onclick="ver(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-primary btn-flat">Ver</button>
          <td> <button type="button" onclick="duplicar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-primary btn-flat">Duplicar</button>

      </td>

				

                 

                </tr>

				<?php if($j==1){$j=2;}else{$j=1;}$sale->MoveNext();$i++;}$sale->Move(0); ?>  

                </tbody>

                <tfoot>

              <tr>

                <th>Id Cupo</th>

          <th>Nombre</th>

          <th>Gramos asignados</th>

          <th># Entregas/Mes</th>

          <th>Inicio</th>

          <th>Fin</th>

          <th>Dias de entrega</th>

          <th>Valor</th>

          <th>Ver</th>

         

         

         

                  

                 

                </tr>

                </tfoot>

              </table>

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

		  <script>

function escondergramos(){



 $("#gramosm").hide(); 

}

function mostrargramos(){



$("#gramosm").show(); 

}

function ver(id){

	window.location.href = "<?php echo PATO; ?>cupos/ver/"+id;



  }

  function duplicar(id){
if(confirm("desea duplicar el cupo?")){

  $("#carga").show();
  $.ajax({type: "POST",url: "<?php echo PATO; ?>cupos/duplicar/"+id,data: "ok=1",





success: function(datos){

  window.location.reload();


}





});


}

   
  }

  $(function () {
CKEDITOR.replace("texto_contrato")
    $('.select2').select2();

    $('#example1').DataTable()

    $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': false,

      'searching'   : false,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    })

  })

</script>





