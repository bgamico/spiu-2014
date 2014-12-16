<div class="span12">
	<div class="bs-docs-section">

		<div class="col-lg-11">
			<!-- sección de avisos -->
			
		<div class="bs-example">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand">Fechas de examenes</a>
						</div>
						<div class="collapse navbar-collapse"
							id="bs-example-navbar-collapse-2">
							<form class="navbar-form navbar-right" role="search">
								<a class="btn btn-default" onclick="window.history.back();">Volver</a>
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

						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	