<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
	      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title> <!--  titulo paraa controlador/index  de metodo index-->
        <link rel="icon" type="image/png" href="<?php echo base_url('public/img/favicon.png') ?>" />

        <link href="<?php echo base_url('public/css/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('public/css/bootstrap-login.css') ?>" rel="stylesheet" media="screen">
        <script src="<?php echo base_url('public/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('public/js/bootstrap.js') ?>"></script>

        <script>
            $(document).ready(function (e) {
            $("#form-login").on('submit',(function(e) {
                e.preventDefault();
                $("#message").empty();
                $('#loading').show();
            $.ajax({
                url: "<?php echo base_url('login/validar')?>",
                type: "POST",
                data: new FormData(this),
                contentType:false,
                cache: false,
                processData:false,
                success: function(data) {
                    if(data.length !== 0){
                        $('#loading').hide();
                        $("#message").html(data);
                    }
                    else{
                        window.location.href='<?php echo base_url("menu/index") ?>';
                        throw new Error('go');
                    }
                }
            });
            }));
        });
        </script>


    </head>

    <body style=" margin-bottom: 0; padding: 0; background: #FFFFFF;">

        <div class="contenido" id="container" >
          <div class="container" >
                 <div class="col-lg-4 col-md-3 col-sm-2"></div>
                 <div class="col-lg-4 col-md-6 col-sm-8">
                     <div class="logo">

                     </div>
                     <div class="row loginbox">
                         <div class="col-lg-12">
                           <center>
                           <figure style="max-width: 140px; margin: 0;">
                               <!--<img style="width: 100%;" src="<?php// echo base_url('public/image/arfa.png')?>">-->
                           </figure>
                           </center>
                             <!--<span class="singtext" > Ingresar </span>-->
                         </div>
                         <form id="form-login" action="" method="post">

                         <div class="col-lg-12 col-md-12 col-sm-12">
                             <input type="email" name="txtEmail" class="form-control" id="inputEmail3" placeholder="correo electrónico" required="">
                         </div>
                         <div class="col-lg-12  col-md-12 col-sm-12">
                             <input type="password" name="txtPassword" class="form-control" id="inputPassword3" placeholder="Tú contraseña" required="">
                         </div>
                         <div class="col-lg-12  col-md-12 col-sm-12">
                             <button type="submit" class="btn submitButton">Ingresar</button>
                         </div>
                         </form>
                         <div class="col-lg-12  col-md-12 col-sm-12">
                           <div id="message">

                           </div>
                         </div>
                     </div>
                     <br>
                     <footer  class="footer">
                         <p > seguridad © 2018 All rights reserved </p>
                     </footer> <!--footer Section ends-->

                 </div>
                 <div class="col-lg-4 col-md-3 col-sm-2"></div>
             </div>
        </div>
    </body>
</html>
