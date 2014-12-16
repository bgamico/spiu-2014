
<!-- formulario de login -->

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Iniciar Sesi&oacute;n</h1>
            <div class="account-wall">
                <form class="form-signin" method="POST" action="<?php echo base_url('backend/login/validate')?>">
                <input type="text" class="form-control" name="username" placeholder="Usuario" required autofocus>
                <input type="password" class="form-control" name="password" placeholder="Contrase&ntilde;a" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Ingresar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end formulario de login -->