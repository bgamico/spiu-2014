<div class="span12">
	<div class="bs-docs-section">

		<div class="col-lg-11">
<!-- 			<div class="page-header"> -->
<!-- 				<h1> -->
<!-- 					Usuarios <small> mantenimiento de registros </small> -->
<!-- 				</h1> -->
<!-- 			</div> -->
					<!-- ?= anchor('usuario/add', 'Agregar', array('class'=>'btn btn-primary')); ?-->
<!-- 			<p></p> -->
			
	<div class="bs-example">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">Usuarios</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <form class="navbar-form navbar-right" role="search">
<!--             <div class="form-group"> -->
<!--               <input type="text" class="form-control" placeholder="Buscar"> -->
<!--             </div> -->
<!--             <button type="submit" class="btn btn-default">Agregar</button> -->
            <?= anchor('usuario/add', 'Agregar', array('class'=>'btn btn-default')); ?>
          </form>
        </div>
      </div>
    </nav>
  </div>

			<div class="bs-component">
<!-- 			<div class="table-responsive"> -->
			<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
<!-- 				<table class="table table-striped table-hover table-condensed table-bordered"> -->
					<thead>
						<tr>
							<th>Username</th>
							<th>Role</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
                    <?php foreach ($query as $registro): ?>
                        <tr>
							<td> <?= $registro->usuario ?> </td>
							<td> <?= $registro->role ?> </td>
							<td>
                                <?= anchor('usuario/view/'.$registro->id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
                                <?= anchor('usuario/edit/'.$registro->id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
                                <?= anchor('usuario/delete/'.$registro->id,'<i class="glyphicon glyphicon-remove"></i>',array('onclick' => "return confirm('Se eliminar&aacute; el usuario. &iquest;Est&aacute; seguro&#63')"))?>

                            </td>
						</tr>
                    <?php endforeach; ?>
                    </tbody>
				</table>
			</div>
		</div>
	</div>


	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
	<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	
	<script type="text/javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable();
} );

	</script>
<style id="bsa_css">.one{position:relative}.one .bsa_it_ad{display:block;padding:15px;border:1px solid #e1e1e1;background:#f9f9f9;font-family:helvetica,arial,sans-serif;line-height:100%;position:relative}.one .bsa_it_ad a{text-decoration:none}.one .bsa_it_ad a:hover{text-decoration:none}.one .bsa_it_ad .bsa_it_t{display:block;font-size:12px;font-weight:bold;color:#212121;line-height:125%;padding:0 0 5px 0}.one .bsa_it_ad .bsa_it_d{display:block;color:#434343;font-size:12px;line-height:135%}.one .bsa_it_ad .bsa_it_i{float:left;margin:0 15px 10px 0}.one .bsa_it_p{display:block;text-align:right;position:absolute;bottom:10px;right:15px}.one .bsa_it_p a{font-size:10px;color:#666;text-decoration:none}.one .bsa_it_ad .bsa_it_p a:hover{font-style:italic}</style><script id="_adpacks_projs" type="text/javascript" src="//cdn.buysellads.com/ac/pro.js"></script><script type="text/javascript" id="_bsaPRO_js" src="//srv.buysellads.com/ads/get/ids/C6SI42Y/?r=1416632400000&amp;segment_C6SI42Y=placement:datatablesnet" async="async"></script></head>
