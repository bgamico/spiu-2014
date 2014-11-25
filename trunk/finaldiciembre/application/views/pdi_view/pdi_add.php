<!-- <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> -->
<script type="text/javascript">
function updateDatabase(newLat, newLng)
{
	document.getElementById('latitud').value = newLat;
	document.getElementById('longitud').value = newLng;
}

</script>


	<div class="col-lg-8">
	<?php echo $map['js']; ?>
	<?php echo $map['html']; ?>
	</div>
	
	<div class="col-lg-8">
	<div class="well bs-component">
	
		<?= form_open_multipart('pdi/insert', array('class'=>'form-horizontal','id'=>'contact-form'));?>
		<fieldset>
			<legend> Crear Punto de Interes </legend>
			<?= validation_errors(); ?>
			<div class="form-group">
			<div class="control-group">
				<?= form_label('Latitud*', 'latitud', array('class'=>'col-lg-3 control-label')); ?>
				<div class="col-lg-9">
				<?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'latitud', 'id'=>'latitud', 'value'=>set_value('latitud'))); ?>				
			</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="control-group">
				<?= form_label('Longitud*', 'longitud', array('class'=>'col-lg-3 control-label')); ?>
				<div class="col-lg-9">
				<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'longitud', 'id'=>'longitud', 'value'=>set_value('longitud'))); ?>
			</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="control-group">
				<?= form_label('Provincia*', 'provincia', array('class'=>'col-lg-3 control-label')); ?>
				<div class="col-lg-9">
				<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'provincia', 'id'=>'provincia', 'value'=>set_value('provincia'))); ?>
			</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="control-group">
				<?= form_label('Ciudad*', 'ciudad', array('class'=>'col-lg-3 control-label')); ?>
				<div class="col-lg-9">
				<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'ciudad', 'id'=>'ciudad', 'value'=>set_value('ciudad'))); ?>
			</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="control-group">
				<?= form_label('Direccion*', 'direccion', array('class'=>'col-lg-3 control-label')); ?>
				<div class="col-lg-9">
				<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'direccion', 'id'=>'direccion', 'value'=>set_value('direccion'))); ?>
			</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="control-group">
				<?= form_label('Nombre*', 'nombre', array('class'=>'col-lg-3 control-label')); ?>
				<div class="col-lg-9">
				<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'nombre', 'id'=>'nombre', 'value'=>set_value('nombre'))); ?>
				
			</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="control-group">
				<?= form_label('Descripcion*', 'descripcion', array('class'=>'col-lg-3 control-label')); ?>
				<div class="col-lg-9">
				<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>set_value('descripcion'))); ?>
			</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="control-group">
				<?= form_label('Imagen:', 'imagen', array('class'=>'col-lg-3 control-label')); ?>
				<div class="col-lg-9">
				<?= form_input(array('type'=>'file', 'class'=>"form-control",'name'=>'userfile', 'id'=>'imagen', 'value'=>set_value('imagen'))); ?>
			</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="control-group">
				<?= form_label('Tipo*', 'tipo', array('class'=>'col-lg-3 control-label')); ?>
				<div class="col-lg-9">
				<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'tipo', 'id'=>'tipo', 'value'=>set_value('tipo'))); ?>
			</div>
			</div>
			</div>
			
			<p class = "col-lg-3"></p>
			<p class="col-lg-9" >*<em>campos obligatorios.</em></p>
			
			<div class="form-actions">
			<div class="col-lg-9 col-lg-offset-3">
				<?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
				<a class="btn btn-default" onclick="window.history.back();">Cancelar</a>
			</div>
			</div>
			
			</fieldset>
		<?= form_close(); ?>
	</div>
	
</div>

