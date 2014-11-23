<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
function updateDatabase(newLat, newLng)
{
	//alert(newLat + ',' +newLng);
	document.getElementById('latitud').value = newLat;
	document.getElementById('longitud').value = newLng;

}

</script>

<div class="row">
	<div class="span8">
	<?php echo $map['js']; ?>
	<?php echo $map['html']; ?>
	</div>
	<div class="span4">
		<?= form_open('pdi/insert', array('class'=>'','id'=>'contact-form')); ?>
			<legend> Crear Registro </legend>
			
			<div class="control-group">
				<?= form_label('Latitud:', 'latitud', array('class'=>'control-label')); ?>
				<?= form_input(array('type'=>'text', 'name'=>'latitud', 'id'=>'latitud', 'value'=>set_value('latitud'))); ?>
			</div>
			
			<div class="control-group">
				<?= form_label('Longitud:', 'longitud', array('class'=>'control-label')); ?>
				<?= form_input(array('type'=>'text', 'name'=>'longitud', 'id'=>'longitud', 'value'=>set_value('longitud'))); ?>
			</div>

			<div class="control-group">
				<?= form_label('Provincia:', 'provincia', array('class'=>'control-label')); ?>
				<?= form_input(array('type'=>'text', 'name'=>'provincia', 'id'=>'provincia', 'value'=>set_value('provincia'))); ?>
			</div>

			<div class="control-group">
				<?= form_label('Ciudad:', 'ciudad', array('class'=>'control-label')); ?>
				<?= form_input(array('type'=>'text', 'name'=>'ciudad', 'id'=>'ciudad', 'value'=>set_value('ciudad'))); ?>
			</div>

			<div class="control-group">
				<?= form_label('Direccion:', 'direccion', array('class'=>'control-label')); ?>
				<?= form_input(array('type'=>'text', 'name'=>'direccion', 'id'=>'direccion', 'value'=>set_value('direccion'))); ?>
			</div>
			
			<div class="control-group">
				<?= form_label('Nombre:', 'nombre', array('class'=>'control-label')); ?>
				<?= form_input(array('type'=>'text', 'name'=>'nombre', 'id'=>'nombre', 'value'=>set_value('nombre'))); ?>
			</div>

			<div class="control-group">
				<?= form_label('Descripcion:', 'descripcion', array('class'=>'control-label')); ?>
				<?= form_input(array('type'=>'text', 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>set_value('descripcion'))); ?>
			</div>

			<div class="control-group">
				<?= form_label('Imagen:', 'imagen', array('class'=>'control-label')); ?>
				<?= form_input(array('type'=>'text', 'name'=>'imagen', 'id'=>'imagen', 'value'=>set_value('imagen'))); ?>
			</div>

			<div class="control-group">
				<?= form_label('Tipo:', 'tipo', array('class'=>'control-label')); ?>
				<?= form_input(array('type'=>'text', 'name'=>'tipo', 'id'=>'tipo', 'value'=>set_value('tipo'))); ?>
			</div>

			<div class="form-actions">
				<?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
				<a class="btn btn-default" onclick="window.history.back();">Cancelar</a>
			</div>
		<?= form_close(); ?>
	</div>
</div>

