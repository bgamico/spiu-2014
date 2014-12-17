<div class="container-fluid" id="main">
  <div class="row">
  	<div class="col-md-7" id="left">
      <div class="bs-example">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand">Puntos de Interes</a>
						</div>
						<div class="collapse navbar-collapse"
							id="bs-example-navbar-collapse-2">
							<form class="navbar-form navbar-right" role="search">
								<a class="btn btn-default" onclick="window.history.back();">Volver</a>
							</form>
						</div>
					</div>
				</nav>
			</div>
    
      <?php foreach($datos as $marker_sidebar)
		        {?>
				  <div class="panel panel-default">
			        <div class="panel-heading" onclick="datos_marker(<?=$marker_sidebar->latitud?>,<?=$marker_sidebar->longitud?>,marker_<?=$marker_sidebar->id?>)"><a><?=substr($marker_sidebar->nombre,0)?></a></div>
			      </div>
			      <p>
			      	<?=$marker_sidebar->descripcion?>
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
	    