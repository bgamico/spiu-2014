<div class="container-fluid" id="main">
  <div class="row">
      <h2>Sedes</h2>
  	<div class="col-md-7" id="left">
    
      <?php foreach($datos as $marker_sidebar)
		        {?>
				  <div class="panel panel-default">
			        <div class="panel-heading" onclick="datos_marker(<?=$marker_sidebar->latitud?>,<?=$marker_sidebar->longitud?>,marker_<?=$marker_sidebar->id?>)"><a><?=substr($marker_sidebar->nombre,0)?></a></div>
			      </div>
			      <p>
			      	<?=$marker_sidebar->descripcion?>
			      </p>
			      <p>
			      	<?= anchor('home/pdi/'.$marker_sidebar->id,'<img width="15%" height="15%" src='. base_url('assets/img/images.jpg').'>', array('class'=>'view')); ?>
			      	<?= anchor('home/aviso/'.$marker_sidebar->id,'<img width="15%" height="15%" src='. base_url('assets/img/avisoo.jpg').'>', array('class'=>'view')); ?>
					<?= anchor('home/actividad/'.$marker_sidebar->id,'<img width="15%" height="15%" src='. base_url('assets/img/actividad.jpg').'>', array('class'=>'view')); ?>
					<?= anchor('home/examen/'.$marker_sidebar->id,'<img width="15%" height="15%" src='. base_url('assets/img/fechas_examen.png').'>', array('class'=>'view')); ?>  
			      </p>
			      
			      <hr>				  				  
				  			  
				  <?php
		        }
		        ?>

    </div>
    
    <div class="col-md-5 hidden-xs" >
    	<?=$map['js']?>
		<?=$map['html']?>
    </div>
    	
  </div>
</div>
<!-- end template -->

<!-- 		<script src="js/scripts.js"></script> -->
		<script type="text/javascript">
		    function datos_marker(lat, lng, marker)
		    {
			     var mi_marker = new google.maps.LatLng(lat, lng);
			     map.panTo(mi_marker);
			     google.maps.event.trigger(marker, 'click');
		    }
	    </script>