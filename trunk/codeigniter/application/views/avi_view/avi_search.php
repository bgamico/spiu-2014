<!-- sección de avisos -->
<?= $contenedor_aux; ?>

<div class="span12">
<div class="bs-docs-section">

        <div class="col-lg-11">
            <div class="page-header">
                <h1> Aviso <small> mantenimiento de registros </small> </h1>
            </div>
    
            <?= anchor('avisomanage/add', 'Agregar', array('class'=>'btn btn-primary')); ?>

            <div class="bs-component">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Descripci&oacute;n </th>
                        <th> Fecha </th>
                        <th> Opciones </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($query as $registro): ?>
                        <tr>
                            <td> <?= $registro->name ?> </td>
                            <td> <?= $registro->descripcion ?> </td>
                            <td> <?= date("d/m/Y", strtotime($registro->fecha)); ?> </td>
                            <td>
                            	<!-- solo se permite editar eliminar o agregar avisos  -->
                                <?= anchor('avisomanage/edit/'.$registro->aviso_id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
                                <?=anchor('avisomanage/delete/'.$registro->aviso_id,'<i class="glyphicon glyphicon-remove"></i>',array('onclick' => "return confirm('Se eliminar&aacute; el aviso. &iquest;Est&aacute; seguro&#63')"))?>

                            </td>                            

                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
        </div>
</div>
</div>
