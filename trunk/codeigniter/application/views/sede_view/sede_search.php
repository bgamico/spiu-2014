<div class="span9">

<div class="page-header">
	<h1> Sedes <small> mantenimiento de registros </small> </h1>
</div>

<?php if (isset($agregar)):?>
	<?= anchor('sedemanage/add', 'Agregar', array('class'=>'btn btn-primary')); ?>
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
				<?= anchor('sedemanage/view/'.$registro->sede_id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
				<?= anchor('sedemanage/edit/'.$registro->sede_id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
				<?= anchor('sedemanage/delete/'.$registro->sede_id, '<i class="glyphicon glyphicon-remove"></i>',array('class'=>'view')); ?>
			</td>
			<?php else:?>
			<td>
				<?= anchor('sedemanage/edit/'.$registro->sede_id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
			</td>
			<?php endif;?>
			
        </tr>
		<?php endforeach; ?>
	</tbody>
</table>
</div>
</div>