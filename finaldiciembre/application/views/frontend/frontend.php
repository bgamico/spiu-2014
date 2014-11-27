<!-- begin template -->
<div class="navbar navbar-custom navbar-fixed-top">
 <div class="navbar-header"><a class="navbar-brand" href="#">Brand</a>
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li>&nbsp;</li>
      </ul>
      <form class="navbar-form">
        <div class="form-group" style="display:inline;">
          <div class="input-group">
            <div class="input-group-btn">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-chevron-down"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">Category 1</a></li>
                <li><a href="#">Category 2</a></li>
                <li><a href="#">Category 3</a></li>
                <li><a href="#">Category 4</a></li>
                <li><a href="#">Category 5</a></li> 
              </ul>
            </div>
            <input type="text" class="form-control" placeholder="What are searching for?">
            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> </span>
          </div>
        </div>
      </form>
    </div>
</div>

<div class="container-fluid" id="main">
  <div class="row">
      <h2>Sedes</h2>
  	<div class="col-md-7" id="left">
    
      <?php foreach($datos as $marker_sidebar)
		        {?>
				  <div class="panel panel-default">
			        <div class="panel-heading" onclick="datos_marker(<?=$marker_sidebar->latitud?>,<?=$marker_sidebar->longitud?>,marker_<?=$marker_sidebar->id?>)"><a><?=substr($marker_sidebar->nombre,0)?></a></div>
			      </div>
			      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
			        Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
			        dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
			        Aliquam in felis sit amet augue.</p>
			      
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