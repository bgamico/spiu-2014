<div class="span9">
    <?= form_open('actividadmanage/update', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
    <?php foreach ($query as $registro): ?>
    <legend> Actualizar Registro </legend>
    <div class="control-group">
        <?= form_label('ID:', 'id', array('class'=>'control-label')); ?>
        <span class="uneditable-input"> <?= $registro->actividad_id; ?> </span>
        <?= form_hidden('actividad_id', $registro->actividad_id); ?>
    </div>

    <div class="control-group">
        <?= form_label('Nombre:', 'name', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'name', 'id'=>'name', 'value'=>$registro->name)); ?>
    </div>

    <div class="control-group">
        <?= form_label('Descripci&oacute;n:', 'descripcion', array('class'=>'control-label')); ?>
        <?= form_textarea(array('type'=>'textarea', 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>$registro->descripcion, 'cols'=>'4', 'rows'=>'4')); ?>
    </div>

    <div class="control-group">
        <?= form_label('Fecha:', 'fecha', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'date', 'name'=>'fecha', 'id'=>'fecha', 'value'=>$registro->fecha)); ?>
    </div>

    <div class="control-group">
        <?= form_label('Hora:', 'hora', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'time', 'name'=>'hora', 'id'=>'hora', 'value'=>date("H:i", strtotime($registro->hora)))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Direccion:', 'direccion', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'direccion', 'id'=>'direccion', 'value'=>$registro->direccion)); ?>
    </div>

    <div class="form-actions">
        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
        <?= anchor('actividadmanage/search', 'Cancelar', array('class'=>'btn')); ?>
    </div>
    <?php endforeach; ?>
    <?= form_close(); ?>
</div>