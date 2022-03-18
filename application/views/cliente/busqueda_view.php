
	<!-- campos del formulario-->
	<!-- FORMULARIO -->
	<?= form_open(base_url().'', array(
	    'name' => 'form_busquedacliente',
	    'id'=>'form_busquedacliente',
	    'class'=> 'form-busquedacliente',
	    'role' => 'form'
	));

	?>
	
	<div class="form-group col-12 row2 tbus_div" >   

	<?php
		//ID DE productor

		$data = array(	
				'name'	=>	'txtcodigo' , 
				'id'	=>	'codigo',
				'class'	=>	"form-control form-control-sm busqueda-cliente",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';


		//
		$options = array( 0 => ' - Busqueda - ', 1 => 'NACIONAL' , 2 => 'INTERNACIONAL');
		                       
		$adicional = 'class="form-control form-control-sm busqueda-cliente"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cbotipocliente', $options, 0 ,$adicional).'</div>';


		//nro documento
		$data = array(	
				'name'	=>	'txtruc' , 
				'id'	=>	'ruc',
				'class'	=>	"form-control form-control-sm busqueda-cliente",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

		//apellidos
		$data = array(	
				'name'	=>	'txtrazon' , 
				'id'	=>	'razon',
				'class'	=>	"form-control form-control-sm busqueda-cliente",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

		//direccion
		$data = array(	
				'name'	=>	'txtdireccion' , 
				'id'	=>	'direccion',
				'class'	=>	"form-control form-control-sm busqueda-cliente",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

		//Pais
		$options = array( 0 => ' - Busqueda - ');
		 foreach ($aListaPais as $key => $row) {
		 	$options [$row['id_pais']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-cliente" id="pais"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboPais', $options, 0 ,$adicional).'</div>';


		//Departamento
		$options = array( 0 => ' - Busqueda - ');
		
		$adicional = 'class="form-control form-control-sm busqueda-cliente" id="ciudad"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboCiudad', $options, 0 ,$adicional).'</div>';

	

		//Estado
		$options = array( -1 => ' - Busqueda - ');
		 foreach ($aListaEstado as $key => $row) {
		 	$options [$row['id_estado']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-cliente"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboListaEstado', $options, -1 ,$adicional).'</div>';

	?>

	</div>

	<?= form_close();?>
				