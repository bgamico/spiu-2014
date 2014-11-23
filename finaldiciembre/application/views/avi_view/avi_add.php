
<div class="col-lg-9 offset1">
<div class="well bs-component">

  <?= form_open('avisomanage/insert', array('class'=>'form-horizontal','id'=>'contact-form')); ?>
  <fieldset>
    <legend><?= $titulo ?></legend>

    <div class="form-group">    
    <div class="control-group">
        <?= form_label('Nombre*', 'name', array('class'=>'col-lg-3 control-label')); ?>
        <div class="col-lg-9">        
        <?= form_input(array('type'=>'text', 'class'=>"form-control", 'name'=>'name', 'id'=>'name', 'placeholder'=>'Nombre del aviso', 'value'=>set_value('name'))); ?>
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