<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Prenda
        <small>Version 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Editar Prenda</li>
      </ol>
    </section>

    <!-- Main content -->
 <!-- Info boxes -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
        
            <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Prenda</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<form id="admins-editando" name="admins-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>productos/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">
   <div class="box-body">
   <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $sale->fields["nombre"]; ?>" placeholder="Nombre">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Categoria</label>
                 <select name="categoria" id="categoria" class="form-control" >
                  <option value="3" <?php if($sale->fields["categoria"]==3){ ?> selected <?php } ?>><?php echo __("Categoria 3"); ?></option>
                  <option value="2" <?php if($sale->fields["categoria"]==2){ ?> selected <?php } ?>><?php echo __("Categoria 2"); ?></option>
                 
    <option value="1" <?php if($sale->fields["categoria"]==1){ ?> selected <?php } ?>><?php echo __("Categoria 1"); ?></option>
        <option value="0" <?php if($sale->fields["categoria"]==0){ ?> selected <?php } ?>><?php echo __("Sin categoria"); ?></option>
        
            </select>   </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Cantidad de prendas</label>
                  <input type="text" class="form-control" name="cant_prendas" id="cant_prendas" value="<?php echo $sale->fields["cant_prendas"]; ?>" placeholder="Cantidad Prendas">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Precio</label>
                  <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $sale->fields["precio"]; ?>" placeholder="precio">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Moneda</label>
                  <input type="text" class="form-control" id="moneda" value="COP" readonly name="moneda" value="<?php echo $sale->fields["moneda"]; ?>" placeholder="Moneda">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Peso(gramos)</label>
                  <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso" value="<?php echo $sale->fields["peso"]; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Precio Fijo</label>
                  <select name="fijo" id="fijo" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione si el precio es fijo"); ?>" required>
		
<option value="1" <?php if($sale->fields["fijo"]==1){ ?> selected <?php } ?>><?php echo __("Si"); ?></option>
		<option value="0" <?php if($sale->fields["fijo"]==0){ ?> selected <?php } ?>><?php echo __("No"); ?></option>
		
				</select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Maneja Cupo</label>
                  <select name="cupo" id="cupo" class="form-control" >
				  <option value="1"<?php if($sale->fields["cupo"]) { ?> selected="selected"<?php } ?>><?php echo __("Si"); ?></option>
			<option value="0"<?php if(!$sale->fields["cupo"]){ ?> selected="selected"<?php } ?>><?php echo __("No"); ?></option>

                  </select>
                  </div>
               
                 
                  <div class="form-group">
                  <label for="exampleInputPassword1">Organizacion</label>
          <select  <?php if($_SESSION['perfil']!=1){ ?> disabled <?php } ?> name="organizacione_id" id="organizacione_id" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Organizaciones"); ?>" required>
          <?php
if(!$organizacion->EOF){
	while(!$organizacion->EOF){ ?>
    	<option value="<?php echo $organizacion->fields["id"]; ?>" <?php if($_SESSION['organizacione_id']==$organizacion->fields["id"]){ ?> selected <?php } ?>><?php echo $organizacion->fields["nombre"]; ?></option><?php
		$organizacion->MoveNext();
	}
	$organizacion->Move(0);
} ?></select>
</div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="button" class="btn btn-secondary" onClick="window.history.back();">&nbsp;&nbsp;<?php echo __("Volver"); ?></button>

              </div>
            </form>
            </div>
            <!-- /.box-body -->
		  </div>
		  


