<div class="row">
	<div class="span8">
	<?php echo $map['js']; ?>
	<?php echo $map['html']; ?>
	</div>
	<div class="span4">
		<!--?php if (isset($agregar)):?-->
			<?= anchor('pdimanage/add', 'Agregar PDI', array('class'=>'btn btn-primary')); ?>
		<!--?php endif;?-->
	</div>
</div>