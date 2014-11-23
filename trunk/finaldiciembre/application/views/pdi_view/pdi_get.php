<div class="bs-example" id="admin">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Puntos de Informacion</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <form class="navbar-form navbar-right" role="search">
			<?= anchor('pdi/add', 'Agregar PDI', array('class'=>'btn btn-default')); ?>
          </form>
        </div>
      </div>
    </nav>
  </div>

<div class="row">
	<div class="span8">
	<?php echo $map['js']; ?>
	<?php echo $map['html']; ?>
	</div>

</div>