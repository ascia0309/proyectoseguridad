<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title> <!--  titulo paraa controlador/index  de metodo index-->
        <link rel="icon" type="image/png" href="<?php echo base_url('public/img/favicon.png') ?>" />

        <link href="<?php echo base_url('public/css/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet" media="screen">
        <link href="<?php echo base_url('public/css/bootstrap-principal.css') ?>" rel="stylesheet" media="screen">
        <script src="<?php echo base_url('public/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('public/js/bootstrap.js') ?>"></script>

        
        <script src="<?php echo base_url('public/js/jquery.dataTables.min.js') ?>"></script>
				<script src="<?php echo base_url('public/js/jquery.dataTables.bootstrap.js') ?>"></script>
				<script src="<?php echo base_url('public/js/jquery-3.3.1.slim.min.js') ?>"></script>
				


        <script type="text/javascript">
        $(function(){
           $('table.data-table.full').dataTable( {
                "bPaginate": true,
                "aLengthMenu": [5, 8, 10],
                "bLengthChange": true,
                "bFilter": true,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": true,
                "sPaginationType": "full_numbers",
                "sDom": '<""f>t<"F"lp>',
                "sPaginationType": "bootstrap"
            });
        });
        </script>

      </style>
    </head>

    <body style=" margin-bottom: 0; padding: 0; ">
      <div class="row affix-row">

  	     <div class="col-sm-9 col-md-10 affix-content">
            <div class="container" style="background-color: white;">

              <?php $this->load->view($contenido) ?>

            </div>
  	     </div>
      </div>

    </body>
</html>
