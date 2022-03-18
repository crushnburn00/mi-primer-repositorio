<div class="container-fluid container-fluid-encab">
	<div class="row">
		<div class="col-12 col-md-12 col-lg-5 col-xl-5">
			<i class="icon-user"></i> Bienvenido : juan.perez@email.com.pe - Juan Pérez <?php /*=$_SESSION['usuario'];*/?>
		</div>
		<div class="col-12 col-md-6 col-lg-3 col-xl-4" id="img_nombre_empresa">
		 	<img src="<?=base_url();?>assets/img/nombre_empresa.png"  >
		</div>
		<div class="col-12 col-md-6 col-lg-4 col-xl-3 right">
			<div class="social col-4 offset-lg-3 col-lg-3 col-xl-3">
		 		<a href="<?=base_url();?>principal" class="list__button" title="PANEL PRINCIPAL"><i class="icon-home"></i></a>
			</div>

			
			<?php
				$host= $_SERVER["HTTP_HOST"];
				$url= $_SERVER["REQUEST_URI"];
				
			?>

			<div class="social col-4 col-lg-3 col-xl-3">
		 		<a href="http://<?=$host.$url;?>" class="list__button" title="REFRESCAR PAGINAR"><i class="icon-spinner9"></i></a>
			</div>

			<div class="social col-4 col-lg-3 col-xl-3">
		 		<a href="<?=base_url();?>usuario/salir" class="switch__button" title="CERRAR SESION"><i class="icon-switch"></i></a>
			</div>
		</div>
	</div>
	<hr class="style14"/>
</div>
