<div class="col-lg-9 offset1">
	<div class="well bs-component">
		<?= form_open_multipart('backend/fecha/update', array('class'=>'form-horizontal','id'=>'contact-form'));?>
		<fieldset>
			<?= validation_errors(); ?>
			<?php foreach ($query as $registro): ?>
			<legend> Actualizar Fecha de Examen</legend>

			<?= form_hidden('id', $registro->id); ?>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Fecha*', 'fecha', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'date', 'class'=>"form-control", 'name'=>'fecha', 'id'=>'fecha', 'value'=>$registro->fecha)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Hora*', 'hora', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'time', 'class'=>"form-control", 'name'=>'hora', 'id'=>'hora', 'value'=>$registro->hora)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Materia*', 'materia', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text','class'=>"form-control", 'name'=>'materia', 'id'=>'materia', 'value'=>$registro->materia)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Aula*', 'aula', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text','class'=>"form-control", 'name'=>'aula', 'id'=>'aula', 'value'=>$registro->aula)); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
					<?= form_label('Profesor*', 'profesor', array('class'=>'col-lg-3 control-label')); ?>
					<div class="col-lg-9">
						<?= form_input(array('type'=>'text','class'=>"form-control", 'name'=>'profesor', 'id'=>'profesor', 'value'=>$registro->profesor)); ?>
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
					<?= anchor('backend/fecha', 'Cancelar', array('class'=>'btn btn-default')); ?>
				</div>
			</div>
			<?php endforeach; ?>
		</fieldset>
		<?= form_close(); ?>
	</div>
</div>
