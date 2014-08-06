<div class="span7">
    <?= form_open('sedemanage/insert', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
	<legend> Crear Registro </legend>

	<div class="control-group">
		<?= form_label('Nombre:', 'nombre', array('class'=>'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'nombre', 'id'=>'nombre', 'value'=>set_value('nombre'))); ?>
	</div>

	<div class="control-group">
		<?= form_label('Direccion:', 'direccion', array('class'=>'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'direccion', 'id'=>'direccion', 'value'=>set_value('direccion'))); ?>
	</div>

	<div class="control-group">
		<?= form_label('Latitud:', 'latitud', array('class'=>'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'latitud', 'id'=>'latitud', 'value'=>set_value('latitud'))); ?>
	</div>

	<div class="control-group">
		<?= form_label('Longitud:', 'longitud', array('class'=>'control-label')); ?>
		<?= form_input(array('type'=>'text', 'name'=>'longitud', 'id'=>'longitud', 'value'=>set_value('longitud'))); ?>
	</div>

	<div class="control-group">
		<?= form_label('Imagen:', 'imagen', array('class'=>'control-label')); ?>
		<?= form_input(array('type'=>'file', 'name'=>'imagen', 'id'=>'imagen', 'value'=>set_value('imagen'))); ?>
	</div>

	<div class="control-group">
		<?= form_label('Descripci&oacute;n:', 'descripcion', array('class'=>'control-label')); ?>
        <?= form_textarea(array('name'=>'descripcion', 'id'=>'descripcion', 'rows'=>'3', 'value'=>set_value('descripcion'))); ?>
	</div>
	
	<div class="form-actions">
		<?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
		<?= anchor('sedemanage/search', 'Cancelar', array('class'=>'btn')); ?>
	</div>
<?= form_close(); ?>
    </div>