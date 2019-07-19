<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cupos
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cupos</li>
      </ol>
    </section>

    <!-- Main content -->
 <!-- Info boxes -->
 <section class="content">
 
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <?php if(isset($this->valor[1]) && $this->valor[1]>0){
?>
<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alerta!</h4>
                El cupo se modifico con exito
              </div>

<?php

            } ?>
            <div class="box-header">
              <h2 class="box-title"><?php echo $sale->fields["nombre"]; ?></h2>
            </div>
            <div class="box box-default collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">detalle del Cupo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<form id="cupos-editando" name="cupos-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>cupos/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">
   <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $sale->fields["nombre"]; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Cupo</label>
                  <input type="number" class="form-control" id="grm_asignados" name="grm_asignados" value="<?php echo $sale->fields["grm_asignados"]; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">% Descuento para extra </label>
                  <input type="number" class="form-control" id="descuento_extra" name="descuento_extra" value="<?php echo $sale->fields["descuento_extra"]; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Entregas Mensuales</label>
                  <input type="number" class="form-control" id="num_recibidos" name="num_recibidos" value="<?php echo $sale->fields["num_recibidos"]; ?>" placeholder="Entregas Mensuales">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Dias Promesa de Entrega</label>
                  <input type="number" class="form-control" id="dias" name="dias" value="<?php echo $sale->fields["dias"]; ?>" placeholder="dias entrega">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Valor</label>
                  <input type="number" class="form-control" id="valor" name="valor" value="<?php echo $sale->fields["valor"]; ?>" placeholder="Valor">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Iva</label>
                  <input type="number" class="form-control" id="iva" name="iva" value="<?php echo $sale->fields["iva"]; ?>" placeholder="Iva">
                </div>
                
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-header -->
            <div class="box-body">
	
              <div>
			  <form id="productocupos-agregando" name="productocupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>productocupos/agregando/<?php echo $this->valor[0];  ?>" enctype="multipart/form-data">


             <input type="hidden" id="producto_id" name="producto_id" value="0"> 
             <input type="hidden" id="cantidad" name="cantidad" value="1"> 
             <input type="hidden" id="cupo_id" name="cupo_id" value="<?php echo $this->valor[0]; ?>"> 
            
             <button type="button" class="btn btn-secondary" onclick="volver()" ><i class="fa fa-arrow-left"></i> Volver</button>
         
              <button type="submit"  class="btn btn-success">AGREGAR PRENDA</button>
          </form>
        
          </div>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Prenda</th>
                  <th>Gramos</th>
				  <th>Cantidad</th>
				  <th>Acciones</th>
				
				 
                </tr>
                </thead>
                <tbody>
				<?php
$j=1;$i=0;
	while(!$sale2->EOF){ ?>
                <tr>
                  <td>
                  <select name="prenda<?php echo $sale2->fields["id"];  ?>" id="prenda<?php echo $sale2->fields["id"];  ?>" onchange="verPeso(<?php echo $sale2->fields["id"];  ?>)" class="form-control select2">
                  <option value="0">Seleccione Prenda</option>
  <?php while(!$prenda->EOF){ ?>
  <option value="<?php echo $prenda->fields["id"]; ?>" <?php if($prenda->fields["id"]==$sale2->fields["producto_id"]){ ?> selected <?php } ?>><?php echo $prenda->fields["nombre"]; ?></option>
  <?php $prenda->MoveNext(); } $prenda->Move(0); ?>   
  </select>  
                  </td>
                  <td><input type="number" readonly name="peso<?php echo $sale2->fields["id"];  ?>" id="peso<?php echo $sale2->fields["id"];  ?>" value="<?php echo $sale2->fields["peso"];   ?>"></td>
		
          <td><input type="text" name="cantidad<?php echo $sale2->fields["id"];  ?>" id="cantidad<?php echo $sale2->fields["id"];  ?>" value="<?php echo $sale2->fields["cantidad"]; ?>"></td>
          
          <td>
       <button type="button" onclick="modificar(<?php echo $sale2->fields["id"]; ?>)" class="btn btn-success btn-flat"><i class="fa fa-edit"></i> </button>
			
			 <button type="button" onclick="borrarregistro(<?php echo $sale2->fields["id"]; ?>)" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> </button>
		
			</td>
		
				 
		     
                 
                </tr>
				<?php if($j==1){$j=2;}else{$j=1;}$sale2->MoveNext();$i++;}$sale2->Move(0); ?>  
                </tbody>
                <tfoot>
				<th>Prenda</th>
				 
				  <th>Cantidad</th>
				  <th>Acciones</th>
        
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  <script>
  $(function () {

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



function volver(){
 window.history.back();
  

}

function borrarregistro(id){
    if(confirm("Realmente Desea eliminar el producto ")){
    $("#carga").show();
    $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/eliminar/"+id+"",data: "ok=1",


success: function(datos){
  $("#carga").hide();
  if(datos=='ok'){
alert("eliminado con exito");
window.location.reload();
  }
//$("#carga").hide();
//$("#ubicacion1").html(datos);

}


});
}
    
  }



function modificar(id){


  $("#carga").show();
  $.ajax({type: "POST",url: "<?php echo PATO; ?>productocupos/editando/"+id,data: "producto_id="+$("#prenda"+id).val()+"&cantidad="+$("#cantidad"+id).val(),


success: function(datos){
alert("editado con exito");
//window.location.reload();

$("#carga").hide();
//$("#ubicacion1").html(datos);

}


});




}

function verPeso(id){
     // $("#carga").show();
      $.ajax({type: "POST",url: "<?php echo PATO; ?>productos/verpeso/"+$("#prenda"+id).val(),data: "ok=1",


success: function(datos){

$("#peso"+id).val(datos);

//$("#carga").hide();
}


});


    }


  
  </script>

