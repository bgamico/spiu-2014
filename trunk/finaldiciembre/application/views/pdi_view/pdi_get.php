
<script type="text/javascript">
    function datos_marker(lat, lng, marker)
    {
     var mi_marker = new google.maps.LatLng(lat, lng);
     map.panTo(mi_marker);
     google.maps.event.trigger(marker, 'click');
    }
    </script>
<?=$map['js']?>
<div class="span12">
	<div class="bs-docs-section">

		<div class="col-lg-11">
			<!-- sección de avisos -->
			<?= $div_mensajes; ?>
			<div class="bs-example" id="admin">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">Puntos de informaci&oacute;n</a>
						</div>
						<div class="collapse navbar-collapse"
							id="bs-example-navbar-collapse-2">
							<form class="navbar-form navbar-right" role="search">
								<?= anchor('pdi/add', 'Agregar', array('class'=>'btn btn-default')); ?>
							</form>
						</div>
					</div>
				</nav>
			</div>

			<div class="col-sm-8">
				<?=$map['html']?>
			</div>
			<hr class="visible-xs">



			<div class="col-md-4" id="left">

				<?php foreach($datos as $marker_sidebar)
		        {?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<a
							onclick="datos_marker(<?=$marker_sidebar->latitud?>,<?=$marker_sidebar->longitud?>,marker_<?=$marker_sidebar->id?>)"><?=substr($marker_sidebar->nombre,0)?>
						</a> <a class="pull-right col-md-1" id="delete"
							data-toggle="modal" data-target="#confirm-delete" href="#"><i
							class="glyphicon glyphicon-remove"></i> </a>
						<?= anchor('pdi/edit/'.$marker_sidebar->id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view pull-right')); ?>

					</div>
				</div>


				<?php
		        }
		        ?>

			</div>



			<div class="modal fade" id="confirm-delete" tabindex="-1"
				role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Confirmar Borrado</h4>
						</div>

						<div class="modal-body">
							<p>Esta seguro que desea borrar este punto de informaci&oacute;n?</p>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-default"
								data-dismiss="modal">Cancelar</button>
							<?= anchor('pdi/delete/'.$marker_sidebar->id,'Borrar',array('class'=>"btn btn-danger danger"))?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
