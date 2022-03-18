<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
    <meta name="author" content="Conduent">
    <meta name="copyright" content="Conduent"/>
    <meta name="revisit-after" content="1 month"/>
    <meta name="robots" content="index, follow"/>
	
	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url();?>assets/icomoon/style.css" >
	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url();?>assets/css/component.css" >
	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url();?>assets/css/estiloPrincipal.css?201904161134">
	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url();?>assets/amarath/estiloAmaranth.css">	

	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url();?>assets/css/datetimepicker/tempusdominus-bootstrap-4.css" />

	<script type="text/javascript" src="<?=base_url();?>assets/js/librerias/jquery-3.6.0.min.js"></script> 
	<script type="text/javascript" src="<?=base_url();?>assets/js/librerias/datetimepicker/moment.js"></script> 
	<script type="text/javascript" src="<?=base_url();?>assets/js/librerias/datetimepicker/tempusdominus-bootstrap-4.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/jfuncion.js?201904161134"></script>

	<!-- Add jQuery librarys -->
	<?php
	if(isset($scripts)):
			foreach($scripts as $script):
	?>
	<script type="text/javascript" src="<?=base_url();?>assets/<?=$script;?>"></script>
	<?php
			endforeach;
	endif;
	?>

	<!-- Add CSS -->
	<?php
	if(isset($styles)):
			foreach($styles as $style):
	?>
	<link rel="stylesheet" type="text/css" media="all" href="<?=base_url();?>assets/<?=$style;?>"/>
	<?php
			endforeach;
	endif;
	?>
	
	<link rel="icon" type="image/png" href="<?=base_url();?>assets/img/ico.png" />
	
    	

	<title>TraceSysOrganics</title>   
</head>
<body>
	<div id="fondo"></div>
