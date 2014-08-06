<div class="span9">
<?= form_open('perfilmanage/update', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
<legend> Actualizar Registro </legend>

<?php foreach ($query as $registro): ?>
<div class="control-group">
    <?= form_label('ID:', 'id', array('class'=>'control-label')); ?>
    <span class="uneditable-input"> <?= $registro->perfil_id; ?> </span>
    <?= form_hidden('perfil_id', $registro->perfil_id); ?>
</div>

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
    <?= form_label('Email:', 'mail', array('class'=>'control-label')); ?>
    <?= form_input(array('type'=>'text', 'name'=>'mail', 'id'=>'mail', 'value'=>$registro->mail)); ?>
</div>

<div class="form-actions">
    <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
    <?= anchor('perfilmanage/search', 'Cancelar', array('class'=>'btn')); ?>
</div>
<?php endforeach; ?>
<?= form_close(); ?>
</div>