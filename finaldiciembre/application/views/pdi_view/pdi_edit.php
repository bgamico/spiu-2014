<script type="text/javascript">
function updateDatabase(newLat, newLng)
{
	document.getElementById('latitud').value = newLat;
	document.getElementById('longitud').value = newLng;
}
</script>


<div class="col-lg-12">
	<?php echo $map['js']; ?>
	<?php echo $map['html']; ?>
	<hr>
</div>
<div class="col-lg-9 offset1">
	<div class="well bs-component">
		<!--?= form_open('pdi/update', array('class'=>'','id'=>'contact-form')); ?-->
		<?= form_open_multipart('pdi/update', array('class'=>'form-horizontal','id'=>'contact-form'));?>
		<fieldset>
			<?= validation_errors(); ?>
			<?php foreach ($query as $registro): ?>
			<legend> Actualizar Punto de informaci&oacute;n</legend>

			<?= form_hidden('id', $registro->id); ?>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Nombre*', 'nombre', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'nombre', 'id'=>'nombre', 'value'=>$registro->nombre)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Direccion*', 'direccion', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'direccion', 'id'=>'direccion', 'value'=>$registro->direccion)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Ciudad*', 'ciudad', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text','class'=>"form-control", 'name'=>'ciudad', 'id'=>'ciudad', 'value'=>$registro->ciudad)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Provincia*', 'provincia', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text','class'=>"form-control", 'name'=>'provincia', 'id'=>'provincia', 'value'=>$registro->provincia)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Latitud*', 'latitud', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text','class'=>"form-control", 'name'=>'latitud', 'id'=>'latitud', 'value'=>$registro->latitud)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Longitud*', 'longitud', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text','class'=>"form-control", 'name'=>'longitud', 'id'=>'longitud', 'value'=>$registro->longitud)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Imagen*', 'imagen', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'file', 'class'=>"form-control", 'name'=>'userfile', 'id'=>'imagen', 'value'=>$registro->imagen)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Descripcion*', 'descripcion', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_textarea(array('name'=>'descripcion','class'=>"form-control", 'id'=>'descripcion', 'rows'=>'3', 'value'=>$registro->descripcion)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Tipo*', 'tipo', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text','class'=>"form-control", 'name'=>'tipo', 'id'=>'tipo', 'value'=>$registro->tipo)); ?>
					</div>
				</div>
			</div>

			<div class="form-actions">
				<div class="col-lg-9 col-lg-offset-3">
					<?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
					<a class="btn btn-default" onclick="window.history.back();">Cancelar</a>
				</div>
			</div>
			<?php endforeach; ?>
		</fieldset>
		<?= form_close(); ?>
	</div>
</div>
