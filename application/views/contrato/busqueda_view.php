
	<!-- campos del formulario-->
	<!-- FORMULARIO -->
	<?= form_open(base_url().'', array(
	    'name' => 'form_busquedacontrato',
	    'id'=>'form_busquedacontrato',
	    'class'=> 'form-busquedacontrato',
	    'role' => 'form'
	));

	?>
	
	<div class="form-group col-12 row2 tbus_div" >   

	<?php
		//ID DE productor

		$data = array(	
				'name'	=>	'txtnrocontrato' , 
				'id'	=>	'nrocontrato',
				'class'	=>	"form-control form-control-sm busqueda-contrato",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';

        $data = array(
                'name'			=>	'txtfeccontrato' , 
                'value'			=> '',
                'id'			=>	'feccontrato',
                'class'			=>	"form-control form-control-sm busqueda-contrato",
                'placeholder'	=> 'Fecha ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#feccontrato",
                'autocomplete' => 'off'
                );

        echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';



		//
		$options = array( 0 => ' - Busqueda - ' , 1 => 'ABIERTO' ,2 =>'CERRADO');          	                       
		$adicional = 'class="form-control form-control-sm busqueda-contrato"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboTipoContrato', $options, 0 ,$adicional).'</div>';


		//codigo
		$data = array(	
				'name'	=>	'txtcodigocliente' , 
				'id'	=>	'codigocliente',
				'class'	=>	"form-control form-control-sm busqueda-contrato",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';

		//razon
		$data = array(	
				'name'	=>	'txtrazon' , 
				'id'	=>	'razon',
				'class'	=>	"form-control form-control-sm busqueda-contrato",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

		//producto
		$options = array( 0 => ' - Busqueda - ',	1 =>'CAFE PERGAMINO', 2 =>'CAFE ORO/VERDE' );       	                       
		$adicional = 'class="form-control form-control-sm busqueda-contrato"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cboProducto', $options, 0 ,$adicional).'</div>';


		//tipo produccion
		$options = array( 0 => ' - Busqueda - ',	1 =>'ORGANICO', 2 =>'CONVENCIONAL' );	                       
		$adicional = 'class="form-control form-control-sm busqueda-contrato"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cboTipoProduccion', $options, 0 ,$adicional).'</div>';


		//Departamento
		$options = array( 0 => ' - Busqueda - ');
		 foreach ($aListaCalidad as $key => $row) {
		 	$options [$row['id_calidad']] = $row['descripcion'];
		 }
		
		$adicional = 'class="form-control form-control-sm busqueda-contrato" id=""';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboCalidad', $options, 0 ,$adicional).'</div>';

	

		//Estado
		$options = array( -1 => ' - Busqueda - ');
		 foreach ($aListaEstado as $key => $row) {
		 	$options [$row['id_estado']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-contrato"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboListaEstado', $options, -1 ,$adicional).'</div>';

	?>

	</div>

	<?= form_close();?>
				