
    <script type="text/javascript">
    function datos_marker(lat, lng, marker)
    {
     var mi_marker = new google.maps.LatLng(lat, lng);
     map.panTo(mi_marker);
     google.maps.event.trigger(marker, 'click');
    }
    </script>
    <?=$map['js']?>
			
<div class="bs-example" id="admin">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Puntos de Informacion</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <form class="navbar-form navbar-right" role="search">
			<?= anchor('pdi/add', 'Agregar', array('class'=>'btn btn-default')); ?>
          </form>
        </div>
      </div>
    </nav>
  </div>
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
					<?= anchor('pdi/edit/'.$marker_sidebar->id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
					<a id="delete" data-toggle="modal" data-target="#confirm-delete" href="#"><i class="glyphicon glyphicon-remove"></i></a>
				  <?php
		        }
		        ?>
			</ul>
    
    </div>
	
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmar Borrado</h4>
                </div>
            
                <div class="modal-body">
                    <p>Esta seguro que desea borrar este punto de informacion?</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <?= anchor('pdi/delete/'.$marker_sidebar->id,'Borrar',array('class'=>"btn btn-danger danger"))?>
                    
                </div>
            </div>
        </div>
    </div>
