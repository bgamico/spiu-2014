<div class="col-lg-9 offset1">
	<div class="well bs-component">
	<?php $roles =  $this->user->getRoles();?>
	<?php $sedes =  $this->user->getSedes();?>
	<?= form_open('usuario/add', array('class'=>'form-horizontal','id'=>'contact-form')); ?>

  <fieldset>
			<legend>Crear Usuario </legend>
			
			<!-- mostramos los mensajes de retroalimentación -->
	<?= validation_errors(); ?>
	
	<!-- fin mensajes -->
    <div class="form-group">
	    <div class="control-group">
	        <?= form_label('Username*', 'username', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
	        	<?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'username', 'id'=>'username', 'placeholder'=>'Username','value'=>set_value('username'))); ?>
	        </div>
	    </div>
	</div>

			<div class="form-group">
				<div class="control-group">
			        <?= form_label('Nombre*', 'nombre', array('class'=>'col-lg-3 control-label')); ?>
			        <div class="col-lg-9">
				        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'nombre', 'id'=>'nombre', 'placeholder'=>'Nombre', 'value'=>set_value('nombre'))); ?>
			        </div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
        <?= form_label('Apellido*', 'apellido', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'apellido', 'id'=>'apellido', 'placeholder'=>'Apellido', 'value'=>set_value('apellido'))); ?>
        </div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
        <?= form_label('Documento*', 'documento', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'documento', 'id'=>'documento', 'placeholder'=>'Documento', 'value'=>set_value('documento'))); ?>
        </div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
        <?= form_label('Fecha de Nacimiento*', 'fec_nac', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'date', 'class'=>"form-control", 'name'=>'fec_nac', 'id'=>'fec_nac', 'value'=>set_value('fec_nac'))); ?>
        </div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
        <?= form_label('Domicilio*', 'domicilio', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'domicilio', 'id'=>'domicilio', 'placeholder'=>'Domicilio', 'value'=>set_value('domicilio'))); ?>
        </div>
				</div>
			</div>

			<div class="form-group">
				<div class="control-group">
        <?= form_label('Tel&eacute;fono*', 'telefono', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'telefono', 'id'=>'telefono', 'placeholder'=>'Tel&eacute;fono', 'value'=>set_value('telefono'))); ?>
        </div>
				</div>
			</div>

			<div class="form-group">

				<div class="control-group">
        <?= form_label('E-Mail*', 'email', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'email', 'class'=>'form-control', 'name'=>'email', 'id'=>'email', 'placeholder'=>'E-mail', 'value'=>set_value('email'))); ?>
        </div>
				</div>
			</div>

        	<?= form_hidden('rol', 3); ?>
			<div class="form-group" id="rol_dim">
				<div class="control-group">
			        <?= form_label('Rol*', 'rol', array('class'=>'col-lg-3 control-label')); ?>
			        <div class="col-lg-9">
			        	<?= form_dropdown('rol', $roles, NULL,'id = "rol" class="form-control"');?>
					</div>
				</div>
			</div>
			
        	<?= form_hidden('sede_id', $this->session->userdata('sede')); ?>
			<div class="form-group" id="row_dim">
				<div class="control-group" >
			        <?= form_label('Sede*', 'sede_id', array('class'=>'col-lg-3 control-label')); ?>
			        <div class="col-lg-9">
			        	<?= form_dropdown('sede_id', $sedes, '', 'id = "sede" class="form-control"');?>
	        		</div>
				</div>
			</div>
			
    <p class = "col-lg-3"></p>
	<p class="col-lg-9" >*<em>campos obligatorios.</em></p>    
			
			<script>
				$(function() {
					if (<?= $this->session->userdata('rol') ?> != 1){
					    $('#rol_dim').remove();
					    $('#row_dim').remove();
					}else{
				    	$('#row_dim').hide();
					}
				    
				    $('#rol').change(function(){
				        if($('#rol').val() != 1) {
				            $('#row_dim').show();
				        } else {
				            $('#row_dim').hide();
				        } 
				    });
				});	
			</script>

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