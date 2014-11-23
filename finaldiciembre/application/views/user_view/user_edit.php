<div class="col-lg-9 offset1">
	<div class="well bs-component">
    <?= form_open('usermanage/update', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
  <fieldset>
    <legend> Actualizar Usuario </legend>
    <!--?php foreach ($user as $registro): ?-->
    <?php foreach ($query as $registro): ?>
    
    <?= form_hidden('user_id', $registro->user_id); ?>

    <div class="form-group">
	    <div class="control-group">
	        <?= form_label('Nombre:', 'nombre', array('class'=>'col-lg-3 control-label')); ?>
	        <div class="col-lg-9">
		        <?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'nombre', 'id'=>'nombre', 'value'=>$registro->nombre)); ?>
	        </div>
	    </div>
	</div>

	<div class="form-group">
    	<div class="control-group">
	        <?= form_label('Apellido:', 'apellido', array('class'=>'col-lg-3 control-label')); ?>
		    <div class="col-lg-9">
	        	<?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'apellido', 'id'=>'apellido', 'value'=>$registro->apellido)); ?>
	    	</div>
    	</div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('Documento:', 'documento', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'documento', 'id'=>'documento', 'value'=>$registro->documento)); ?>
    </div>
    </div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('Fecha de Nacimiento:', 'fec_nac', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'date', 'class'=>"form-control",'name'=>'fec_nac', 'id'=>'fec_nac', 'value'=>$registro->fec_nac)); ?>
    </div>
    </div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('Domicilio:', 'domicilio', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'domicilio', 'id'=>'domicilio', 'value'=>$registro->domicilio)); ?>
    </div>
    </div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('Telefono:', 'telefono', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'telefono', 'id'=>'telefono', 'value'=>$registro->telefono)); ?>
    </div>
    </div>
	</div>

    <div class="form-group">
    <div class="control-group">
        <?= form_label('E-Mail:', 'email', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">
        <?= form_input(array('type'=>'email','class'=>"form-control", 'name'=>'mail', 'id'=>'mail', 'value'=>$registro->email)); ?>
    </div>
    </div>
	</div>

<!--     <div class="form-group"> -->
<!--     <div class="control-group"> -->
        <!-- ?= form_label('Sede:', 'sede', array('class'=>'col-lg-3 control-label')); ?-->
<!--         <div class="col-lg-9"> -->
        <!-- ?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'sede', 'id'=>'sede', 'value'=>$registro->sede)); ?-->
        <!-- ?= form_dropdown('sede_id', $this->user->getSedes(), $registro->sede, 'id = "sede", class="form-control"');?-->
<!--     </div> -->
<!--     </div> -->
<!-- 	</div> -->
    
	<?php if (isset($combo)):?>
	    <div class="control-group">
	        <?= form_label('Rol:', 'rol', array('class'=>'control-label')); ?>
	        <?= form_dropdown('rol', $roles, $registro->role_id);?>
	    </div>
	
	    <div class="control-group">
	        <?= form_label('Sede:', 'sede', array('class'=>'control-label')); ?>
	        <?= form_dropdown('sede', $sedes, $registro->sede_id);?>
	    </div>
	<?php endif;?>
	
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