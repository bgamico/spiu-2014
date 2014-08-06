<?php $menus = ($this->user->getUserMenus2());?>


<!--?= anchor('usermanage/view/'.$registro->user_id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?-->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </a>
          <?php echo anchor('manage/index',"Inicio", array('class'=>'brand'));?>
          <div class="nav-collapse collapse">
          <ul class="nav">
          	<?php if (isset($menus)):?>
          	<?php foreach($menus as $registro):?>
          		<li class="dropdown">
<!--					<a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
					  <?= anchor($registro->menu_url, $registro->menu_title,array('class'=>'dropdown-toggle')); ?>
<!--					</a>-->
				</li>
          	<?php endforeach;?>
          	<?php endif;?>
			</ul>
        </div>
        <div class="pull-right">
          <ul class="nav">
          	<li><?php echo anchor('manage/index', $this->user->getUsername());?></li>
          	<li><?php echo anchor('account/logout', "Salir")?></li>         
          </ul>
      	</div>
    </div>
   </div>
  </div>