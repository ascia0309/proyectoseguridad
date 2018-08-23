
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
                <ul class="nav navbar-nav">
                    <?php foreach ($tablas as $menus) { ?>
                        <?php if ($menus->mensubid == null) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
								role="button" data-toggle="dropdown" aria-haspopup="true" 
								aria-expanded="false">
                                <?php echo $menus->mennombre; ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach ($subtablas as $submenus) { ?>
                                        <?php if ($menus->menid == $submenus->mensubid) { ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>usuario"><?php echo $subm->mennombre; ?></a>
                                            </li>
                                        <?php 
																																						} ?>
                                    <?php 
																																		} ?>
                                </ul>
                            </li>
                        <?php 
																						} ?>
   
                    <?php 
																		} ?>
                </ul>
            </div>

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
	<h1>Bienvenido</h1>
	</div>
	
	

	
</div>
