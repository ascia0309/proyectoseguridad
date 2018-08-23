<div class="col-md-6">
  <form method="POST" action=" <?php echo base_url('Usuario/update') ?> ">
    <?php foreach ($datosUsuario as $value) { ?>
      <input type="hidden" name="txtUsuid" value="<?php echo $value->usuid;; ?>">
      <div class="form-group">
        <label for="exampleInputEmail1">Perfil</label>

          <?php
									$lista = array();
									foreach ($selPerfil as $registro) {
										$lista[$registro->perid] = $registro->pernombre;

									}
									echo form_dropdown('txtPerid', $lista, $value->perid, 'class="form-control"'); ?>

      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">DNI</label>
        <input type="text" name="txtDni" class="form-control" id="exampleInputPassword1" placeholder="Enter Nro Dni" value="<?php echo $value->usudni; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Correo Electronico</label>
        <input type="email" name="txtCorreo" class="form-control" id="exampleInputPassword1" placeholder="Enter Correo Electronico" value="<?php echo $value->usuemail; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" name="txtContrasenia" class="form-control" id="exampleInputPassword1" placeholder="Enter Contraseña" value="<?php echo $value->usucontrasenia; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nombres</label>
        <input type="text" name="txtNombres" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nombres" value="<?php echo $value->usunombres; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Apellidos</label>
        <input type="text" name="txtApellidos" class="form-control" id="exampleInputPassword1" placeholder="Enter Apellidos" value="<?php echo $value->usuapellidos; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Celular</label>
        <input type="text" name="txtCelular" class="form-control" id="exampleInputPassword1" placeholder="Enter Celular" value="<?php echo $value->usucelular; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Estado</label>
        <input type="text" name="txtEstado" class="form-control" id="exampleInputPassword1" placeholder="Enter Estado" value="<?php echo $value->usuestado; ?>">
      </div>
  <?php 
} ?>
    <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
  </form>

</div>
