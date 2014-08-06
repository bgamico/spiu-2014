<div class="span9">
<div class="bs-docs-section">

        <div class="col-lg-12">
            <div class="page-header">
                <h1> Actividad <small> mantenimiento de registros </small> </h1>
            </div>

            <div class="bs-component">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th> ID </th>
                        <th> Nombre </th>
                        <th> Descripci&oacute;n </th>
                        <th> Fecha </th>
                        <th> Hora </th>
                        <th> Direcci&oacute;n </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($query as $registro): ?>
                        <tr>
                            <td> <?= anchor('actividadmanage/edit/'.$registro->actividad_id, $registro->actividad_id); ?> </td>
                            <td> <?= $registro->name ?> </td>
                            <td> <?= $registro->descripcion ?> </td>
                            <td> <?= date("d/m/Y", strtotime($registro->fecha)); ?> </td>
                            <td> <?= date("H:i", strtotime($registro->hora)); ?> </td>
                            <td> <?= $registro->direccion ?> </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
        </div>
</div>
</div>