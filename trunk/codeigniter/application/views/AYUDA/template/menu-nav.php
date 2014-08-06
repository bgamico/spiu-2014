<!--------------Navigation--------------->

<nav>
	<ul class="nav nav-pills">
	  <li><a href="<?php echo base_url(); ?>admin">Inicio</a></li>
	  <li><a href="<?php echo base_url(); ?>admin/miPerfil"/>Perfil</a></li>
	  <!--$this->session->userdata('id_usuario')/-->
	  <li><a href="<?php echo base_url(); ?>admin/about">Acerca de</a></li>
	  <li><a href="#">Contacto</a></li>
	  <li><a href="<?php echo base_url(); ?>login/logout_ci">Cerrar Sesión</a></li>
	</ul>
</nav>

<div class="page-title page-title-map">
    <div class="container">
	<div class="row show-grid">
	    <div class="span12">
	        <h1><?php echo $sedeactual ?></h1>
		<a class="btn btn-lg btn-success" href="<?php echo base_url().$operacion[2]; ?>" role="button"><?php echo $agregar ?></a>
	    </div>
	</div>
    </div>
</div>

