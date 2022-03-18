
<div class="container div-container">
	<!--h1>Registro de Clientes</h1-->
	<div class="row row-principal">

		<div class="col-12 div-encabezado">
				Socio Detalle
		</div>
		
		<div class="col-12">

			<div class="col-12" id="validacion_errores"></div>
			
			<!-- TITULO DEL FORMULARIO -->

			<div class="tab-content">

		        <!-- campos del formulario-->
		        <div class ="tab-pane fade show active" id="div-detalle" role="tabpanel">
			        <div class = "div-marco" id="div-socio_0">	

				        <div class = "" id="div-socio">	        	

						    <div class="row">					
								<div class="col-md-12 row2">
									<div class="col-md-6 bold">Código del Socio: <?=$aSocio['codigo'];?></div><br/><br/>
									<label class="col-md-6 bold" id="lblRegistroSocio">
										Registrado el <?=$aSocio['fec_registro'];?>
									</label>
								</div>
							</div>
						
							<div class="col-12 row2">
								<div class="col-12" id="validacion_socio"></div>
								
								<div  class="col-md-10 bold encabezado1 ">DETALLE SOCIO</div>
								
								<button class="btn btn-sm btn-primary  col-md-2" name='btnEditarSocio' value='Editar' id='btnEditarSocio'>
									<i class="icon-pencil2"></i> Editar
								</button>
								
							</div>
							<?= form_open(base_url().'', array(
								        'name' => 'form_sociodetalle',
								        'id'=>'form_sociodetalle',
								        'class'=> 'form-sociodetalle',
								        'role' => 'form' ));
							?>
							<div class="row">
								
								<?=form_hidden('txtId', $aSocio['id_socio']);?>

								<div   class="col-md-2 col-form-label required1">Estado:</div>
								<label for="descestado"  class="form-control-sm show col-md-4" id="lblestado"><?=$aSocio['estado'];?></label>
								<label for="estado"  class="d-none" id="lblestado1"><?=$aSocio['id_estado'];?></label>

								<?php

									$optionsTar = array();
						    		foreach ($aListaEstado as $key => $row) {
						    			$optionsTar[$row['id_estado']] = $row['descripcion'];
						    		}
							                       
									$adicional = 'class="form-control form-control-sm" id="estado" ';
									
									echo '<div class="col-md-10 row no-gutters hidden no-show">
									<div class="col-12">'.form_dropdown('cboEstado', $optionsTar, $aSocio['id_estado'] ,$adicional).'</div>
									</div>';

									// boton Reenvio
							    	$formatoReenvio = array(
							        	'name' => 'btnGuardarSocio',
							        	'value' => 'Guardar Cambios',
							        	'id' => 'btnGuardarSocio',
							        	'class' => 'btn btn-sm btn-primary btn-block',
							        	'disabled' => 'disabled'
							    	);

							    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarSocio">'.form_submit($formatoReenvio).'</div>';
							    	echo '<div class="col-md-6 col-lg-2"  id="div-btnCancelarSocior"><button name="btn" value="CANCELAR" id="btnCancelarSocio" class="btn btn-sm btn-secondary btn-block" disabled="disabled" style="display:none">Cancelar</button></div>';
								?>
								
							</div>
							<?= form_close();?>
						</div>
						<div class = "" id="div-socio2">	
							<div class="row">

								<div   class="col-md-2 col-form-label">Codigo Productor</div>
								<label for=""  class="form-control-sm show col-md-10" id=""><?=$aSocio['codigo_productor'];?></label>

								<div   class="col-md-2 col-form-label">Tipo Documento</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aSocio['tipo_documento'];?></label>
								
								<div   class="col-md-2 col-form-label">DNI / RUC</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblnrodocumento"><?=$aSocio['nro_documento'];?></label>
								
								<div   class="col-md-2 col-form-label">Nombres</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblnombre"><?=$aSocio['nombre'];?></label>
								
								<div   class="col-md-2 col-form-label">Apellidos</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblapellido"><?=$aSocio['apellido'];?></label>

								<div   class="col-md-2 col-form-label">Razon Social</div>
								<label for=""  class="form-control-sm show col-md-10" id="lblrazon"><?=$aSocio['razon_social'];?></label>
								
								<div   class="col-md-2 col-form-label">Telf.Fijo</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblrazon"><?=$aSocio['telefono_fijo'];?></label>

								<div   class="col-md-2 col-form-label">Telf.Celular</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblrazon"><?=$aSocio['telefono_celular'];?></label>

								<div   class="col-md-2 col-form-label">Direccion</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblrazon"><?=$aSocio['direccion'];?></label>

								<div   class="col-md-2 col-form-label">Departamento</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblrazon"><?=$aSocio['departamento'];?></label>

								<div   class="col-md-2 col-form-label">Provincia</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblrazon"><?=$aSocio['provincia'];?></label>

								<div   class="col-md-2 col-form-label">Distrito</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblrazon"><?=$aSocio['distrito'];?></label>

								<div   class="col-md-2 col-form-label">Zona</div>
								<label for=""  class="form-control-sm show col-md-4" id="lblrazon"><?=$aSocio['zona'];?></label>


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

								<!-- <label class="col-md-2 col-form-label">Seleccionar Documentos</span></label>
								<div class="col-md-9 row no-gutters">
									<?php

										$data = array(	
											'name'	=>	'fileAdjuntos[]' , 
											'value'	=>	'' ,
											'id'	=>	'fileAdjuntos',
											'class'	=>	"form-control form-control-sm required-input",
											'placeholder'		=> '',
											'multiple'=>"multiple"
										);
														
										//echo ''.form_upload($data).'';

										echo '<div class="col-md-12 row no-gutters" id="div-fileadjunto1">
			                            <div class="col-11">'.form_upload($data).'</div>
			                            <div class="col-1 icon-fileadjunto" id="icon-disk-fileadjunto"><span class="icon-floppy-disk"></span></div>
			                            </div>';

			                            echo form_hidden('txtruta_archivo', '');

									?>
								</div> -->

								

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
		 		<a href="<?=base_url();?>socio" class="social__button icon_pie"><i class="icon-undo2"></i></a>
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


