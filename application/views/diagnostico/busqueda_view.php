
	<!-- campos del formulario-->
	<!-- FORMULARIO -->
	<?= form_open(base_url().'', array(
	    'name' => 'form_busquedadiagnostico',
	    'id'=>'form_busquedadiagnostico',
	    'class'=> 'form-busquedadiagnostico',
	    'role' => 'form'
	));

	?>
	
	<div class="form-group col-12 row2 tbus_div" >   

	<?php
		//ID DE finca

		$data = array(	
				'name'	=>	'txtcodigo' , 
				'id'	=>	'codigo',
				'class'	=>	"form-control form-control-sm busqueda-diagnostico",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-4 col-form-label ">'.form_input($data).'</div>';


		//FECHA Emision
        $data = array(
                'name'			=>	'txtFecIni' , 
                'value'			=> '',
                'id'			=>	'fecIni',
                'class'			=>	"form-control form-control-sm busqueda-diagnostico",
                'placeholder'	=> 'Desde ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#fecIni",
                'autocomplete' => 'off'
                );

        echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

        //FECHA Expiracion
        $data = array(
                'name'			=>	'txtFecFin' , 
                'value'			=> '',
                'id'			=>	'fecFin',
                'class'			=>	"form-control form-control-sm busqueda-diagnostico",
                'placeholder'	=> 'Hasta ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#fecFin",
                'autocomplete' => 'off'
                );

        echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';




		//estado
		$options = array( -1 => ' - Busqueda - ');
		 foreach ($aListaEstado as $key => $row) {
		 	$options [$row['id_estado']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-diagnostico" id="estado"';

		echo '<div class="col-4 col-form-label">'.form_dropdown('cboEstado', $options, -1 ,$adicional).'</div>';		

        echo form_hidden('txtid', $iddiagnostico);
	   
	?>

	</div>

	<?= form_close();?>
				