<div class="col-lg-9 offset1">
	<div class="well bs-component">
	<?= form_open('fecha/insert', array('class'=>'form-horizontal','id'=>'contact-form')); ?>

  	<fieldset>
			<legend>Crear Fecha de Examen </legend>
			
	<?= validation_errors(); ?>
	
	<!-- fin mensajes -->
    <div class="form-group">
	    <div class="control-group">
	        <?= form_label('Fecha*', 'fecha', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
	        	<?= form_input(array('type'=>'date', 'class'=>"form-control",'name'=>'fecha', 'id'=>'fecha', 'placeholder'=>'Fecha','value'=>set_value('fecha'))); ?>
	        </div>
	    </div>
	</div>

	<div class="form-group">
		<div class="control-group">
	        <?= form_label('Hora*', 'hora', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
		        <?= form_input(array('type'=>'time', 'class'=>"form-control", 'name'=>'hora', 'id'=>'hora', 'placeholder'=>'Hora', 'value'=>set_value('hora'))); ?>
	        </div>
		</div>
	</div>

			<div class="form-group">
				<div class="control-group">
        <?= form_label('Materia*', 'materia', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'materia', 'id'=>'materia', 'placeholder'=>'Materia', 'value'=>set_value('materia'))); ?>
        </div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
        <?= form_label('Aula*', 'aula', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'aula', 'id'=>'aula', 'placeholder'=>'aula', 'value'=>set_value('aula'))); ?>
        </div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
        <?= form_label('Profesor*', 'profesor', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'profesor', 'id'=>'profesor', 'placeholder'=>'Profesor', 'value'=>set_value('profesor'))); ?>
        </div>
				</div>
			</div>


    <p class = "col-lg-3"></p>
	<p class="col-lg-9" >*<em>campos obligatorios.</em></p>    
			

		<div class="form-actions">
			<div class="col-lg-9 col-lg-offset-3">
		        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary' )); ?>  
		        <a class="btn btn-default" onclick="window.history.back();">Cancelar</a>
			</div>
		</div>
		</fieldset>
<?= form_close(); ?>  
</div>
</div>