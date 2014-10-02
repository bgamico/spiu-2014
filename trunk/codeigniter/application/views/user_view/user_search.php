<div class="span12">

<div class="bs-docs-section">

        <div class="col-lg-11">
            <div class="page-header">
                <h1> Usuarios <small> mantenimiento de registros </small> 
				</h1>
            </div>
            
			<!-- mostramos los mensajes de retroalimentación -->
			<!-- < ?= my_validation_errors($this->session->flashdata('mensaje'),$this->session->flashdata('tipo_mensaje')); ?>-->
			<!-- ?= my_validation_errors($mensaje,$tipo_mensaje); ?-->

            <?php
            //si se hace la actualización mostramos el mensaje que contiene
            //la sesión flashdata actualizado que hemos creado en el controlado
            $actualizar = $this->session->flashdata('actualizado');
            if ($actualizar) {
                ?>
                <tr>
                    <td colspan="5" id="actualizadoCorrectamente"><?= $actualizar ?></td>
                </tr>
                <?php
            }
            ?>			
			
			
			<!-- fin mensajes -->
			
				<!-- ?php if (isset($agregar)):?-->
					<?= anchor('usermanage/add', 'Agregar', array('class'=>'btn btn-primary')); ?>
				<!-- ?php endif;?-->
				<p></p>
			
            <div class="bs-component">
                <table class="table table-striped table-hover table-condensed table-bordered">
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
                            <td> <?= $registro->user_name ?> </td>
                            <td> <?= $registro->role ?> </td>
                            <td>
                                <?= anchor('usermanage/view/'.$registro->user_id, '<i class="glyphicon glyphicon-search"></i>',array('class'=>'view')); ?>
                                <?= anchor('usermanage/edit/'.$registro->user_id, '<i class="glyphicon glyphicon-pencil"></i>',array('class'=>'view')); ?>
                                <!--< ?= anchor('usermanage/delete/'.$registro->user_id, '<i class="glyphicon glyphicon-remove"></i>',array('class'=>'view')); ?> -->
                                <?=anchor('usermanage/delete/'.$registro->user_id,'<i class="glyphicon glyphicon-remove"></i>',array('onclick' => "return confirm('Se eliminar&aacute; el usuario. &iquest;Est&aacute; seguro&#63')"))?>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>