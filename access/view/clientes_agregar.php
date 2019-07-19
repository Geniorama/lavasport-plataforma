
<h4><?php echo __("Nuevo Client"); ?></h4>

<form id="clientes-agregando" name="clientes-agregando" class="form-horizontal" method="post" action="<?php echo PATO; ?>clientes/agregando/" enctype="multipart/form-data">

<div class="row"><div class="col-12">&nbsp;</div></div>

<div class="row">
	<div class="col-12">


<div class="form-group row">
<label for="codigo" class="col-2"><?php echo __("Código"); ?></label>
<div class="col-7"><input id="codigo" name="codigo" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Código"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="orden" class="col-2"><?php echo __("Orden"); ?></label>
<div class="col-7"><input id="orden" name="orden" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Orden"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="tipo" class="col-2"><?php echo __("Tipo"); ?></label>
<div class="col-7"><select name="tipo" id="tipo" class="custom-select" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Tipo"); ?>" required>
			<option value="0" selected="selected"><?php echo __("Seleccione Tipo"); ?></option>
			<option value="1"><?php echo __("extra"); ?></option>
			<option value="2"><?php echo __("cupo"); ?></option>
					</select></div>
</div>


<div class="form-group row">
<label for="grado_id" class="col-2"><?php echo __("Grado"); ?></label>
<div class="col-7"><select name="grado_id" id="grado_id" class="custom-select" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Grado"); ?>" required>
		<option value="0" selected="selected"><?php echo __("Seleccione Grado"); ?></option><?php
if(!$grados->EOF){
	while(!$grados->EOF){ ?>
    	<option value="<?php echo $grados->fields["id"]; ?>"><?php echo $grados->fields["nombre"]; ?></option><?php
		$grados->MoveNext();
	}
	$grados->Move(0);
} ?></select></div>
</div>


<div class="form-group row">
<label for="nombre" class="col-2"><?php echo __("Nombre"); ?></label>
<div class="col-7"><input id="nombre" name="nombre" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nombre"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="apellido" class="col-2"><?php echo __("Apellido"); ?></label>
<div class="col-7"><input id="apellido" name="apellido" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Apellido"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="email" class="col-2"><?php echo __("Email"); ?></label>
<div class="col-7"><input id="email" name="email" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Email"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="telefono" class="col-2"><?php echo __("Teléfono"); ?></label>
<div class="col-7"><input id="telefono" name="telefono" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="tipo_doc" class="col-2"><?php echo __("Tipo  de documento"); ?></label>
<div class="col-7"><select name="tipo_doc" id="tipo_doc" class="custom-select" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Tipo  de documento"); ?>" required>
			<option value="0" selected="selected"><?php echo __("Seleccione Tipo  de documento"); ?></option>
			<option value="1"><?php echo __("CC"); ?></option>
			<option value="2"><?php echo __("TI"); ?></option>
			<option value="3"><?php echo __("NIT"); ?></option>
			<option value="4"><?php echo __("TP"); ?></option>
			<option value="5"><?php echo __("RC"); ?></option>
					</select></div>
</div>


<div class="form-group row">
<label for="documento" class="col-2"><?php echo __("Documento"); ?></label>
<div class="col-7"><input id="documento" name="documento" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="nacimiento" class="col-2"><?php echo __("Nacimiento"); ?></label>
<div class="col-7"><input id="nacimiento" name="nacimiento" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Nacimiento"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="ciudad" class="col-2"><?php echo __("Ciudad"); ?></label>
<div class="col-7"><input id="ciudad" name="ciudad" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba la Ciudad"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="direccion" class="col-2"><?php echo __("Dirección"); ?></label>
<div class="col-7"><input id="direccion" name="direccion" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Dirección"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="compania_id" class="col-2"><?php echo __("Compania"); ?></label>
<div class="col-7"><select name="compania_id" id="compania_id" class="custom-select" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione la Compania"); ?>" required>
		<option value="0" selected="selected"><?php echo __("Seleccione Compania"); ?></option><?php
if(!$companias->EOF){
	while(!$companias->EOF){ ?>
    	<option value="<?php echo $companias->fields["id"]; ?>"><?php echo $companias->fields["nombre"]; ?></option><?php
		$companias->MoveNext();
	}
	$companias->Move(0);
} ?></select></div>
</div>


