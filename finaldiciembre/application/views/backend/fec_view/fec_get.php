<div class="span12">
	<div class="bs-docs-section">

		<div class="col-lg-11">
			<!-- sección de avisos -->
			<?= $div_mensajes; ?>
			<div class="bs-example">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand">Fechas de examen</a>
						</div>
						<div class="collapse navbar-collapse"
							id="bs-example-navbar-collapse-2">
							<form class="navbar-form navbar-right" role="search">
								<?= anchor('backend/fecha/add', 'Agregar', array('class'=>'btn btn-default')); ?>
							</form>
						</div>
					</div>
				</nav>
			</div>

			<div class="bs-component">
				<table id="tabla" class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Materia</th>
							<th>Aula</th>
							<th>Profesor</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($query as $registro): ?>
						<tr>
							<td><?= $registro->fecha ?></td>
							<td><?= $registro->hora ?></td>
							<td><?= $registro->materia ?></td>
							<td><?= $registro->aula ?></td>
							<td><?= $registro->profesor ?></td>
							<td><?= anchor('backend/fecha/edit/'.$registro->id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
								<!-- ?=anchor('fecha/delete/'.$registro->id,'<i class="glyphicon glyphicon-remove"></i>',array('onclick' => "return confirm('Se eliminar&aacute; la actividad. &iquest;Est&aacute; seguro&#63')"))?-->
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
					<p>&iquest;Esta seguro que desea borrar esta fecha de examen?</p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<?= anchor('backend/fecha/delete/'.$registro->id,'Borrar',array('class'=>"btn btn-danger danger"))?>

				</div>
			</div>
		</div>
	</div>