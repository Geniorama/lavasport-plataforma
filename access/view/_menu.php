
<nav class="navbar navbar-expand-md navbar-light bg-faded" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#jcnavbar" aria-controls="jcnavbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
	<a class="navbar-brand" href="<?php echo PATO; ?>"><i class="fas fa-home"></i></a>
	<div class="collapse navbar-collapse" id="jcnavbar">
		<ul class="navbar-nav mr-auto">

			<li class="nav-item<?php if(MODULO=="admins")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>admins/" itemprop="URL"> <?php echo __("Admins"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="clientes")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>clientes/" itemprop="URL"> <?php echo __("Clientes"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="dispositivos")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>dispositivos/" itemprop="URL"> <?php echo __("Dispositivos"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="dml0001")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>dml0001/" itemprop="URL"> <?php echo __("Dml0001"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="lml0001")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>lml0001/" itemprop="URL"> <?php echo __("Lml0001"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="notificacion_destinatarios")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>notificacion_destinatarios/" itemprop="URL"> <?php echo __("Notificación destinatarios"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="organizaciones")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>organizaciones/" itemprop="URL"> <?php echo __("Organizaciónes"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="paises")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>paises/" itemprop="URL"> <?php echo __("Paises"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="productos")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>productos/" itemprop="URL"> <?php echo __("Productos"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="programaciones")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>programaciones/" itemprop="URL"> <?php echo __("Programaciónes"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="programas")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>programas/" itemprop="URL"> <?php echo __("Programas"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="tokens")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>tokens/" itemprop="URL"> <?php echo __("Tokens"); ?></a></li>


			<li class="nav-item<?php if(MODULO=="usuarios")echo ' active'; ?>"><a class="nav-link" href="<?php echo PATO; ?>usuarios/" itemprop="URL"> <?php echo __("Usuarios"); ?></a></li>


			<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="javaScript:;" id="navbarDropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog"></i> Configuraciones</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenu1">

			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0 hidden">
			<input class="form-control mr-sm-2" type="text" placeholder="Search" name="q" />
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> buscar</button>
		</form>
	</div>
</nav>
