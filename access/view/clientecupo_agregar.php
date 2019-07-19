
<h4><?php echo __("Nuevo Clientecup"); ?></h4>

<form id="clientecupo-agregando" name="clientecupo-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>clientecupo/agregando/" enctype="multipart/form-data">

<div class="row"><div class="col-12">&nbsp;</div></div>

<div class="row">
	<div class="col-12">


<div class="form-group row">
<label for="cliente_id" class="col-2"><?php echo __("Cliente"); ?></label>
<div class="col-7"><select name="cliente_id" id="cliente_id" class="custom-select" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Cliente"); ?>" required>
		<option value="0" selected="selected"><?php echo __("Seleccione Cliente"); ?></option><?php
if(!$clientes->EOF){
	while(!$clientes->EOF){ ?>
    	<option value="<?php echo $clientes->fields["id"]; ?>"><?php echo $clientes->fields["nombre"]; ?></option><?php
		$clientes->MoveNext();
	}
	$clientes->Move(0);
} ?></select></div>
</div>


<div class="form-group row">
<label for="cupo_id" class="col-2"><?php echo __("Cupo"); ?></label>
<div class="col-7"><input id="cupo_id" name="cupo_id" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Cupo"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="inicio" class="col-2"><?php echo __("Inicio"); ?></label>
<div class="col-7"><input id="inicio" name="inicio" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Inicio"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="fin" class="col-2"><?php echo __("Fin"); ?></label>
<div class="col-7"><input id="fin" name="fin" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Fin"); ?>" required /></div>
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
	
	$("#inicio").datepicker(dateconf);

	$("#fin").datepicker(dateconf);

	$("#clientecupo-agregando").submit(function(){
		var err=0;$(".has-error").removeClass("has-error");$(".popover").hide();$("[type=submit]").button("loading");


		if($("#cliente_id").val()==0){
			if(err==0)$("#cliente_id").focus();err++;$("#cliente_id").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#cupo_id").val()==""){
			if(err==0)$("#cupo_id").focus();err++;$("#cupo_id").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#inicio").val()==""){
			if(err==0)$("#inicio").focus();err++;$("#inicio").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#fin").val()==""){
			if(err==0)$("#fin").focus();err++;$("#fin").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if(err==0){return true;}else{$("[type=submit]").button("reset");return false;}
	});
});
</script>