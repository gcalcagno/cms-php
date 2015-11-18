<?php 
	error_reporting(E_ERROR | E_PARSE);
	require($_SERVER['DOCUMENT_ROOT'].'/assets/ti.php'); 
	require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";
?> 


	<!-- HEADER -->
	<?php include 'header.php'; ?>
	<!-- HEADER -->
	

	<body class="login">
		
		<!-- CONTENEDOR GENERAL -->
	   	<div class="contenedor col-xs-12 col-sm-12 col-md-12 ol-lg-12">
				

			<!--CONTENIDO -->
			<div class="contenido col-xs-12 col-sm-12 col-md-12 ol-lg-12">
				<?php startblock('contenido') ?> <?php endblock() ?> 
			</div>
			<!-- END // CONTENIDO -->


		</div>
		<!-- END // CNTENEDOR GENERAL -->


		<!-- FOOTER -->
		<?php include 'footer.php'; ?>
	    <!-- END // FOOTER -->


