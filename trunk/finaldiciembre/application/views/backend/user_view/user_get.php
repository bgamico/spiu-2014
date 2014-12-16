<div class="span12">
	<div class="bs-docs-section">

		<div class="col-lg-11">
			<!-- sección de avisos -->
			<?= $div_mensajes; ?>

			<div class="bs-example">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="">Usuarios</a>
						</div>
						<div class="collapse navbar-collapse"
							id="bs-example-navbar-collapse-2">
							<form class="navbar-form navbar-right" role="search">
								<?= anchor('backend/usuario/add', 'Agregar', array('class'=>'btn btn-default')); ?>
							</form>
						</div>
					</div>
				</nav>
			</div>

			<div class="bs-component">

				<table id="tabla" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Rol</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($query as $registro): ?>
						<tr>
							<td><?= $registro->usuario ?>
							</td>
							<td><?= $registro->role ?>
							</td>
							<td><?= anchor('backend/usuario/view/'.$registro->id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
								<?= anchor('backend/usuario/edit/'.$registro->id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>

								<a data-href="<?= 'usuario/delete/'.$registro->id?>" data-toggle="modal" data-target="#confirm-delete" href="#"><i class="glyphicon glyphicon-remove"></i></a>
								<a data-href="<?= 'usuario/resetPassword/'.$registro->id?>" data-toggle="modal" data-target="#confirm-reset" href="#"><i class="glyphicon glyphicon-asterisk"></i></a>									
									
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- modal para eliminar -->
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
					<p>&iquest;Esta seguro que desea borrar este usuario?</p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					
					<a href="#" class="btn btn-danger danger">Borrar</a>
				</div>
			</div>
		</div>
	</div>
    
   	<!-- modal para restaurar contraseña -->
	<div class="modal fade" id="confirm-reset" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Confirmar Restaurar Contrase&ntilde;a</h4>
				</div>

				<div class="modal-body">
					<p>&iquest;Esta seguro que desea restaurar la contrase&ntilde;a de este usuario?</p>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<a href="#" class="btn btn-danger brestaurar">Restaurar</a>
				</div>
			</div>
		</div>
	</div>	
