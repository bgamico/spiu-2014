<?php $menus = ($this->user->getUserMenus2());?>

<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a><?php echo anchor('manage/index',"Inicio", array('class'=>'navbar-brand'));?></a>
  </div>
  
  <div class="navbar-collapse collapse navbar-responsive-collapse">
	<ul class="nav navbar-nav">
       	<?php if (isset($menus)):?>
       	<?php foreach($menus as $registro):?>
    	<li class="dropdown">
		  <?= anchor($registro->menu_url, $registro->menu_title,array('class'=>'dropdown-toggle')); ?>
		</li>
        <?php endforeach;?>
        <?php endif;?>
	</ul>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Active</a></li>
      <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Dropdown header</li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    
    <ul class="nav navbar-nav navbar-right">
      <li><?php echo anchor('manage/index', $this->user->getUsername());?></li>
      <li><?php echo anchor('account/logout', "Salir")?></li>        
    </ul>
  </div>
</div>

<!--?= anchor('usermanage/view/'.$registro->user_id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?-->
<!-- 
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </a>
          < ?php echo anchor('manage/index',"Inicio", array('class'=>'brand'));?>
          <div class="nav-collapse collapse">
          <ul class="nav">
          	< ?php if (isset($menus)):?>
          	< ?php foreach($menus as $registro):?>
          		<li class="dropdown">

					  < ?= anchor($registro->menu_url, $registro->menu_title,array('class'=>'dropdown-toggle')); ?>

				</li>
          	< ?php endforeach;?>
          	< ?php endif;?>
			</ul>
        </div>
        <div class="pull-right">
          <ul class="nav">
          	<li>< ?php echo anchor('manage/index', $this->user->getUsername());?></li>
          	<li>< ?php echo anchor('account/logout', "Salir")?></li>         
          </ul>
      	</div>
    </div>
   </div>
  </div>-->