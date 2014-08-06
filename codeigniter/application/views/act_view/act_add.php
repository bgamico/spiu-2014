<div class="span9">
    <?= form_open('actividadmanage/insert', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
    <legend> Crear Registro </legend>

    <div class="control-group">
        <?= form_label('Nombre:', 'name', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'name', 'id'=>'name', 'value'=>set_value('name'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Descripci&oacute;n:', 'descripcion', array('class'=>'control-label')); ?>
        <?= form_textarea(array('type'=>'textarea', 'name'=>'descripcion', 'id'=>'descripcion', 'value'=>set_value('descripcion'), 'cols'=>'4', 'rows'=>'4')); ?>
    </div>

    <div class="control-group">
        <?= form_label('Fecha:', 'fecha', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'fecha', 'id'=>'fecha', 'value'=>set_value('fecha'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Hora:', 'hora', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'time', 'name'=>'hora', 'id'=>'hora', 'value'=>set_value('hora'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Direccion:', 'direccion', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'direccion', 'id'=>'direccion', 'value'=>set_value('direccion'))); ?>
    </div>

    <div class="form-actions">
        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
        <?= anchor('actividadmanage/search', 'Cancelar', array('class'=>'btn')); ?>
    </div>
    <?= form_close(); ?>

</div>