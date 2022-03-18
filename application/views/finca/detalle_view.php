
<div class="container div-container">
	<!--h1>Registro de Clientes</h1-->
	<div class="row row-principal">

		<div class="col-12 div-encabezado">
				Finca Detalle
		</div>
		
		<div class="col-12">

			<div class="col-12" id="validacion_errores"></div>
			
			<!-- TITULO DEL FORMULARIO -->

			<div class="tab-content">

		        <!-- campos del formulario-->
		        <div class ="tab-pane fade show active" id="div-detalle" role="tabpanel">
			        <div class = "div-marco" id="div-finca_0">	

				        <div class = "" id="">	        	
							
							<div class="row">	
								<div class="col-md-12 row2">
									<label class="col-md-12 bold" id="lblRegistro">
											Registrado el <?=$aFinca['fec_registro'];?>
									</label>
								</div>
							</div>

							<div class="col-12 row2">
								<div class="col-12" id="validacion_cliente"></div>
								
								<div  class="col-md-12 bold encabezado1 ">INFORMACION SOCIO</div>
								
							</div>
							<div class = "" id="div-">
								<div class="row">
									<div   class="col-md-2 col-form-label bold">Codigo</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['codigo'];?></label>

		 							<div   class="col-md-2 col-form-label bold">Nombre / Razon Social</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['nombre_razon'];?></label>  
								</div>
							</div>
							<?=form_hidden('txtid', $aFinca['id_socio']);?>
							<div class="col-12 row2">
								<div class="col-12" id="validacion_finca"></div>
								
								<div  class="col-md-10 bold encabezado1 ">INFORMACION FINCA</div>

								<button class="btn btn-sm btn-primary  col-md-2" name='btnEditarFinca' value='Editar' id='btnEditarFinca'>
									<i class="icon-pencil2"></i> Editar
								</button>
								
							</div>

							<?= form_open(base_url().'', array(
								        'name' => 'form_fincadetalle',
								        'id'=>'form_fincadetalle',
								        'class'=> 'form-fincadetalle',
								        'role' => 'form' ));
							?>
							<div class="row" id="div-finca">									
								<?=form_hidden('txtIdFinca', $aFinca['id_finca']);?>

								<div   class="col-md-2 col-form-label required1 bold">Estado:</div>
								<label for="descestado"  class="form-control-sm show col-md-4" id="lblestado"><?=$aFinca['estado'];?></label>
								<label for="estado"  class="d-none" id="lblestado1"><?=$aFinca['id_estado'];?></label>

									<?php

										$optionsTar = array();
							    		foreach ($aListaEstado as $key => $row) {
							    			$optionsTar[$row['id_estado']] = $row['descripcion'];
							    		}
								                       
										$adicional = 'class="form-control form-control-sm" id="estado" ';
										
										echo '<div class="col-md-10 row no-gutters hidden no-show">
										<div class="col-12">'.form_dropdown('cboEstado', $optionsTar, $aFinca['id_estado'] ,$adicional).'</div>
										</div>';

										// boton Reenvio
								    	$formatoReenvio = array(
								        	'name' => 'btnGuardarFinca',
								        	'value' => 'Guardar Cambios',
								        	'id' => 'btnGuardarFinca',
								        	'class' => 'btn btn-sm btn-primary btn-block',
								        	'disabled' => 'disabled'
								    	);

								    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarFinca">'.form_submit($formatoReenvio).'</div>';
								    	echo '<div class="col-md-6 col-lg-2"  id="div-btnCancelarFinca"><button name="btn" value="CANCELAR" id="btnCancelarFinca" class="btn btn-sm btn-secondary btn-block" disabled="disabled" style="display:none">Cancelar</button></div>';
									?>
							</div>
							<?= form_close();?>
							
								<div class="row">
									<div   class="col-md-2 col-form-label bold">Nombres</div>
									<label for=""  class="form-control-sm show col-md-10" id=""><?=$aFinca['nombre'];?></label>

									<div   class="col-md-2 col-form-label bold">Direccion</div>
									<label for=""  class="form-control-sm show col-md-10" id=""><?=$aFinca['direccion'];?></label>

									<div   class="col-md-2 col-form-label bold">Departamento</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['departamento'];?></label>

									<div   class="col-md-2 col-form-label bold">Provincia</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['provincia'];?></label>

									<div   class="col-md-2 col-form-label bold">Distrito</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['distrito'];?></label>

									<div   class="col-md-2 col-form-label bold">Zona</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['zona'];?></label>							

									<div   class="col-md-2 col-form-label bold">Latitud GMD</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['latitud_gmd'];?></label>		

									<div   class="col-md-2 col-form-label bold">Latitud</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['latitud_decimal'];?></label>		

									<div   class="col-md-2 col-form-label bold">Longitud GMD</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['longitud_gmd'];?></label>		

									<div   class="col-md-2 col-form-label bold">Longitud</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['longitud_decimal'];?></label>		

									<div   class="col-md-2 col-form-label bold">Altitud</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['altitud'];?></label>																			
									
									<div   class="col-md-2 col-form-label bold">Material de Vivienda</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['vivienda'];?></label>		

									<div   class="col-md-2 col-form-label bold">Suelo</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['suelo'];?></label>		

									<div   class="col-md-2 col-form-label bold">Fuente de Energia</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['energia'];?></label>		

									<div   class="col-md-2 col-form-label bold">Fuente de Agua</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['agua'];?></label>		

									<div   class="col-md-2 col-form-label bold">Nro de Animales Menores</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['cant_animales'];?></label>

									<div   class="col-md-2 col-form-label bold">Internet</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['desc_internet'];?></label>

									<div   class="col-md-2 col-form-label bold">Señal Telefonica</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['telefonia'];?></label>

									<div   class="col-md-2 col-form-label bold">Establecimiento de Salud</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['desc_establecimiento_salud'];?></label>

									<div   class="col-md-2 col-form-label bold">Tiempo de la unidad al Centro de Salud</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['tiempo_centro_salud'];?></label>

									<div   class="col-md-2 col-form-label bold">Centro Educativo</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['desc_centro_educativo'];?></label>

									<label for=""  class="form-control-sm show col-md-6" id=""><?=$aFinca['grado_estudio'];?></label>

									<label  class="col-md-12 col-form-label ">Mapa de la finca:</label>	
										
										<div class="col-12 row2 bold" id="div_fichero">
											<?php
											if(empty($aAdjuntoMapa)){
												echo '<span class="col-md-12">No existe ningún fichero cargado</span>';
												echo form_hidden('txtCantAdjunto', 0);}
											else
												foreach ($aAdjuntoMapa as $row) : ?>
													<span class="col-md-7 icono1">
														<a href="<?=base_url().'adjunto/mostrarImagen/'.str_replace('=','',base64_encode($row['ruta']));?>" target="_blank" title="MOSTRAR IMAGEN"><span class='icon-eye-plus'></span></a>
														<a href="<?=base_url().'adjunto/descargar/'.str_replace('=','',base64_encode($row['ruta'])).'/'.str_replace('=','',base64_encode($row['nombre']));?>" title="DESCARGAR IMAGEN"><span class='icon-download'></span></a>
														<span class=""><?=$row['nombre'];?></span>
													</span>	
													<span  class="col-md-5  right"><?=$row['fec_registro'];?></span>
											<?php	
											endforeach;	?>
									</div>

									<label  class="col-md-12 col-form-label ">Foto Georeferencial:</label>	
										
										<div class="col-12 row2 bold" id="div_fichero">
											<?php
											if(empty($aAdjuntoFotoGeoReferencial)){
												echo '<span class="col-md-12">No existe ningún fichero cargado</span>';
												echo form_hidden('txtCantAdjunto', 0);}
											else
												foreach ($aAdjuntoFotoGeoReferencial as $row) : ?>
													<span class="col-md-7 icono1">
														<a href="<?=base_url().'adjunto/mostrarImagen/'.str_replace('=','',base64_encode($row['ruta']));?>" target="_blank" title="MOSTRAR IMAGEN"><span class='icon-eye-plus'></span></a>
														<a href="<?=base_url().'adjunto/descargar/'.str_replace('=','',base64_encode($row['ruta'])).'/'.str_replace('=','',base64_encode($row['nombre']));?>" title="DESCARGAR IMAGEN"><span class='icon-download'></span></a>
														<span class=""><?=$row['nombre'];?></span>
													</span>	
													<span  class="col-md-5  right"><?=$row['fec_registro'];?></span>
											<?php	
											endforeach;	?>
									</div>

									<label  class="col-md-12 col-form-label ">Documentos Adjuntos:</label>	
									
									<div class="col-12 row2 bold" id="div_fichero">
										<?php
										if(empty($aAdjuntoDocumento)){
											echo '<span class="col-md-12">No existe ningún fichero cargado</span>';
											echo form_hidden('txtCantAdjunto', 0);}
										else
											foreach ($aAdjuntoDocumento as $row) : ?>
												<span class="col-md-7 icono1">
													<a href="<?=base_url().'adjunto/mostrarImagen/'.str_replace('=','',base64_encode($row['ruta']));?>" target="_blank" title="MOSTRAR IMAGEN"><span class='icon-eye-plus'></span></a>
													<a href="<?=base_url().'adjunto/descargar/'.str_replace('=','',base64_encode($row['ruta'])).'/'.str_replace('=','',base64_encode($row['nombre']));?>" title="DESCARGAR IMAGEN"><span class='icon-download'></span></a>
													<span class=""><?=$row['nombre'];?></span>
												</span>	
												<span  class="col-md-5  right"><?=$row['fec_registro'];?></span>
										<?php	
										endforeach;	?>
								</div>
							</div>


							<div class="col-12 row2">
		                    	<div class="col-md-12 bold encabezado1"> INFORMACION SOCIO </div>
							</div>

							
							<div class="row">

							<div   class="col-md-6 col-form-label bold">Vias de acceso del centro de acopio hasta la unidad productiva</div>
							<label for=""  class="form-control-sm show col-md-6" id=""><?=$aFinca['vias_acceso'];?></label>

							<div   class="col-md-2 col-form-label bold">Distancia KM</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['distancia_km'];?></label>

							<div   class="col-md-2 col-form-label bold">Tiempo total</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['tiempo'];?></label>

							<div   class="col-md-2 col-form-label bold">Medio de transporte</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['medio_transporte'];?></label>

							<div   class="col-md-2 col-form-label bold">Cultivo</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['cultivo'];?></label>

							<div   class="col-md-2 col-form-label bold">Precipitación</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['precipitacion'];?></label>

							<div   class="col-md-2 col-form-label bold">Nro personal en cosecha</div>
							<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['cant_personal_cosecha'];?></label>
							</div>

					<div class="col-12 row2">
                    	<div class="col-md-10 bold encabezado1"> INFORMACION ANUAL </div>
                    	<button class="btn btn-sm btn-primary  col-md-2" name='btnAdicionarFila' value='Editar' id='btnAdicionarFila'>
							<i class="icon-plus"></i> Añadir Fila
						</button>

					</div>
					<div class="col-12" id="validacion_fincaanual"></div>
					
					<?= form_open(base_url().'', array(
								        'name' => 'form_fincaanualdetalle',
								        'id'=>'form_fincaanualdetalle',
								        'class'=> 'form-fincaanualdetalle',
								        'role' => 'form' ));
					?>
					<div class="col-12 row2" id="div_finca_detalle">
						<div class="col-12 row row_div2" id="div_thead_anual">
	                    	<div  class="col-4 col-form-label bold thead_div1 ">Año</div>
	                    	<div  class="col-4 col-form-label bold thead_div1">Estimado Kg</div>
	                    	<div  class="col-4 col-form-label bold thead_div1">Consumido Kg</div>
                    	</div>
                    <?php
                    	echo form_hidden('txtidfinca', $aFinca['id_finca']);
							                 
                    	$i_fila = -1;
                    	echo '<div class="col-12 row row_div2" id="div_fila_inicial">';                    			
                    	echo form_hidden('txtidanual', -1);
                    	echo '</div>'; 

			                 if(!empty($aListaAnual)){
			                 	                  	
			                    foreach ($aListaAnual as $key => $row) {
			                    	$i_fila++;
			                    	echo '<div class="col-12 row row_div2" id="">';
			                    	echo '<label for=""  class="form-control-sm show col-md-4" id="">'.$row['anio'].'</label>';
			                    	echo '<label for=""  class="form-control-sm show col-md-4" id="">'.$row['kg_estimado'].'</label>';
			                    	echo '<label for=""  class="form-control-sm show col-md-4" id="">'.$row['kg_consumido'].'</label>';
			                    	echo '</div>';
			                    }
			                }
			        ?>              		
						
					</div>
					<?php
					$formatoReenvio = array(
							        	'name' => 'btnGuardarFincaAnual',
							        	'value' => 'Guardar Cambios',
							        	'id' => 'btnGuardarFincaAnual',
							        	'class' => 'btn btn-sm btn-primary btn-block',
							        	'disabled' => 'disabled'
							    	);
									echo '<div class="col-12 row" id="">';
							    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarFincaAnual">'.form_submit($formatoReenvio).'</div>';
							    	echo '<div class="col-md-6 col-lg-2"  id="div-btnCancelarFincaAnual"><button name="btn" value="CANCELAR" id="btnCancelarFincaAnual" class="btn btn-sm btn-secondary btn-block" disabled="disabled" style="display:none">Cancelar</button></div>';
							    	echo '</div>';

		            echo form_close();
		            ?> 
	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-6 col-md-2">
			<div class="social">
		 		<a href="<?=base_url();?>finca/listar/<?=$aFinca['id_socio'];?>" class="social__button icon_pie"><i class="icon-undo2"></i></a>
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


