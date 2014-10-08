<div class="span12">
<div class="bs-docs-section">

        <div class="col-lg-11">
            <div class="page-header">
                <h1> Actividad <small> mantenimiento de registros </small> </h1>
            </div>
    
            <?= anchor('actividadmanage/add', 'Agregar', array('class'=>'btn btn-primary')); ?>

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
                            <td> <?= $registro->name ?> </td>
                            <td> <?= $registro->descripcion ?> </td>
                            <td> <?= date("d/m/Y", strtotime($registro->fecha)); ?> </td>
                            <td> <?= date("H:i", strtotime($registro->hora)); ?> </td>
                            <td> <?= $registro->direccion ?> </td>
                            <td>
                                <?= anchor('actividadmanage/view/'.$registro->actividad_id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
                                <?= anchor('actividadmanage/edit/'.$registro->actividad_id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
                                <!--< ?= anchor('actividadmanage/delete/'.$registro->user_id, '<i class="glyphicon glyphicon-remove"></i>',array('class'=>'view')); ?> -->
                                <?=anchor('actividadmanage/delete/'.$registro->actividad_id,'<i class="glyphicon glyphicon-remove"></i>',array('onclick' => "return confirm('Se eliminar&aacute; la actividad. &iquest;Est&aacute; seguro&#63')"))?>

                            </td>                            

                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
        </div>
</div>
</div>
