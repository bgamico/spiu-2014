<!-- < ?= $contenedor_aux; ?>    -->
<!-- < ?php echo validation_errors(); ?>-->

<div class="col-lg-9 offset1">
<div class="well bs-component">

  <?= form_open('actividadmanage/insert', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
  <fieldset>
    <legend><?= $titulo ?></legend>

    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Nombre*', 'name', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'name', 'id'=>'name', 'placeholder'=>'Nombre de actividad', 'value'=>set_value('name'))); ?>
        <?php echo form_error('name'); ?>
        </div>
    </div>  
	</div>

    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Descripci&oacute;n*', 'descripcion', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_textarea(array('type'=>'textarea', 'class'=>"form-control", 'name'=>'descripcion', 'id'=>'descripcion', 'placeholder'=>'Descripci&oacute;n', 'value'=>set_value('descripcion'), 'cols'=>'4', 'rows'=>'4')); ?>
        <?php echo form_error('descripcion'); ?>
        </div> 
    </div>
    </div>            
                   
    <div class="form-group">    
    <div class="control-group">   
        <?= form_label('Fecha*', 'fecha', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_input(array('type'=>'date', 'class'=>"form-control", 'name'=>'fecha', 'id'=>'fecha', 'value'=>set_value('fecha'))); ?>
        <?php echo form_error('fecha'); ?>
        </div>
    </div>        
    </div>              

    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Hora*', 'hora', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_input(array('type'=>'time', 'class'=>"form-control", 'name'=>'hora', 'id'=>'hora', 'value'=>set_value('hora'))); ?>
		<?php echo form_error('hora'); ?>        
        </div>   
    </div>  
    </div>           
    
    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Direcci&oacute;n*', 'direccion', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'direccion', 'id'=>'direccion','placeholder'=>'Direcci&oacute;n', 'value'=>set_value('direccion'))); ?>
    	<?php echo form_error('direccion'); ?>        
        </div>
    </div>
    </div>     
      
    <p class = "col-lg-3"></p>
	<p class="col-lg-9" >*<em>campos obligatorios.</em></p>    

    <div class="form-group">
	    <div class="col-lg-9 col-lg-offset-3">
	        <?= form_button(array('type'=>'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')); ?>  
	        <?= anchor($urlCancelar, 'Cancelar', array('class'=>'btn btn-default')); ?>
	    </div>
    </div>    
  </fieldset>    
  <?= form_close(); ?>

</div>
</div>