
	<!-- campos del formulario-->
	<!-- FORMULARIO -->
	<?= form_open(base_url().'', array(
	    'name' => 'form_busquedaguiarecepcionmp',
	    'id'=>'form_busquedaguiarecepcionmp',
	    'class'=> 'form-busquedaguiarecepcionmp',
	    'role' => 'form'
	));

	?>
	
	<div class="form-group col-12 row2 tbus_div" >   

	<?php
		//ID DE productor

		$data = array(	
				'name'	=>	'txtnroguia' , 
				'id'	=>	'nroguia',
				'class'	=>	"form-control form-control-sm busqueda-guiarecepcionmp",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';

		$data = array(	
				'name'	=>	'txtcodigosocio' , 
				'id'	=>	'codigosocio',
				'class'	=>	"form-control form-control-sm busqueda-guiarecepcionmp",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';

		//
		$options = array( 0 => ' - Busqueda - ');
		foreach ($aListaTipoDoc as $key => $row) {
		 	$options [$row['id_tipo_documento']] = $row['descripcion'];
		}
		                       
		$adicional = 'class="form-control form-control-sm busqueda-guiarecepcionmp"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cbotipodocumento', $options, 0 ,$adicional).'</div>';

				$data = array(	
				'name'	=>	'txtnrodoc' , 
				'id'	=>	'nrodoc',
				'class'	=>	"form-control form-control-sm busqueda-guiarecepcionmp",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';

		$data = array(	
				'name'	=>	'txtnombrerazon' , 
				'id'	=>	'nombrerazon',
				'class'	=>	"form-control form-control-sm busqueda-guiarecepcionmp",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-4 col-form-label ">'.form_input($data).'</div>';


        $data = array(
                'name'			=>	'txtfecguia' , 
                'value'			=> '',
                'id'			=>	'fecguia',
                'class'			=>	"form-control form-control-sm busqueda-guiarecepcionmp",
                'placeholder'	=> 'Fecha ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#fecguia",
                'autocomplete' => 'off'
                );

        echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';



		//Estado
		$options = array( -1 => ' - Busqueda - ');
		 foreach ($aListaEstado as $key => $row) {
		 	$options [$row['id_estado']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-guiarecepcionmp"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cboListaEstado', $options, -1 ,$adicional).'</div>';

	?>

	</div>

	<?= form_close();?>
				