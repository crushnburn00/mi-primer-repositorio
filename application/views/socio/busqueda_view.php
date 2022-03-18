
	<!-- campos del formulario-->
	<!-- FORMULARIO -->
	<?= form_open(base_url().'', array(
	    'name' => 'form_busquedasocio',
	    'id'=>'form_busquedasocio',
	    'class'=> 'form-busquedasocio',
	    'role' => 'form'
	));

	?>
	
	<div class="form-group col-12 row2 tbus_div" >   

	<?php
		//ID

		$data = array(	
				'name'	=>	'txtcodigo' , 
				'id'	=>	'codigo',
				'class'	=>	"form-control form-control-sm busqueda-socio",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';

		//ID PRODUCTOR
		$data = array(	
				'name'	=>	'txtcodigoprod' , 
				'id'	=>	'codigoprod',
				'class'	=>	"form-control form-control-sm busqueda-socio",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';


		//TIPO DOC
		$options = array( 0 => ' - Busqueda - ');
		 foreach ($aListaTipoDoc as $key => $row) {
		 	$options [$row['id_tipo_documento']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-socio"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cbotipodocumento', $options, 0 ,$adicional).'</div>';


		//nro documento
		$data = array(	
				'name'	=>	'txtnrodocumento' , 
				'id'	=>	'nrodocumento',
				'class'	=>	"form-control form-control-sm busqueda-socio",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

		//apellidos
		$data = array(	
				'name'	=>	'txtNombre_razon' , 
				'id'	=>	'nombre_razon',
				'class'	=>	"form-control form-control-sm busqueda-socio",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-3 col-form-label ">'.form_input($data).'</div>';


		//FECHA INICIO
        $data = array(
                'name'			=>	'txtFecIni' , 
                'value'			=> '',
                'id'			=>	'fecIniBus',
                'class'			=>	"form-control form-control-sm busqueda-socio",
                'placeholder'	=> 'Desde ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#fecIniBus",
                'autocomplete' => 'off'
                );

        echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';

         //FECHA FIN
        $data = array(
                'name'			=>	'txtFecFin' , 
                'value'			=> '',
                'id'			=>	'fecFinBus',
                'class'			=>	"form-control form-control-sm busqueda-socio",
                'placeholder'	=> 'Hasta ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#fecFinBus",
                'autocomplete' => 'off'
                );

        echo '<div class="col-1 col-form-label">'.form_input($data).'</div>';



		//Estado
		$options = array( -1 => ' - Busqueda - ');
		 foreach ($aListaEstado as $key => $row) {
		 	$options [$row['id_estado']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-socio"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboListaEstado', $options, -1 ,$adicional).'</div>';

	    

	?>

	</div>

	<?= form_close();?>
				