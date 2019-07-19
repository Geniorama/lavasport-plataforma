<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cliente
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dispositivos</li>
      </ol>
    </section>

    <!-- Main content -->
 <!-- Info boxes -->
 <section class="content">


      <div class="row">
        <div class="col-md-6">
		
          <div class="box">
		 
            <div class="box-header">
              <h3 class="box-title">Datos principales</h3>
			  <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <div class="box-body">
			<form id="clientes-editando" name="clientes-editando"  method="post" action="<?php echo PATO; ?>clientes/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>fecha creacion:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" readonly class="form-control" value="<?php echo $sale->fields["fecha"]; ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
        </div>
        <div class="form-group">
                  <label for="exampleInputPassword1">Estado</label>
                  <select name="estado" id="estado" class="form-control" >
				  <option value="1"<?php if($sale->fields["estado"]) { ?> selected="selected"<?php } ?>><?php echo __("Activo"); ?></option>
			<option value="0"<?php if(!$sale->fields["estado"]){ ?> selected="selected"<?php } ?>><?php echo __("Inactivo"); ?></option>

                  </select>
                  </div>
			  <div class="form-group">
                <label>Código:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-address-card"></i>
                  </div>
				  <input id="codigo" name="codigo" type="text" value="<?php echo $sale->fields["codigo"]; ?>" class="form-control"   data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
			  <div class="form-group">
                <label>Nombre:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
                  <input id="nombre" name="nombre" type="text" value="<?php echo $sale->fields["nombre"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>" required />
                 
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Apellido:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="apellido" name="apellido" type="text" value="<?php echo $sale->fields["apellido"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Apellido"); ?>" required />
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
		<option value="0"<?php if(!$sale->fields["tipo_doc"]){ ?> selected="selected"<?php } ?>><?php echo __("Seleccione Tipo  de documento"); ?></option>
		<option value="1"<?php if($sale->fields["tipo_doc"]==1){ ?> selected="selected"<?php } ?>><?php echo __("CC"); ?></option>
		<option value="2"<?php if($sale->fields["tipo_doc"]==2){ ?> selected="selected"<?php } ?>><?php echo __("TI"); ?></option>
		<option value="3"<?php if($sale->fields["tipo_doc"]==3){ ?> selected="selected"<?php } ?>><?php echo __("NIT"); ?></option>
		<option value="4"<?php if($sale->fields["tipo_doc"]==4){ ?> selected="selected"<?php } ?>><?php echo __("TP"); ?></option>
		<option value="5"<?php if($sale->fields["tipo_doc"]==5){ ?> selected="selected"<?php } ?>><?php echo __("RC"); ?></option>
				</select>   </div>
                <!-- /.input group -->
			  </div>
			  <div class="form-group">
                <label>Documento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="documento" name="documento" type="text" value="<?php echo $sale->fields["documento"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento"); ?>" required /></div>
                <!-- /.input group -->
			  </div>  
			  <div class="form-group">
                <label>fecha De nacimiento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" id="nacimiento" name="nacimiento"  class="form-control" value="<?php echo $sale->fields["nacimiento"]; ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
                <!-- /.input group -->
			  </div>
			  <div class="form-group">
                <label>email:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="email" name="email" type="text" value="<?php echo $sale->fields["email"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Email"); ?>" required />  </div>
                <!-- /.input group -->
			  </div>
			  <div class="form-group">
                <label>telefono:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="telefono" name="telefono" type="text" value="<?php echo $sale->fields["telefono"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono"); ?>" required />   <!-- /.input group -->
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
    	<option value="<?php echo $grados->fields["id"]; ?>"<?php if($grados->fields["id"]==$sale->fields["grado_id"]){ ?> selected="selected"<?php } ?>><?php echo $grados->fields["nombre"]; ?></option><?php
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
                  <input id="ciudad" name="ciudad" type="text" value="<?php echo $sale->fields["ciudad"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba la Ciudad"); ?>" required /> </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Dirección:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <input id="direccion" name="direccion" type="text" value="<?php echo $sale->fields["direccion"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Dirección"); ?>" required />    </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Compañia:</label>

                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
				  <select name="compania_id" id="compania_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Compania"); ?>" required>
		<option value="0"<?php if(!$sale->fields["compania_id"]){ ?> selected="selected"<?php } ?>><?php echo __("Seleccione Compania"); ?></option><?php
