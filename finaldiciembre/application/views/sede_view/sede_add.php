<!DOCTYPE html>
<head>
  <link href="<?php echo base_url('assets/styles/main.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/styles/jquery-ui/jquery-ui-1.8.16.custom.css') ?>" rel="stylesheet">

  <!-- google maps -->
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

  <!-- jquery -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

  <!-- jquery UI -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

  <!-- our javascript -->
  <script src="<?php echo base_url('assets/js/gmaps.js') ?>"></script>
</head>    

    <div id='input'>
      <input id='gmaps-input-address' placeholder='Ingresar el nombre del lugar' type='text' />
      <div id='gmaps-error'></div>
    </div>

    <div id='gmaps-canvas'></div>
<hr/>

<div class="col-lg-8">
	<div class="well bs-component">
    <?= form_open_multipart('sede/insert', array('class'=>'form-horizontal','id'=>'contact-form'));?>
    <fieldset>
	<legend> Crear Sede </legend>

	<?= validation_errors(); ?>
	<!-- ?php echo $error;?-->
	
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
		<?= form_label('Direccion*', 'direccion', array('class'=>'col-lg-3 control-label')); ?>
		<div class="col-lg-9">
		<?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'direccion', 'id'=>'direccion', 'value'=>set_value('direccion'))); ?>
	</div>
	</div>
	</div>

	<div class="form-group">
	<div class="control-group">
		<?= form_label('Latitud*', 'latitud', array('class'=>'col-lg-3 control-label')); ?>
		<div class="col-lg-9">
		<?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'latitud', 'id'=>'gmaps-output-latitude', 'value'=>set_value('latitud'))); ?>
	</div>
	</div>
	</div>

	<div class="form-group">
	<div class="control-group">
		<?= form_label('Longitud*', 'longitud', array('class'=>'col-lg-3 control-label')); ?>
		<div class="col-lg-9">
		<?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'longitud', 'id'=>'gmaps-output-longitude', 'value'=>set_value('longitud'))); ?>
	</div>
	</div>
	</div>

	<div class="form-group">
	<div class="control-group">
		<?= form_label('Imagen', 'imagen', array('class'=>'col-lg-3 control-label')); ?>
		<div class="col-lg-9">
		<?= form_input(array('type'=>'file', 'class'=>"form-control",'name'=>'userfile', 'id'=>'imagen', 'value'=>set_value('imagen'))); ?>
	</div>
	</div>
	</div>

	<div class="form-group">
	<div class="control-group">
		<?= form_label('Descripci&oacute;n*', 'descripcion', array('class'=>'col-lg-3 control-label')); ?>
		<div class="col-lg-9">
        <?= form_textarea(array('class'=>"form-control",'name'=>'descripcion', 'id'=>'descripcion', 'rows'=>'3', 'value'=>set_value('descripcion'))); ?>
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