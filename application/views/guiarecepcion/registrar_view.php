<div class="container div-container">

    <div class="col-12" id="validacion_errores_cliente"></div>
    <!-- TITULO DEL FORMULARIO -->
    <div class="col-12 div-encabezado">
        REGISTRO DE GUIA DE RECEPCIÓN
    </div>
    <!-- campos del formulario-->
    <!-- FORMULARIO -->
    <?php 
       echo form_open(base_url() . '', array(
            'name' => 'form_guiarecepcionmp',
            'id' => 'form_guiarecepcionmp',
            'class' => 'form_guiarecepcionmp',
            'role' => 'form'
        ));

        echo form_hidden('txtidsocio', '');
        echo form_hidden('txtidcontrato', $saldoAsignarContrato[0]['p_id_contrato']);
        echo form_hidden('txtcerrar', '');

    ?>
    <div class="div-marco">
                <!-- <label class="col-md-4 col-form-label bold" style="border-width: thin;border-style: solid;margin-top: 0px;margin-bottom: 0px;padding-top: 5px;height: 30px;">N° GUIA RECEPCION</label><label class="col-md-3 col-form-label">GR-0024</label> -->
            <label class="col-md-2 col-form-label bold" >Fecha</label>
            <label class="col-md-4 col-form-label"><?php $hoy = date("d/m/Y"); echo($hoy); ?></label>
            <label class="col-md-2 col-form-label bold" >Estado</label>
            <label class="col-md-3 col-form-label">Recepcionado</label>
    </div>
            


    
    <div class="div-marco">
        <div class="form-group row">
            <div class="col-12 row2">
                <div class="col-md-12 bold "> DATOS DEL PROVEEDOR </div>
            </div>

            <div class="col-md-12 bold" id="msj-busubi"></div>

            <label class="col-md-2 col-form-label required" id="">Doc.Identidad</label>

            <?php

            $data = array(
                'name'    =>    'txtdocidentidad',
                'id'    =>    'docidentidad',
                'class'    =>    "form-control form-control-sm",
                'placeholder' => '',
                'autocomplete' => 'off'
            );

            echo '<div class="col-md-4 row no-gutters" id="divdocidentidad">
				<div class="col-12">' . form_input($data) . '</div>
				</div>';

            
            ?>

            <label class="col-md-2 col-form-label"> Departamento </label>

            <?php

	            $data = array(
	                'name'     =>  'txtdepartamento',
	                'id'       =>  'departamento',
	                'class'    =>  "form-control form-control-sm",
	                'disabled' =>  'disabled'
	            );

            	echo '<div class="col-md-4 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>
            <div class="col-md-12 bold font_min" id="msj-docidentidad"></div>

			<label class="col-md-2 col-form-label">Nombre</label>

            <?php
            $data = array(
                'name'    	=>  'txtnombre',
                'id'    	=>  'nombre',
                'class'    	=>  "form-control form-control-sm",
	            'disabled' 	=>  'disabled'
            );

            echo '<div class="col-md-4 row no-gutters">
                <div class="col-12">' . form_input($data) . '</div>
                </div>';
            ?>

            <label class="col-md-2 col-form-label"> Provincia </label>

            <?php

	            $data = array(
	                'name'          =>  'txtprovincia',
	                'id'            =>  'provincia',
	                'class'         =>  "form-control form-control-sm",
	                'disabled' 		=>  'disabled'
	            );

            	echo '<div class="col-md-4 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>

			<label class="col-md-2 col-form-label required">Tipo</label>

            <?php
                $options = array( 0 => ' - Seleccionar - ' , 1 => 'SOCIO' , 2 => 'TERCEROS');
				$adicional = 'class="form-control form-control-sm" id="tipo"';

				echo '<div class="col-md-4 row no-gutters">
                            <div class="col-12">'.form_dropdown('cboTipo', $options, 0 ,$adicional).'</div>
                 </div>';

            ?>

            <label class="col-md-2 col-form-label"> Distrito </label>

            <?php

	            $data = array(
	                'name'      =>    'txtdistrito',
	                'id'        =>    'distrito',
	                'class'     =>    "form-control form-control-sm",
	             'disabled'  	=>  'disabled'
	            );

            	echo '<div class="col-md-4 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>
            
			<label class="col-md-2 col-form-label">Codigo</label>

            <?php
            $data = array(
                'name'    	 =>    'txtcodigo',
                'id'    	 =>    'codigo',
                'class'   	 =>    "form-control form-control-sm",
	             'disabled'  =>  'disabled'
            );

            echo '<div class="col-md-4 row no-gutters">
                <div class="col-12">' . form_input($data) . '</div>
                </div>';
            ?>

            <label class="col-md-2 col-form-label"> Zona </label>

            <?php

	            $data = array(
	                'name'  	=>    'txtzona',
	                'id'   		=>    'zona',
	                'class'     =>    "form-control form-control-sm",
	             	'disabled'  =>  'disabled'
	            );

            	echo '<div class="col-md-4 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>

			<label class="col-md-2 col-form-label">Finca</label>

            <?php

                $options = array( 0 => ' - Seleccionar - ');
				$adicional = 'class="form-control form-control-sm" id="finca"';

				echo '<div class="col-md-4 row no-gutters">
                            <div class="col-12">'.form_dropdown('cboFinca', $options, 0 ,$adicional).'</div>
                 </div>';


            ?>

            <label class="col-md-2 col-form-label"> Certificacion </label>

            <?php

	            $data = array(
	                'name'       =>    'txtcertificacion',
	                'id'         =>    'certificacion',
	                'class'      =>    "form-control form-control-sm",
	             'disabled' 	 =>  'disabled'
	            );

            	echo '<div class="col-md-4 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>
            <label class="col-md-2 col-form-label text-danger"> Estimado (Kgs) </label>
            <label class="col-md-2 col-form-label"> Total </label>
            <label class="col-md-2 col-form-label"> Saldo pendiente </label>
            <label class="col-md-6 col-form-label"></label>
            <label class="col-md-2 col-form-label"></label>

            <?php

	            $data = array(
	                'name'       =>    'txttotalfincaanual',
	                'id'         =>    'totalfincaanual',
	                'class'      =>    "form-control form-control-sm ",
	             'disabled' 	 =>  'disabled',
	            );

            	echo '<div class="col-md-2 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>
           

            <?php

	            $data = array(
	                'name'       =>    'txtsaldofincaanual',
	                'id'         =>    'saldofincaanual',
	                'class'      =>    "form-control form-control-sm",
	             'disabled' 	 =>  'disabled'
	            );

            	echo '<div class="col-md-2 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>

        </div>
    </div>


    <div class="div-marco">
        <div class="form-group row">
            <div class="col-12 row2">
                <div class="col-md-12 bold "> DATOS DEL PRODUCTO </div>
            </div>

            <div class="col-md-12 bold" id="msj-busubi"></div>
            <label class="col-md-2 col-form-label required">Producto</label>
            <?php
            $options = array(0 => ' - Seleccionar - ', 3 => 'CAFE PERGAMINO', 4 => 'CAFE ORO/VERDE');
            $adicional = 'class="form-control form-control-sm" id="producto"';

            echo '<div class="col-md-2">' . form_dropdown('cboProducto', $options, 0, $adicional) . '</div>';
            ?>



            <label  class="col-md-2 col-form-label required">Fec. de Cosecha</label>
						<?php
							$data = array(	
									'name'			=>	'txtfeccosecha' , 
									'id'			=>	'feccosecha',
									'class'			=>	"form-control form-control-sm datetimepicker-input",
									'placeholder'	=> '',
									'autocomplete' 	=> 'off',
		                            'data-toggle'	=> 'datetimepicker',
		                            'data-target' 	=> "#feccosecha",
									);
							
							echo '<div class="col-md-2 row no-gutters">
									<div class="col-12">'.form_input($data).'</div>
								</div>';
						?>



			<label class="col-md-1 col-form-label text-right text-danger"> Asignado (kgs) </label><label class="col-md-1 col-form-label text-right"> Total KG Pergamino </label>
            <?php
	            $data = array(
	                'name'		  => 'txttotalkgpergamino',
	                'id'          => 'totalkgpergamino',
	                'class'       => "form-control form-control-sm",
	             	'disabled' 	 =>  'disabled',
	             	'value'		=> number_format($saldoAsignarContrato[0]['p_total_kg_pergamino'],2,".","")
	            );
            	echo '<div class="col-md-2 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>



            <label class="col-md-2 col-form-label">Subproducto</label>
            <?php
            $options = array(0 => ' - Seleccionar - ');
			/*$options = array(0 => ' - Seleccionar - ', 1 => 'SECO');*/
            $adicional = 'class="form-control form-control-sm" id="subproducto"';

            echo '<div class="col-md-2">' . form_dropdown('cboSubProducto', $options, 0, $adicional) . '</div>';
            ?>



            <label class="col-md-2 col-form-label required">Tipo Produccion</label>
            <?php

				$options = array( 0 => ' - Seleccionar - ',	1 =>'ORGANICO', 2 =>'CONVENCIONAL' );
				$adicional = 'class="form-control form-control-sm" id="tipoproduccion"';
						
				echo '<div class="col-md-2">'.form_dropdown('cboTipoProduccion', $options, 0 ,$adicional).'</div>';
            ?> 



						<label class="col-md-2 col-form-label text-right"> % Rendimiento </label>
            <?php
	            $data = array(
	                'name'		=> 'txtrendimiento',
	                'id'          => 'rendimiento',
	                'class'       => "form-control form-control-sm",
	             	'disabled' 	 =>  'disabled',
	             	'value'		=> number_format($saldoAsignarContrato[0]['p_ini_rendimiento'],2,".","")

	            );
            	echo '<div class="col-md-2 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>

            <label class="col-md-8 col-form-label text-right">  </label>

            <label class="col-md-2 col-form-label text-right"> Saldo Pendiente </label>
            <?php
	            $data = array(
	                'name'		=> 'txtsaldopendiente',
	                'id'        => 'saldopendiente',
	                'class'     => "form-control form-control-sm",
	             	'readonly' 	=>  'readonly',
	             	'value'		=> number_format($saldoAsignarContrato[0]['p_saldo_total_kg'],2,".","")
	            );
            	echo '<div class="col-md-2 row no-gutters">
									<div class="col-12">' . form_input($data) . '</div>
									</div>';
            ?>
        

	        <div class="col-12 row2">
	            <div class="col-md-12 bold encabezado1"> PESADO DEL CAFE </div>
			</div>
			<div class="col-12 row2">
				<label class="col-md-4 col-form-label bold"> DETALLE </label>
				<label class="col-md-8 col-form-label bold"> VALORES </label>
			</div>

			<label class="col-md-4 col-form-label required"> Tipo de Empaque</label>
			<?php

					$options = array( 0 => ' - Seleccionar - ',	3 =>'SACOS', 4 =>'LATAS' );
					$adicional = 'class="form-control form-control-sm" id="tipoEmpaque"';
							
					echo '<div class="col-md-8">'.form_dropdown('cboTipoEmpaque', $options, 0 ,$adicional).'</div>';
	         ?>

	         <label class="col-md-4 col-form-label required"> Cantidad </label>
	         <?php
		            $data = array(
		                'name'		=> 'txtcantidad',
		                'id'        => 'cantidad',
		                'class'     => "form-control form-control-sm",
		                'placeholder'=>'',
		                'autocomplete'=>'off'
		            );
	            	echo '<div class="col-md-8 row no-gutters">
										<div class="col-12">' . form_input($data) . '</div>
										</div>';
	            ?>

	         <label class="col-md-4 col-form-label required"> Total Kilos Brutos</label>
	         <?php
		            $data = array(
		                'name'		=> 'txttotalkgbr',
		                'id'        => 'totalkgbr',
		                'class'     => "form-control form-control-sm",
		                'placeholder'=>'',
		                'autocomplete'=>'off'
		            );
	            	echo '<div class="col-md-8 row no-gutters">
										<div class="col-12">' . form_input($data) . '</div>
										</div>';
	            ?>
	         <div class="col-md-12 bold font_min" id="msj-totalkgbr"></div>

	         <label class="col-md-4 col-form-label"> Tara</label>
	         <?php
		            $data = array(
		                'name'		=> 'txttara',
		                'id'        => 'tara',
		                'class'     => "form-control form-control-sm",
		             	'readonly' 	=>  'readonly'
		            );
	            	echo '<div class="col-md-8 row no-gutters">
										<div class="col-12">' . form_input($data) . '</div>
										</div>';
	            ?>

	         <label class="col-md-4 col-form-label"> Total Kilos Neto</label>
	         <?php
		            $data = array(
		                'name'		=> 'txttotalkgnetos',
		                'id'        => 'totalkgnetos',
		                'class'     => "form-control form-control-sm",
		             	'readonly' 	=>  'readonly'
		            );
	            	echo '<div class="col-md-8 row no-gutters">
										<div class="col-12">' . form_input($data) . '</div>
										</div>';
	            ?>
	         <label class="col-md-4 col-form-label"> Observaciones </label>
	         <?php
					$data = array(
						  'name'        => 'txtobspesaje',
						  'id'          => 'obspesaje',
						  'rows'        => '3',
						   'class'	=>	"form-control form-control-sm"
					);

					echo '<div class="col-md-12 col-form-label">'.form_textarea($data).'</div>';
			?>

         </div>



    </div>


    <div class="form-group row">
        <!-- CIERRE DE FORMULARIO -->

        <?php
        foreach ($btn as $key => $row) {
            echo '<div class="col-md-6">';
            echo '<button type ="submit" id="' . $row['id'] . '" value="' . $row['descripcion'] . '" name="' . $row['id'] . '" class="btn btn-sm ' . $row['class'] . '" ' . $row['atributo'] . '>
<i class="' . $row['icon'] . '"></i> ' . $row['descripcion'] . '</button>';
            echo '</div>';
        }
        ?>


    </div>

    <?= form_close(); ?>


</div>
<!--FIN ROW-->
</div>

<!-- FIN REGISTRAR -->