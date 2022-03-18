
<div class="container div-container">

<div class="col-12" id="validacion_errores_productor"></div>
	      <!-- TITULO DEL FORMULARIO -->
        <div class="col-12 div-encabezado">
                  REGISTRO DE INSPECCION
		</div>
	        <!-- campos del formulario-->
	        <!-- FORMULARIO -->
			<?= form_open(base_url().'', array(
		        'name' => 'form_inspeccion',
		        'id'=>'form_inspeccion',
		        'class'=> 'form-inspeccion',
		        'role' => 'form'
		    ));
	      	?>

	        <div class = "div-marco">
	       
			    <div class="form-group row" id="form_inspeccion">			

                    <div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> INFORMACION PRODUCTOR </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>

                    <label  class="col-md-2 col-form-label"  id="lblnombre">Codigo de Productor</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['codigo_productor'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';

					?>

					<label  class="col-md-2 col-form-label"  id="lblnombre"><?=$aDatoGeneral[0]['tipo_documento'];?></label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['nro_documento'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label"  id="lblnombre">Nombre / Razon Social</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['nombre_razon'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-10 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> INFORMACION FINCA </div>
					</div>

					<label  class="col-md-2 col-form-label"  id="lblnombre">Nombre</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['nombre'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>
					<label  class="col-md-2 col-form-label"  id="lblnombre">Departamento</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['departamento'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>
					<label  class="col-md-2 col-form-label"  id="lblnombre">Provincia</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['provincia'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label"  id="lblnombre">Distrito</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['distrito'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label"  id="lblnombre">Zona</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['zona'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>
					<label  class="col-md-2 col-form-label"  id="lblnombre">Altitud</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['altitud'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';

					?>
					<label  class="col-md-2 col-form-label"  id="lblnombre">Latitud</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['latitud_gmd'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>
					<label  class="col-md-2 col-form-label"  id="lblnombre">Longitud</label>

					<?php

						$data = array(	
								'name'	=>	'txtcodigoprod' , 
								'id'	=>	'',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aDatoGeneral[0]['longitud_gmd'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';

						echo form_hidden('txtid', $aFinca[0]['id_finca']);
					?>

					<br/><br/>
					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> INFORMACION INSPECTOR </div>
					</div>


					<label  class="col-md-2 col-form-label required">Inspector Interno</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaInspector as $key => $row) {
					    	$options[$row['id_inspector']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="inspector"';

						echo '<div class="col-md-4 row no-gutters"  id="div-inspector">
                            <div class="col-11">'.form_dropdown('cboInspector', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-inspector"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txtinspector_nom' , 
								'id'	=>	'inspector1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nombres',
								'autocomplete' => 'off'
								);
                        $data2 = array(	
								'name'	=>	'txtinspector_ape' , 
								'id'	=>	'inspector2',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Apellidos',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-inspector1">
                            <div class="col-5">'.form_input($data).'</div>
                            <div class="col-5">'.form_input($data2).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-inspector"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-inspector"><span class="icon-cross"></span></div>
                            </div>';


                    ?>  

                    <label  class="col-md-2 col-form-label required">Fecha Inspeccion</label>

                    <?php

                    $data = array(
                            'name'			=>	'txtFecInspeccion' , 
                            'value'			=> '',
                            'id'			=>	'fecInspeccion',
                            'class'			=>	"form-control form-control-sm datetimepicker-input",
                            'placeholder'	=> '',
                            'data-toggle'	=> 'datetimepicker',
                            'data-target' 	=> "#fecInspeccion",
                            'autocomplete' => 'off'
                            );

                    echo '<div class="col-md-4 row no-gutters">
                            <div class="col-11">'.form_input($data).'</div>
                            <div class="col-1" id="icon-delete-fecEmision"><span class="icon-spinner11"></span></div>
                            </div>';
                    ?>


                    <div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> II. ESTANDARES A CUMPLIR - ORGANICOS, SOCIALES Y SOSTENIBLES </div>
					</div>
                    
					<?php
						$options = '<input type="checkbox" name="estandarNOP" value="1"><label>&nbspNOP&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

						$options = '<input type="checkbox" name="estandarCEE" value="1"><label>&nbspCEE #834/07 889/08&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

						$options = '<input type="checkbox" name="estandarJAS" value="1"><label>&nbspJAS Notific.# 1605&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

						$options = '<input type="checkbox" name="estandarperuDS" value="1"><label>&nbspPerú DS # 004/2006&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3" >'.$options.'</div>';

						$options = '<input type="checkbox" name="estandarbioSuisse" value="1"><label>&nbspBio Suisse&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

						$options = '<input type="checkbox" name="estandarRAS" value="1"><label>&nbspRAS&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

						$options = '<input type="checkbox" name="estandarUTZ" value="1"><label>&nbspUTZ&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

						$options = '<input type="checkbox" name="estandarFairtrade" value="1"><label>&nbspFairtrade&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

						$options = '<input type="checkbox" name="estandarCAFE" value="1"><label>&nbspC.A.F.E. Practices&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';

						$options = '<input type="checkbox" name="estandarNaturland" value="1"><label>&nbspNaturland&nbsp&nbsp&nbsp</label>';
						echo '<div class="col-md-4 col-lg-3">'.$options.'</div>';
                    ?>

                    <div class="col-12 row2">
                    	<div class="col-md-10 bold encabezado1"> III. DATOS DE LA(S) PARCELA(S) DE CAFE </div>
                    	<button class="btn btn-sm btn-primary  col-md-2" name='btnAdicionarFilaParcela' value='Editar' id='btnAdicionarFilaParcela'>
							<i class="icon-plus"></i> Añadir Fila
						</button>
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

                    	echo form_hidden('txtidparcela', -1);

						?>

						</div>
					</div>



					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> IV. VERIFICACION DE CONFORMIDAD CON LAS NORMAS </div>
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
								/*'id'	=>	'pregunta_',*/
								'class'	=>	"form-control form-control-sm radPregunta",
								'checked'=> false
								);
						$data = array(	
								/*'id'	=>	'obs_',*/
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						$i = 0;
						foreach ($aCuestionario1 as $key => $row) {
							$dataRad['name'] 	= 'radPregunta_'.$i;
							$data['name'] 		= 'txtObsPregunta_'.$i;
							
						 	$html  = '<div class="col-md-4 col-form-label">'.($i+1).'. '.$row['descripcion'].'</div>';
						 	$html .= '<div class="col-md-1 col-form-label">TODOS</div>';
						 	$dataRad['value'] = 2;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$dataRad['value'] = 1;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$dataRad['value'] = 0;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$html .= '<div class="col-md-4 col-form-label">'.form_input($data).'</div>';
						 	echo $html;

						 	echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);
						 	$i++;
						}
						?>

					</div>

					<div class="col-12 row2">
						
						<div class="col-12 row2">
                    		<div class="col-md-12 bold encabezado1"> BIENESTAR SOCIAL Y LABORAL </div>
						</div>
						<?php

						$dataRad = array(	
								'class'	=>	"form-control form-control-sm radPregunta",
								'checked'=> false
								);
						$data = array(	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						foreach ($aCuestionario2 as $key => $row) {
							$dataRad['name'] 	= 'radPregunta_'.$i;
							$data['name'] 		= 'txtObsPregunta_'.$i;

						 	$html  = '<div class="col-md-4 col-form-label">'.($i+1).'. '.$row['descripcion'].'</div>';
						 	$html .= '<div class="col-md-1 col-form-label">TODOS</div>';
						 	$dataRad['value'] = 2;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$dataRad['value'] = 1;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$dataRad['value'] = 0;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$html .= '<div class="col-md-4 col-form-label">'.form_input($data).'</div>';
						 	echo $html;

						 	echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);
						 	$i++;
						}
						?>

					</div>

					<div class="col-12 row2">
						
						<div class="col-12 row2">
                    		<div class="col-md-12 bold encabezado1"> CONSERVACIÓN DE ECOSISTEMAS, AGUA, SUELOS Y VIDA SILVESTRE </div>
						</div>
						<?php

						$dataRad = array(	
								'class'	=>	"form-control form-control-sm radPregunta",
								'checked'=> false
								);
						$data = array(	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						foreach ($aCuestionario3 as $key => $row) {
							$dataRad['name'] 	= 'radPregunta_'.$i;
							$data['name'] 		= 'txtObsPregunta_'.$i;

						 	$html  = '<div class="col-md-4 col-form-label">'.($i+1).'. '.$row['descripcion'].'</div>';
						 	$html .= '<div class="col-md-1 col-form-label">TODOS</div>';
						 	$dataRad['value'] = 2;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$dataRad['value'] = 1;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$dataRad['value'] = 0;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$html .= '<div class="col-md-4 col-form-label">'.form_input($data).'</div>';
						 	echo $html;

						 	echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);
						 	$i++;
						}
						?>

					</div>

					<div class="col-12 row2">
						
						<div class="col-12 row2">
                    		<div class="col-md-12 bold encabezado1"> MANEJO INTEGRADO DE CULTIVO Y RESIDUOS </div>
						</div>
						<?php

						$dataRad = array(	
								'class'	=>	"form-control form-control-sm radPregunta",
								'checked'=> false
								);
						$data = array(	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						foreach ($aCuestionario4 as $key => $row) {
							$dataRad['name'] 	= 'radPregunta_'.$i;
							$data['name'] 		= 'txtObsPregunta_'.$i;

						 	$html  = '<div class="col-md-4 col-form-label">'.($i+1).'. '.$row['descripcion'].'</div>';
						 	$html .= '<div class="col-md-1 col-form-label">TODOS</div>';
						 	$dataRad['value'] = 2;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$dataRad['value'] = 1;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$dataRad['value'] = 0;
						 	$html .= '<div class="col-1 col-form-label">'.form_radio($dataRad).'</div>';
						 	$html .= '<div class="col-md-4 col-form-label">'.form_input($data).'</div>';
						 	echo $html;

						 	echo form_hidden('txtidPregunta_'.$i, $row['id_pregunta']);
						 	$i++;
						}

						echo form_hidden('txtTotalPregunta', $i);
						?>

					</div>


					<div class="col-12 row2">
                    	<div class="col-md-10 bold encabezado1"> V. RESÚMEN DE NO CONFORMIDADES Y ACCIONES PROPUESTAS POR EL PRODUCTOR </div>
                    	<button class="btn btn-sm btn-primary  col-md-2" name='btnAdicionarFilaManifiesto' value='Editar' id='btnAdicionarFilaManifiesto'>
							<i class="icon-plus"></i> Añadir Fila
						</button>

					</div>


					<div class="col-12 row2" id="div_manifiesto_detalle">
						<div class="col-12 row row_div2" id="div_thead_anual">
	                    	<div  class="col-4 col-form-label bold thead_div1 ">N° DE ITEM</div>
	                    	<div  class="col-8 col-form-label bold thead_div1">MANIFIESTO DEL PRODUCTOR</div>

                    	</div>
                    	<div class="col-12 row row_div2" id="div_filaManifiesto">
                    	<?php

                    	echo form_hidden('txtidmanifiesto', -1);

						/*
						echo '<div class="col-4" id="">1</div>';

						$data = array(	
								'name'	=>	'txtinput1_0' , 
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-8 form-group row ">
							<div class="col-10 col-md-11 div_input">'.form_input($data).'</div>
							<div class="col-2 col-md-1 div_icon"></div>
						</div>';
						*/

						?>
						</div>
					</div>



					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> VI. DECLARACION </div>
					</div>

					<div class="col-12 row2">
						<div  class="col-md-12 col-form-label">Como productor/a declaro mi conformidad con lo expresado en esta ficha y afirmo que no aplico  procedimientos no declarados.</div>

						<div class="col-md-12 row2">
							<div class="col-md-4 bold div_centrado div_porcentaje"> PORCENTAJE DE CUMPLIMIENTO = </div>
							<div class="col-md-4 bold"> 
								<?php

								$data = array(	
										'name'	=>	'txtItemCumplido' , 
										'readonly' => 'readonly',
										'value' => 0,
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off'
										);
								echo '<div class="col-md-12 row">
										<div class="col-6 div_centrado"># Ítem cumplidos</div>
										<div class="col-6 div_centrado">'.form_input($data).'</div>
									</div>';
								$data = array(	
										'name'	=>	'txtItemAplica' , 
										'readonly' => 'readonly',
										'value' => $i,
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off'
										);
								echo '<div class="col-md-12 row border_top">
										<div class="col-6 div_centrado"># Ítem que aplican</div>
										<div class="col-6 div_centrado">'.form_input($data).'</div>
									</div>';
								?>
							</div>
							<?php

								$data = array(	
										'name'	=>	'txtPorcentajeItem' , 
										'readonly' => 'readonly',
										'value' => '0',
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off'
										);
								echo '<div class="col-md-4 row bold div_centrado div_porcentaje">
										<div class="col-md-1">=</div><div class="col-md-7">'.form_input($data).'</div><div class="col-md-2">%</div></div>';
								?>


							
						</div>
					</div>


					<div class="col-12 row2">
                    	<div class="col-md-10 bold encabezado1"> VII. LEVANTAMIENTO DE LAS NO CONFORMIDADES </div>
                    	<button class="btn btn-sm btn-primary  col-md-2" name='btnAdicionarFilaConformidad' value='Editar' id='btnAdicionarFilaConformidad'>
							<i class="icon-plus"></i> Añadir Fila
						</button>

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

                    	echo form_hidden('txtidconformidad', -1);						

						?>
						</div>
					</div>


					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> DECISION  DEL COMITÉ DE APROBACIÓN Y SANCIONES </div>
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
						);

						echo '<div class="col-md-12 row2"><div class="col-md-12">'.form_checkbox($chkdata).'<label>&nbspExclusión del Programa&nbsp&nbsp&nbsp</label></div></div>';
						$chkdata['name'] = 'chksuspensionDias';
						echo '<div class="col-md-12 row2">
								<div class="col-md-3">'.form_checkbox($chkdata).'&nbspSuspensión por un tiempo de &nbsp&nbsp</div><div class="col-md-2">'.form_input($data).'</div></div>';
						$chkdata['name'] = 'chkLevantarNoconf';
						echo '<div class="col-md-12 row2"><div class="col-md-12">'.form_checkbox($chkdata).'
						<label>&nbspNo Conformidades y observaciones deben ser levantadas hasta la próxima inspección interna&nbsp&nbsp&nbsp</label></div></div>';
						$chkdata['name'] = 'chkAprueba';
						echo '<div class="col-md-12 row2"><div class="col-md-12">'.form_checkbox($chkdata).'<label>&nbspAprueba sin condiciones&nbsp&nbsp&nbsp</label></div></div>';
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