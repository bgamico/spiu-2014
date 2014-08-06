	<div class="col-xs-12 col-sm-9">
		<div class="page-header-box">
			<?php echo $message; ?>
        </div>
        <div class="page-header-box">
            <p><legend>Agregar nuevo usuario <small>(los campos <span style="color:red;">*</span> son requeridos)</small></legend></p>
        </div>  

		<div class="row">


			<form action="<?php echo $action; ?>" method="post" class="form-horizontal" id="contact-form">
			  <div class="form-group">			  
				<label for="inputNombre_Usuario" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>Nombre de usuario:</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de Usuario">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputNombre" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>Nombre:</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="inputNombre" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>Apellido:</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputDocumento" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>Documento:</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="documento" name="documento" placeholder="Documento">
				</div>
			  </div>
			  
			<div class="form-group">
				<label for="inputNombre" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>Fecha de Nacimiento:</label>
				<div class="col-sm-4">
				  <input type="date" class="form-control" id="fec_nac" name="fec_nac" placeholder="Fecha de Nacimiento">
				</div>
			 </div>              
              
			  
			  
	<div class="form-group">
				<label for="inputDireccion" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>Domicilio:</label>
				<div class="col-sm-4">
				  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Domicilio">
				</div>
			 </div>

			<div class="form-group">
				<label for="inputDireccion" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>E-mail:</label>
				<div class="col-sm-4">
				  <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
				</div>
			 </div>

			<div class="form-group">
				<label for="inputDireccion" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>Contrase&ntilde;a:</label>
				<div class="col-sm-4">
				  <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
				</div>
			 </div>	

			<div class="form-group">
				<label for="inputRol" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>Rol:</label>
				<div class="col-sm-4">
					<!-- <input type="text" class="form-control" id="id_rol" name="id_rol" placeholder="Rol">-->
					 <select class="form-control" id="id_rol" name="id_rol" disabled>
					  <!--<option value="1" > Administrador General </option>
					  <option value="3" > Administrador de Sede </option>
                      no se permite cambiar el rol -->
					  <option value="2" > Operador </option>
					 </select>		  
				</div>
			 </div>	
<!--
<div class="form-group">
    <label for="inputSede" class="col-sm-3 control-label"><span style="color:red;">*&nbsp;</span>Sede:</label>
    <div class="col-sm-4">
	    <select class="form-control" id="selectSede" name="selectSede" disabled >
	      <option value="sedeOp0" < ?php if ($this->form_data->id_sede==0) echo "selected"?>>---//---//---//---</option>
	      <option value="sedeOp1" < ?php if ($this->form_data->id_sede==1) echo "selected"?>>Sede Atlantica</option>
	      <option value="sedeOp2" < ?php if ($this->form_data->id_sede==2) echo "selected"?>>Sede Andina</option>
	      <option value="sedeOp3" < ?php if ($this->form_data->id_sede==3) echo "selected"?>>Sede Alto Valle</option>
	      <option value="sedeOp4" < ?php if ($this->form_data->id_sede==4) echo "selected"?>>Sede Valle Medio</option>
	    </select>
      	<input type="hidden" name="sede" value="< ?php echo $this->form_data->id_sede; ?>"/>
    </div>  
    </div>  -->         		 
		 
			<div class="form-group">
				<label for="inputDireccion" class="col-sm-3 control-label">Activado:</label>
				<div class="col-sm-1">
					
					<input type="checkbox" class="form-control" id="enable" name="enable" >
					
				</div>
      			
			</div>				 			 
			 
			  <div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  <button type="submit" class="btn btn-primary btn-large">Guardar</button>
				</div>
			  </div>
			</form>

        </div><!--/row-->
 </div><!--/span-->
