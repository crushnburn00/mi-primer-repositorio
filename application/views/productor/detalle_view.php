
<div class="container div-container">
	<!--h1>Registro de Clientes</h1-->
	<div class="row row-principal">

		<div class="col-12 div-encabezado3">
				Productor Detalle
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
									<div class="col-md-6  bold">Código del Productor: <?=$aProductor['codigo'];?></div><br/><br/>
									<label class="col-md-6 bold " id="lblRegistroProductor">
										Registrado el <?=$aProductor['fec_registro'];?>
									</label>
								</div>
							</div>
						
							<div class="col-12 row2">
								<div class="col-12" id="validacion_productor"></div>
								
								<div  class="col-md-10  encabezado1 bold">DETALLE PRODUCTOR</div>
								
								<button class="btn btn-sm btn-primary  col-md-2" name='btnEditarProductor' value='Editar' id='btnEditarProductor'>
									<i class="icon-pencil2"></i> Editar
								</button>
								
							</div>
							<?= form_open(base_url().'', array(
								        'name' => 'form_productordetalle',
								        'id'=>'form_productordetalle',
								        'class'=> 'form-productordetalle',
								        'role' => 'form' ));
							?>
							<div class="row">
								
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
								
							</div>
							<?= form_close();?>
						</div>
						<div class = "" id="div-productor2">	
							<div class="row">

								<div   class="col-md-2 col-form-label ">Tipo Documento</div>
								<label for=""  class="form-control-sm col-md-4" id=""><?=$aProductor['tipo_documento'];?></label>
								
								<div   class="col-md-2 col-form-label ">DNI / RUC</div>
								<label for=""  class="form-control-sm col-md-4" id="lblnrodocumento"><?=$aProductor['nro_documento'];?></label>
								
								<div   class="col-md-2 col-form-label ">Nombres</div>
								<label for=""  class="form-control-sm col-md-4" id="lblnombre"><?=$aProductor['nombre'];?></label>
								
								<div   class="col-md-2 col-form-label ">Apellidos</div>
								<label for=""  class="form-control-sm col-md-4" id="lblapellido"><?=$aProductor['apellido'];?></label>

								<div   class="col-md-2 col-form-label ">Razon Social</div>
								<label for=""  class="form-control-sm col-md-10" id="lblrazon"><?=$aProductor['razon_social'];?></label>
								
								<div   class="col-md-2 col-form-label ">Telf.Fijo</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['telefono_fijo'];?></label>

								<div   class="col-md-2 col-form-label ">Telf.Celular</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['telefono_celular'];?></label>

								<div   class="col-md-2 col-form-label ">Correo Electronico</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['email'];?></label>

								<div   class="col-md-2 col-form-label ">Genero</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['genero'];?></label>

								<div   class="col-md-2 col-form-label ">Direccion</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['direccion'];?></label>

								<div   class="col-md-2 col-form-label ">Departamento</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['departamento'];?></label>

								<div   class="col-md-2 col-form-label ">Provincia</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['provincia'];?></label>

								<div   class="col-md-2 col-form-label ">Distrito</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['distrito'];?></label>

								<div   class="col-md-2 col-form-label ">Zona</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['zona'];?></label>

								<div   class="col-md-2 col-form-label ">Año ingreso a la Zona</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['anio_ingreso_zona'];?></label>

								<div   class="col-md-2 col-form-label ">Estado Civil</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['estado_civil'];?></label>

								<div   class="col-md-2 col-form-label ">Cant. Hijos</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['cantidad_hijos'];?></label>

								<div   class="col-md-2 col-form-label ">Religion</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['religion'];?></label>

								<div   class="col-md-2 col-form-label ">Grado Estudios</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['grado_estudio'];?></label>

								<div   class="col-md-2 col-form-label ">Dialecto</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['dialecto'];?></label>

								<div   class="col-md-2 col-form-label ">Fecha Nacimiento</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['fecha_nacimiento'];?></label>

								<div   class="col-md-2 col-form-label ">Lugar Nacimiento</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['lugar_nacimiento'];?></label>

								<div   class="col-md-2 col-form-label ">Idioma</div>
								<label for=""  class="form-control-sm col-md-4" id="lblrazon"><?=$aProductor['idioma'];?></label>


								<label  class="col-md-12 col-form-label ">Ficheros adjuntos:</label>	
								
								<div class="col-12 row2 bold" id="div_fichero">
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
											<span  class="col-md-5  right"><?=$row['fec_registro'];?></span>
									<?php	
									endforeach;	?>
								</div>




							</div>

						</div>
					
						<div class = "" id="div-conyugue">

							<div class="col-12 row2">
								<div  class="col-md-10  encabezado1 bold">DETALLE CONYUGUE</div>
								<?php 
									if($aProductor['id_conyugue_cony'] == null){
								?>
								<button class="btn btn-sm btn-primary col-md-2" name='btnEditarConyugue' value='Editar' id='btnEditarConyugue'>
									<i class="icon-pencil2"></i> Editar
								</button>
								<?php 
									}
								?>
							</div>
							<div class="row2" id="validacion_conyugue"></div>
							<?= form_open(base_url().'', array(
								        'name' => 'form_productor_conyugue',
								        'id'=>'form_productor_conyugue',
								        'class'=> 'form-productor_conyugue',
								        'role' => 'form' ));
								/*form_open(base_url().'', array(
								        'name' => 'form_conyuguedetalle',
								        'id'=>'form_conyuguedetalle',
								        'class'=> 'form-conyuguedetalle',
								        'role' => 'form' ));*/
							?>	
							<?=form_hidden('txtId', $aProductor['id_productor']);?>
							<?=form_hidden('txtIdCony', $aProductor['id_conyugue_cony']);?>

							<div class="row">


								<div   class="col-md-2 col-form-label ">Tipo Documento</div>
								<label for="destipodocCony"  class="form-control-sm show col-md-4" id="lbltipodocCony"><?=$aProductor['tipo_documento_cony'];?></label>

								<label for="tipodocCony"  class="d-none" id="lbltipodocCony1"><?=($aProductor['id_tipo_documento_cony']==null? '0': $aProductor['id_tipo_documento_cony']);?></label>

								<?php
									$options = array( 0 => ' - Seleccionar - ' );
						    		foreach ($aListaTipoDoc as $key => $row) {
								    	$options[$row['id_tipo_documento']] = $row['descripcion'];
								    }
							                       
									$adicional = 'class="form-control form-control-sm" id="tipodocCony" ';
									
									echo '<div class="col-md-4 row no-gutters hidden no-show">
									<div class="col-12">'.form_dropdown('cboTipoDocCony', $options, $aProductor['id_tipo_documento_cony'] ,$adicional).'</div>
									</div>';
								?>
								
								<div   class="col-md-2 col-form-label " id="div_nrodocCony">
								<?php
									if($aProductor['id_tipo_documento_cony'] == 1) echo "DNI";
									else
										if($aProductor['id_tipo_documento_cony'] == 2) echo "RUC";
										else echo "DNI / RUC";
								?>
									
								</div>
								<label for="dniCony"  class="form-control-sm show col-md-4" id="lbldniCony"><?=$aProductor['nro_documento_cony'];?></label>
								<?php

									$data = array(	
											'name'	=>	'txtdniCony',
											'id'	=>	'dniCony',
											'class'	=>	"form-control form-control-sm",
											'placeholder'		=> '');

									echo '<div class="col-md-4 row no-gutters hidden no-show">
										  <div class="col-12">'.form_input($data).'</div>
									</div>';							
								?>

								<div class="offset-md-6 col-md-6 row no-gutters hidden no-show" id="div_nrodocCony_detalle"></div>
								
								<div   class="col-md-2 col-form-label" id="div_nomCony">Nombres</div>
								<label for="nomCony"  class="form-control-sm show col-md-4" id="lblnomCony"><?=$aProductor['nombre_cony'];?></label>

								<?php

									$data = array(	
											'name'	=>	'txtnomCony',
											'id'	=>	'nomCony',
											'class'	=>	"form-control form-control-sm",
											'placeholder'		=> ''
										);

									if($aProductor['id_tipo_documento_cony'] == 2)  $data['disabled']='disabled';

									echo '<div class="col-md-4 row no-gutters hidden no-show" id="input_nomCony">
										  <div class="col-12">'.form_input($data).'</div>
									</div>';							
								?>
								
								<div   class="col-md-2 col-form-label " id="div_apeCony">Apellidos</div>
								<label for="apeCony"  class="form-control-sm show col-md-4" id="lblapeCony"><?=$aProductor['apellido_cony'];?></label>
								<?php

									$data = array(	
											'name'	=>	'txtapeCony',
											'id'	=>	'apeCony',
											'class'	=>	"form-control form-control-sm",
											'placeholder'		=> '');

									if($aProductor['id_tipo_documento_cony'] == 2)  $data['disabled']='disabled';

									echo '<div class="col-md-4 row no-gutters hidden no-show" id="input_apeCony">
										  <div class="col-12">'.form_input($data).'</div>
									</div>';							
								?>

								<div   class="col-md-2 col-form-label " id="div_razonCony">Razon Social</div>
								<label for="razonCony"  class="form-control-sm show col-md-10" id="lblrazonCony"><?=$aProductor['razon_social_cony'];?></label>

								<?php

									$data = array(	
											'name'	=>	'txtrazonCony',
											'id'	=>	'razonCony',
											'class'	=>	"form-control form-control-sm",
											'placeholder'		=> '');

									if($aProductor['id_tipo_documento_cony'] == 1)  $data['disabled']='disabled';

									echo '<div class="col-md-10 row no-gutters hidden no-show" id="input_razonCony">
										  <div class="col-12">'.form_input($data).'</div>
									</div>';							
								?>


								<div   class="col-md-2 col-form-label ">Telf.Celular</div>
								<label for="telfCony"  class="form-control-sm show col-md-4" id="lbltelfCony"><?=$aProductor['telefono_celular_cony'];?></label>
								<?php

									$data = array(	
											'name'	=>	'txttelfCony',
											'id'	=>	'telfCony',
											'class'	=>	"form-control form-control-sm",
											'placeholder'		=> '');

									echo '<div class="col-md-4 row no-gutters hidden no-show">
										  <div class="col-12">'.form_input($data).'</div>
									</div>';							
								?>

								<div   class="col-md-2 col-form-label ">Grado Estudios</div>
								<label for="desgradoEstudioCony"  class="form-control-sm show col-md-4" id="lblgradoEstudioCony"><?=$aProductor['grado_estudio_cony'];?></label>
								<label for="gradoEstudioCony"  class="d-none" id="lblgradoEstudioCony1"><?=($aProductor['id_grado_estudio_cony']==null? '0': $aProductor['id_grado_estudio_cony']);?></label>

								<?php
						    		$options = array( 0 => ' - Seleccionar - ' );
								    foreach ($aListaGradoEstudio as $key => $row) {
								    	$options[$row['id_grado_estudio']] = $row['descripcion'];
								    }
							                       
									$adicional = 'class="form-control form-control-sm" id="gradoEstudioCony" ';
									
									echo '<div class="col-md-4 row no-gutters hidden no-show">
									<div class="col-12">'.form_dropdown('cboGradoEstudioCony', $options, $aProductor['id_grado_estudio_cony'], $adicional).'</div>
									</div>';
								?>


								<div   class="col-md-2 col-form-label ">Fecha Nacimiento</div>
								<label for="fecNacCony"  class="form-control-sm show col-md-4" id="lblfecNacCony"><?=$aProductor['fecha_nacimiento_cony'];?></label>
								<?php

									$data = array(	
											'name'	=>	'txtfecNacCony',
											'id'	=>	'fecNacCony',
											'class'	=>	"form-control form-control-sm datetimepicker-input",
											'data-toggle'	=> 'datetimepicker',
											'data-target' 	=> "#fecNacCony",
											'placeholder'		=> '');

									echo '<div class="col-md-4 row no-gutters hidden no-show">
										  <div class="col-12">'.form_input($data).'</div>
									</div>';							
								?>

								<div   class="col-md-2 col-form-label ">Lugar Nacimiento</div>
								<label for="lugarNacCony"  class="form-control-sm show col-md-4" id="lbllugarNacCony"><?=$aProductor['lugar_nacimiento_cony'];?></label>
								<?php

									$data = array(	
											'name'	=>	'txtlugarNacCony',
											'id'	=>	'lugarNacCony',
											'class'	=>	"form-control form-control-sm",
											'placeholder'		=> '');

									echo '<div class="col-md-4 row no-gutters hidden no-show">
										  <div class="col-12">'.form_input($data).'</div>
									</div>';							
								?>

								<?php
								// boton Reenvio
									if($aProductor['id_conyugue_cony'] == null){

							    	$formatoReenvio = array(
							        	'name' => 'btnGuardarConyugue',
							        	'value' => 'Guardar Cambios',
							        	'id' => 'btnGuardarConyugue',
							        	'class' => 'btn btn-sm btn-primary btn-block',
							        	'disabled' => 'disabled'
							    	);

							    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarConyugue">'.form_submit($formatoReenvio).'</div>';
							    	echo '<div class="col-md-6 col-lg-2"  id="div-btnCancelarConyugue"><button name="btn" value="CANCELAR" id="btnCancelarConyugue" class="btn btn-sm btn-secondary btn-block" disabled="disabled" style="display:none">Cancelar</button></div>';
							    	}
								?>


							</div>

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
		 		<a href="<?=base_url();?>productor" class="social__button icon_pie"><i class="icon-undo2"></i></a>
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


