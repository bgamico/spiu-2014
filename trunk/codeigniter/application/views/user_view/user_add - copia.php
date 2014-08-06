<div class="span9">

<?= form_open('usuario/insert', array('class'=>'form-horizontal')); ?>
    <legend> Crear Registro </legend>

    <div class="control-group">
        <?= form_label('Username', 'username', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'username', 'id'=>'username', 'value'=>set_value('username'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Password', 'password', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'password', 'id'=>'password', 'value'=>set_value('password'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Perfil', 'perfil_id', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'perfil', 'id'=>'perfil', 'value'=>set_value('perfil'))); ?>
    </div>

    <div class="control-group">
        <?= form_label('Sede', 'sede_id', array('class'=>'control-label')); ?>
        <?= form_input(array('type'=>'text', 'name'=>'sede', 'id'=>'sede', 'value'=>set_value('sede'))); ?>
    </div>

    <div class="form-actions">
        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
        <?= anchor('manage/index', 'Cancelar', array('class'=>'btn')); ?>
    </div>
<?= form_close(); ?>
</div>