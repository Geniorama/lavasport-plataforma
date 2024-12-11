<h4><?php echo __("Editar Cupo"); ?></h4>

<form id="cupos-editando" name="cupos-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>cupos/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

<div class="row"><div class="col-12">&nbsp;</div></div>

<div class="row">
	<div class="col-12">


<div class="form-group row">
<label for="nombre" class="col-3"><?php echo __("Nombre"); ?></label>
<div class="col-7"><input id="nombre" name="nombre" type="text" value="<?php echo $sale->fields["nombre"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>" required /></div>
</div>
<div class="form-group">
                  <label for="exampleInputEmail1">Inicio</label>
                  <input type="date" class="form-control" name="inicio" id="inicio" value="<?php echo $sale->fields["inicio"]; ?>" placeholder="Inicio">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Fin</label>
                  <input type="date" class="form-control" name="fin" id="fin" value="<?php echo $sale->fields["fin"]; ?>" placeholder="Fin">
                </div>
                <div class="form-group">
                <label>límite de pago:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" value="<?php echo $sale->fields["fecha_limite"]; ?>" id="fecha_limite" name="fecha_limite"  class="form-control"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                               </div>
                <!-- /.input group -->
        </div>
        <div class="form-group">
                <label>Interes mensual por mora:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-percent"></i>
                  </div>
                  <input type="number" value="<?php echo $sale->fields["interes"]; ?>" id="interes" name="interes"  class="form-control" data-placeholder="Interes mensual">
                                   </div>
                <!-- /.input group -->
        </div>


<div class="form-group row">
<label for="grm_asignados" class="col-3"><?php echo __("Grm asignados"); ?></label>
<div class="col-7"><input id="grm_asignados" name="grm_asignados" type="text" value="<?php echo $sale->fields["grm_asignados"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Grm asignados"); ?>" required /></div>
</div>
<div class="form-group row">
<label for="grm_asignados" class="col-3"><?php echo __("Entregas Mensuales"); ?></label>
<div class="col-7"><input id="num_recibidos" name="num_recibidos" type="text" value="<?php echo $sale->fields["num_recibidos"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el numero de entregas mensuales"); ?>" required /></div>
</div>
<div class="form-group row">
<label for="grm_asignados" class="col-3"><?php echo __("Días Promesa de Entrega"); ?></label>
<div class="col-7"><input id="dias" name="dias" type="text" value="<?php echo $sale->fields["dias"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el numero de entregas mensuales"); ?>" required /></div>
</div>
<div class="form-group row">
<label for="grm_asignados" class="col-3"><?php echo __("Valor"); ?></label>
<div class="col-7"><input id="valor" name="valor" type="number" value="<?php echo $sale->fields["valor"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el numero de entregas mensuales"); ?>" required /></div>
</div>
<div class="form-group row">
<label for="grm_asignados" class="col-3"><?php echo __("Iva"); ?></label>
<div class="col-7"><input id="iva" name="iva" type="number" value="<?php echo $sale->fields["iva"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el numero de entregas mensuales"); ?>" required /></div>
</div>

<div class="form-group row">
	<div class="col-3"><button type="button" class="btn btn-secondary btn-block mt-2" onClick="window.history.back();"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;<?php echo __("Volver"); ?></button></div>
	<div class="col-5"><button type="submit" class="btn btn-primary btn-block mt-2" data-loading-text="Verificando..."><i class="fas fa-save"></i>&nbsp;&nbsp;<?php echo __("Guardar"); ?></button></div>
</div>

	</div>
</div>

</form>

<script type="application/javascript">
var pavem=0;
$(function(){
	
	$("#cupos-editando").submit(function(){
		var err=0;$(".has-error").removeClass("has-error");$(".popover").hide();$("[type=submit]").button("loading");


		if($("#nombre").val()==""){
			if(err==0)$("#nombre").focus();err++;$("#nombre").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#grm_asignados").val()==""){
			if(err==0)$("#grm_asignados").focus();err++;$("#grm_asignados").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if(err==0){return true;}else{$("[type=submit]").button("reset");return false;}
	});
});
</script>