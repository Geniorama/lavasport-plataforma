 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Noticias y promociones

        <small>Versión 1.0</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Noticias y promociones</li>

      </ol>

    </section>



    <!-- Main content -->

 <!-- Info boxes -->

 <section class="content">

      <div class="row">

        <div class="col-xs-12">

          <div class="box">

          <?php if(isset($this->valor[0]) && $this->valor[0]>0){

?>

<div class="alert alert-info alert-dismissible">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <h4><i class="icon fa fa-info"></i> Alerta!</h4>

               La noticia se agrego con exito

              </div>



<?php



            } ?>

            <div class="box box-default collapsed-box">

            <div class="box-header with-border">

              <h3 class="box-title">Agregar Noticia/Promoción</h3>



              <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>

                </button>

              </div>

              <!-- /.box-tools -->

            </div>

            <!-- /.box-header -->

            <div class="box-body">

            <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>noticias/agregando/" enctype="multipart/form-data">

          <div class="box-body">

       

                  <!--div class="form-group">

                <label>Código:</label>



                <div class="input-group">

                  <div class="input-group-addon">

                    <i class="fa fa-address-card"></i>

                  </div>

				  <input id="codigo" name="codigo" type="text" value="" class="form-control"   data-mask>

                </div>

                             </div>-->

              <div class="form-group">

                <label>Nombre:</label>



                <div class="input-group">

                  <div class="input-group-addon">

				  <i class="fa fa-laptop"></i>

                  </div>

                  <input id="nombre" name="nombre" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>"  />

                 

                </div>

                <!-- /.input group -->

              </div>

			

	

			  <div class="form-group">

                <label>Compañia:</label>



                <div class="input-group">

                  <div class="input-group-addon">

				  <i class="fa fa-laptop"></i>

                  </div>

				  <select style="width:100% !important;" multiple name="compania_id[]" id="compania_id[]" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Compania"); ?>">

	<?php
if(!$companias->EOF){

	while(!$companias->EOF){ ?>

    	<option value="<?php echo $companias->fields["id"]; ?>"><?php echo $companias->fields["nombre"]; ?></option><?php

		$companias->MoveNext();

	}

	$companias->Move(0);

} ?></select>  </div>

                <!-- /.input group -->

              </div>

			  <div class="form-group">

                <label>Noticia o promoción:</label>



                <div class="input-group">

              

				 <textarea id="texto" name="texto" rows="10" cols="120"></textarea> </div>

                <!-- /.input group -->

              </div>
                  <div class="form-group">

                <label>Fecha inicial</label>



                <div class="input-group">

              <input id="fecha1" name="fecha1" type="date" value="" class="form-control"  /> 

     

      </div>

                <!-- /.input group -->

              </div>
                    <div class="form-group">

                <label>Fecha final</label>



                <div class="input-group">

              

         <input id="fecha2" name="fecha2" type="date" value="" class="form-control"  /> 

     

          </div>

                <!-- /.input group -->

              </div>
                      <div class="form-group">

                <label>Imagen (760px*400px)</label>



                <div class="input-group">

              

         <input id="foto" name="foto" type="file" value="" class="form-control"  /> 

     

          </div>

                <!-- /.input group -->

              </div>

			 


            

            

              <!-- /.form group -->



            

              <!-- /.form group -->



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

			

			<div class="box box-default">

       

        <!-- /.box-header -->


        <!-- /.box-body -->



            <!-- /.box-header -->

            

            <div class="box-body">



              <table id="example2" class="table table-bordered table-hover">

                <thead>

                <tr>


                 

				  <th>Noticia</th>

				

				  <th>Ver</th>
          <th>Eliminar</th>



                 

                </tr>

                </thead>

                <tbody>

				<?php

$j=1;$i=0;

	while(!$sale->EOF){ 

    
   

   ?>

                <tr>

                        <td><?php echo $sale->fields["nombre"]; ?></td>

				             <td><button type="button" onclick="editar(<?php echo $sale->fields["id"];  ?>)" class="btn btn-block btn-primary btn-flat">Ver</button></td>

              
                     <td><button type="button" onclick="eliminar(<?php echo $sale->fields["id"];  ?>)" class="btn btn-block btn-danger btn-flat">Eliminar</button></td>

              


                 

                </tr>

				<?php if($j==1){$j=2;}else{$j=1;}$sale->MoveNext();$i++;}$sale->Move(0); ?>  

                </tbody>

                <tfoot>


                 
    <th>Noticia</th>

        

          <th>Ver</th>

                

                         

                        

                       </tr>

                </tfoot>

              </table>

              <div class="box-body">

              

          <div class="row">

            <div class="col">

           

           

       

              <!-- /.form-group -->
              

              <!-- /.form-group -->

       

          
              <!-- /.form-group -->

            </div>

            <!-- /.col -->

          </div>

          <!-- /.row -->

        </div>

   

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

		  <script>

$('[data-toggle="push-menu"]').pushMenu('toggle');

function editar(id){

	window.location.href = "<?php echo PATO; ?>clientes/editar/"+id;



  }


  $(function () {
    //bootstrap WYSIHTML5 - text editor

    $('.select2').select2();
CKEDITOR.replace("texto")
    $('#example1').DataTable()

    $('#example2').DataTable({
      "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "info": "Mostrando page _PAGE_ de _PAGES_",
            "infoFiltered": "(filtrando from _MAX_ total registros)"
        },

      'paging'      : true,

      'lengthChange': true,

      "lengthMenu": [50,100,200,500,1000,2000],

      'searching'   : false,

      'ordering'    : true,

      'info'        : false,

      'autoWidth'   : false,

      'pageLength': 100,

      

    })

  })



    function exportaraexcel() {



$("#datos_a_enviar").val($("<div>").append($("#example2").eq(0).clone()).html());

$("#FormularioExportacion").submit();



}





function editar(id){

    window.location.href = "<?php echo PATO; ?>noticias/editar/"+id;
}

function eliminar(a){
if(confirm("Esta seguro de eliminar la noticia")){
  window.location.href = "<?php echo PATO; ?>noticias/eliminar/"+a+"/";

}
}

</script>