
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
			data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">DYNAM</a>
		
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
<?php if (!empty($_SESSION['logged_in'])) : ?>
	  <?php foreach ($menues as $menu) : ?>
	  <?php if ($menu->menu_id != $menu->menu_id) : ?>
		<li>
			<a href="#"><?php echo $menu->mennombre; ?></a>
		</li>
	  <?php else : ?>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
			aria-expanded="false"><?php echo $menu->mennombre; ?> <span class="caret"></span></a>
		
			<ul class="dropdown-menu">
				<?php foreach ($submenubo as $subm) : ?>
					<?php if ($menu->menu_id == $subm->mensubid) : ?>
						<li>
							<a href="<?php echo base_url(); ?>usuario"><?php echo $subm->mennombre; ?></a>
							
						</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</li>
	  <?php endif; ?>
	  
	  <?php endforeach; ?>
	<?php endif; ?>

       <!-- 
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
-->


        <?php if (!empty($_SESSION['logged_in'])) : ?><!--  agregando para login-->
       
        <li class="dropdown">
          <!--  para mostrar la bienvenida de correo-->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
					aria-expanded="false">Bienvenido <?php echo $_SESSION['usunombres']; ?> 
					<span class="caret"></span></a>
          <ul class="dropdown-menu">
          
            <li><a href="<?php echo base_url("login/"); ?>loggout">Salir</a></li><!--  loggout de controlador login metodo loggout-->
          </ul>
        </li>
      <?php else : ?><!--  caso contrario de la else-->
        <li><a href="<?php echo base_url("usuario") ?>"></a></li><!--  menu registrarse-->
        <li <?php if (isset($active) && $active == 'login') {
												echo 'class="active"';
											} ?>><a href="<?php echo base_url(); ?>login">Login</a></li><!--  menu Login(controlador/Login==>metodo login<==Auth)-->
      <?php endif; ?><!--  finalizado login-->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">

	<div class="row">
		<div class="col-1g-12 text-center">
			/<h1></h1>
		</div>

	</div>  
	<div>
	<h1></h1>
	</div>
	
	
  <?php
  //para controlador-model
	if ($this->session->flashdata('mensaje_error') != null) {
		echo '<div class="alert alert-danger" role="alert">' . $this->session->flashdata('mensaje_error') . '</div>';
	}
	if ($this->session->flashdata('mensaje_success') != null) {
		echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('mensaje_success') . '</div>';
	}
	?>
	
</div>
