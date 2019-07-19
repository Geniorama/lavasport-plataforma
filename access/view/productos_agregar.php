
<h4><?php echo __("Nuevo Producto"); ?></h4>

<form id="productos-agregando" name="productos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>productos/agregando/" enctype="multipart/form-data">

<div class="row"><div class="col-12">&nbsp;</div></div>

<div class="row">
	<div class="col-12">


<div class="form-group row">
<label for="codigo" class="col-2"><?php echo __("Código"); ?></label>
<div class="col-7"><input id="codigo" name="codigo" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Código"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="nombre" class="col-2"><?php echo __("Nombre"); ?></label>
<div class="col-7"><input id="nombre" name="nombre" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="precio" class="col-2"><?php echo __("Precio"); ?></label>
<div class="col-7"><input id="precio" name="precio" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Precio"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="moneda" class="col-2"><?php echo __("Moneda"); ?></label>
<div class="col-7"><input id="moneda" name="moneda" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba la Moneda"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="peso" class="col-2"><?php echo __("Peso"); ?></label>
<div class="col-7"><input id="peso" name="peso" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Peso"); ?>" required /></div>
</div>


<div class="form-group row">
	<div class="col-2"><button type="button" class="btn btn-secondary btn-block mt-2" onClick="window.history.back();"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;<?php echo __("Volver"); ?></button></div>
	<div class="col-5"><button type="submit" class="btn btn-primary btn-block mt-2" data-loading-text="Verificando..."><i class="fas fa-save"></i>&nbsp;&nbsp;<?php echo __("Guardar"); ?></button></div>
</div>

	</div>
</div>

</form>

<script type="application/javascript">
var pavem=0;
$(function(){
	
	$("#productos-agregando").submit(function(){
		var err=0;$(".has-error").removeClass("has-error");$(".popover").hide();$("[type=submit]").button("loading");

		if($("#codigo").val()==""){
			if(err==0)$("#codigo").focus();err++;$("#codigo").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#nombre").val()==""){
			if(err==0)$("#nombre").focus();err++;$("#nombre").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#precio").val()==""){
			if(err==0)$("#precio").focus();err++;$("#precio").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#moneda").val()==""){
			if(err==0)$("#moneda").focus();err++;$("#moneda").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#peso").val()==""){
			if(err==0)$("#peso").focus();err++;$("#peso").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if(err==0){return true;}else{$("[type=submit]").button("reset");return false;}
	});
});
</script>