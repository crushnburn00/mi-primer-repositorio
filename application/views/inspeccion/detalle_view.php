
<div class="container div-container">
	<!--h1>Registro de Clientes</h1-->
	<div class="row row-principal">

		<div class="col-12 div-encabezado">
				Inspeccion Detalle
		</div>
		
		<div class="col-12">

			<div class="col-12" id="validacion_errores"></div>
			
			<!-- TITULO DEL FORMULARIO -->

			<div class="tab-content">

		        <!-- campos del formulario-->
		        <div class ="tab-pane fade show active" id="div-detalle" role="tabpanel">
			        <div class = "div-marco" id="div-_0">	

			        	<div class="row">					
							<div class="col-md-12 row2">
									<div class="col-md-6  bold">Código de Inspeccion: <?=$aInspeccion['codigo'];?></div><br/><br/>
									<label class="col-md-6 bold " id="lblRegistroProductor">
										Registrado el <?=$aInspeccion['fec_registro'];?>
									</label>
							</div>
						</div>

						<div class="col-12 row2">
								<div class="col-12" id="validacion_cliente"></div>
								
								<div  class="col-md-10 bold encabezado1 ">INFORMACION ESTADO DE INSPECCION</div>

								<button class="btn btn-sm btn-primary  col-md-2" name='btnEditarInspeccion' value='Editar' id='btnEditarInspeccion'>
									<i class="icon-pencil2"></i> Editar
								</button>
						</div>
						<?=form_hidden('txtid', $aInspeccion['id_finca']);?>

							<?= form_open(base_url().'', array(
								        'name' => 'form_inspecciondetalle',
								        'id'=>'form_inspecciondetalle',
								        'class'=> 'form-inspecciondetalle',
								        'role' => 'form' ));
							?>
							<div class="row" id="div-inspeccion">
								
								<?=form_hidden('txtIdInspeccion', $aInspeccion['id_inspeccion']);?>
								

								<div   class="col-md-2 col-form-label required1">Estado:</div>
								<label for="descestado"  class="form-control-sm show col-md-4" id="lblestado"><?=$aInspeccion['estado'];?></label>
								<label for="estado"  class="d-none" id="lblestado1"><?=$aInspeccion['id_estado'];?></label>

								<?php

									$optionsTar = array();
						    		foreach ($aListaEstado as $key => $row) {
						    			$optionsTar[$row['id_estado']] = $row['descripcion'];
						    		}
							                       
									$adicional = 'class="form-control form-control-sm" id="estado" ';
									
									echo '<div class="col-md-10 row no-gutters hidden no-show">
									<div class="col-12">'.form_dropdown('cboEstado', $optionsTar, $aInspeccion['id_estado'] ,$adicional).'</div>
									</div>';

									// boton Reenvio
							    	$formatoReenvio = array(
							        	'name' => 'btnGuardarInspeccion',
							        	'value' => 'Guardar Cambios',
							        	'id' => 'btnGuardarInspeccion',
							        	'class' => 'btn btn-sm btn-primary btn-block',
							        	'disabled' => 'disabled'
							    	);

							    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarInspeccion">'.form_submit($formatoReenvio).'</div>';
							    	echo '<div class="col-md-6 col-lg-2"  id="div-btnCancelarInspeccion"><button name="btn" value="CANCELAR" id="btnCancelarInspeccion" class="btn btn-sm btn-secondary btn-block" disabled="disabled" style="display:none">Cancelar</button></div>';
								?>
								
							</div>
							<?= form_close();?>


				        <div class = "row" id="div-productor">	        	

						     <div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1"> INFORMACION PRODUCTOR </div>
							</div>

							<div   class="col-md-2 col-form-label" >Codigo de Productor</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral['codigo_productor'];?></label>

 							<div   class="col-md-2 col-form-label">DNI</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral['nro_documento'];?></label>                  

							<div   class="col-md-2 col-form-label ">Nombre / Razon Social</div>
							<label for=""  class="form-control-sm show col-md-8" id=""><?=$aDatoGeneral['nombre_razon'];?></label> 

							<br/><br/>

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1"> INFORMACION FINCA </div>
							</div>

							<div   class="col-md-2 col-form-label ">Nombre</div>
							<label for=""  class="form-control-sm show col-md-10" id=""><?=$aDatoGeneral['nombre'];?></label>

							<div   class="col-md-2 col-form-label ">Departamento</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral['departamento'];?></label>

							<div   class="col-md-2 col-form-label ">Provincia</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral['provincia'];?></label>

							<div   class="col-md-2 col-form-label ">Distrito</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral['distrito'];?></label>

							<div   class="col-md-2 col-form-label ">Zona</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral['zona'];?></label>							

							<div   class="col-md-2 col-form-label ">Altitud</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral['altitud'];?></label>			

							<div   class="col-md-2 col-form-label ">Latitud</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral['latitud_gmd'];?></label>			

							<div   class="col-md-2 col-form-label ">Longitud</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aDatoGeneral['longitud_gmd'];?></label>		

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1"> INFORMACION INSPECTOR </div>
							</div>

							<div   class="col-md-2 col-form-label ">Inspector Interno</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aInspeccion['inspector'];?></label>

							<div   class="col-md-2 col-form-label ">Fecha Inspeccion</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aInspeccion['fec_inspeccion'];?></label>

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1">II. ESTANDARES A CUMPLIR - ORGANICOS, SOCIALES Y SOSTENIBLES </div>
							</div>

							<?php
								$options = '<input type="checkbox" name="estandarNOP" value="1" '.($aInspeccion['estandar_NOP'] == "1" ? 'checked' : ' ').' onclick="return false;"><label>&nbspNOP&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

								$options = '<input type="checkbox" name="estandarCEE" value="1" '.($aInspeccion['estandar_CEE'] == "1" ? 'checked' : ' ').' onclick="return false;"><label>&nbspCEE #834/07 889/08&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

								$options = '<input type="checkbox" name="estandarJAS" value="1" '.($aInspeccion['estandar_JAS'] == "1" ? 'checked' : ' ').'  onclick="return false;"><label>&nbspJAS Notific.# 1605&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

								$options = '<input type="checkbox" name="estandarperuDS" value="1" '.($aInspeccion['estandar_peruDS'] == "1" ? 'checked' : ' ').'  onclick="return false;"><label>&nbspPerú DS # 004/2006&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3" >'.$options.'</div>';

								$options = '<input type="checkbox" name="estandarbioSuisse" value="1" '.($aInspeccion['estandar_bioSuisse'] == "1" ? 'checked' : ' ').'  onclick="return false;"><label>&nbspBio Suisse&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

								$options = '<input type="checkbox" name="estandarRAS" value="1" '.($aInspeccion['estandar_RAS'] == "1" ? 'checked' : ' ').'  onclick="return false;"><label>&nbspRAS&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

								$options = '<input type="checkbox" name="estandarUTZ" value="1" '.($aInspeccion['estandar_UTZ'] == "1" ? 'checked' : ' ').'  onclick="return false;"><label>&nbspUTZ&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

								$options = '<input type="checkbox" name="estandarFairtrade" value="1" '.($aInspeccion['estandar_Fairtrade'] == "1" ? 'checked' : ' ').'  onclick="return false;"><label>&nbspFairtrade&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

								$options = '<input type="checkbox" name="estandarCAFE" value="1" '.($aInspeccion['estandar_CAFE'] == "1" ? 'checked' : ' ').'  onclick="return false;"><label>&nbspC.A.F.E. Practices&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

								$options = '<input type="checkbox" name="estandarNaturland" value="1" '.($aInspeccion['estandar_Naturland'] == "1" ? 'checked' : ' ').'  onclick="return false;"><label>&nbspNaturland&nbsp&nbsp&nbsp</label>';
								echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';
		                    ?>

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1">III. DATOS DE LA(S) PARCELA(S) DE CAFE </div>
							</div>

							<div class="col-12 row2" id="div_parcela_detalle">
								<div class="col-12 row row_div2" id="div_thead_parcela">
			                    	<div  class="col-md-1 col-form-label thead_div_inspeccion">Lotes</div>
									<div  class="col-md-2 col-form-label thead_div_inspeccion">Variedad de Cafe</div>
									<div  class="col-md-1 col-form-label thead_div_inspeccion">Meses de Cosecha</div>
									<div  class="col-md-2 col-form-label thead_div_inspeccion">Año y Mes de siembra</div>
									<div  class="col-md-1 col-form-label thead_div_inspeccion">Edad</div>
									<div  class="col-md-1 col-form-label thead_div_inspeccion">Area Total</div>
									<div  class="col-md-2 col-form-label thead_div_inspeccion">Cosecha Pergamino (Año Pasado)</div>
									<div  class="col-md-2 col-form-label thead_div_inspeccion">Estimado pergamino (Año Actual)</div>
		                    	</div>
		                    	<div class="col-12 row row_div2" id="div_filaParcela">
		                    	<?php
		                    	
		                    	foreach ($aInspeccionP as $key => $row) {
		                    		echo '<div  class="col-md-1 col-form-label">'.($key+1).'</div>
									<div  class="col-md-2 col-form-label bold">'.$row['variedad_cafe'].'</div>
									<div  class="col-md-1 col-form-label bold">'.$row['mes_cosecha'].'</div>
									<div  class="col-md-2 col-form-label bold">'.$row['año_mes_siembra'].'</div>
									<div  class="col-md-1 col-form-label bold">'.$row['edad'].'</div>
									<div  class="col-md-1 col-form-label bold">'.$row['area_total'].'</div>
									<div  class="col-md-2 col-form-label bold">'.$row['cosecha_perg_anio_actual'].'</div>
									<div  class="col-md-2 col-form-label bold">'.$row['estimado_perg_anio_prox'].'</div>';
		                    	}
		                    	?>

								</div>
							</div>

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1">IV. VERIFICACION DE CONFORMIDAD CON LAS NORMAS </div>
							</div>

							<div class="col-12 row2">
								<div  class="col-md-4 col-form-label thead_div_inspeccion">Acción a verificar</div>
								<div  class="col-md-4 col-form-label thead_div_inspeccion">Cumplimiento</div>
								<div  class="col-md-4 col-form-label thead_div_inspeccion">Observaciones</div>
								<div  class="col-md-4 col-form-label thead_div_inspeccion"></div>
								<div  class="col-md-1 col-form-label thead_div_inspeccion">Critico para</div>
								<div  class="col-md-1 col-form-label thead_div_inspeccion">No Aplica</div>
								<div  class="col-md-1 col-form-label thead_div_inspeccion">SI</div>
								<div  class="col-md-1 col-form-label thead_div_inspeccion">NO</div>
								<div  class="col-md-4 col-form-label thead_div_inspeccion"></div>
								<div class="col-12 row2">
		                    		<div class="col-md-12 bold encabezado1"> SISTEMA DE GESTIÓN DOCUMENTADO </div>
								</div>

								<?php
								$dataRad = array(	
										'class'	=>	"form-control form-control-sm radPregunta",
										'onclick'=> "return false;"
										);

								$i = 0;
								$html = '';
								foreach ($aCuestionario1 as $key => $row) {
									$dataRad['name'] 	= 'radPregunta_'.$i;
									$dataRad['value'] = -1;
								 	$html  = '<div class="col-md-4 col-form-label">'.($i+1).'. '.$row['descripcion'].'</div>';
								 	$html .= '<div class="col-md-1 col-form-label">TODOS</div>';
								 	$dataRad['value'] = 2;
								 	$row['estado_pregunta'] == "2" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$dataRad['value'] = 1;
								 	$row['estado_pregunta'] == "1" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$dataRad['value'] = 0;
								 	$row['estado_pregunta'] == "0" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$html .= '<div class="col-md-4 col-form-label bold">'.$row['observacion'].'</div>';
								 	echo $html;


								 	echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);
								 	$i++;
								}
								?>


								<div class="col-12 row2">
		                    		<div class="col-md-12 bold encabezado1"> BIENESTAR SOCIAL Y LABORAL </div>
								</div>

								<?php
								$dataRad = array(	
										'class'	=>	"form-control form-control-sm radPregunta",
										'onclick'=> "return false;"
										);

								$html = '';
								foreach ($aCuestionario2 as $key => $row) {
									$dataRad['name'] 	= 'radPregunta_'.$i;
									$dataRad['value'] = -1;
								 	$html  = '<div class="col-md-4 col-form-label">'.($i+1).'. '.$row['descripcion'].'</div>';
								 	$html .= '<div class="col-md-1 col-form-label">TODOS</div>';
								 	$dataRad['value'] = 2;
								 	$row['estado_pregunta'] == "2" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$dataRad['value'] = 1;
								 	$row['estado_pregunta'] == "1" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$dataRad['value'] = 0;
								 	$row['estado_pregunta'] == "0" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$html .= '<div class="col-md-4 col-form-label">'.$row['observacion'].'</div>';
								 	echo $html;

								 	echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);
								 	$i++;
								}
								?>

								<div class="col-12 row2">
		                    		<div class="col-md-12 bold encabezado1"> CONSERVACIÓN DE ECOSISTEMAS, AGUA, SUELOS Y VIDA SILVESTRE </div>
								</div>

								<?php
								$dataRad = array(	
										'class'	=>	"form-control form-control-sm radPregunta",
										'onclick'=> "return false;"
										);

								$html = '';
								foreach ($aCuestionario3 as $key => $row) {
									$dataRad['name'] 	= 'radPregunta_'.$i;
									$dataRad['value'] = -1;
								 	$html  = '<div class="col-md-4 col-form-label">'.($i+1).'. '.$row['descripcion'].'</div>';
								 	$html .= '<div class="col-md-1 col-form-label">TODOS</div>';
								 	$dataRad['value'] = 2;
								 	$row['estado_pregunta'] == "2" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$dataRad['value'] = 1;
								 	$row['estado_pregunta'] == "1" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$dataRad['value'] = 0;
								 	$row['estado_pregunta'] == "0" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$html .= '<div class="col-md-4 col-form-label">'.$row['observacion'].'</div>';
								 	echo $html;

								 	echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);
								 	$i++;
								}
								?>

								<div class="col-12 row2">
		                    		<div class="col-md-12 bold encabezado1"> MANEJO INTEGRADO DE CULTIVO Y RESIDUOS </div>
								</div>

								<?php
								$dataRad = array(	
										'class'	=>	"form-control form-control-sm radPregunta",
										'onclick'=> "return false;"
										);

								$html = '';
								foreach ($aCuestionario4 as $key => $row) {
									$dataRad['name'] 	= 'radPregunta_'.$i;
									$dataRad['value'] = -1;
								 	$html  = '<div class="col-md-4 col-form-label">'.($i+1).'. '.$row['descripcion'].'</div>';
								 	$html .= '<div class="col-md-1 col-form-label">TODOS</div>';
								 	$dataRad['value'] = 2;
								 	$row['estado_pregunta'] == "2" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$dataRad['value'] = 1;
								 	$row['estado_pregunta'] == "1" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$dataRad['value'] = 0;
								 	$row['estado_pregunta'] == "0" ? $dataRad['checked'] = 1 : $dataRad['checked'] = 0;
								 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
								 	$html .= '<div class="col-md-4 col-form-label">'.$row['observacion'].'</div>';
								 	echo $html;

								 	echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);
								 	$i++;
								}
								?>

							</div>
				


							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1">V. RESÚMEN DE NO CONFORMIDADES Y ACCIONES PROPUESTAS POR EL PRODUCTOR </div>
							</div>

							<div class="col-12 row2" id="div_manifiesto_detalle">
								<div class="col-12 row row_div2" id="div_thead_anual">
			                    	<div  class="col-4 col-form-label bold thead_div1 ">N° DE ITEM</div>
			                    	<div  class="col-8 col-form-label bold thead_div1">MANIFIESTO DEL PRODUCTOR</div>

		                    	</div>
		                    	<div class="col-12 row row_div2" id="div_filaManifiesto">
		                    	<?php

		                    	foreach ($aInspeccionNC as $key => $row) {
		                    		echo '<div  class="col-4 col-form-label bold">'.($key+1).'</div>
			                    	<div  class="col-8 col-form-label bold">'.$row['manifiesto'].'</div>';
		                    	}				

								?>
								</div>
							</div>

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1">VI. DECLARACION </div>
							</div>

							<div class="col-12 row2">
								<div  class="col-md-12 col-form-label">Como productor/a declaro mi conformidad con lo expresado en esta ficha y afirmo que no aplico  procedimientos no declarados.</div>

								<div class="col-md-12 row2">
									<div class="col-md-4 bold div_centrado div_porcentaje"> PORCENTAJE DE CUMPLIMIENTO = </div>
									<div class="col-md-4 bold"> 
										<?php
										echo '<div class="col-md-12 row">
												<div class="col-6 div_centrado"># Ítem cumplidos</div>
												<div class="col-6 div_centrado">'.$aInspeccion['cant_item_cumplido'].'</div>
											</div>';
										
										echo '<div class="col-md-12 row border_top">
												<div class="col-6 div_centrado"># Ítem que aplican</div>
												<div class="col-6 div_centrado">'.$aInspeccion['cant_item_aplica'].'</div>
											</div>';
										?>
									</div>
									<?php

										echo '<div class="col-md-4 row bold div_centrado div_porcentaje">
												<div class="col-md-1">=</div><div class="col-md-7">'.$aInspeccion['porcentaje_cumplimiento'].'</div><div class="col-md-2">%</div></div>';
									?>


									
								</div>
							</div>

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1">VII. LEVANTAMIENTO DE LAS NO CONFORMIDADES </div>
							</div>

							<div class="col-12 row2" id="div_conformidad_detalle">
								<div class="col-12 row row_div2" id="div_thead_conformidad">
			                    	<div  class="col-2 col-form-label bold thead_div1 ">Punto de Control</div>
			                    	<div  class="col-3 col-form-label bold thead_div1">No Conformidad</div>
			                    	<div  class="col-3 col-form-label bold thead_div1">Acción Correctiva</div>
			                    	<div  class="col-2 col-form-label bold thead_div1">Plazo del levantamiento</div>
			                    	<div  class="col-2 col-form-label bold thead_div1">¿Cumplió?</div>
		                    	</div>
		                    	<div class="col-12 row row_div2" id="div_filaConformidad_0">
		                    	<?php

		                    	foreach ($aInspeccionLNC as $key => $row) {
		                    		echo '<div  class="col-2 col-form-label bold">'.$row['punto_control'].'</div>
			                    	<div  class="col-3 col-form-label bold">'.$row['no_conformidad'].'</div>
			                    	<div  class="col-3 col-form-label bold">'.$row['accion_correctiva'].'</div>
			                    	<div  class="col-2 col-form-label bold">'.$row['plazo_levantamiento'].'</div>
			                    	<div  class="col-2 col-form-label bold">'.$row['cumplio_desc'].'</div>';
		                    	}				

								?>
								</div>
							</div>

							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1">DECISION DEL COMITÉ DE APROBACIÓN Y SANCIONES </div>
							</div>

							<?php
								$data = array(	
										'name'	=>	'txtTiempoSuspension' , 
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off'
								);
								$chkdata = array(	
								    'name'    => 'chkExclusionPrograma',
								    'value'   => '1',
								    'checked' => 0,
									'onclick'=>"return false;"
								);
								$aInspeccion['exclusion_programa'] == "1" ? $chkdata['checked'] = 1 : $chkdata['checked'] = 0;
								echo '<div class="col-md-12 row2"><div class="col-md-12">'.form_checkbox($chkdata).'<label>&nbspExclusión del Programa&nbsp&nbsp&nbsp</label></div></div>';

								$chkdata['name'] = 'chksuspensionDias';
								$aInspeccion['suspension_dias'] == "1" ? $chkdata['checked'] = 1 : $chkdata['checked'] = 0;
								echo '<div class="col-md-12 row2">
										<div class="col-md-3">'.form_checkbox($chkdata).'&nbspSuspensión por un tiempo de &nbsp&nbsp</div><div class="col-md-2">'.form_input($data).'</div></div>';

								$chkdata['name'] = 'chkLevantarNoconf';
								$aInspeccion['levantar_no_confor'] == "1" ? $chkdata['checked'] = 1 : $chkdata['checked']= 0;
								echo '<div class="col-md-12 row2"><div class="col-md-12">'.form_checkbox($chkdata).'
								<label>&nbspNo Conformidades y observaciones deben ser levantadas hasta la próxima inspección interna&nbsp&nbsp&nbsp</label></div></div>';

								$chkdata['name'] = 'chkAprueba';
								$aInspeccion['aprueba_sin_condicion'] == "1" ? $chkdata['checked'] = 1 : $chkdata['checked'] = 0;
								echo '<div class="col-md-12 row2"><div class="col-md-12">'.form_checkbox($chkdata).'<label>&nbspAprueba sin condicioens&nbsp&nbsp&nbsp</label></div></div>';
		                    ?>  

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
		 		<a href="<?=base_url();?>inspeccion/listar/<?=$aInspeccion['id_finca'];?>" class="social__button icon_pie"><i class="icon-undo2"></i></a>
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


