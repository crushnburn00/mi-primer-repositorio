
<div class="container div-container">
	<!--h1>Registro de Clientes</h1-->
	<div class="row row-principal">

		<div class="col-12 div-encabezado">
				Diagnostico Detalle
		</div>
		
		<div class="col-12">

			<div class="col-12" id="validacion_errores"></div>
			
			<!-- TITULO DEL FORMULARIO -->

			<div class="tab-content">

		        <!-- campos del formulario-->
		        <div class ="tab-pane fade show active" id="div-detalle" role="tabpanel">
			        <div class = "div-marco" id="div-productor_0">	

			        	<div class="row">					
							<div class="col-md-12 row2">
									<div class="col-md-6  bold">Código del diagnostico: <?=$aDiagnostico['codigo'];?></div><br/><br/>
									<label class="col-md-6 bold " id="lblRegistroProductor">
										Registrado el <?=$aDiagnostico['fec_registro'];?>
									</label>
							</div>
						</div>
				        

				        <div class="col-12 row2">
							<div class="col-12" id="validacion_cliente"></div>
								
							<div  class="col-md-10 bold encabezado1 ">INFORMACION DE DIAGNOSTICO</div>

							<button class="btn btn-sm btn-primary  col-md-2" name='btnEditarDiagnostico' value='Editar' id='btnEditarDiagnostico'>
									<i class="icon-pencil2"></i> Editar
							</button>
						</div>

						<div class = "row" id="div-">
				        	<div   class="col-md-2 col-form-label">Nro de Ficha</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDiagnostico['nro_ficha'];?></label>

 							<div   class="col-md-2 col-form-label">Fecha Diagnostico</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDiagnostico['fecha'];?></label>        
						</div>
							<?=form_hidden('txtid', $aDiagnostico['id_finca']);?>

							<?= form_open(base_url().'', array(
								        'name' => 'form_diagnosticodetalle',
								        'id'=>'form_diagnosticodetalle',
								        'class'=> 'form-diagnosticodetalle',
								        'role' => 'form' ));
							?>
							<div class="row" id="div-diagnostico">
								
								<?=form_hidden('txtIdDiagnostico', $aDiagnostico['id_diagnostico']);?>
								

								<div   class="col-md-2 col-form-label required1">Estado:</div>
								<label for="descestado"  class="form-control-sm show col-md-4" id="lblestado"><?=$aDiagnostico['estado'];?></label>
								<label for="estado"  class="d-none" id="lblestado1"><?=$aDiagnostico['id_estado'];?></label>

								<?php

									$optionsTar = array();
						    		foreach ($aListaEstado as $key => $row) {
						    			$optionsTar[$row['id_estado']] = $row['descripcion'];
						    		}
							                       
									$adicional = 'class="form-control form-control-sm" id="estado" ';
									
									echo '<div class="col-md-10 row no-gutters hidden no-show">
									<div class="col-12">'.form_dropdown('cboEstado', $optionsTar, $aDiagnostico['id_estado'] ,$adicional).'</div>
									</div>';

									// boton Reenvio
							    	$formatoReenvio = array(
							        	'name' => 'btnGuardarDiagnostico',
							        	'value' => 'Guardar Cambios',
							        	'id' => 'btnGuardarDiagnostico',
							        	'class' => 'btn btn-sm btn-primary btn-block',
							        	'disabled' => 'disabled'
							    	);

							    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarDiagnostico">'.form_submit($formatoReenvio).'</div>';
							    	echo '<div class="col-md-6 col-lg-2"  id="div-btnCancelarDiagnostico"><button name="btn" value="CANCELAR" id="btnCancelarDiagnostico" class="btn btn-sm btn-secondary btn-block" disabled="disabled" style="display:none">Cancelar</button></div>';
								?>
								
							</div>
							<?= form_close();?>
						<div class = "row" id="div-">
							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1"> Evaluación de las Normas: ORGANICAS, SOCIALES Y SOSTENIBLES </div>
							</div>

							<div   class="col-md-2 col-form-label ">Codigo de Productor</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['codigo_socio'];?></label>

							<div   class="col-md-2 col-form-label "><?=$aDatoGeneral[0]['tipo_documento'];?></div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['nro_documento'];?></label>

							<div  class="col-md-2 col-form-label ">Nombre / Razon Social</div>
							<label for=""  class="form-control-sm show col-md-10" id=""><?=$aDatoGeneral[0]['nombre_razon'];?></label>

							<div  class="col-md-2 col-form-label ">Nro de Celular</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['telefono_celular'];?></label>

							<div  class="col-md-2 col-form-label ">Edad</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['edad'];?></label>

							<div  class="col-md-2 col-form-label ">Idioma</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['idioma'];?></label>

							<div  class="col-md-2 col-form-label ">Nro Hijos</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['cantidad_hijos'];?></label>

							<div  class="col-md-2 col-form-label ">Genero</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['genero'];?></label>

							<div  class="col-md-2 col-form-label ">Grados de Estudios</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['grado_estudio'];?></label>

							<div  class="col-md-2 col-form-label ">Lugar de Nacimiento</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['lugar_nacimiento'];?></label>

							<div  class="col-md-2 col-form-label ">Año de ingreso a la zona</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['anio_ingreso_zona'];?></label>

							<div  class="col-md-2 col-form-label ">Religión</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['religion'];?></label>

							<div  class="col-md-2 col-form-label ">Estado Civil</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['estado_civil'];?></label>	

						<?php 
							if($aDatoGeneral[0]['tipo_documento_cony'] !== null): ?>
								<div  class="col-md-3 col-form-label"><?=$aDatoGeneral[0]['tipo_documento_cony'];?> Conyugue</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['nro_documento_cony'];?></label>	

								<div  class="col-md-3 col-form-label">Edad Conyugue</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['edad_cony'];?></label>	

								<div  class="col-md-3 col-form-label">Nombre / Razon Social Conyugue</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['nombre_razon_cony'];?></label>	

								<div  class="col-md-3 col-form-label">Nro de Celular Conyugue</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['telefono_celular_cony'];?></label>	

								<div  class="col-md-3 col-form-label">Grados de Estudios Conyugue</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['grado_estudio_cony'];?></label>	

								<div  class="col-md-3 col-form-label">Lugar de Nacimiento Conyugue</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral[0]['lugar_nacimiento_cony'];?></label>	

						<?php endif; ?>


							<br/><br/>

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1"> DATOS DE LA UNIDAD PRODUCTIVA </div>
							</div>

							<div  class="col-md-2 col-form-label">Nombre</div>
							<label for=""  class="form-control-sm show col-md-10" id=""><?=$aFinca[0]['nombre'];?></label>	

							<div  class="col-md-2 col-form-label">Departamento</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['departamento'];?></label>	

							<div  class="col-md-2 col-form-label">Provincia</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['provincia'];?></label>	

							<div  class="col-md-2 col-form-label">Distrito</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['distrito'];?></label>	

							<div  class="col-md-2 col-form-label">Zona</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['zona'];?></label>			

							<div  class="col-md-2 col-form-label">Latitud</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['latitud_gmd'];?></label>	

							<div  class="col-md-2 col-form-label">Longitud</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['longitud_gmd'];?></label>	

							<div  class="col-md-2 col-form-label">Altitud</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['altitud'];?></label>	

							<div  class="col-md-2 col-form-label">Cultivo</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['cultivo'];?></label>	

							<div  class="col-md-2 col-form-label">Precipitacion</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['precipitacion'];?></label>	

							<div  class="col-md-2 col-form-label">Fuente de Energia</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['energia'];?></label>	

							<div  class="col-md-2 col-form-label">Fuente de Agua</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['agua'];?></label>	

							<div  class="col-md-2 col-form-label">Internet</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['desc_internet'];?></label>	

							<div  class="col-md-2 col-form-label">N° personal de cosecha</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['cant_personal_cosecha'];?></label>	

							<div  class="col-md-2 col-form-label">N° Animales menores</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['cant_animales'];?></label>	
	
							<div  class="col-md-2 col-form-label">Material de vivienda</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['vivienda'];?></label>	

							<div  class="col-md-2 col-form-label">Señal Telefónica</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['telefonia'];?></label>	

							<div  class="col-md-2 col-form-label">Suelo</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['suelo'];?></label>	


							<div  class="col-md-6 col-form-label"></div>				

							<div  class="col-md-2 col-form-label">Establecimiento de Salud</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['desc_establecimiento_salud'];?></label>	

							<div  class="col-md-2 col-form-label">Tiempo de la unidad al centro de Salud</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['tiempo_centro_salud'];?></label>				

							<div  class="col-md-2 col-form-label">Centro Educativo</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['desc_centro_educativo'];?></label>	

							<div  class="col-md-6 col-form-label"></div>	

							<div  class="col-md-6 col-form-label">Vias de acceso del centro de acopio hasta la unidad productiva</div>
							<label for=""  class="form-control-sm show col-md-6" id=""><?=$aFinca[0]['vias_acceso'];?></label>	

							<div  class="col-md-2 col-form-label">Distancia KM</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['distancia_km'];?></label>	

							<div  class="col-md-2 col-form-label">Tiempo total</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['tiempo'];?></label>	

							<div  class="col-md-2 col-form-label">Medio de transporte</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca[0]['medio_transporte'];?></label>	


							<div class="col-12 row2">
		                    	<div class="col-md-8 bold encabezado1"> INFRAESTRUCTURA DE LA UNIDAD PRODUCTIVA </div>
		                    	<div class="col-md-4 bold encabezado1"> Observaciones </div>
							</div>

							<div class="col-12 row2">
						
								<?php

								$dataRad = array(	
										'class'	=>	"form-control form-control-sm",
										'value' => 1,
										'onclick'=>"return false"
										);
								$data = array(	
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off'
										);
								$i = 0;
								foreach ($aInfra as $key => $row) {
									$check = array( '0' => 0, '1' => 0, '2' => 0, '3' => 0, '4' => 0);

								 	switch ($row['estado_pregunta']) {
									    case 1:
									        $check[0] = 1;
									        break;
									    case 2:
									        $check[1] = 1;
									        break;
									    case 3:
									        $check[2] = 1;
									        break;
									    case 4:
									        $check[3] = 1;
									        break;
									    case 5:
									        $check[4] = 1;
									        break;
									}

									$dataRad['name'] 	= 'radPregunta_'.$i;
									$data['name'] 		= 'txtObsPregunta_'.$i;

								 	$html  = '<div class="col-md-3 col-form-label">'.$row['descripcion'].'</div>';
								 	$dataRad['value'] = 1;
								 	$dataRad['checked'] = $check[0];
								 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Excelente</div>';
								 	$dataRad['value'] = 2;
								 	$dataRad['checked'] = $check[1];
								 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Bueno</div>';
								 	$dataRad['value'] = 3;
								 	$dataRad['checked'] = $check[2];
								 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Regular</div>';
								 	$dataRad['value'] = 4;
								 	$dataRad['checked'] = $check[3];
								 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Malo</div>';
								 	$dataRad['value'] = 5;
								 	$dataRad['checked'] = $check[4];
								 	$html .= '<div class="col-2 col-md-1 col-form-label">'.form_radio($dataRad).'Pesimo</div>';
								 	$html .= '<div class="col-md-4 col-form-label bold">'.$row['observacion'].'</div>';
								 	echo $html;

								 	/*echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);*/
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

								echo '<div class="col-md-12 col-form-label bold">'.$aDiagnostico['obs_infraestructura'].'</div>';

								?>

							</div>

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1"> DATOS DE CAMPO </div>
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

		                    	<div class="col-12 row row_div2 class_filaDato" id="divCampoTotal">

									<label for=""  class="form-control-sm show col-md-1" id=""><?=$aDiagnostico['area_total'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['area_cafe'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['crecimiento'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['bosque'];?></label>	
									<label for=""  class="form-control-sm show col-md-1" id=""><?=$aDiagnostico['purma'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['pan_llevar'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['vivienda'];?></label>	

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
		                    	<div class="col-12 row row_div2 class_filaDato" id="">
								<?php
								foreach ($aCampo as $key => $row) {
									
									echo '<div class="col-12 row2 class_filaDato">
									<label for=""  class="form-control-sm show col-md-1" id="">'.($key+1).'</label>	
									<label for=""  class="form-control-sm show col-md-2" id="">'.$row['hectareas'].'</label>	
									<label for=""  class="form-control-sm show col-md-2" id="">'.$row['variedad'].'</label>	
									<label for=""  class="form-control-sm show col-md-2" id="">'.$row['edad'].'</label>	
									<label for=""  class="form-control-sm show col-md-1" id="">'.$row['meses_cosecha'].'</label>	
									<label for=""  class="form-control-sm show col-md-2" id="">'.$row['cosecha_anterior'].'</label>	
									<label for=""  class="form-control-sm show col-md-2" id="">'.$row['cosecha_actual'].'</label>	
								</div>';


								}
								?>
								</div>


								<div class="col-12 row row_div2" id="">

									<label for=""  class="form-control-sm show col-md-1" id="">Total</label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['total_hectareas'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['total_variedad'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['total_edad'];?></label>	
									<label for=""  class="form-control-sm show col-md-1" id=""><?=$aDiagnostico['total_meses_cosecha'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['total_cosecha_anterior'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['total_cosecha_actual'];?></label>	

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

					<?php
					foreach ($aCostoProd as $key => $row) {
						
						echo '<div class="col-12 row2">
						<div  class="col-form-label col-md-3" id="">'.$row['descripcion'].'</div>	
						<label for=""  class="form-control-sm show col-md-2" id="">'.$row['hectareas'].'</label>	
						<label for=""  class="form-control-sm show col-md-2" id="">'.$row['costo_has'].'</label>	
						<label for=""  class="form-control-sm show col-md-2" id="">'.$row['costo_total'].'</label>	
						<label for=""  class="form-control-sm show col-md-3" id="">'.$row['observaciones'].'</label>	
					</div>';


					}
					?>

					<div class="col-12 row2">
						<label for=""  class="form-control-sm show col-md-3" id="">Total</label>	
						<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['total_hectareas_prod'];?></label>	
						<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['total_costo_has_prod'];?></label>	
						<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['total_costo_total_prod'];?></label>	
						<label for=""  class="form-control-sm show col-md-3" id=""></label>	
					</div>

					<div class="col-md-8 col-form-label">¿Cuánto es el ingreso promedio mensual del socio incluyendo todos los conceptos? S/.</div>
					<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['prom_mensual_socio'];?></label>	

					<div class="col-md-12 col-form-label bold">Concepto de Ingreso</div>
					<div class="col-md-2 col-form-label">Agricultura S/</div>
					<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['ingreso_agricultura'];?></label>	

					<div class="col-md-2 col-form-label">Bodega S/</div>
					<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['ingreso_bodega'];?></label>	

					<div class="col-md-2 col-form-label">Transporte S/</div>
					<label for=""  class="form-control-sm show col-md-2" id=""><?=$aDiagnostico['ingreso_transporte'];?></label>	

					<div class="col-md-2 col-form-label">Otro</div>
					<label for=""  class="form-control-sm show col-md-10" id=""><?=$aDiagnostico['otro'];?></label>	

					<div class="col-md-4 col-form-label">Cuenta con préstamos ¿Qué entidades?</div>
					<label for=""  class="form-control-sm show col-md-8" id=""><?=$aDiagnostico['prestamo_entidades'];?></label>	

					<div class="col-md-2 col-form-label">Responsable de Area</div>
					<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDiagnostico['prestamo_entidades'];?></label>	

					<div class="col-md-2 col-form-label">Tecnico de Campo</div>
					<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDiagnostico['prestamo_entidades'];?></label>	


		                    <label  class="col-md-12 col-form-label bold">Documentos Adjuntos:</label>	
		                    <div class="col-12 row2" id="div_fichero">
									<?php
									if(empty($aAdjunto)){
										echo '<span class="col-md-12">No existe ningún fichero cargado</span>';
										echo form_hidden('txtCantAdjunto', 0);}
									else
										foreach ($aAdjunto as $row) : ?>
											<span class="col-md-7 icono1">
												<a href="<?=base_url().'adjunto/mostrarImagen/'.str_replace('=','',base64_encode($row['ruta']));?>" target="_blank" title="MOSTRAR IMAGEN"><span class='icon-eye-plus'></span></a>
												<a href="<?=base_url().'adjunto/descargar/'.str_replace('=','',base64_encode($row['ruta'])).'/'.str_replace('=','',base64_encode($row['nombre']));?>" title="DESCARGAR IMAGEN"><span class='icon-download'></span></a>
												<span class=""><?=$row['nombre'];?></span>
											</span>	
											<span  class="col-md-5 bold right"><?=$row['fec_registro'];?></span>
									<?php	
									endforeach;	?>
							</div>







							<?= form_open(base_url().'', array(
								        'name' => 'form_productordetalle',
								        'id'=>'form_productordetalle',
								        'class'=> 'form-productordetalle',
								        'role' => 'form' ));
							?>
							<!--

							-->
							<?= form_close();?>
						</div>

					

					</div>



				</div>



			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-6 col-md-2">
			<div class="social">
		 		<a href="<?=base_url();?>diagnostico/listar/<?=$aDiagnostico['id_finca'];?>" class="social__button icon_pie"><i class="icon-undo2"></i></a>
			</div>
		</div>
	
		<div class="col-6 col-md-2 offset-md-8">
			<?php
				$host= $_SERVER["HTTP_HOST"];
				$url= $_SERVER["REQUEST_URI"];
			?>
			<div class="social">
		 		<a href="http://<?=$host.$url;?>" class="social__button icon_pie"><i class="icon-spinner9"></i></a>
			</div>
		</div>
	
	</div><!--FIN ROW-->

</div>


