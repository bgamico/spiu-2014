
<link href="<?php echo base_url('assets/styles/main.css') ?>"
	rel="stylesheet">
<link
	href="<?php echo base_url('assets/styles/jquery-ui/jquery-ui-1.8.16.custom.css') ?>"
	rel="stylesheet">

<!-- google maps -->
<script type="text/javascript"
	src="http://maps.google.com/maps/api/js?sensor=false"></script>



<!-- jquery UI -->
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

<!-- our javascript -->
<!--   <script type="text/javascript" src="js/gmaps.js"></script> -->
<script src="<?php echo base_url('assets/js/gmaps.js') ?>"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$("#provincia").change(function() {
				$("#provincia option:selected").each(function() {
					provincia = $('#provincia').val();
					$.post("http://localhost/finaldiciembre/backend/pdi/llena_localidades", {
						provincia : provincia
					}, function(data) {
						$("#ciudad").html(data);
					});
				});
			})
		});
</script>


<div id='input'>
	<input id='gmaps-input-address'
		placeholder='Ingresar el nombre del lugar' type='text' />
	<div id='gmaps-error'></div>
</div>

<div id='gmaps-canvas'></div>
<hr />
<div class="col-lg-9 offset1">
	<div class="well bs-component">

		<?= form_open_multipart('backend/pdi/insert', array('class'=>'form-horizontal','id'=>'contact-form'));?>
		<fieldset>
			<legend> Crear Punto de Informaci&oacute;n </legend>
			<?= validation_errors(); ?>

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
					<?= form_label('Imagen', 'imagen', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'file', 'class'=>"form-control",'name'=>'userfile', 'id'=>'imagen', 'value'=>set_value('imagen'))); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Provincia*', 'provincia', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<select class="form-control" name="provincia" id="provincia">
							<option value="">--Selecciona la provincia--</option>
							<?php
							foreach($provincias as $fila)
							{
								?>
							<option value="<?=$fila -> id ?>">
								<?=$fila -> provincia_nombre ?>
							</option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Ciudad*', 'ciudad', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<select class="form-control" name="ciudad" id="ciudad">
							<option value="">--Selecciona la ciudad--</option>
						</select>
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
						<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'longitud', 'id'=>'gmaps-output-longitude', 'value'=>set_value('longitud'))); ?>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="control-group">
					<?= form_label('Tipo*', 'tipo', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_dropdown('tipo', $tipos, NULL,'id="tipo" class="form-control"');?>
					</div>
				</div>
			</div>				

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Descripcion*', 'descripcion', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<!-- ?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>set_value('descripcion'))); ?-->
						<?= form_textarea(array('class'=>"form-control",'name'=>'descripcion', 'id'=>'descripcion', 'rows'=>'3', 'value'=>set_value('descripcion'))); ?>
					</div>
				</div>
			</div>

			<p class="col-lg-3"></p>
			<p class="col-lg-9">
				*<em>campos obligatorios.</em>
			</p>

			<div class="form-actions">
				<div class="col-lg-9 col-lg-offset-3">
					<?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
					<?= anchor('backend/pdi', 'Cancelar', array('class'=>'btn btn-default')); ?>
				</div>
			</div>

		</fieldset>
		<?= form_close(); ?>
	</div>
</div>

