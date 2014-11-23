<div class="span9">
<?= form_open('perfilmanage/update', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
<legend> Actualizar Perfil </legend>

<?php foreach ($query as $registro): ?>
<div class="control-group">
    <?= form_hidden('perfil_id', $registro->id); ?>
</div>

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
    <?= form_label('Email:', 'mail', array('class'=>'col-lg-3 control-label')); ?>
    <div class="col-lg-9">
    <?= form_input(array('type'=>'text', 'class'=>"form-control",'name'=>'mail', 'id'=>'mail', 'value'=>$registro->email)); ?>
</div>
</div>
</div>

<div class="form-actions">
<div class="col-lg-9 col-lg-offset-3">
    <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
    <a class="btn btn-default" onclick="window.history.back();">Cancelar</a>
</div></div>

<?php endforeach; ?>
<?= form_close(); ?>
</div>