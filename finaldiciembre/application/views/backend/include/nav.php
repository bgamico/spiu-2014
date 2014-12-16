<?php $menus = ($this->user->getUserMenus2());?>


    
<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a><?php echo anchor('backend/manage',"Inicio", array('class'=>'navbar-brand'));?></a>
  </div>
  
  <div class="navbar-collapse collapse navbar-responsive-collapse">

  			<ul class="nav navbar-nav navbar-left">
				<?php if (isset($menus)):?>
				<?php foreach($menus as $registro):?>
				<li class="dropdown">
				<?= anchor($registro->url, $registro->titulo,array('class'=>'dropdown-toggle')); ?>
				</li>
				<?php endforeach;?>
				<?php endif;?>          
	         </ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a><?= $this->session->userdata('username')?></a></li>
      			<li><?php echo anchor('backend/login/logout', "Salir")?></li> 
      		</ul>
   
  </div>
</div>
    