if(!$companias->EOF){
	while(!$companias->EOF){ ?>
    	<option value="<?php echo $companias->fields["id"]; ?>"<?php if($companias->fields["id"]==$sale->fields["compania_id"]){ ?> selected="selected"<?php } ?>><?php echo $companias->fields["nombre"]; ?></option><?php
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
				  <input id="acudiente" name="acudiente" type="text" value="<?php echo $sale->fields["acudiente"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Acudiente"); ?>" required /> </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Telefono del acudiente:</label>
				
                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
                  <input id="telefono_acudiente" name="telefono_acudiente" type="text" value="<?php echo $sale->fields["telefono_acudiente"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono acudiente"); ?>" required />   </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Documento del acudiente:</label>
				
                <div class="input-group">
                  <div class="input-group-addon">
				  <i class="fa fa-laptop"></i>
                  </div>
                  <input id="documento_acudiente" name="documento_acudiente" type="text" value="<?php echo $sale->fields["documento_acudiente"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento acudiente"); ?>" required />    <!-- /.input group -->
              </div>

            
            
              <!-- /.form group -->

            
              <!-- /.form group -->

      </div>
      <div class="form-group">
                  <label for="exampleInputPassword1">Cliente Especial</label>
                  <select name="especial" id="especial" class="form-control" >
				  <option value="1"<?php if($sale->fields["especial"]) { ?> selected="selected"<?php } ?>><?php echo __("Si"); ?></option>
			<option value="0"<?php if(!$sale->fields["especial"]){ ?> selected="selected"<?php } ?>><?php echo __("No"); ?></option>

                  </select>
                  </div>
			<div class="form-group">
		<button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button>
	<button type="submit" class="btn btn-primary" data-loading-text="Verificando...">&nbsp;&nbsp;<?php echo __("Guardar"); ?></button>

            
            
              <!-- /.form group -->

            
              <!-- /.form group -->

			</div>
			
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

       
		 
		</div>
		</form>
</div>
		
        <!-- /.col (left) -->
        <div class="col-md-6">
          

          <!-- iCheck -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cupos Asignados</h3>
			  <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                <th >Pago</th>
                  <th>Cupo</th>
                  <th>Inicio</th>
                  <th>Fin</th>
                  <th>uso del cupo</th>
                  <th style="width: 40px">%</th>
                  
                  <th >Eliminar</th>
                </tr>
               
               
                <?php while(!$cupocliente->EOF){   ?>
                <tr>
                <td> <?php if($cupocliente->fields["pago"]==0){ ?> <p style="color:red">Pendiente</p><?php } ?>
                <?php if($cupocliente->fields["pago"]==1){ ?> <p style="color:yellow">Pendiente Con Abono</p><?php } ?>
                <?php if($cupocliente->fields["pago"]==2){ ?> <p style="color:green">Pagado</p><?php } ?>
    
              </td>
                  <td><?php echo $cupocliente->fields["cupo_nombre"]; ?></td>
                  <td><?php echo $cupocliente->fields["inicio"]; ?></td>
                  <td><?php echo $cupocliente->fields["fin"]; ?></td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-sucess" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">55%</span></td>
                 
                  <td>
               	
      <button type="button" onclick="borrarregistro(<?php echo $cupocliente->fields["id"]; ?>)" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> </button>

                </td>
                </tr>

                <?php  $cupocliente->MoveNext(); } ?>
               
              </table>
            </div>

<div class="box-body">
               
               <form action="<?php echo PATO; ?>clientecupo/agregando/" method="post" name="ciudades-filtrar" id="ciudades-filtrar" class="form-inline navbar-text">
       
                 <div class="row">
                   <div class="col">
                   <div class="form-group">
                      
       
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                         </div>
                         <input type="date" id="inicio" name="inicio"  class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                       </div>
                       <!-- /.input group -->
               </div>
               <label> al </label>
               <div class="form-group">
                       
       
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                         </div>
                         <input type="date" id="fin" name="fin"  class="form-control"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                       </div>
                       <!-- /.input group -->
               </div>
                     <!-- /.form-group -->
               <div>&nbsp;</div>
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
                       <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $this->valor[0]; ?>"> 
                     <button type="submit" class="btn btn-primary">Asignar Cupo</button>
       </div>
                     <!-- /.form-group -->
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>    </div>
       
        
        </div>
        <!-- /.col (right) -->
  </div>






      <!-- /.row -->
      <script>
  function borrarregistro(id){
    if(confirm("Realmente Desea eliminar el cupo?")){
    $("#carga").show();
    $.ajax({type: "POST",url: "<?php echo PATO; ?>clientecupo/eliminar/"+id+"",data: "ok=1",


success: function(datos){
//  $("#carga").hide();
  if(datos=='ok'){
//alert("eliminado con exito");
window.location.reload();
  }
//$("#carga").hide();
//$("#ubicacion1").html(datos);

}


});
}
    
  }

        </script>




