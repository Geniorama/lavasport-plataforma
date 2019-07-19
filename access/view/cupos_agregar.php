
<h4><?php echo __("Nuevo Cupo"); ?></h4>

<form id="cupos-agregando" name="cupos-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>cupos/agregando/" enctype="multipart/form-data">

<div class="row"><div class="col-12">&nbsp;</div></div>

<div class="row">
	<div class="col-12">


<div class="form-group row">
<label for="nombre" class="col-2"><?php echo __("Nombre"); ?></label>
<div class="col-7"><input id="nombre" name="nombre" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="grm_asignados" class="col-2"><?php echo __("Grm asignados"); ?></label>
<div class="col-7"><input id="grm_asignados" name="grm_asignados" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Grm asignados"); ?>" required /></div>
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
	
	$("#cupos-agregando").submit(function(){
		var err=0;$(".has-error").removeClass("has-error");$(".popover").hide();$("[type=submit]").button("loading");

		if($("#nombre").val()==""){
			if(err==0)$("#nombre").focus();err++;$("#nombre").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#grm_asignados").val()==""){
			if(err==0)$("#grm_asignados").focus();err++;$("#grm_asignados").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if(err==0){return true;}else{$("[type=submit]").button("reset");return false;}
	});
});
</script>