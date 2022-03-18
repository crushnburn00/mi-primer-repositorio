
	<!-- campos del formulario-->
	<!-- FORMULARIO -->
	<?= form_open(base_url().'', array(
	    'name' => 'form_busquedafinca',
	    'id'=>'form_busquedafinca',
	    'class'=> 'form-busquedafinca',
	    'role' => 'form'
	));

	?>
	
	<div class="form-group col-12 row2 tbus_div" >   

	<?php
		//ID DE finca

		$data = array(	
				'name'	=>	'txtidfinca' , 
				'id'	=>	'idfinca',
				'class'	=>	"form-control form-control-sm busqueda-finca",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-1 col-form-label ">'.form_input($data).'</div>';

		//nombre
		$data = array(	
				'name'	=>	'txtNombre' , 
				'id'	=>	'nombre',
				'class'	=>	"form-control form-control-sm busqueda-finca",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

		//Departamento
		$options = array( 0 => ' - Busqueda - ');
		 foreach ($aListaDepartamento as $key => $row) {
		 	$options [$row['id_departamento']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-finca" id="departamento"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cboDepartamento', $options, 0 ,$adicional).'</div>';


		//Provincia
		$options = array( 0 => ' - Busqueda - ');
		
		$adicional = 'class="form-control form-control-sm busqueda-finca" id="provincia"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cboProvincia', $options, 0 ,$adicional).'</div>';

		//Distrito
		$options = array( 0 => ' - Busqueda - ');
		
		$adicional = 'class="form-control form-control-sm busqueda-finca" id="distrito"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cboDistrito', $options, 0 ,$adicional).'</div>';

		//Zona
		$options = array( 0 => ' - Busqueda - ');
		
		$adicional = 'class="form-control form-control-sm busqueda-finca" id="zona"';

		echo '<div class="col-2 col-form-label">'.form_dropdown('cboZona', $options, 0 ,$adicional).'</div>';



		//Estado
		$options = array( -1 => ' - Busqueda - ');
		 foreach ($aListaEstado as $key => $row) {
		 	$options [$row['id_estado']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-finca"';

		echo '<div class="col-1 col-form-label">'.form_dropdown('cboListaEstado', $options, -1 ,$adicional).'</div>';


		echo form_hidden('txtid', $idSocio);

	   
	?>

	</div>

	<?= form_close();?>
				