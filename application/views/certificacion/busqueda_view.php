
	<!-- campos del formulario-->
	<!-- FORMULARIO -->
	<?= form_open(base_url().'', array(
	    'name' => 'form_busquedacertificacion',
	    'id'=>'form_busquedacertificacion',
	    'class'=> 'form-busquedacertificacion',
	    'role' => 'form'
	));

	?>
	
	<div class="form-group col-12 row2 tbus_div" >   

	<?php
		//ID DE finca

		$data = array(	
				'name'	=>	'txtidcertificacion' , 
				'id'	=>	'idfinca',
				'class'	=>	"form-control form-control-sm busqueda-certificacion",
				'placeholder'=> 'Busqueda ... ',
				'autocomplete' => 'off'
				);
		
		echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';


		//tipocertificacion
		$options = array( 0 => ' - Busqueda - ');
		 foreach ($aTipoCertificacion as $key => $row) {
		 	$options [$row['id_tipocertificacion']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-certificacion" id="tipocertificacion"';

		echo '<div class="col-3 col-form-label">'.form_dropdown('cboTipocertificacion', $options, 0 ,$adicional).'</div>';


				//tipocertificacion
		$options = array( 0 => ' - Busqueda - ');
		 foreach ($aEntidadCertificadora as $key => $row) {
		 	$options [$row['id_entidadcertificadora']] = $row['descripcion'];
		 }
		                       
		$adicional = 'class="form-control form-control-sm busqueda-certificadora" id="entidadcertificadora"';

		echo '<div class="col-3 col-form-label">'.form_dropdown('cboEntidadcertificadora', $options, 0 ,$adicional).'</div>';


		//FECHA Emision
        $data = array(
                'name'			=>	'txtFecEmision' , 
                'value'			=> '',
                'id'			=>	'fecEmision',
                'class'			=>	"form-control form-control-sm busqueda-certificacion",
                'placeholder'	=> 'Desde ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#fecEmision",
                'autocomplete' => 'off'
                );

        echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

        //FECHA Expiracion
        $data = array(
                'name'			=>	'txtFecExpiracion' , 
                'value'			=> '',
                'id'			=>	'fecExpiracion',
                'class'			=>	"form-control form-control-sm busqueda-certificacion",
                'placeholder'	=> 'Desde ... ',
                'data-toggle'	=> 'datetimepicker',
                'data-target' 	=> "#fecExpiracion",
                'autocomplete' => 'off'
                );

        echo '<div class="col-2 col-form-label ">'.form_input($data).'</div>';

        echo form_hidden('txtid', $idCertificacion);
	   
	?>

	</div>

	<?= form_close();?>
				