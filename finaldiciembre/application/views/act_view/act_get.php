<!-- secci�n de avisos -->
<?= $contenedor_aux; ?>

<div class="span12">
<div class="bs-docs-section">

        <div class="col-lg-11">
        
        <div class="bs-example">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Actividades</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <form class="navbar-form navbar-right" role="search">
			<?= anchor('actividad/add', 'Agregar', array('class'=>'btn btn-default')); ?>
          </form>
        </div>
      </div>
    </nav>
  </div>
        
                <div class="bs-component">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Descripci&oacute;n </th>
                        <th> Fecha </th>
                        <th> Hora </th>
                        <th> Direcci&oacute;n </th>
                        <th> Opciones </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($query as $registro): ?>
                        <tr>
                            <td> <?= $registro->nombre ?> </td>
                            <td> <?= $registro->descripcion ?> </td>
                            <td> <?= date("d/m/Y", strtotime($registro->fecha)); ?> </td>
                            <td> <?= date("H:i", strtotime($registro->hora)); ?> </td>
                            <td> <?= $registro->direccion ?> </td>
                            <td>
                            	<!-- solo se permite editar eliminar o agregar actividades  -->
                                <!-- < ?= anchor('actividadmanage/view/'.$registro->actividad_id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>-->
                                <?= anchor('actividad/edit/'.$registro->id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
                                <!--< ?= anchor('actividadmanage/delete/'.$registro->user_id, '<i class="glyphicon glyphicon-remove"></i>',array('class'=>'view')); ?> -->
                                <?=anchor('actividadmanage/delete/'.$registro->id,'<i class="glyphicon glyphicon-remove"></i>',array('onclick' => "return confirm('Se eliminar&aacute; la actividad. &iquest;Est&aacute; seguro&#63')"))?>

                            </td>                            

                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
        </div>
</div>
</div>
