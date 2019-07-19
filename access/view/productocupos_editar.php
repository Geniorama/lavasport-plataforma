<h4><?php echo __("Editar Productocupo"); ?></h4>

<form id="productocupos-editando" name="productocupos-editando" class="form-horizontal" method="post" action="<?php echo PATO; ?>productocupos/editando/<?php echo $this->valor[0]; ?>/" enctype="multipart/form-data">

<div class="row"><div class="col-12">&nbsp;</div></div>

<div class="row">
	<div class="col-12">


<div class="form-group row">
<label for="producto_id" class="col-3"><?php echo __("Producto"); ?></label>
<div class="col-7"><select name="producto_id" id="producto_id" class="custom-select" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Producto"); ?>" required>
		<option value="0"<?php if(!$sale->fields["producto_id"]){ ?> selected="selected"<?php } ?>><?php echo __("Seleccione Producto"); ?></option><?php
if(!$productos->EOF){
	while(!$productos->EOF){ ?>
    	<option value="<?php echo $productos->fields["id"]; ?>"<?php if($productos->fields["id"]==$sale->fields["producto_id"]){ ?> selected="selected"<?php } ?>><?php echo $productos->fields["nombre"]; ?></option><?php
		$productos->MoveNext();
	}
	$productos->Move(0);
} ?></select></div>
</div>


<div class="form-group row">
<label for="cantidad" class="col-3"><?php echo __("Cantidad"); ?></label>
<div class="col-7"><input id="cantidad" name="cantidad" type="text" value="<?php echo $sale->fields["cantidad"]; ?>" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba la Cantidad"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="cupo_id" class="col-3"><?php echo __("Cupo"); ?></label>
<div class="col-7"><select name="cupo_id" id="cupo_id" class="custom-select" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Cupo"); ?>" required>
		<option value="0"<?php if(!$sale->fields["cupo_id"]){ ?> selected="selected"<?php } ?>><?php echo __("Seleccione Cupo"); ?></option><?php
if(!$cupos->EOF){
	while(!$cupos->EOF){ ?>
    	<option value="<?php echo $cupos->fields["id"]; ?>"<?php if($cupos->fields["id"]==$sale->fields["cupo_id"]){ ?> selected="selected"<?php } ?>><?php echo $cupos->fields["nombre"]; ?></option><?php
		$cupos->MoveNext();
	}
	$cupos->Move(0);
} ?></select></div>
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
	
	$("#productocupos-editando").submit(function(){
		var err=0;$(".has-error").removeClass("has-error");$(".popover").hide();$("[type=submit]").button("loading");



		if($("#producto_id").val()==0){
			if(err==0)$("#producto_id").focus();err++;$("#producto_id").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#cantidad").val()==""){
			if(err==0)$("#cantidad").focus();err++;$("#cantidad").addClass("has-error").popover("show").parent("div").addClass("has-error");}


		if($("#cupo_id").val()==0){
			if(err==0)$("#cupo_id").focus();err++;$("#cupo_id").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if(err==0){return true;}else{$("[type=submit]").button("reset");return false;}
	});
});
</script>