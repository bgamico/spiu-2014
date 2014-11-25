
<div class="span12">
<div class="bs-docs-section">

        <div class="col-lg-11">

            <div class="bs-example">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand">Avisos</a>
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
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($query as $registro): ?>
                        <tr>
                            <td> <?= $registro->nombre ?> </td>
                            <td> <?= $registro->descripcion ?> </td>
                            <td> <?= date("d/m/Y", strtotime($registro->fecha)); ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
        </div>
</div>
</div>
