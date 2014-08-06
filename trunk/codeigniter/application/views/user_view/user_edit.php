<div class="span8">
    <?= form_open('usermanage/update', array('class'=>'form-horizontal','id'=>'contact-form')); ?>

    <legend> Actualizar Registro </legend>
    <!--?php foreach ($user as $registro): ?-->
    <div class="control-group">
        <?= form_label('ID:', 'id', array('class'=>'control-label')); ?>
        <span class="uneditable-input"> <?= $user; ?> </span>
        <?= form_hidden('user_id', $user); ?>
    </div>
    <!-- >?php endforeach; ?-->

    <?php foreach ($query as $registro): ?>
    <div class="control-group">
        <?= form_label('Nombre:', 'nombre', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'nombre', 'id'=>'nombre', 'value'=>$registro->nombre)); ?>
    </div>

    <div class="control-group">
        <?= form_label('Apellido:', 'apellido', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'apellido', 'id'=>'apellido', 'value'=>$registro->apellido)); ?>
    </div>

    <div class="control-group">
        <?= form_label('Documento:', 'documento', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'documento', 'id'=>'documento', 'value'=>$registro->documento)); ?>
    </div>

    <div class="control-group">
        <?= form_label('Fecha de Nacimiento:', 'fec_nac', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'date', 'name'=>'fec_nac', 'id'=>'fec_nac', 'value'=>$registro->fec_nac)); ?>
    </div>

    <div class="control-group">
        <?= form_label('Domicilio:', 'domicilio', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'domicilio', 'id'=>'domicilio', 'value'=>$registro->domicilio)); ?>
    </div>

    <div class="control-group">
        <?= form_label('Telefono:', 'telefono', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'telefono', 'id'=>'telefono', 'value'=>$registro->telefono)); ?>
    </div>

    <div class="control-group">
        <?= form_label('E-Mail:', 'email', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'email', 'name'=>'mail', 'id'=>'mail', 'value'=>$registro->mail)); ?>
    </div>

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
        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
        <?= anchor($url, 'Cancelar', array('class'=>'btn')); ?>
        <!--?= anchor('usuario/delete/'.$registro->perfil_id, 'Eliminar', array('class'=>'btn btn-warning', 'onClick'=>"return confirm('¿Está Seguro?')")); ?-->
    </div>

	<?php endforeach; ?>
<?= form_close(); ?>
</div>
