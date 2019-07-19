<h4><?php echo __("Ver clientes"); ?></h4>

<div class="row">
	<div class="col-8" itemscope itemtype="">


<div class="row">
	<div class="col-5"><?php echo __("id"); ?></div>
	<div class="col-7"><?php echo $sale->fields["id"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Código"); ?></div>
	<div class="col-7"><?php echo $sale->fields["codigo"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Orden"); ?></div>
	<div class="col-7"><?php echo $sale->fields["orden"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Tipo"); ?></div>
	<div class="col-7"><?php
					if(!$sale->fields["tipo"]){echo __("&nbsp;");}
					if($sale->fields["tipo"]==1){echo __("extra");}
					if($sale->fields["tipo"]==2){echo __("cupo");}
					?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Grado"); ?></div>
	<div class="col-7"><?php echo $sale->fields["grados_nombre"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Nombre"); ?></div>
	<div class="col-7"><?php echo $sale->fields["nombre"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Apellido"); ?></div>
	<div class="col-7"><?php echo $sale->fields["apellido"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Email"); ?></div>
	<div class="col-7"><?php echo $sale->fields["email"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Teléfono"); ?></div>
	<div class="col-7"><?php echo $sale->fields["telefono"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Tipo  de documento"); ?></div>
	<div class="col-7"><?php
					if(!$sale->fields["tipo_doc"]){echo __("&nbsp;");}
					if($sale->fields["tipo_doc"]==1){echo __("CC");}
					if($sale->fields["tipo_doc"]==2){echo __("TI");}
					if($sale->fields["tipo_doc"]==3){echo __("NIT");}
					if($sale->fields["tipo_doc"]==4){echo __("TP");}
					if($sale->fields["tipo_doc"]==5){echo __("RC");}
					?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Documento"); ?></div>
	<div class="col-7"><?php echo $sale->fields["documento"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Nacimiento"); ?></div>
	<div class="col-7"><?php echo $sale->fields["nacimiento"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Ciudad"); ?></div>
	<div class="col-7"><?php echo $sale->fields["ciudad"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Dirección"); ?></div>
	<div class="col-7"><?php echo $sale->fields["direccion"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Compania"); ?></div>
	<div class="col-7"><?php echo $sale->fields["companias_nombre"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Organización"); ?></div>
	<div class="col-7"><?php echo $sale->fields["organizaciones_nombre"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Acudiente"); ?></div>
	<div class="col-7"><?php echo $sale->fields["acudiente"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Teléfono acudiente"); ?></div>
	<div class="col-7"><?php echo $sale->fields["telefono_acudiente"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Documento acudiente"); ?></div>
	<div class="col-7"><?php echo $sale->fields["documento_acudiente"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Fecha"); ?></div>
	<div class="col-7"><?php echo $sale->fields["fecha"]; ?>	</div>
</div>


<div class="form-group">
<div class="col-5">&nbsp;</div>
<div class="col-7"><button type="button" class="btn btn-primary btn-block mt-2" onClick="window.history.back();">
<i class="fas fa-chevron-left"></i>&nbsp;&nbsp;<?php echo __("volver"); ?>
</button></div>
</div>

	</div>
	<div class="col-4">&nbsp;</div>
</div>

