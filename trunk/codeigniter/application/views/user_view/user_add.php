<div class="col-lg-9 offset1">
<div class="well bs-component">
<?= form_open('usermanage/insert', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
  <fieldset>
  	<legend><?= $titulo ?></legend>

    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Usuario*', 'username', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'username', 'id'=>'username', 'placeholder'=>'Usuario', 'value'=>set_value('username'))); ?>
		<?php echo form_error('username'); ?>        
        </div>
    </div>
    </div>
    
    
    <div class="form-group">
 	<div class="control-group">
        <?= form_label('Nombre*', 'nombre', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'nombre', 'id'=>'nombre', 'placeholder'=>'Nombre', 'value'=>set_value('nombre'))); ?>
        <?php echo form_error('nombre'); ?>
        </div>
    </div>
    </div>

   	<div class="form-group">
    <div class="control-group">
        <?= form_label('Apellido*', 'apellido', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'apellido', 'id'=>'apellido', 'placeholder'=>'Apellido', 'value'=>set_value('apellido'))); ?>
        <?php echo form_error('apellido'); ?>
        </div>
    </div>
    </div>
    
   	<div class="form-group">
	<div class="control-group">
        <?= form_label('Documento*', 'documento', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'documento', 'id'=>'documento', 'placeholder'=>'Documento', 'value'=>set_value('documento'))); ?>
        <?php echo form_error('documento'); ?>
        </div>
    </div>
    </div>
    
   	<div class="form-group">
    <div class="control-group">
        <?= form_label('Fecha de Nacimiento*', 'fec_nac', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'date', 'class'=>"form-control", 'name'=>'fec_nac', 'id'=>'fec_nac', 'value'=>set_value('fec_nac'))); ?>
        <?php echo form_error('fec_nac'); ?>
        </div>
    </div>
	</div>
	
   	<div class="form-group">    
    <div class="control-group">
        <?= form_label('Domicilio*', 'domicilio', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'domicilio', 'id'=>'domicilio', 'placeholder'=>'Domicilio', 'value'=>set_value('domicilio'))); ?>
        <?php echo form_error('domicilio'); ?>
        </div>
    </div>
   	</div>
   	
   	<div class="form-group">
    <div class="control-group">
        <?= form_label('Tel&eacute;fono*', 'telefono', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'telefono', 'id'=>'telefono', 'placeholder'=>'Tel&eacute;fono', 'value'=>set_value('telefono'))); ?>
        <?php echo form_error('telefono'); ?>
        </div>
    </div>
	</div>

    <div class="form-group">

    <div class="control-group">
        <?= form_label('E-Mail*', 'mail', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'email', 'class'=>'form-control', 'name'=>'mail', 'id'=>'mail', 'placeholder'=>'E-mail', 'value'=>set_value('mail'))); ?>
        <?php echo form_error('mail'); ?>
        </div>
    </div>
    </div>   	
   	
   	 
	<?php if (isset($combo)):?>
	<div class="form-group">   
	    <div class="control-group">
	        <?= form_label('Rol*', 'rol', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
	        <?= form_dropdown('rol', $roles, 1, 'class="form-control"');?>
	        <?php echo form_error('rol'); ?>
	        </div>
	    </div>
	</div>	    
	<div class="form-group">
	    <div class="control-group">
	        <?= form_label('Sede*', 'sede', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
	        <?= form_dropdown('sede', $sedes, 0, 'class="form-control"');?>
	        <?php echo form_error('sede'); ?>
	        </div>
	    </div>
	</div>	    
	<?php endif;?>    

    <div class="form-group">
	    <div class="col-lg-9 col-lg-offset-3">
	        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>  
	        <?= anchor($urlCancelar, 'Cancelar', array('class'=>'btn btn-default')); ?>
	    </div>
    </div>
  </fieldset>
<?= form_close(); ?>  
</div>
</div>