
<div class="container div-container">
	<!--h1>Registro de Clientes</h1-->
	<div class="row row-principal">

		<div class="col-12 div-encabezado">
				Guia de Recepcion Detalle
		</div>
		
		<div class="col-12">

			<div class="col-12" id="validacion_errores"></div>
			
			<!-- TITULO DEL FORMULARIO -->

			<div class="tab-content">

		        <!-- campos del formulario-->
		        <div class ="tab-pane fade show active" id="div-detalle" role="tabpanel">
			        <div class = "div-marco" id="div-productor_0">	

				        <div class = "" id="div-productor">	        	

						    <div class="row">					
								<div class="col-md-12 row2">
									<label class="col-md-12 bold" id="lblRegistroProductor">
										Registrado el <?=$aContrato['fec_registro'];?>
									</label>
								</div>
							</div>
						

							<?= form_open(base_url().'', array(
								        'name' => 'form_productordetalle',
								        'id'=>'form_productordetalle',
								        'class'=> 'form-productordetalle',
								        'role' => 'form' ));
							?>
							<!--div class="row">
								
								<?=form_hidden('txtId', $aProductor['id_productor']);?>

								<div   class="col-md-2 col-form-label required1">Estado:</div>
								<label for="descestado"  class="form-control-sm show col-md-4" id="lblestado"><?=$aProductor['estado'];?></label>
								<label for="estado"  class="d-none" id="lblestado1"><?=$aProductor['id_estado'];?></label>

								<?php

									$optionsTar = array();
						    		foreach ($aListaEstado as $key => $row) {
						    			$optionsTar[$row['id_estado']] = $row['descripcion'];
						    		}
							                       
									$adicional = 'class="form-control form-control-sm" id="estado" ';
									
									echo '<div class="col-md-10 row no-gutters hidden no-show">
									<div class="col-12">'.form_dropdown('cboEstado', $optionsTar, $aProductor['id_estado'] ,$adicional).'</div>
									</div>';

									// boton Reenvio
							    	$formatoReenvio = array(
							        	'name' => 'btnGuardarProductor',
							        	'value' => 'Guardar Cambios',
							        	'id' => 'btnGuardarProductor',
							        	'class' => 'btn btn-sm btn-primary btn-block',
							        	'disabled' => 'disabled'
							    	);

							    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarProductor">'.form_submit($formatoReenvio).'</div>';
							    	echo '<div class="col-md-6 col-lg-2"  id="div-btnCancelarProductor"><button name="btn" value="CANCELAR" id="btnCancelarProductor" class="btn btn-sm btn-secondary btn-block" disabled="disabled" style="display:none">Cancelar</button></div>';
								?>
								
							</div-->
							<?= form_close();?>
						</div>

						<div class="col-12 row2">
								<div class="col-12" id="validacion_productor"></div>
								
								<div  class="col-md-10 bold encabezado1 ">DATOS GENERALES</div>
								
						</div>

						<div class = "" id="div-">	
							<div class="row">

								<div   class="col-md-2 col-form-label bold">Nro contrato</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['nro_contrato'];?></label>
								
								<div   class="col-md-2 col-form-label bold">Fecha Contrato</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['fecha'];?></label>

								<div   class="col-md-2 col-form-label bold">Codigo Cliente</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['codigo'];?></label>

								<div   class="col-md-2 col-form-label bold">Flo Id</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['flo_id'];?></label>

								<div   class="col-md-2 col-form-label bold">Cliente</div>
								<label for=""  class="form-control-sm show col-md-10" id=""><?=$aContrato['razon_social'];?></label>

								<div   class="col-md-2 col-form-label bold">Condicion de Embarque</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['condicion_embarque'];?></label>

								<div   class="col-md-2 col-form-label bold">Fecha de Embarque</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['fecha_embarque'];?></label>

								<div   class="col-md-2 col-form-label bold">Destino: Pais</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['pais'];?></label>

								<div   class="col-md-2 col-form-label bold">Destino: Ciudad</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['ciudad'];?></label>																																										

							</div>

						</div>


						<div class="col-12 row2">
								<div class="col-12" id="validacion_productor"></div>
								<div  class="col-md-10 bold encabezado1 ">DETALLE DE LA COMPRA</div>
						</div>

						<div class = "" id="div-">	
							<div class="row">

								<div   class="col-md-2 col-form-label bold">Tipo Contrato</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['tipo_contrato'];?></label>
								
								<div   class="col-md-2 col-form-label bold">Moneda</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['fecha'];?></label>

								<div   class="col-md-2 col-form-label bold">Precio</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['precio'];?></label>

								<div   class="col-md-2 col-form-label bold">Calculo</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['calculo'];?></label>

								<div   class="col-md-2 col-form-label bold">Periodo Cosecha</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['periodo_cosecha'];?></label>

								<div   class="col-md-2 col-form-label bold">Tipo Produccion</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['tipo_produccion'];?></label>

								<div   class="col-md-2 col-form-label bold">Producto</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['producto'];?></label>

								<div   class="col-md-2 col-form-label bold">SubProducto</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['sub_producto'];?></label>

								<div   class="col-md-2 col-form-label bold">Certificadora</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['entidad_certificadora'];?></label>													
								<div   class="col-md-2 col-form-label bold">Certificacion</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['tipo_certificacion'];?></label>

								<div   class="col-md-2 col-form-label bold">Peso Contrato</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['peso_contrato'];?></label>

								<div   class="col-md-2 col-form-label bold">Unidad Medida</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['unidad_medida'];?></label>

								<div   class="col-md-2 col-form-label bold">Empaque/Tipo</div>
								<label for=""  class="form-control-sm show col-md-10" id=""><?=$aContrato['empaque_tipo'];?></label>

								<div   class="col-md-2 col-form-label bold">Total Sacos</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['total_sacos'];?></label>

								<div   class="col-md-2 col-form-label bold">Calidad</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['calidad_cafe'];?></label>

								<div   class="col-md-2 col-form-label bold">Peso Por Saco KG</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['peso_neto_kg'];?></label>

								<div   class="col-md-2 col-form-label bold">Grado</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['grado'];?></label>

								<div   class="col-md-2 col-form-label bold">Peso Neto KG</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['peso_neto_kg'];?></label>

								<div   class="col-md-2 col-form-label bold">Cantidad de defectos</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['cantidad_defectos'];?></label>

								<div   class="col-md-12 col-form-label bold">Observaciones</div>
								<label for=""  class="form-control-sm show col-md-12" id=""><?=$aContrato['observaciones'];?></label>

			       		<div class="col-12 row2">
								<div class="col-12" id="validacion_productor"></div>
								<div  class="col-md-10 bold encabezado1 ">ASIGNAR CONTRATO</div>
										
								<button class="btn btn-sm btn-primary  col-md-2" name='btnRegistrarAsignacion' value='Registrar' id='btnRegistrarAsignacion'>
											<i class="icon-pencil2"></i> Nueva Asignacion
								</button>

						</div>

						<?php
						foreach ($aAsignar as $key => $row):?>
							
							<div   class="col-md-2 col-form-label bold">Peso Neto KG (Oro)</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$row['peso_neto_kg'];?></label>
							<div   class="col-md-6 col-form-label bold"></div>
							<div   class="col-md-2 col-form-label bold">KG Pergamino</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$row['kg_pergamino'];?></label>

							<div   class="col-md-2 col-form-label bold">% Rendimiendo</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$row['ini_rendimiento'];?></label>

							<div   class="col-md-2 col-form-label bold">Peso neto en QQ</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$row['kg_qq'];?></label>
							
							<div   class="col-md-2 col-form-label bold">Total KG Pergamino</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$row['total_kg_pergamino'];?></label>

							<div  class="col-md-12 encabezado1 "></div>
						<?php
							endforeach;
						?>

						<div class="col-md-12" id="validacion_AsigContrato"></div>

						<?= form_open(base_url().'', array(
										        'name' => 'form_asignarcontratodetalle',
										        'id'=>'form_asignarcontratodetalle',
										        'class'=> 'form-asignarcontratodetalle',
										        'role' => 'form' ));
						?>
						<?=form_hidden('txtIdContrato', $aContrato['id_contrato']);?>
						<div class="row3">

							<div   class="col-md-2 col-form-label bold">Peso Neto KG (Oro)</div>

							<?php

								$data = array(	
										'name'	=>	'txtPesoNetoKg2' , 
										'id'	=>	'pesoNetoKg2',	
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off',
										'readonly' => 'readonly',
										'value' => $aContrato['peso_neto_kg']
										);
								
								echo '<div class="col-md-4 row no-gutters" id="divpesoNetoKg2">
										<div class="col-12">'.form_input($data).'</div>
									</div>';
							?>
							<div class="col-md-6"></div>
							<div class="col-md-6 col-form-label bold">Seleccione KG Pergamino | Porcentaje</div>
							
							<?php

								$options = array( 0 => ' - Seleccionar - ');
								$adicional = 'class="form-control form-control-sm" id="kgpergamino"
										disabled= "disabled"';
								foreach ($aPergaRendimiento as $key => $row) {
									$options[$row['id_pergamino_rendimiento']] = $row['kg_pergamino']." | ".$row['ini_rendimiento']."%"." - ".$row['fin_rendimiento']."%";
								}
								echo '<div class="col-md-6">'.form_dropdown('cbokgpergamino', $options, 0 ,$adicional).'</div>';
							?>
							<div class="col-md-2 col-form-label bold">KG Pergamino</div>
							<?php

								$data = array(	
										'name'	=>	'txtkgpergamino2' , 
										'id'	=>	'kgpergamino2',	
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off',
										'disabled' => 'disabled'
										);
								
								echo '<div class="col-md-4 row no-gutters" id="divkgpergamino2">
										<div class="col-12">'.form_input($data).'</div>
									</div>';
							?>

							<div class="col-md-2 col-form-label bold">% Rendimiendo</div>

							<?php

								$data = array(	
										'name'	=>	'txtrendimiento' , 
										'id'	=>	'rendimiento',	
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off',
										'disabled' => 'disabled'
										);
								
								echo '<div class="col-md-4 row no-gutters" id="divrendimiento">
										<div class="col-12">'.form_input($data).'</div>
									</div>';
							?>

							<div class="col-md-2 col-form-label bold">Peso neto en QQ</div>

							<?php

								$data = array(	
										'name'	=>	'txtpesonetoqq' , 
										'id'	=>	'pesonetoqq',	
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off',
										'readonly' => 'readonly',
										'value' => round(($aContrato['peso_neto_kg']/46),2)
										);
								
								echo '<div class="col-md-4 row no-gutters" id="divpesonetoqq">
										<div class="col-12">'.form_input($data).'</div>
									</div>';
							?>
							<div class="col-md-2 col-form-label bold">Total KG Pergamino</div>

							<?php

								$data = array(	
										'name'	=>	'txttotalkgpergamino' , 
										'id'	=>	'totalkgpergamino',	
										'class'	=>	"form-control form-control-sm",
										'placeholder'=> '',
										'autocomplete' => 'off',
										'readonly' => 'readonly'
										);
								
								echo '<div class="col-md-4 row no-gutters" id="divtotalkgpergaminol">
										<div class="col-12">'.form_input($data).'</div>
									</div>';

								$formatoReenvio = array(
							        	'name' => 'btnGuardarAsigContrato',
							        	'value' => 'Guardar Cambios',
							        	'id' => 'btnGuardarAsigContrato',
							        	'class' => 'btn btn-sm btn-primary btn-block',
							        	'disabled' => 'disabled'
							    	);

							    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarAsigContrato">'.form_submit($formatoReenvio).'</div>';
							    	echo '<div class="col-md-6 col-lg-2" style="display:none" id="div-btnCancelarAsigContrato"><button name="btn" value="CANCELAR" id="btnCancelarAsigContrato" class="btn btn-sm btn-secondary btn-block" disabled="disabled">Cancelar</button></div>';
							?>     
						</div>
						<?= form_close();?>


						<div class="col-12 row2">
								<div class="col-12" id="validacion_productor"></div>
								<div  class="col-md-10 bold encabezado1 ">DETALLE DE VALORES PARA CALCULO DEL PRECIO DEL DIA</div>
						</div>								


								<div   class="col-md-2 col-form-label bold">Factura en</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['facturaren'];?></label>
								
								<div   class="col-md-2 col-form-label bold">Fec. Fijacion Contrato</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['fecha_fijacion'];?></label>

								<div   class="col-md-2 col-form-label bold">KG Neto en QQ(a)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['kg_qq'];?></label>

								<div   class="col-md-2 col-form-label bold">Estado Fijacion</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['estado_fijacion'];?></label>

								<div   class="col-md-2 col-form-label bold">KG Neto en LB(b)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['kg_lb'];?></label>

								<div   class="col-md-2 col-form-label bold">Precio Nivel de Fijacion (1)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['precio_nivel_fijacion'];?></label>

								<div   class="col-md-2 col-form-label bold">Diferencial (2)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['diferencial'];?></label>

								<div   class="col-md-2 col-form-label bold">Nota Credito/Comision</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['nota_credito'];?></label>

								<div   class="col-md-2 col-form-label bold">Gastos Exp./Costos</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['gastos_exp'];?></label>													
								<div   class="col-md-6 col-form-label bold"></div>

								<div   class="col-md-2 col-form-label bold">PU TOTAL A (1+2)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['pu_total_a'];?></label>

								<div   class="col-md-2 col-form-label bold">Total Facturar (1)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['total_facturar_1'];?></label>

								<div   class="col-md-2 col-form-label bold">PU TOTAL B (A - NC/C)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['pu_total_b'];?></label>

								<div   class="col-md-2 col-form-label bold">Total Facturar (2)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['total_facturar_2'];?></label>

								<div   class="col-md-2 col-form-label bold">PU TOTAL C (B - G.EXP/Cs)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['pu_total_c'];?></label>

								<div   class="col-md-2 col-form-label bold">Total Facturar (3)</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aContrato['total_facturar_3'];?></label>



							</div>

						</div>


					</div>

				</div>



			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-6 col-md-2">
			<div class="social">
		 		<a href="<?=base_url();?>contrato" class="social__button icon_pie"><i class="icon-undo2"></i></a>
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


