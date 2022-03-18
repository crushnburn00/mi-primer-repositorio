
<div class="container div-container">

<div class="col-12" id="validacion_errores_productor"></div>
	      <!-- TITULO DEL FORMULARIO -->
        <div class="col-12 div-encabezado">
                  REGISTRO DE FINCA
		</div>
	        <!-- campos del formulario-->
	        <!-- FORMULARIO -->
			<?= form_open(base_url().'', array(
		        'name' => 'form_finca',
		        'id'=>'form_finca',
		        'class'=> 'form-finca',
		        'role' => 'form'
		    ));
	      	?>

	        <div class = "div-marco">
	       
			    <div class="form-group row">			

                    <div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> INFORMACION SOCIO </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>

                    <label  class="col-md-2 col-form-label"  id="lblApellido">Codigo</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigo' , 
								'id'	=>	'codigo',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aSocio[0]['codigo'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters"  id="divapellido">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>
                    

                    <label  class="col-md-2 col-form-label" id="lblnrodoc">Nombre / Razon Social</label>

					<?php

						$data = array(	
								'name'	=>	'txtnombre_razon' , 
								'id'	=>	'nombre_razon',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aSocio[0]['nombre_razon'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';

						echo form_hidden('txtid', $aSocio[0]['id_socio']);
					?>
					<br/><br/>
					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> INFORMACION FINCA </div>
					</div>

					<label  class="col-md-2 col-form-label required" style="" id="lblnombre">Nombres</label>

					<?php

						$data = array(	
								'name'	=>	'txtnombre' , 
								'id'	=>	'nombre',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-10 row no-gutters" style="" id="divnombre">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label required">Direccion</label>

					<?php

						$data = array(	
								'name'	=>	'txtdireccion' , 
								'id'	=>	'direccion',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-10 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<div  class="col-md-12 col-form-label hidden no-show" id="validacion_errores_div"></div>

					<label  class="col-md-2 col-form-label required">Departamento</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaDepartamento as $key => $row) {
					    	$options[$row['id_departamento']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="departamento"';

						echo '<div class="col-md-4 row no-gutters"  id="div-departamento">
                            <div class="col-11">'.form_dropdown('cboDepartamento', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-departamento"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txtdepartamento' , 
								'id'	=>	'departamento1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nuevo Departamento',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-departamento1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-departamento"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-departamento"><span class="icon-cross"></span></div>
                            </div>';


                    ?>  

                    <label  class="col-md-2 col-form-label required">Provincia</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
						                       
						$adicional = 'class="form-control form-control-sm" id="provincia"';

						echo '<div class="col-md-4 row no-gutters"  id="div-provincia">
                            <div class="col-11">'.form_dropdown('cboProvincia', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-provincia"><span class="icon-plus"></span></div>
                            </div>';


						$data = array(	
								'name'	=>	'txtprovincia' , 
								'id'	=>	'provincia1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nueva Provincia',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-provincia1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-provincia"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-provincia"><span class="icon-cross"></span></div>
                            </div>';

                    ?>  

 
                    <label  class="col-md-2 col-form-label required">Distrito</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
                     
						$adicional = 'class="form-control form-control-sm" id="distrito"';

						echo '<div class="col-md-4 row no-gutters"  id="div-distrito">
                            <div class="col-11">'.form_dropdown('cboDistrito', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-distrito"><span class="icon-plus"></span></div>
                            </div>';


						$data = array(	
								'name'	=>	'txtdistrito' , 
								'id'	=>	'distrito1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nuevo Distrito',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-distrito1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-distrito"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-distrito"><span class="icon-cross"></span></div>
                            </div>';

                    ?>  

                    <label  class="col-md-2 col-form-label required">Zona</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');                    
						$adicional = 'class="form-control form-control-sm" id="zona"';

						echo '<div class="col-md-4 row no-gutters"  id="div-zona">
                            <div class="col-11">'.form_dropdown('cboZona', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-zona"><span class="icon-plus"></span></div>
                            </div>';

                        $data = array(	
								'name'	=>	'txtzona' , 
								'id'	=>	'zona1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nueva Zona',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-zona1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-zona"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-zona"><span class="icon-cross"></span></div>
                            </div>';
                    ?>  

                    <label  class="col-md-2 col-form-label">Latitud GMD</label>

					<?php

						$data = array(	
								'name'	=>	'txtlatitudgmd' , 
								'id'	=>	'latitudgmd',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> "00° 00' 00,000''",
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">Latitud </label>

					<?php

						$data = array(	
								'name'	=>	'txtlatitud' , 
								'id'	=>	'latitud',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> "+- 00.00000",
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					 <label  class="col-md-2 col-form-label">Longitud GMD</label>

					<?php

						$data = array(	
								'name'	=>	'txtlongitudgmd' , 
								'id'	=>	'longitudgmd',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> "00° 00' 00,000''",
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>




					 <label  class="col-md-2 col-form-label">Longitud </label>

					<?php

						$data = array(	
								'name'	=>	'txtlongitud' , 
								'id'	=>	'longitud',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> "+- 00.00000",
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">Altitud</label>

					<?php

						$data = array(	
								'name'	=>	'txtaltitud' , 
								'id'	=>	'altitud',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

                  <label  class="col-md-2 col-form-label">Material de Vivienda</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aVivienda as $key => $row) {
					    	$options[$row['id_vivienda']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboVivienda', $options, 0 ,$adicional).'</div>';
                    ?>  
 



                    <label  class="col-md-2 col-form-label">Suelo</label>

					<?php

						$data = array(	
								'name'	=>	'txtsuelo' , 
								'id'	=>	'suelo',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">Fuente de Energia</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aEnergia as $key => $row) {
					    	$options[$row['id_energia']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboEnergia', $options, 0 ,$adicional).'</div>';
                    ?>  

                    <label  class="col-md-2 col-form-label">Fuente de Agua</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aAgua as $key => $row) {
					    	$options[$row['id_agua']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboAgua', $options, 0 ,$adicional).'</div>';
                    ?>  

                    <label  class="col-md-2 col-form-label">Nro de Animales Menores</label>

					<?php

						$data = array(	
								'name'	=>	'txtcantanimales' , 
								'id'	=>	'cantanimales',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">Internet</label>
                    
					<?php

						$options = array( -1 => ' - Seleccionar - ', 1 => ' Si ', 0 => ' No ');
           
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboInternet', $options, -1 ,$adicional).'</div>';
                    ?>  


					<label  class="col-md-2 col-form-label">Señal Telefonica</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aTelefonia as $key => $row) {
					    	$options[$row['id_telefonia']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboTelefonia', $options, 0 ,$adicional).'</div>';
                    ?>  


					<label  class="col-md-2 col-form-label">Establecimiento de Salud</label>
                    
					<?php

						$options = array( -1 => ' - Seleccionar - ', 1 => ' Si ', 0 => ' No ');
           
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboSalud', $options, -1 ,$adicional).'</div>';
                    ?>  

                    <label  class="col-md-2 col-form-label">Tiempo de la unidad al Centro de Salud</label>

					<?php

						$data = array(	
								'name'	=>	'txttiempocsalud' , 
								'id'	=>	'tiempocsalud',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

                    <label  class="col-md-2 col-form-label">Centro Educativo</label>
                    
					<?php

						$options = array( -1 => ' - Seleccionar - ', 1 => ' Si ', 0 => ' No ');
           
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboCEducativo', $options, -1 ,$adicional).'</div>';
                    ?>  

                    
					<?php

						$options = '';
					    foreach ($aListaGradoEstudio as $key => $row) {
					    	$options .=  '<input type="checkbox" name="chkGradoEstudio[]" value="'.$row['id_grado_estudio'].'"><label>&nbsp'.$row['descripcion'].'&nbsp&nbsp&nbsp</label>';
					    }
						                       
						echo '<div class="col-md-6">'.$options.'</div>';

                    ?>   


					<label class="col-md-2 col-form-label">Mapa de la finca</span></label>

					<div class="col-md-10 row no-gutters">
					<?php

						$data = array(	
							'name'	=>	'fileAdjMapa[]' , 
							'value'	=>	'' ,
							'id'	=>	'fileAdjMapa',
							'class'	=>	"form-control form-control-sm required-input",
							'placeholder'		=> '',
							'multiple'=>"multiple"
						);
										
						echo ''.form_upload($data).'';
						echo form_hidden('txtruta_archivo', '');
					?>
					</div>

					<label class="col-md-2 col-form-label">Foto Georeferencial</span></label>

					<div class="col-md-10 row no-gutters">
					<?php

						$data = array(	
							'name'	=>	'fileAdjFoto[]' , 
							'value'	=>	'' ,
							'id'	=>	'fileAdjFoto',
							'class'	=>	"form-control form-control-sm required-input",
							'placeholder'		=> '',
							'multiple'=>"multiple"
						);
										
						echo ''.form_upload($data).'';
						echo form_hidden('txtruta_archivo', '');
					?>
					</div>


					<label class="col-md-2 col-form-label">Documentos Adjuntos</span></label>

					<div class="col-md-10 row no-gutters">
					<?php

						$data = array(	
							'name'	=>	'fileAdjuntos[]' , 
							'value'	=>	'' ,
							'id'	=>	'fileAdjuntos',
							'class'	=>	"form-control form-control-sm required-input",
							'placeholder'		=> '',
							'multiple'=>"multiple"
						);
										
						echo ''.form_upload($data).'';
						echo form_hidden('txtruta_archivo', '');
					?>

					</div>

					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> INFORMACION ADICIONAL </div>
					</div>


					<label  class="col-md-6 col-form-label">Vias de acceso del centro de acopio hasta la unidad productiva</label>

					<?php

						$data = array(	
								'name'	=>	'txtvias' , 
								'id'	=>	'vias',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-6 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>



					<label  class="col-md-2 col-form-label">Distancia KM</label>

					<?php

						$data = array(	
								'name'	=>	'txtdistancia' , 
								'id'	=>	'distancia',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label">Tiempo total</label>

					<?php

						$data = array(	
								'name'	=>	'txttiempo' , 
								'id'	=>	'tiempo',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">Medio de transporte</label>

					<?php

						$data = array(	
								'name'	=>	'txtmediotrans' , 
								'id'	=>	'mediotrans',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label">Cultivo</label>

					<?php

						$data = array(	
								'name'	=>	'txtcultivo' , 
								'id'	=>	'cultivo',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label">Precipitación</label>

					<?php

						$data = array(	
								'name'	=>	'txtprecipitacion' , 
								'id'	=>	'precipitacion',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label">Nro personal en cosecha</label>

					<?php

						$data = array(	
								'name'	=>	'txtcantcosecha' , 
								'id'	=>	'cantcosecha',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<div class="col-12 row2">
                    	<div class="col-md-10 bold encabezado1"> INFORMACION ANUAL </div>
                    	<button class="btn btn-sm btn-primary  col-md-2" name='btnAdicionarFila' value='Editar' id='btnAdicionarFila'>
							<i class="icon-plus"></i> Añadir Fila
						</button>

					</div>

					<div class="col-12 row2" id="div_finca_detalle">
						<div class="col-12 row row_div2" id="div_thead_anual">
	                    	<div  class="col-4 col-form-label bold thead_div1 ">Año</div>
	                    	<div  class="col-4 col-form-label bold thead_div1">Estimado Kg</div>
	                    	<div  class="col-4 col-form-label bold thead_div1">Consumido Kg</div>
                    	</div>
                    	<div class="col-12 row row_div2" id="div_fila_inicial">
                    	<?php

                    	echo form_hidden('txtidanual', -1);

						/*$data = array(	
								'name'	=>	'txtinput1_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-4" id="">'.form_input($data).'</div>';
						?>

						<?php

						$data = array(	
								'name'	=>	'txtinput2_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-4 " id="">'.form_input($data).'</div>';
						?>

						<?php

						$data = array(	
								'name'	=>	'txtinput3_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-4 form-group row ">
							<div class="col-10 col-md-11 div_input">'.form_input($data).'</div>
							<div class="col-2 col-md-1 div_icon"></div>
						</div>';*/

						?>
						</div>
					</div>
					                     
				</div>
			</div>


			<div class="form-group row">			
                    <!-- CIERRE DE FORMULARIO -->

                <?php
					foreach ($btn as $key => $row) {
						echo '<div class="col-md-6">';
						echo '<button type ="submit" id="'.$row['id'].'" value="'.$row['descripcion'].'" name="'.$row['id'].'" class="btn btn-sm '.$row['class'].'" '.$row['atributo'].'>
								<i class="'.$row['icon'].'"></i> '.$row['descripcion'].'</button>';
						echo '</div>';
					}
				?>


			</div>

			<?= form_close();?>
				
	
	</div><!--FIN ROW-->
</div>

<!-- FIN REGISTRAR -->