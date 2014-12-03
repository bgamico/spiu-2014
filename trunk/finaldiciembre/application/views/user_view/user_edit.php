<script>
	$(function() {
		if (<?= $this->session->userdata('rol') ?> != 1){
		    $("#rol").prop("disabled", true);
		    $('#row_dim').remove();
		}

		if($('#rol').val() != 1) {
            $('#row_dim').show();
        } else {
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
<div class="col-lg-9 offset1">
	<div class="well bs-component">
	<?php $roles =  $this->user->getRoles();?>
	<?php $sedes =  $this->user->getSedes();?>
	
    <?= form_open('usuario/update', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
  <fieldset>
    <legend> Actualizar Usuario </legend>
    <?php foreach ($query as $registro): ?>
    
    <?= form_hidden('id', $registro->id); ?>

    <div class="form-group">
	    <div class="control-group">
	        <?= form_label('Nombre*', 'nombre', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
		        <?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'nombre', 'id'=>'nombre', 'value'=>$registro->nombre)); ?>
	        </div>
	    </div>
	</div>

	<div class="form-group">
    	<div class="control-group">
	        <?= form_label('Apellido*', 'apellido', array('class'=>'col-lg-3 control-label')); ?>
		    <div class="col-lg-9">
	        	<?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'apellido', 'id'=>'apellido', 'value'=>$registro->apellido)); ?>
	    	</div>
    	</div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('Documento*', 'documento', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'documento', 'id'=>'documento', 'value'=>$registro->documento)); ?>
    </div>
    </div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('Fecha de Nacimiento*', 'fec_nac', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'date', 'class'=>"form-control",'name'=>'fec_nac', 'id'=>'fec_nac', 'value'=>$registro->fec_nac)); ?>
    </div>
    </div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('Domicilio*', 'domicilio', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'domicilio', 'id'=>'domicilio', 'value'=>$registro->domicilio)); ?>
    </div>
    </div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('Telefono*', 'telefono', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'telefono', 'id'=>'telefono', 'value'=>$registro->telefono)); ?>
    </div>
    </div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('E-Mail*', 'email', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'email','class'=>"form-control", 'name'=>'email', 'id'=>'email', 'value'=>$registro->email)); ?>
    </div>
    </div>
	</div>
	
	<div class="form-group" id="rol_dim">
	    <div class="control-group">
	        <?= form_label('Rol*', 'rol', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
	        	<?= form_hidden('rol', $registro->rol); ?>
	        	<?= form_dropdown('rol', $roles, $registro->rol,'id = "rol" class="form-control"');?>
	        </div>
	    </div>
    </div>
	
	<div class="form-group" id="row_dim">
	    <div class="control-group">
	        <?= form_label('Sede*', 'sede', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
	        	<?= form_dropdown('sede_id', $sedes, $registro->sede,'id = "rol", class="form-control"');?>
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

	<?php endforeach; ?>
	</fieldset>
<?= form_close(); ?>
</div>
</div>