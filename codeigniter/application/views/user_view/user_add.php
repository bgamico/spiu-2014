<div class="span8">
<?= form_open('usermanage/insert', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
    <legend> Crear Registro </legend>

	<!-- mostramos los mensajes de retroalimentación -->
	<?= my_validation_errors($mensaje,$tipo_mensaje); ?>
	<!-- fin mensajes -->
    
    <div class="control-group">
        <?= form_label('Username:', 'username', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'username', 'id'=>'username', 'value'=>set_value('username'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Nombre:', 'nombre', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'nombre', 'id'=>'nombre', 'value'=>set_value('nombre'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Apellido:', 'apellido', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'apellido', 'id'=>'apellido', 'value'=>set_value('apellido'))); ?>
    </div>

	<div class="control-group">
        <?= form_label('Documento:', 'documento', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'documento', 'id'=>'documento', 'value'=>set_value('documento'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Fecha de Nacimiento:', 'fec_nac', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'date', 'name'=>'fec_nac', 'id'=>'fec_nac', 'value'=>set_value('fec_nac'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Domicilio:', 'domicilio', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'domicilio', 'id'=>'domicilio', 'value'=>set_value('domicilio'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Telefono:', 'telefono', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'telefono', 'id'=>'telefono', 'value'=>set_value('telefono'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('E-Mail:', 'mail', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'email', 'name'=>'mail', 'id'=>'mail', 'value'=>set_value('mail'))); ?>
    </div>
    
	<?php if (isset($combo)):?>
	    <div class="control-group">
	        <?= form_label('Rol:', 'rol', array('class'=>'control-label')); ?>
	        <?= form_dropdown('rol', $roles, 1,'id = "rol"');?>
	    </div>
	
	    <div class="control-group" id="row_dim">
	        <?= form_label('Sede:', 'sede', array('class'=>'control-label')); ?>
	        <?= form_dropdown('sede', $sedes, '1');?>
	    </div>
	<?php endif;?>
	
<!--  script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
<script>
$(function() {
    $('#row_dim').hide(); 
    
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
        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
        
        <?= anchor($url, 'Cancelar', array('class'=>'btn')); ?>
    </div>
<?= form_close(); ?>
 
</div>