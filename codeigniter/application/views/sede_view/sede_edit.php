<script type="text/javascript">
function updateDatabase(newLat, newLng)
{
	//alert(newLat + ',' +newLng);
	document.getElementById('latitud').value = newLat;
	document.getElementById('longitud').value = newLng;

}

</script>
<div class="row">
<div class="span8">
	<?php echo $map['js']; ?>
	<?php echo $map['html']; ?>
</div>
<div class="span4">
    <?= form_open('sedemanage/update', array('class'=>'','id'=>'contact-form')); ?>
    <?php foreach ($query as $registro): ?>
        <legend> Actualizar Registro </legend>

        <div class="control-group">
            <?= form_label('ID:', 'id', array('class'=>'control-label')); ?>
            <span class="uneditable-input"> <?= $registro->sede_id; ?> </span>
            <?= form_hidden('sede_id', $registro->sede_id); ?>
        </div>

        <div class="control-group">
            <?= form_label('Direccion:', 'direccion', array('class'=>'control-label')); ?>
            <?= form_input(array('type'=>'text', 'name'=>'direccion', 'id'=>'direccion', 'value'=>$registro->direccion)); ?>
        </div>

        <div class="control-group">
            <?= form_label('Latitud:', 'latitud', array('class'=>'control-label')); ?>
            <?= form_input(array('type'=>'text', 'name'=>'latitud', 'id'=>'latitud', 'value'=>$registro->latitud)); ?>
        </div>

        <div class="control-group">
            <?= form_label('Longitud:', 'longitud', array('class'=>'control-label')); ?>
            <?= form_input(array('type'=>'text', 'name'=>'longitud', 'id'=>'longitud', 'value'=>$registro->longitud)); ?>
        </div>

        <div class="control-group">
            <?= form_label('Imagen:', 'imagen', array('class'=>'control-label')); ?>
            <?= form_input(array('type'=>'file', 'name'=>'imagen', 'id'=>'imagen', 'value'=>$registro->imagen)); ?>
        </div>

        <div class="control-group">
            <?= form_label('Descripcion:', 'descripcion', array('class'=>'control-label')); ?>
            <?= form_textarea(array('name'=>'descripcion', 'id'=>'descripcion', 'rows'=>'3', 'value'=>$registro->descripcion)); ?>
        </div>

        <div class="form-actions">
            <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>
            <?= anchor('sedemanage/search', 'Cancelar', array('class'=>'btn')); ?>
            <!--?= anchor('usuario/delete/'.$registro->perfil_id, 'Eliminar', array('class'=>'btn btn-warning', 'onClick'=>"return confirm('¿Está Seguro?')")); ?-->
        </div>
    <?php endforeach; ?>
    <?= form_close(); ?>
</div>
</div>