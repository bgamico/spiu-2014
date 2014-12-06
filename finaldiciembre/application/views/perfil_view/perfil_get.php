<div class="span12">
	<div class="bs-docs-section">

		<div class="col-lg-11">
			<!-- sección de avisos -->
			<?= $div_mensajes; ?>
			<div class="bs-example">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand"><?= $titulo ?> </a>
						</div>
					</div>
				</nav>
			</div>

			<div class="table-responsive">
				<table class="table table-condensed table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Telefono</th>
							<th>Documento</th>
							<th>Fecha de Nacimiento</th>
							<th>Domicilio</th>
							<th>Email</th>
							<?php if (isset($opciones)):?>
							<th>Opciones</th>
							<?php endif;?>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($query as $registro): ?>
						<tr>
							<td><?= $registro->nombre ?>
							</td>
							<td><?= $registro->apellido ?>
							</td>
							<td><?= $registro->telefono ?>
							</td>
							<td><?= $registro->documento ?>
							</td>
							<td><?= $registro->fec_nac ?>
							</td>
							<td><?= $registro->domicilio ?>
							</td>
							<td><?= $registro->email ?>
							</td>
							<?php if (isset($opciones)):?>
							<td><?= anchor('perfil/edit/','<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
							</td>
							<?php endif;?>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
