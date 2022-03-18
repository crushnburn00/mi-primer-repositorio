
	<!-- campos del formulario-->
	<!-- FORMULARIO -->
	<?= form_open(base_url().'', array(
	    'name' => 'form_busquedaproductor',
	    'id'=>'form_busquedaproductor',
	    'class'=> 'form-busquedaproductor',
	    'role' => 'form'
	));

	?>
	
	<div class="form-group col-12 row2 tbus_div" >   

	<?php
		//ID DE productor

		$data = array(	
				'name'	=>	'txtcodigo' , 
				'id'	=>	'codigo',
				'class'	=>	"form-control form-control-sm busqueda-productor",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';


		//TIPO productor
		$options = array( 0 => ' - Busqueda - ');
		 foreach ($aListaTipoDoc as $key => $row) {
		 	$options [$row['id_tipo_documento']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-productor"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cbotipodocumento', $options, 0 ,$adicional).'</div>';


		//nro documento
		$data = array(	
				'name'	=>	'txtNrodocumento' , 
				'id'	=>	'nrodocumento',
				'class'	=>	"form-control form-control-sm busqueda-productor",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';

		//apellidos
		$data = array(	
				'name'	=>	'txtNombre_razon' , 
				'id'	=>	'nombre_razon',
				'class'	=>	"form-control form-control-sm busqueda-productor",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

		//Departamento
		$options = array( 0 => ' - Busqueda - ');
		 foreach ($aListaDepartamento as $key => $row) {
		 	$options [$row['id_departamento']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-productor" id="departamento"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboDepartamento', $options, 0 ,$adicional).'</div>';


		//Provincia
		$options = array( 0 => ' - Busqueda - ');
		
		$adicional = 'class="form-control form-control-sm busqueda-productor" id="provincia"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboProvincia', $options, 0 ,$adicional).'</div>';

		//Distrito
		$options = array( 0 => ' - Busqueda - ');
		
		$adicional = 'class="form-control form-control-sm busqueda-productor" id="distrito"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboDistrito', $options, 0 ,$adicional).'</div>';

		//Zona
		$options = array( 0 => ' - Busqueda - ');
		
		$adicional = 'class="form-control form-control-sm busqueda-productor" id="zona"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cboZona', $options, 0 ,$adicional).'</div>';


		//FECHA INICIO
        $data = array(
                'name'			=>	'txtFecIni' , 
                'value'			=> '',
                'id'			=>	'fecIniBus',
                'class'			=>	"form-control form-control-sm busqueda-productor",
                'placeholder'	=> 'Desde ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#fecIniBus",
                'autocomplete' => 'off'
                );

        echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';





		//Estado
		$options = array( -1 => ' - Busqueda - ');
		 foreach ($aListaEstado as $key => $row) {
		 	$options [$row['id_estado']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-productor"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboListaEstado', $options, -1 ,$adicional).'</div>';

		echo '<div class="col-10 col-form-label "></div>';
	     //FECHA FIN
        $data = array(
                'name'			=>	'txtFecFin' , 
                'value'			=> '',
                'id'			=>	'fecFinBus',
                'class'			=>	"form-control form-control-sm busqueda-productor",
                'placeholder'	=> 'Hasta ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#fecFinBus",
                'autocomplete' => 'off'
                );

        echo '<div class="col-1 col-form-label">'.form_input($data).'</div>';
	?>

	</div>

	<?= form_close();?>
				