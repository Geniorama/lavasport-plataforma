<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Noticias y Promociones

        <small>Versión 1.0</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>

        <li class="active">Noticias y Promociones</li>

      </ol>

    </section>



    <!-- Main content -->

 <!-- Info boxes -->

 <section class="content">





      <div class="row">

        <div class="col-md-12">

		

          <div class="box">

		 

            <div class="box-header">

              <h3 class="box-title">Datos principales</h3>

			  <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>

          </div>

            </div>

            <div class="box-body">

       <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>noticias/editando/<?php echo $this->valor[0]; ?>" enctype="multipart/form-data">

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

                  <input id="nombre" name="nombre" type="text" value="<?php echo $sale->fields["nombre"];  ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>"  />

                 

                </div>

                <!-- /.input group -->

              </div>

      

  

        <div class="form-group">

                <label>Compañia:</label>



                <div class="input-group">

                  <div class="input-group-addon">

          <i class="fa fa-laptop"></i>

                  </div>

          <select multiple name="compania_id[]" id="compania_id[]" class="form-control select2" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Compania"); ?>">
<?php

if(!$companias->EOF){

  while(!$companias->EOF){ ?>

      <option value="<?php echo $companias->fields["id"]; ?>" <?php if(in_array($companias->fields["id"],$arr1)){ echo "selected"; } ?>><?php echo $companias->fields["nombre"]; ?></option><?php

    $companias->MoveNext();

  }

  $companias->Move(0);

} ?></select>  </div>

                <!-- /.input group -->

              </div>

        <div class="form-group">

                <label>Noticia o promoción:</label>



                <div class="input-group">

              

         <textarea contenteditable="true" id="texto" name="texto" rows="10" cols="120"><?php echo $sale->fields["texto"];  ?></textarea> </div>

                <!-- /.input group -->

              </div>
                  <div class="form-group">

                <label>Fecha inicial</label>



                <div class="input-group">

              <input id="fecha1" name="fecha1" type="date" value="<?php echo $sale->fields["fecha1"];  ?>" class="form-control"  /> 

     

      </div>

                <!-- /.input group -->

              </div>
                    <div class="form-group">

                <label>Fecha final</label>



                <div class="input-group">

              

         <input id="fecha2" name="fecha2" type="date" value="<?php echo $sale->fields["fecha2"];  ?>" class="form-control"  /> 

     

          </div>

                <!-- /.input group -->

              </div>
                      <div class="form-group">

                <label>Imagen</label>



                <div class="input-group">

              

         <input id="foto" name="foto" type="file" value="" class="form-control"  /> 

     <img src="../../img/foto<?php echo $sale->fields["id"]; ?>.jpg" width="50%" height="50%">

          </div>

                <!-- /.input group -->

              </div>

       


            

            

              <!-- /.form group -->



            

              <!-- /.form group -->



      </div>

                 

       
              </div>

              <!-- /.box-body -->



              <div class="box-footer">

                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button>



              </div>

            </form>

</div>

		

  </div>













      <!-- /.row -->

      <script>

    $('.select2').select2();
//CKEDITOR.replace("")
CKEDITOR.disableAutoInline = true;
CKEDITOR.inline( 'texto', {
    language: 'es',
    uiColor: '#9AB8F3'
});

      //$("#carga").hide();

//$("#ubicacion1").html(datos);




        </script>