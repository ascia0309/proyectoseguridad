
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
