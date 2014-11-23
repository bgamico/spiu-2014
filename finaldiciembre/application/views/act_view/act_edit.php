<div class="col-lg-9 offset1">
<div class="well bs-component">

  <?= form_open('actividadmanage/update', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
  <fieldset>
    <legend><?= $titulo ?></legend>
     
    <?= form_hidden('id', $registro->id); ?>

    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Nombre*', 'name', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'nombre', 'id'=>'nombre', 'placeholder'=>'Nombre de actividad', 'value'=>$registro->nombre)); ?>
        <?php echo form_error('name'); ?>
        </div>
    </div>  
	</div>    
    
    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Descripci&oacute;n*', 'descripcion', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_textarea(array('type'=>'textarea', 'class'=>"form-control", 'name'=>'descripcion', 'id'=>'descripcion', 'placeholder'=>'Descripci&oacute;n', 'value'=>$registro->descripcion, 'cols'=>'4', 'rows'=>'4')); ?>
        <?php echo form_error('descripcion'); ?>
        </div> 
    </div>
    </div>   

    <div class="form-group">    
    <div class="control-group">   
        <?= form_label('Fecha*', 'fecha', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_input(array('type'=>'date', 'class'=>"form-control", 'name'=>'fecha', 'id'=>'fecha', 'value'=>$registro->fecha)); ?>
        <?php echo form_error('fecha'); ?>
        </div>
    </div>        
    </div>    

    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Hora*', 'hora', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_input(array('type'=>'time', 'class'=>"form-control", 'name'=>'hora', 'id'=>'hora', 'value'=>date("H:i", strtotime($registro->hora)))); ?>
		<?php echo form_error('hora'); ?>        
        </div>   
    </div>  
    </div>    
    
    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Direcci&oacute;n*', 'direccion', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'direccion', 'id'=>'direccion','placeholder'=>'Direcci&oacute;n', 'value'=>$registro->direccion)); ?>
    	<?php echo form_error('direccion'); ?>        
        </div>
    </div>
    </div>     
      
    <p class = "col-lg-3"></p>
	<p class="col-lg-9" >*<em>campos obligatorios.</em></p>
    
    <div class="form-group">
	    <div class="col-lg-9 col-lg-offset-3">
	        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>  
	        <a class="btn btn-default" onclick="window.history.back();">Cancelar</a>
	    </div>
    </div>
        
	</fieldset>  
    <?= form_close(); ?>
</div>
</div>