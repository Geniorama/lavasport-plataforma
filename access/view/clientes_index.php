 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clientes
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Clientes</li>
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
                El cliente se agrego con exito
              </div>

<?php

            } ?>
            <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Agregar Cliente</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>clientes/agregando/" enctype="multipart/form-data">
          <div class="box-body">
          <div class="form-group">
                  <label for="exampleInputPassword1">Estado</label>
                  <select name="estado" id="estado" class="form-control" >
				  <option value="1"><?php echo __("Activo"); ?></option>
			<option value="0"><?php echo __("Inactivo"); ?></option>

                  </select>
                  </div>
                  <div class="form-group">
                <label>Código:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-address-card"></i>
                  </div>
				  <input id="codigo" name="codigo" type="text" value="" class="form-control"   data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Nombre:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
                  <input id="nombre" name="nombre" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>" required />
                 
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Apellido:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="apellido" name="apellido" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Apellido"); ?>" required />
                </div>
                <!-- /.input group -->
			  </div>  
			  <div class="form-group">
                <label>Tipo Documento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <select name="tipo_doc" id="tipo_doc" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Tipo  de documento"); ?>" required>
		<option value="0"><?php echo __("Seleccione Tipo  de documento"); ?></option>
		<option value="1"><?php echo __("CC"); ?></option>
		<option value="2"><?php echo __("TI"); ?></option>
		<option value="3"><?php echo __("NIT"); ?></option>
		<option value="4"><?php echo __("TP"); ?></option>
		<option value="5"><?php echo __("RC"); ?></option>
				</select>   </div>
                <!-- /.input group -->
			  </div>
			  <div class="form-group">
                <label>Documento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="documento" name="documento" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento"); ?>" required /></div>
                <!-- /.input group -->
			  </div>  
			  <div class="form-group">
                <label>fecha De nacimiento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" id="nacimiento" name="nacimiento"  class="form-control" value="" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
        </div>
        <div class="form-group">
                <label>email:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="email" name="email" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Email"); ?>" required />  </div>
                <!-- /.input group -->
			  </div>
			  <div class="form-group">
                <label>telefono:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="telefono" name="telefono" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono"); ?>" required />   <!-- /.input group -->
              </div>

          </div>  
          <div class="form-group">
                <label>Grado:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
                  <select name="grado_id" id="grado_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Grado"); ?>" required>
		<option value="0"<?php if(!$sale->fields["grado_id"]){ ?> selected="selected"<?php } ?>><?php echo __("Seleccione Grado"); ?></option><?php
if(!$grados->EOF){
	while(!$grados->EOF){ ?>
    	<option value="<?php echo $grados->fields["id"]; ?>"><?php echo $grados->fields["nombre"]; ?></option><?php
		$grados->MoveNext();
	}
	$grados->Move(0);
} ?></select>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label>Ciudad:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
                  <input id="ciudad" name="ciudad" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba la Ciudad"); ?>" required /> </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Dirección:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="direccion" name="direccion" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Dirección"); ?>" required />    </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Compañia:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <select name="compania_id" id="compania_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Compania"); ?>" required>
		<option value="0"><?php echo __("Seleccione Compania"); ?></option><?php
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
                <label>Acudiente:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="acudiente" name="acudiente" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Acudiente"); ?>" required /> </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Telefono del acudiente:</label>
				
                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
                  <input id="telefono_acudiente" name="telefono_acudiente" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono acudiente"); ?>" required />   </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Documento del acudiente:</label>
				
                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
                  <input id="documento_acudiente" name="documento_acudiente" type="text" value="" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento acudiente"); ?>" required />    <!-- /.input group -->
              </div>

            
            
              <!-- /.form group -->

            
              <!-- /.form group -->

			</div>
                 
                  <div class="form-group">
                  <label for="exampleInputPassword1">Organizacion</label>
          <select  <?php if($_SESSION['perfil']!=1){ ?> disabled <?php } ?> name="organizacione_id" id="organizacione_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Organizaciones"); ?>" required>
          <?php
if(!$organizaciones->EOF){
	while(!$organizaciones->EOF){ ?>
    	<option value="<?php echo $organizaciones->fields["id"]; ?>" <?php if($_SESSION['organizacione_id']==$organizaciones->fields["id"]){ ?> selected <?php } ?>><?php echo $organizaciones->fields["nombre"]; ?></option><?php
		$organizaciones->MoveNext();
	}
	$organizaciones->Move(0);
} ?></select>
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
        <div class="box-header with-border">
          <h3 class="box-title">Filtros</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form action="<?php echo PATO; ?>clientes/filtrar/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">

          <div class="row">
            <div class="col">
              <div class="form-group">
                
                <input type="text" id="nombre" placeholder="nombre" name="nombre" value="<?php echo $_POST["nombre"]; ?>" class="form-control">
              </div>
           
              <div class="form-group">
                
                <input type="text" id="codigo" placeholder="Código" name="codigo" value="<?php echo $_POST["codigo"]; ?>" class="form-control">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
             
                <input type="text" placeholder="Documento" id="documento" name="documento" value="<?php echo $_POST["documento"]; ?>" class="form-control">
              </div>
              <!-- /.form-group -->
            
            
              <div class="form-group">
               
                <select class="form-control select2" name="compania_id[]" id="compania_id" multiple="multiple" data-placeholder="Compañia"
                        style="width: 100%;">
               <?php while(!$companias->EOF){   ?>
                        <option value="<?php echo $companias->fields["id"]; ?>" <?php if (in_array($companias->fields["id"], $_POST["compania_id"])) { ?> selected="" <?php } ?> ><?php echo $companias->fields["nombre"]; ?></option>
               <?php $companias->MoveNext(); }  ?>
                </select>
               </div>
               <div class="form-group">
                
                  <select name="estado" id="estado" class="form-control" >
                 
                  <option value="0" <?php if($_POST["estado"]==0){ ?> selected <?php } ?> ><?php echo __("Inactivos"); ?></option>

               <option value="1" <?php if($_POST["estado"]==1){ ?> selected <?php } ?>><?php echo __("Activos"); ?></option>
			
                  </select>
                  </div>
              <!-- /.form-group -->
       
              <div class="form-group">
              <button type="submit" class="btn btn-primary">Filtrar</button>
