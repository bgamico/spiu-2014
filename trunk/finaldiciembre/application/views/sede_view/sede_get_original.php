<div class="span9">


<?php if (isset($agregar)):?>
	<div class="bs-example">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Sedes</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <form class="navbar-form navbar-right" role="search">
			<?= anchor('sede/add', 'Agregar', array('class'=>'btn btn-default')); ?>
          </form>
        </div>
      </div>
    </nav>
  </div>
<?php endif;?>
<p></p>

<div class="table-responsive">
<table class="table table-condensed table-bordered">
	<thead>
		<tr>
			<th> Nombre </th>
            <th> Direcci&oacute;n </th>
            <th> Latitud </th>
            <th> Longitud </th>
            <th> Imagen </th>
            <th> Descripci&oacute;n </th>
			<th> Opciones </th>
		</tr>
	</thead>

	<tbody>
		<?php foreach ($query as $registro): ?>
		<tr>
			<td> <?= $registro->nombre ?> </td>
            <td> <?= $registro->direccion ?> </td>
            <td> <?= $registro->latitud ?> </td>
            <td> <?= $registro->longitud ?> </td>
            <td> <img src="<?php echo base_url('uploads/'.$registro->imagen)?>" title=descripcion class=img-thumbnail> </td>
            <td> <?= $registro->descripcion ?> </td>
			<?php if (isset($opciones)):?>
			<td>
				<?= anchor('sede/view/'.$registro->id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
				<?= anchor('sede/edit/'.$registro->id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
				<?= anchor('sedemanage/delete/'.$registro->id, '<i class="glyphicon glyphicon-remove"></i>',array('class'=>'view')); ?>
			</td>
			<?php else:?>
			<td>
				<?= anchor('sede/edit/'.$registro->id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
			</td>
			<?php endif;?>
			
        </tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
</div>