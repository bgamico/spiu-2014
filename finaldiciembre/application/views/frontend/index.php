

    <script type="text/javascript">
    function datos_marker(lat, lng, marker)
    {
     var mi_marker = new google.maps.LatLng(lat, lng);
     map.panTo(mi_marker);
     google.maps.event.trigger(marker, 'click');
    }
    </script>
    <?=$map['js']?>

<div class="row row-offcanvas row-offcanvas-right">
	<div class="col-xs-12 col-sm-8">
	<?=$map['html']?>
	</div>
	<div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
	    	<ul class="nav nav-pills nav-stacked">
	    	<?php foreach($datos as $marker_sidebar)
		        {?>
				  <li role="presentation" onclick="datos_marker(<?=$marker_sidebar->latitud?>,<?=$marker_sidebar->longitud?>,marker_<?=$marker_sidebar->id?>)"><a><?=substr($marker_sidebar->nombre,0)?></a>			  
				  <?php
		        }
		        ?>
			</ul>
    
    </div>
    <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
	    	<ul class="nav nav-pills nav-stacked">
	    	<?php foreach($datos as $marker_sidebar)
		        {?>
		        <li role="presentation"><a></a></li>
					<?= anchor('home/sede/'.$marker_sidebar->id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
					<?= anchor('home/aviso/'.$marker_sidebar->id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
					<?= anchor('home/actividad/'.$marker_sidebar->id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
					<?= anchor('home/examen/'.$marker_sidebar->id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
				  <?php
		        }
		        ?>
			</ul>
    
    </div>
	
</div>
