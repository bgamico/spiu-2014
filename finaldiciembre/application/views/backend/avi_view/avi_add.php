
<div class="col-lg-9 offset1">
	<div class="well bs-component">

		<?= form_open('backend/aviso/insert', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
		<fieldset>
			<legend>Crear aviso</legend>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Nombre*', 'nombre', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'nombre', 'id'=>'nombre', 'placeholder'=>'Nombre del aviso', 'value'=>set_value('nombre'))); ?>
						<?php echo form_error('name'); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Descripci&oacute;n*', 'descripcion', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_textarea(array('type'=>'textarea', 'class'=>"form-control", 'name'=>'descripcion', 'id'=>'descripcion', 'placeholder'=>'Descripci&oacute;n', 'value'=>set_value('descripcion'), 'cols'=>'4', 'rows'=>'4')); ?>
						<?php echo form_error('descripcion'); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Fecha*', 'fecha', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'date', 'class'=>"form-control", 'name'=>'fecha', 'id'=>'fecha', 'value'=>set_value('fecha'))); ?>
						<?php echo form_error('fecha'); ?>
					</div>
				</div>
			</div>

			<p class="col-lg-3"></p>
			<p class="col-lg-9">
				*<em>campos obligatorios.</em>
			</p>

			<div class="form-group">
				<div class="col-lg-9 col-lg-offset-3">
					<?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
					<?= anchor('backend/aviso', 'Cancelar', array('class'=>'btn btn-default')); ?>
				</div>
			</div>
		</fieldset>
		<?= form_close(); ?>

	</div>
</div>
