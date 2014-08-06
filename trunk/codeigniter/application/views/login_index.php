<div style="width: 320px; margin: 0 auto;"><!-- No deberia aplicar el estilo en linea -->
   <h3>Iniciar Sesi&oacute;n</h3>   
   <form class="well" method="POST" action="<?php echo base_url('account/validate')?>">
      <label>Usuario</label>
      <input type="text" name="username" style="width: 260px;">
      <label>Contrase&ntilde;a</label>
      <input type="password" name="password" style="width: 260px;">
      <button type="submit" class="btn btn-primary">Ingresar</button>
   </form>
</div>
