
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<hr>
<div class="row">
  <div class="col-xs-6 col-md-2">
    <figure style="max-width: 140px; margin: 0;">

    </figure>
  </div>
  <div class="col-xs-12 col-md-8">
			<h1 style="text-align: center">Bienvenido de nuevo <?= $this->session->userdata('perfil') ?></h1>
 				<?= anchor(base_url() . 'login/logout_ci', 'Cerrar sesión') ?>
  </div>
</div>

<!-- ENCABEZAMIENTO -->
<!--
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
   
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DYNAMIC DROPDWON</a>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <-?php if (!empty($_SESSION['is_logged_in'])) : ?>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
   
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido <?php echo $_SESSION['user_email']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<-?php echo base_url(); ?>loggout">Salir</a></li>
          </ul>
        </li>
      <-?php else : ?>
        <li><a href="#">Registrarse</a></li>
        <li <-?php if (isset($active) && $active == 'login') {
												echo 'class="active"';
											} ?>><a href="<-?php echo base_url(); ?>login">Login</a></li>
      <-?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container">

	<div class="row">
		<div class="col-1g-12 text-center">
			/<h1></h1>
		</div>

	</div>  
	<div>
	<h1>holas</h1>
	</div>
	
	
  <-?php
  //para controlador-model
	if ($this->session->flashdata('mensaje_error') != null) {
		echo '<div class="alert alert-danger" role="alert">' . $this->session->flashdata('mensaje_error') . '</div>';
	}
	if ($this->session->flashdata('mensaje_success') != null) {
		echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('mensaje_success') . '</div>';
	}
	?>
	
</div>
