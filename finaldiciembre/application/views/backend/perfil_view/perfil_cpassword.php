<div class="col-lg-9 offset1">
	<div class="well bs-component">
		<fieldset>
			<?= form_open('backend/perfil/updatePassword', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
			<legend> Cambiar Contrase&ntilde;a </legend>

			<?php foreach ($query as $registro): ?>
			<div class="control-group">
				<?= form_hidden('perfil_id', $registro->id); ?>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Contrase&ntilde;a actual*', 'contrasena_act', array('class'=>'col-lg-4 control-label')); ?>
					<div class="col-lg-7">
						<?= form_password(array( 'class'=>"form-control", 'name'=>'contrasena_act', 'id'=>'contrasena_act', 'placeholder'=>'Contrase&ntilde;a actual', 'value'=>set_value('nombre'))); ?>						
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Nueva Contrase&ntilde;a*', 'contrasena', array('class'=>'col-lg-4 control-label')); ?>
					<div class="col-lg-7">
						<?= form_password(array( 'class'=>"form-control", 'name'=>'contrasena', 'id'=>'contrasena', 'placeholder'=>'Nueva Contrase&ntilde;a', 'value'=>set_value('nombre'))); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Repita nueva Contrase&ntilde;a*', 'contrasena_confirm', array('class'=>'col-lg-4 control-label')); ?>
					<div class="col-lg-7">
						<?= form_input(array('type'=>'password', 'class'=>"form-control", 'name'=>'contrasena_confirm', 'id'=>'contrasena_confirm', 'placeholder'=>'Repita nueva Contrase&ntilde;a', 'value'=>set_value('nombre'))); ?>
					</div>
				</div>
			</div>

			<p class="col-lg-4"></p>
			<p class="col-lg-7">
				*<em>campos obligatorios.</em>
			</p>

			<div class="form-actions">
				<div class="col-lg-9 col-lg-offset-4">
					<?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary', 'id'=>'aceptar')); ?>
					<a class="btn btn-default" href="javascript:window.history.back();">Cancelar</a>
					<!--  ?= anchor('backend/perfil', 'Cancelar', array('class'=>'btn btn-default')); ?-->
				</div>
			</div>

			<?php endforeach; ?>
			<?= form_close(); ?>
		</fieldset>
	</div>
</div>
<script>
	$(function() {
	    $("#contrasena").prop("disabled", true);
	    $("#contrasena_confirm").prop("disabled", true);
	    $("#aceptar").prop("disabled", true);

	    
	});	
</script>



<!-- script type="text/javascript">
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
</script-->