<div class="form-group row">
<label for="organizacione_id" class="col-2"><?php echo __("Organización"); ?></label>
<div class="col-7"><select name="organizacione_id" id="organizacione_id" class="custom-select" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor seleccione el Organización"); ?>" required>
		<option value="0" selected="selected"><?php echo __("Seleccione Organización"); ?></option><?php
if(!$organizaciones->EOF){
	while(!$organizaciones->EOF){ ?>
    	<option value="<?php echo $organizaciones->fields["id"]; ?>"><?php echo $organizaciones->fields["nombre"]; ?></option><?php
		$organizaciones->MoveNext();
	}
	$organizaciones->Move(0);
} ?></select></div>
</div>


<div class="form-group row">
<label for="acudiente" class="col-2"><?php echo __("Acudiente"); ?></label>
<div class="col-7"><input id="acudiente" name="acudiente" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Acudiente"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="telefono_acudiente" class="col-2"><?php echo __("Teléfono acudiente"); ?></label>
<div class="col-7"><input id="telefono_acudiente" name="telefono_acudiente" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Teléfono acudiente"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="documento_acudiente" class="col-2"><?php echo __("Documento acudiente"); ?></label>
<div class="col-7"><input id="documento_acudiente" name="documento_acudiente" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba el Documento acudiente"); ?>" required /></div>
</div>


<div class="form-group row">
<label for="fecha" class="col-2"><?php echo __("Fecha"); ?></label>
<div class="col-7"><input id="fecha" name="fecha" type="text" class="form-control" data-placement="right" data-original-title="<?php echo __("Dato requerido"); ?>" data-content="<?php echo __("Por favor escriba la Fecha"); ?>" required /></div>
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
	
	$("#nacimiento").datepicker(dateconf);

	$("#clientes-agregando").submit(function(){
		var err=0;$(".has-error").removeClass("has-error");$(".popover").hide();$("[type=submit]").button("loading");

		if($("#codigo").val()==""){
			if(err==0)$("#codigo").focus();err++;$("#codigo").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#orden").val()==""){
			if(err==0)$("#orden").focus();err++;$("#orden").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#tipo").val()==""){
			if(err==0)$("#tipo").focus();err++;$("#tipo").addClass("has-error").popover("show").parent("div").addClass("has-error");}


		if($("#grado_id").val()==0){
			if(err==0)$("#grado_id").focus();err++;$("#grado_id").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#nombre").val()==""){
			if(err==0)$("#nombre").focus();err++;$("#nombre").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#apellido").val()==""){
			if(err==0)$("#apellido").focus();err++;$("#apellido").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#email").val()=="" || !valmail($("#email").val())){
			if(err==0)$("#email").focus();err++;$("#email").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#telefono").val()==""){
			if(err==0)$("#telefono").focus();err++;$("#telefono").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#tipo_doc").val()==""){
			if(err==0)$("#tipo_doc").focus();err++;$("#tipo_doc").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#documento").val()==""){
			if(err==0)$("#documento").focus();err++;$("#documento").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#nacimiento").val()==""){
			if(err==0)$("#nacimiento").focus();err++;$("#nacimiento").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#ciudad").val()==""){
			if(err==0)$("#ciudad").focus();err++;$("#ciudad").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#direccion").val()==""){
			if(err==0)$("#direccion").focus();err++;$("#direccion").addClass("has-error").popover("show").parent("div").addClass("has-error");}


		if($("#compania_id").val()==0){
			if(err==0)$("#compania_id").focus();err++;$("#compania_id").addClass("has-error").popover("show").parent("div").addClass("has-error");}


		if($("#organizacione_id").val()==0){
			if(err==0)$("#organizacione_id").focus();err++;$("#organizacione_id").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#acudiente").val()==""){
			if(err==0)$("#acudiente").focus();err++;$("#acudiente").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#telefono_acudiente").val()==""){
			if(err==0)$("#telefono_acudiente").focus();err++;$("#telefono_acudiente").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#documento_acudiente").val()==""){
			if(err==0)$("#documento_acudiente").focus();err++;$("#documento_acudiente").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if($("#fecha").val()==""){
			if(err==0)$("#fecha").focus();err++;$("#fecha").addClass("has-error").popover("show").parent("div").addClass("has-error");}

		if(err==0){return true;}else{$("[type=submit]").button("reset");return false;}
	});
});
</script>