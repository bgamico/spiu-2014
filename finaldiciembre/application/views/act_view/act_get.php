<div class="span12">
	<div class="bs-docs-section">

		<div class="col-lg-11">
			<!-- sección de avisos -->
			<?= $div_mensajes; ?>
			<div class="bs-example">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand">Actividades</a>
						</div>
						<div class="collapse navbar-collapse"
							id="bs-example-navbar-collapse-2">
							<form class="navbar-form navbar-right" role="search">
								<?= anchor('actividad/add', 'Agregar', array('class'=>'btn btn-default')); ?>
							</form>
						</div>
					</div>
				</nav>
			</div>

			<div class="bs-component">
				<table id="tabla" class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripci&oacute;n</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Direcci&oacute;n</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($query as $registro): ?>
						<tr>
							<td><?= $registro->nombre ?></td>
							<td><?= $registro->descripcion ?></td>
							<td><?= date("d/m/Y", strtotime($registro->fecha)); ?></td>
							<td><?= date("H:i", strtotime($registro->hora)); ?></td>
							<td><?= $registro->direccion ?></td>
							<td><?= anchor('actividad/edit/'.$registro->id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
								<a id="delete" data-toggle="modal" data-target="#confirm-delete"
								href="#"><i class="glyphicon glyphicon-remove"></i>
							</a></td>

						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Confirmar Borrado</h4>
				</div>

				<div class="modal-body">
					<p>&iquest;Esta seguro que desea borrar esta actividad?</p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<?= anchor('actividad/delete/'.$registro->id,'Borrar',array('class'=>"btn btn-danger danger"))?>

				</div>
			</div>
		</div>
	</div>