</div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
       
</form>
selecione los filtros y presione el boton para filtrar.
        </div>
      </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th></th>
                  <th>Codigo</th>
				  <th>Nombre</th>
				  <th>Apellido</th>
				  <th>compania</th>
          <th>cupo activo</th>
          <th>Inicio</th>
          <th>Fin</th>
          <th>Estado</th>
				  <th>Acciones</th>
				 
                  
                 
                </tr>
                </thead>
                <tbody>
				<?php
$j=1;$i=0;
	while(!$sale->EOF){ 
    
    $cupos = $this->obj->vercupos( $sale->fields["id"]);
    ?>
                <tr>
                <td> <input type="checkbox" name="seleccion<?php echo $sale->fields["id"];  ?>" id="seleccion<?php echo $sale->fields["id"];  ?>" class="custom-control-input"></td>
                  <td><?php echo $sale->fields["codigo"]; ?></td>
				  <td><?php echo $sale->fields["nombre"]; ?></td>
                  <td><?php echo $sale->fields["apellido"]; ?>
                  </td>
				  <td><?php  echo $sale->fields["companias_nombre"]; ?></td>
				  <td><?php  echo $cupos->fields["cupo_nombre"];  ?>
          <?php
          if($cupos->fields["cupo_nombre"]!=""){
          if($cupos->fields["pago"]==0){ ?> <p style="color:red">Pendiente de pago</p><?php } ?>
                <?php if($cupos->fields["pago"]==1){ ?> <p style="color:yellow">Pendiente Con Abono</p><?php } ?>
                <?php if($cupos->fields["pago"]==2){ ?> <p style="color:green">Pagado</p><?php } ?>
    
            <?php } ?> 
        </td>
        <td><?php  echo $cupos->fields["inicio"];  ?>
        </td>
        <td><?php  echo $cupos->fields["fin"];  ?>
        </td>
      
        <td><?php if($sale->fields["estado"]==1){ 
      echo "Activo";
				  }if($sale->fields["estado"]==0){
            echo "Inactivo";

          } 
        
          ?>
        </td>
        <td>
        <button type="button" onclick="editar(<?php echo $sale->fields["id"]; ?>)" class="btn btn-block btn-primary btn-flat">Editar</button>
        </td>
                 
                </tr>
				<?php if($j==1){$j=2;}else{$j=1;}$sale->MoveNext();$i++;}$sale->Move(0); ?>  
                </tbody>
                <tfoot>
                <tr>
                <th></th>
				<th>Codigo</th>
				  <th>Nombre</th>
				  <th>Apellido</th>
				  <th>compania</th>
          <th>cupo activo</th>
          <th>Inicio</th>
          <th>Fin</th>
          <th>Estado</th>
          <th>Acciones</th>
				 
                </tr>
                </tfoot>
              </table>
              <div class="box-body">
               
        <form action="<?php echo PATO; ?>clientes/agregarcupo/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">

          <div class="row">
            <div class="col">
            <div class="form-group">
                <label>Inicio del Cupo:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" id="inicio" name="inicio"  class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
			  </div>
           
        <div class="form-group">
                <label>Fin del Cupo:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" id="fin" name="fin"  class="form-control"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
			  </div>
              <!-- /.form-group -->
        
              <div class="form-group">
               
                <select class="form-control" name="cupo_id" id="cupo_id"  data-placeholder="Cupo"
                        style="width: 100%;">
                        <option value="0">Seleccione el cupo</option>
  
               <?php while(!$cupos1->EOF){   ?>
                        <option value="<?php echo $cupos1->fields["id"]; ?>" ><?php echo $cupos1->fields["nombre"]; ?></option>
               <?php $cupos1->MoveNext(); }  ?>
                </select>
               </div>
              
              <!-- /.form-group -->
       
              <div class="form-group">
              <button type="submit" class="btn btn-primary">Agregar Cupo a los clientes seleccionados</button>
</div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
       
</form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <script>

function editar(id){
	window.location.href = "<?php echo PATO; ?>clientes/editar/"+id;

  }
  $(function () {
    $('.select2').select2();
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      
    })
  })
  $('#inicio1').datepicker({
      autoclose: true
    })
    $('#fin1').datepicker({
      autoclose: true
    })
</script>