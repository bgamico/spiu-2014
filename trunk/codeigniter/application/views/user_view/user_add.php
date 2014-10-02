<div class="col-lg-9 offset1">
<div class="well bs-component">
<?= form_open('usermanage/insert', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
  <fieldset>
    <legend>Crear Registro</legend>


    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Usuario', 'username', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'username', 'id'=>'username', 'placeholder'=>'Usuario', 'value'=>set_value('username'))); ?>
        </div>
    </div>
    </div>
    
    
    <div class="form-group">
 	<div class="control-group">
        <?= form_label('Nombre', 'nombre', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'nombre', 'id'=>'nombre', 'placeholder'=>'Nombre', 'value'=>set_value('nombre'))); ?>
        </div>
    </div>
    </div>

   	<div class="form-group">
    <div class="control-group">
        <?= form_label('Apellido', 'apellido', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'apellido', 'id'=>'apellido', 'placeholder'=>'Apellido', 'value'=>set_value('apellido'))); ?>
        </div>
    </div>
    </div>
    
   	<div class="form-group">
	<div class="control-group">
        <?= form_label('Documento', 'documento', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'documento', 'id'=>'documento', 'placeholder'=>'Documento', 'value'=>set_value('documento'))); ?>
        </div>
    </div>
    </div>
    
   	<div class="form-group">
    <div class="control-group">
        <?= form_label('Fecha de Nacimiento', 'fec_nac', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'date', 'class'=>"form-control", 'name'=>'fec_nac', 'id'=>'fec_nac', 'value'=>set_value('fec_nac'))); ?>
        </div>
    </div>
	</div>
	
   	<div class="form-group">    
    <div class="control-group">
        <?= form_label('Domicilio', 'domicilio', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'domicilio', 'id'=>'domicilio', 'placeholder'=>'Domicilio', 'value'=>set_value('domicilio'))); ?>
        </div>
    </div>
   	</div>
   	
   	<div class="form-group">
    <div class="control-group">
        <?= form_label('Tel&eacute;fono', 'telefono', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'telefono', 'id'=>'telefono', 'placeholder'=>'Tel&eacute;fono', 'value'=>set_value('telefono'))); ?>
        </div>
    </div>
	</div>

    <div class="form-group">

    <div class="control-group">
        <?= form_label('E-Mail', 'mail', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'email', 'class'=>'form-control', 'name'=>'mail', 'id'=>'mail', 'placeholder'=>'Email', 'value'=>set_value('mail'))); ?>
        </div>
    </div>
    </div>   	
   	
   	 
	<?php if (isset($combo)):?>
	<div class="form-group">   
	    <div class="control-group">
	        <?= form_label('Rol', 'rol', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
	        <?= form_dropdown('rol', $roles, 1, 'class="form-control"');?>
	        </div>
	    </div>
	</div>	    
	<div class="form-group">
	    <div class="control-group">
	        <?= form_label('Sede', 'sede', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
	        <?= form_dropdown('sede', $sedes, '1', 'class="form-control"');?>
	        </div>
	    </div>
	</div>	    
	<?php endif;?>    

    <div class="form-group">
	    <div class="col-lg-9 col-lg-offset-3">
	        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>  
	        <?= anchor($url, 'Cancelar', array('class'=>'btn btn-default')); ?>
	    </div>
    </div>
  </fieldset>
<?= form_close(); ?>  
</div>
</div>