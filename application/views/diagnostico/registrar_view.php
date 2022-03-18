
<div class="container div-container">

<div class="col-12" id="validacion_errores_productor"></div>
	      <!-- TITULO DEL FORMULARIO -->
        <div class="col-12 div-encabezado">
                  REGISTRO DE DIAGNOSTICO
		</div>
	        <!-- campos del formulario-->
	        <!-- FORMULARIO -->
			<?= form_open(base_url().'', array(
		        'name' => 'form_diagnostico',
		        'id'=>'form_diagnostico',
		        'class'=> 'form-diagnostico',
		        'role' => 'form'
		    ));
	      	?>

	        <div class = "div-marco">
	       
			    <div class="form-group row" id="form_diagnostico">	

			    	<div class="col-md-2 col-form-label required">Nro de Ficha</div>
						<?php
							$data = array(	
									'name'	=>	'txtNro' , 
									/*'id'	=>	'obs_',*/
									'class'	=>	"form-control form-control-sm",
									'placeholder'=> '',
									'autocomplete' => 'off'
									);
							echo '<div class="col-md-4 col-form-label">'.form_input($data).'</div>';
						?>

			     <label  class="col-md-2 col-form-label required">Fecha Diagnostico</label>

                    <?php

                    $data = array(
                            'name'			=>	'txtFec' , 
                            'value'			=> '',
                            'id'			=>	'fec',
                            'class'			=>	"form-control form-control-sm datetimepicker-input",
                            'placeholder'	=> '',
                            'data-toggle'	=> 'datetimepicker',
                            'data-target' 	=> "#fec",
                            'autocomplete' => 'off'
                            );

                    echo '<div class="col-md-4 row no-gutters">
                            <div class="col-11">'.form_input($data).'</div>
                            <div class="col-1" id="icon-delete-fecEmision"><span class="icon-spinner11"></span></div>
                            </div>';
                    ?>		

                    <div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> Evaluación de las Normas: ORGANICAS, SOCIALES Y SOSTENIBLES </div>
					</div>

					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> DATOS GENERALES DEL SOCIO </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>

                    <div  class="col-md-2 col-form-label">Codigo de Productor</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['codigo_socio'];?></div>
					</div>

					<div  class="col-md-2 col-form-label"><?=$aDatoGeneral[0]['tipo_documento'];?></div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['nro_documento'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Nombre / Razon Social</div>
                    <div class="col-md-10 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['nombre_razon'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Nro de Celular</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['telefono_celular'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Edad</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['edad'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Idioma</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['idioma'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Nro Hijos</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['cantidad_hijos'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Genero</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['genero'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Grados de Estudios</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['grado_estudio'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Lugar de Nacimiento</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['lugar_nacimiento'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Año de ingreso a la zona</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['anio_ingreso_zona'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Religión</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['religion'];?></div>
					</div>


					<div  class="col-md-2 col-form-label">Estado Civil</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['estado_civil'];?></div>
					</div>


				<?php 
					if($aDatoGeneral[0]['tipo_documento_cony'] !== null): ?>
						<div  class="col-md-3 col-form-label"><?=$aDatoGeneral[0]['tipo_documento_cony'];?> Conyugue</div>
		                <div class="col-md-3 row no-gutters">
							<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['nro_documento_cony'];?></div>
						</div>

						<div  class="col-md-3 col-form-label">Edad Conyugue</div>
		                <div class="col-md-3 row no-gutters">
							<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['edad_cony'];?></div>
						</div>

						<div  class="col-md-3 col-form-label">Nombre / Razon Social Conyugue</div>
		                <div class="col-md-9 row no-gutters">
							<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['nombre_razon_cony'];?></div>
						</div>

						<div  class="col-md-3 col-form-label">Nro de Celular Conyugue</div>
		                <div class="col-md-3 row no-gutters">
							<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['telefono_celular_cony'];?></div>
						</div>

						<div  class="col-md-3 col-form-label">Grados de Estudios Conyugue</div>
		                <div class="col-md-3 row no-gutters">
							<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['grado_estudio_cony'];?></div>
						</div>

						<div  class="col-md-3 col-form-label">Lugar de Nacimiento Conyugue</div>
		                <div class="col-md-3 row no-gutters">
							<div class="col-12 form-control form-control-sm input-readonly"><?=$aDatoGeneral[0]['lugar_nacimiento_cony'];?></div>
						</div>

				<?php endif; ?>


					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> DATOS DE LA UNIDAD PRODUCTIVA </div>
					</div>

					<div  class="col-md-2 col-form-label">Nombre</div>
                    <div class="col-md-10 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['nombre'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Departamento</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['departamento'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Provincia</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['provincia'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Distrito</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['distrito'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Zona</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['zona'];?></div>
					</div>					

					<div  class="col-md-2 col-form-label">Latitud</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['latitud_gmd'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Longitud</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['longitud_gmd'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Altitud</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['altitud'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Cultivo</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['cultivo'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Precipitacion</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['precipitacion'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Fuente de Energia</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['energia'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Fuente de Agua</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['agua'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Internet</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['desc_internet'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">N° personal de cosecha</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['cant_personal_cosecha'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">N° Animales menores</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['cant_animales'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Material de vivienda</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['vivienda'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Señal Telefónica</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['telefonia'];?></div>
					</div>

					<div  class="col-md-2 col-form-label">Suelo</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['suelo'];?></div>
					</div>

					<div  class="col-md-6 col-form-label"></div>				

					<div  class="col-md-2 col-form-label">Establecimiento de Salud</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['desc_establecimiento_salud'];?></div>
					</div>	

					<div  class="col-md-2 col-form-label">Tiempo de la unidad al centro de Salud</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['tiempo_centro_salud'];?></div>
					</div>						

					<div  class="col-md-2 col-form-label">Centro Educativo</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['desc_centro_educativo'];?></div>
					</div>	

					<div  class="col-md-6 col-form-label"></div>	

					<div  class="col-md-6 col-form-label">Vias de acceso del centro de acopio hasta la unidad productiva</div>
                    <div class="col-md-6 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['vias_acceso'];?></div>
					</div>	

					<div  class="col-md-2 col-form-label">Distancia KM</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['distancia_km'];?></div>
					</div>			

					<div  class="col-md-2 col-form-label">Tiempo total</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['tiempo'];?></div>
					</div>	

					<div  class="col-md-2 col-form-label">Medio de transporte</div>
                    <div class="col-md-4 row no-gutters">
						<div class="col-12 form-control form-control-sm input-readonly"><?=$aFinca[0]['medio_transporte'];?></div>
					</div>						
					<?php

						echo form_hidden('txtid', $aFinca[0]['id_finca']);
					?>

					<br/><br/>
					<div class="col-12 row2">
                    	<div class="col-md-8 bold encabezado1"> INFRAESTRUCTURA DE LA UNIDAD PRODUCTIVA </div>
                    	<div class="col-md-4 bold encabezado1"> Observaciones </div>
					</div>

					<div class="col-12 row2">
						
						<?php

						$dataRad = array(	
								'class'	=>	"form-control form-control-sm",
								'checked'=> false
								);
						$data = array(	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						$i = 0;
						foreach ($aCuestionario1 as $key => $row) {

							$dataRad['name'] 	= 'radPregunta_'.$i;
							$data['name'] 		= 'txtObsPregunta_'.$i;

						 	$html  = '<div class="col-md-3 col-form-label">'.$row['descripcion'].'</div>';
						 	$dataRad['value'] = 1;
						 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Excelente</div>';
						 	$dataRad['value'] = 2;
						 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Bueno</div>';
						 	$dataRad['value'] = 3;
						 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Regular</div>';
						 	$dataRad['value'] = 4;
						 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Malo</div>';
						 	$dataRad['value'] = 5;
						 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Pesimo</div>';
						 	$html .= '<div class="col-md-4 col-form-label">'.form_input($data).'</div>';
						 	echo $html;

						 	echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);
						 	$i++;
						}

						echo form_hidden('txtTotalPregunta',$i);

						echo '<div class="col-md-12 col-form-label">OBSERVACIONES O DETALLES (Herramientas u otra infraestructura, estado, etc):</div>';
						$data = array(
						        'name'        => 'txtobsinfra',
						        'id'          => 'obsinfra',
						        'rows'        => '3',
						        'class'	=>	"form-control form-control-sm required-input"
						);

						echo '<div class="col-md-12 col-form-label">'.form_textarea($data).'</div>';

						?>

					</div>


					<div class="col-12 row2">
                    	<div class="col-md-10 bold encabezado1"> DATOS DE CAMPO </div>
                    	<button class="btn btn-sm btn-primary  col-md-2" name='btnAdicionarFilaCampo' value='Editar' id='btnAdicionarFilaCampo'>
							<i class="icon-plus"></i> Añadir Fila
						</button>

					</div>

					<div class="col-12 row2" id="div_campo_total">
						<div class="col-12 row row_div2" id="div_thead_campo">
	                    	<div  class="col-1 col-form-label bold thead_div1">Area Total</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Area de café en Producción</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Crecimiento</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Bosque</div>
	                    	<div  class="col-1 col-form-label bold thead_div1">Purma</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Pan llevar</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Vivienda</div>
                    	</div>

                    	<div class="col-12 row row_div2 class_filaDato" id="divCampoTotal_0">
                    	<?php

						$data = array(	
								'name'	=>	'txtCampoTotal1_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-1" id="">'.form_input($data).'</div>';


						$data = array(	
								'name'	=>	'txtCampoTotal2_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-2 " id="">'.form_input($data).'</div>';


						$data = array(	
								'name'	=>	'txtCampoTotal3_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-2" id="">'.form_input($data).'</div>';


						$data = array(	
								'name'	=>	'txtCampoTotal4_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-2 " id="">'.form_input($data).'</div>';


						$data = array(	
								'name'	=>	'txtCampoTotal5_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-1 " id="">'.form_input($data).'</div>';


						$data = array(	
								'name'	=>	'txtCampoTotal6_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-2 " id="">'.form_input($data).'</div>';



						$data = array(	
								'name'	=>	'txtCampoTotal7_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-2">'.form_input($data).'</div>';

						?>
						</div>
					</div>



					<div class="col-12 row2" id="div_campo_detalle">
						<div class="col-12 row row_div2" id="div_thead_campo">
	                    	<div  class="col-1 col-form-label bold thead_div1">Lote</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Hectáreas</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Variedad</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Edad</div>
	                    	<div  class="col-1 col-form-label bold thead_div1">Cosecha (meses)</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Cosecha Año Anterior</div>
	                    	<div  class="col-2 col-form-label bold thead_div1">Cosecha Año Actual</div>
                    	</div>
						<div class="col-12 row row_div2" id="div_filaCampo">
							<?=form_hidden('txtidcampo', -1);?>
						</div>

					</div>

					<div class="col-12 row2" id="">
						<div class="col-12 row row_div2 class_filaCampo" id="div_filaCampo_Total">
	                    	<?php
							
							echo '<div class="col-1" id="">Total</div>';


							$data = array(	
									'name'	=>	'txtinput2_Total' , 
									'class'	=>	"form-control form-control-sm",
									'autocomplete' => 'off',
									//'readonly' => 'readonly'
									);
							
							echo '<div class="col-2 " id="">'.form_input($data).'</div>';


							$data = array(	
									'name'	=>	'txtinput3_Total' , 
									'class'	=>	"form-control form-control-sm",
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-2" id="">'.form_input($data).'</div>';


							$data = array(	
									'name'	=>	'txtinput4_Total' , 
									'class'	=>	"form-control form-control-sm",
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-2 " id="">'.form_input($data).'</div>';


							$data = array(	
									'name'	=>	'txtinput5_Total' , 
									'class'	=>	"form-control form-control-sm",
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-1 " id="">'.form_input($data).'</div>';


							$data = array(	
									'name'	=>	'txtinput6_Total' , 
									'class'	=>	"form-control form-control-sm",
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-2 " id="">'.form_input($data).'</div>';



							$data = array(	
									'name'	=>	'txtinput7_Total' , 
									'class'	=>	"form-control form-control-sm",
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-2">'.form_input($data).'</div>';

							?>
						</div>
					</div>

						
					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> COSTO DE PRODUCCIÓN </div>
					</div>

					<div class="col-12 row2">
						<div  class="col-md-3 col-form-label thead_div_inspeccion">Actividades</div>
						<div  class="col-md-2 col-form-label thead_div_inspeccion">Hectáreas</div>
						<div  class="col-md-2 col-form-label thead_div_inspeccion">Costo/Has</div>
						<div  class="col-md-2 col-form-label thead_div_inspeccion">Costo/Total</div>
						<div  class="col-md-3 col-form-label thead_div_inspeccion">Observaciones</div>
					</div>

					<div class="col-12 row2">
						
						<?php

						$data = array(	 
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						$i = 0;
						foreach ($aCuestionario2 as $key => $row) {
							$class = "form-control form-control-sm calcularCosto ";
							
						 	$html  = '<div class="col-md-3 col-form-label">'.$row['descripcion'].'</div>';
						 	$data['name'] 		= 'txthectareas_'.$i;
						 	$data['class'] 		= $class.'calcHectareas';
						 	$html .= '<div class="col-md-2 col-form-label">'.form_input($data).'</div>';
						 	$data['name'] 		= 'txtcostohas_'.$i;
						 	$data['class'] 		= $class.'calcHas';
						 	$html .= '<div class="col-md-2 col-form-label">'.form_input($data).'</div>';
						 	$data['name'] 		= 'txtcostototal_'.$i;
						 	$data['class'] 		= $class;
						 	$data['readonly'] 	= 'readonly';
						 	$html .= '<div class="col-md-2 col-form-label">'.form_input($data).'</div>';
						 	$data['name'] 		= 'txtobscosto_'.$i;
						 	unset($data['readonly']);
						 	$html .= '<div class="col-md-3 col-form-label">'.form_input($data).'</div>';
						 	echo $html;

						 	echo form_hidden('txtidPreguntacosto_'.$i, $row['id_pregunta']);
						 	$i++;
						}

						echo form_hidden('txtTotalPreguntaCosto',$i);

						$data = array(	
								'class'	=>	"form-control form-control-sm",
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						$i = 'Total';
							
						 	$html  = '<div class="col-md-3 col-form-label">Total</div>';
						 	$data['name'] 		= 'txthectareasTotal';
						 	$html .= '<div class="col-md-2 col-form-label">'.form_input($data).'</div>';
						 	$data['name'] 		= 'txtcostohasTotal';
						 	$html .= '<div class="col-md-2 col-form-label">'.form_input($data).'</div>';
						 	$data['name'] 		= 'txtcostototalTotal';
						 	$html .= '<div class="col-md-2 col-form-label">'.form_input($data).'</div>';
						 	$html .= '<div class="col-md-3 col-form-label"></div>';
						 	echo $html;


						$data = array(	
								'name'	=>	'txtPromedio' , 
								/*'id'	=>	'obs_',*/
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						echo '<div class="col-md-8 col-form-label">¿Cuánto es el ingreso promedio mensual del socio incluyendo todos los conceptos? S/.</div>
							<div class="col-md-4 col-form-label">'.form_input($data).'</div>';
						
						?>

						<div class="col-md-12 col-form-label bold">Concepto de Ingreso</div>
						<div class="col-md-2 col-form-label">Agricultura S/</div>
						<?php
							$data = array(	
									'name'	=>	'txtAgricultura' , 
									/*'id'	=>	'obs_',*/
									'class'	=>	"form-control form-control-sm",
									'placeholder'=> '',
									'autocomplete' => 'off'
									);
							echo '<div class="col-md-2 col-form-label">'.form_input($data).'</div>';
						?>
						<div class="col-md-2 col-form-label">Bodega S/</div>
						<?php
							$data = array(	
									'name'	=>	'txtBodega' , 
									/*'id'	=>	'obs_',*/
									'class'	=>	"form-control form-control-sm",
									'placeholder'=> '',
									'autocomplete' => 'off'
									);
							echo '<div class="col-md-2 col-form-label">'.form_input($data).'</div>';
						?>
						<div class="col-md-2 col-form-label">Transporte S/</div>
						<?php
							$data = array(	
									'name'	=>	'txtTransporte' , 
									/*'id'	=>	'obs_',*/
									'class'	=>	"form-control form-control-sm",
									'placeholder'=> '',
									'autocomplete' => 'off'
									);
							echo '<div class="col-md-2 col-form-label">'.form_input($data).'</div>';
						?>

						<div class="col-md-2 col-form-label">Otro</div>
						<?php
							$data = array(	
									'name'	=>	'txtOtros' , 
									/*'id'	=>	'obs_',*/
									'class'	=>	"form-control form-control-sm",
									'placeholder'=> '',
									'autocomplete' => 'off'
									);
							echo '<div class="col-md-10 col-form-label">'.form_input($data).'</div>';
						?>

						<div class="col-md-4 col-form-label">Cuenta con préstamos ¿Qué entidades?</div>
						<?php
							$data = array(	
									'name'	=>	'txtPrestamos' , 
									/*'id'	=>	'obs_',*/
									'class'	=>	"form-control form-control-sm",
									'placeholder'=> '',
									'autocomplete' => 'off'
									);
							echo '<div class="col-md-8 col-form-label">'.form_input($data).'</div>';
						?>

					</div>		

					<div class="col-md-2 col-form-label">Responsable de Area</div>
					<?php
                    
                        $options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaResponsable as $key => $row) {
					    	//$options[$row['id_inspector']] = $row['descripcion'];
					    	$options[$row['id_responsable_area']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="responsable_area"';

						echo '<div class="col-md-4 row no-gutters"  id="div-responsable_area">
                            <div class="col-11">'.form_dropdown('cboResponsable', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-responsable_area"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txtresponsable_area_nom' , 
								'id'	=>	'responsable_area1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nombres',
								'autocomplete' => 'off'
								);
                        $data2 = array(	
								'name'	=>	'txtresponsable_area_ape' , 
								'id'	=>	'responsable_area2',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Apellidos',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-responsable_area1">
                            <div class="col-5">'.form_input($data).'</div>
                            <div class="col-5">'.form_input($data2).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-responsable_area"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-responsable_area"><span class="icon-cross"></span></div>
                            </div>';
                    ?>  
                    <div class="col-md-2 col-form-label">Tecnico de Campo</div>
					<?php

                        $options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaTecnico as $key => $row) {
					    	//$options[$row['id_inspector']] = $row['descripcion'];
					    	$options[$row['id_tecnico_campo']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="tecnico_campo"';

						echo '<div class="col-md-4 row no-gutters"  id="div-tecnico_campo">
                            <div class="col-11">'.form_dropdown('cboTecnicoCampo', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-tecnico_campo"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txttecnico_campo_nom' , 
								'id'	=>	'tecnico_campo1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nombres',
								'autocomplete' => 'off'
								);
                        $data2 = array(	
								'name'	=>	'txttecnico_campo_ape' , 
								'id'	=>	'tecnico_campo2',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Apellidos',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-tecnico_campo1">
                            <div class="col-5">'.form_input($data).'</div>
                            <div class="col-5">'.form_input($data2).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-tecnico_campo"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-tecnico_campo"><span class="icon-cross"></span></div>
                            </div>';

                    ?> 


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