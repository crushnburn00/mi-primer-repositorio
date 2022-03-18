
<div class="container div-container">

	<div class="row row-principal">

		<div class="col-12 div-encabezado">
				Certificacion Detalle
		</div>
		
		<div class="col-12">

			<div class="col-12" id="validacion_errores"></div>
			
			<!-- TITULO DEL FORMULARIO -->

			<div class="tab-content">

		        <!-- campos del formulario-->
		        <div class ="tab-pane fade show active" id="div-detalle" role="tabpanel">
			        <div class = "div-marco" id="div-_0">	

				        <div class = "" id="div-">	        	

						    <div class="row">					
								<div class="col-md-12 row2">
									<label class="col-md-12 bold" id="lblRegistroProductor">
										Registrado el <?=$aCertificacion['fec_registro'];?>
									</label>
								</div>
							</div>
						
							<div class="col-12 row2">
								<div class="col-12" id="validacion_productor"></div>
								
								<div  class="col-md-12 bold encabezado1 ">INFORMACION FINCA</div>
								
							</div>
						</div>

						<div class = "" id="div-">	
							<div class="row">

								<div   class="col-md-2 col-form-label bold">Nombre</div>
								<label for=""  class="form-control-sm show col-md-10" id=""><?=$aCertificacion['nombre'];?></label>
								
							</div>

						</div>
						<?=form_hidden('txtid', $aCertificacion['id_finca']);?>

						<div class="col-12 row2">
								<div class="col-12" id="validacion_productor"></div>
								
								<div  class="col-md-10 bold encabezado1 ">INFORMACION CERTIFICACION</div>
								<button class="btn btn-sm btn-primary  col-md-2" name='btnEditarCertificacion' value='Editar' id='btnEditarCertificacion'>
									<i class="icon-pencil2"></i> Editar
								</button>
								
						</div>

						<?= form_open(base_url().'', array(
								        'name' => 'form_certificaciondetalle',
								        'id'=>'form_certificaciondetalle',
								        'class'=> 'form-certificaciondetalle',
								        'role' => 'form' ));
							?>
							<div class="row" id="div-certificacion">
								
								<?=form_hidden('txtIdCertificacion', $aCertificacion['id_certificacion']);?>
								

								<div   class="col-md-2 col-form-label required1">Estado:</div>
								<label for="descestado"  class="form-control-sm show col-md-4" id="lblestado"><?=$aCertificacion['estado'];?></label>
								<label for="estado"  class="d-none" id="lblestado1"><?=$aCertificacion['id_estado'];?></label>

								<?php

									$optionsTar = array();
						    		foreach ($aListaEstado as $key => $row) {
						    			$optionsTar[$row['id_estado']] = $row['descripcion'];
						    		}
							                       
									$adicional = 'class="form-control form-control-sm" id="estado" ';
									
									echo '<div class="col-md-10 row no-gutters hidden no-show">
									<div class="col-12">'.form_dropdown('cboEstado', $optionsTar, $aCertificacion['id_estado'] ,$adicional).'</div>
									</div>';

									// boton Reenvio
							    	$formatoReenvio = array(
							        	'name' => 'btnGuardarCertificacion',
							        	'value' => 'Guardar Cambios',
							        	'id' => 'btnGuardarCertificacion',
							        	'class' => 'btn btn-sm btn-primary btn-block',
							        	'disabled' => 'disabled'
							    	);

							    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarCertificacion">'.form_submit($formatoReenvio).'</div>';
							    	echo '<div class="col-md-6 col-lg-2"  id="div-btnCancelarCertificacion"><button name="btn" value="CANCELAR" id="btnCancelarCertificacion" class="btn btn-sm btn-secondary btn-block" disabled="disabled" style="display:none">Cancelar</button></div>';
								?>
								
							</div>
							<?= form_close();?>


						<div class = "" id="div-">	
							<div class="row">

								<div   class="col-md-2 col-form-label bold">Tipo Certificacion</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCertificacion['tipo_certificacion'];?></label>
								
								<div   class="col-md-2 col-form-label bold">Entidad Certificadora</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCertificacion['entidad_certificadora'];?></label>

								<div   class="col-md-2 col-form-label bold">Fecha Emision</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCertificacion['fecha_emision'];?></label>

								<div   class="col-md-2 col-form-label bold">Fecha Expiracion</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCertificacion['fecha_expiracion'];?></label>
																		

								<label  class="col-md-12 col-form-label bold">Ficheros adjuntos:</label>	
								
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
		 		<a href="<?=base_url();?>certificacion/listar/<?=$aCertificacion['id_finca'];?>" class="social__button icon_pie"><i class="icon-undo2"></i></a>
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


