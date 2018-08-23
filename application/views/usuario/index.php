<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<h1>SEGURIDAD</h1>
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">CONSULTA</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">REGISTRO</a>
  </li>
</ul>

<!-- Tab panes   <div class="data table display full">-->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" id="home-tab">
    <table class="table table-hover">
      <thead class="thead-dark">
        <th>Id</th>
        <th>Perfil</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Correo</th>
        <th>Telefono</th><!-- dni emila nombres celular accion -->
        <th>Acciones</th>
      </thead>
      <tbody>
        <?php foreach ($listaUsario as $value) { ?>
          <tr>
            <td class="table-warning"><?php echo $value->usuid; ?></td>
            <td class="table-info"><?php echo $value->pernombre; ?></td>
            <td class="table-primary"><?php echo $value->usunombres; ?></td>
            <td class="table-primary"><?php echo $value->usuapellidos; ?></td>
            <td class="table-success"><?php echo $value->usuemail; ?></td>
            <td class="table-success"><?php echo $value->usucelular; ?></td>
            <td class="table-secondary">
              <a href="<?php echo base_url('usuario/delete') . "/" . $value->usuid; ?>" title="Eliminar">Eliminar</a>
              <a href="<?php echo base_url('usuario/edit') . "/" . $value->usuid; ?>" title="Editar">Editar</a>
            </td>
          </tr>
          <?php

								} ?>
      </tbody>
    </table>
  </div>
  <div class="tab-pane" id="profile" role="tabpanel" id="profile-tab">
    <div class="col-md-6">
      <form method="POST" action=" <?php echo base_url('Usuario/insert') ?> ">
        <div class="form-group">
          <label for="exampleInputEmail1">Perfil</label>
          <select class="" name="txtIdper">
            <?php foreach ($selPerfil as $value) { ?>
              <option value=" <?php echo $value->perid ?> "> <?php echo $value->pernombre ?> </option><?php

																																																																																																				} ?>
            <option value=""></option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">DNI</label>
          <input type="text" name="txtDni" class="form-control" id="exampleInputPassword1" placeholder="Enter Nro Dni">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Correo Electronico</label>
          <input type="email" name="txtCorreo" class="form-control" id="exampleInputPassword1" placeholder="Enter Correo Electronico">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Contraseña</label>
          <input type="password" name="txtContrasenia" class="form-control" id="exampleInputPassword1" placeholder="Enter Contraseña">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nombres</label>
          <input type="text" name="txtNombres" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Nombres">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Apellidos</label>
          <input type="text" name="txtApellidos" class="form-control" id="exampleInputPassword1" placeholder="Enter Apellidos">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Celular</label>
          <input type="text" name="txtCelular" class="form-control" id="exampleInputPassword1" placeholder="Enter Celular">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Estado</label>
          <input type="text" name="txtEstado" class="form-control" id="exampleInputPassword1" placeholder="Enter Estado">
        </div>
        <button type="submit" class="btn btn-success">Registrar Usuario</button>
      </form>
    </div>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>





<!--
<table class="table data-table display full">
  <thead>
    <th>DNI</th>
    <th>EMAIL</th>
    <th>NOMBRES</th>
    <th>CELULAR</th>
    <th>ACCIONES</th>
  </thead>
  <tbody>
    <-?php
    foreach ($listaUsuario as $value) {?>
      <tr>
        <td><-?php echo $value->usudni?></td>
        <td><-?php echo $value->usuemail?></td>
        <td><-?php echo $value->usunombres?></td>
        <td><-?php echo $value->usucelular?></td>
        <td>
            <a href="#">edit</a>
            <a href="#">delete</a>
        </td>
      </tr>
    <-?php }
    ?>
  </tbody>
</table>
-->

