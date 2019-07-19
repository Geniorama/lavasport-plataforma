<h4><?php echo __("Ver clientecupo"); ?></h4>

<div class="row">
	<div class="col-8" itemscope itemtype="">


<div class="row">
	<div class="col-5"><?php echo __("id"); ?></div>
	<div class="col-7"><?php echo $sale->fields["id"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Cliente"); ?></div>
	<div class="col-7"><?php echo $sale->fields["clientes_nombre"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Cupo"); ?></div>
	<div class="col-7"><?php echo $sale->fields["cupo_id"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Inicio"); ?></div>
	<div class="col-7"><?php echo $sale->fields["inicio"]; ?>	</div>
</div>


<div class="row">
	<div class="col-5"><?php echo __("Fin"); ?></div>
	<div class="col-7"><?php echo $sale->fields["fin"]; ?>	</div>
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

