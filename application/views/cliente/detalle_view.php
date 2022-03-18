
<div class="container div-container">
	<!--h1>Registro de Clientes</h1-->
	<div class="row row-principal">

		<div class="col-12 div-encabezado">
				Cliente Detalle
		</div>
		
		<div class="col-12">

			<div class="col-12" id="validacion_errores"></div>
			
			<!-- TITULO DEL FORMULARIO -->

			<div class="tab-content">

		        <!-- campos del formulario-->
		        <div class ="tab-pane fade show active" id="div-detalle" role="tabpanel">
			        <div class = "div-marco" id="div-cliente_0">	

				        <div class = "" id="div-cliente">	        	

						    <div class="row">					
								<div class="col-md-12 row2">
									<div class="col-md-6  bold">Código del Cliente: <?=$aCliente['codigo'];?></div><br/><br/>
									<label class="col-md-6 bold" id="lblRegistro">
										Registrado el <?=$aCliente['fec_registro'];?>
									</label>
								</div>
							</div>
						
							<div class="col-12 row2">
								<div class="col-12" id="validacion_cliente"></div>
								
								<div  class="col-md-10 bold encabezado1 ">INFORMACION BIOMETRICA</div>

								<button class="btn btn-sm btn-primary  col-md-2" name='btnEditarCliente' value='Editar' id='btnEditarCliente'>
									<i class="icon-pencil2"></i> Editar
								</button>
								
							</div>
							<?= form_open(base_url().'', array(
								        'name' => 'form_clientedetalle',
								        'id'=>'form_clientedetalle',
								        'class'=> 'form-clientedetalle',
								        'role' => 'form' ));
							?>
							<div class="row">
								
								<?=form_hidden('txtId', $aCliente['id_cliente']);?>
								

								<div   class="col-md-2 col-form-label required1">Estado:</div>
								<label for="descestado"  class="form-control-sm show col-md-4" id="lblestado"><?=$aCliente['estado'];?></label>
								<label for="estado"  class="d-none" id="lblestado1"><?=$aCliente['id_estado'];?></label>

								<?php

									$optionsTar = array();
						    		foreach ($aListaEstado as $key => $row) {
						    			$optionsTar[$row['id_estado']] = $row['descripcion'];
						    		}
							                       
									$adicional = 'class="form-control form-control-sm" id="estado" ';
									
									echo '<div class="col-md-10 row no-gutters hidden no-show">
									<div class="col-12">'.form_dropdown('cboEstado', $optionsTar, $aCliente['id_estado'] ,$adicional).'</div>
									</div>';

									// boton Reenvio
							    	$formatoReenvio = array(
							        	'name' => 'btnGuardarCliente',
							        	'value' => 'Guardar Cambios',
							        	'id' => 'btnGuardarCliente',
							        	'class' => 'btn btn-sm btn-primary btn-block',
							        	'disabled' => 'disabled'
							    	);

							    	echo '<div class="col-md-6 offset-lg-4 col-lg-2" style="display:none" id="div-btnGuardarCliente">'.form_submit($formatoReenvio).'</div>';
							    	echo '<div class="col-md-6 col-lg-2"  id="div-btnCancelarCliente"><button name="btn" value="CANCELAR" id="btnCancelarCliente" class="btn btn-sm btn-secondary btn-block" disabled="disabled" style="display:none">Cancelar</button></div>';
								?>
								
							</div>
							<?= form_close();?>
						</div>

						<div class = "" id="div-">	
							<div class="row">

								<div   class="col-md-2 col-form-label bold">Tipo Cliente</div>
								<label for=""  class="form-control-sm show col-md-10" id=""><?=$aCliente['tipo_nacionalidad'];?></label>
								
								<div   class="col-md-2 col-form-label bold">Razón Social/Cliente</div>
								<label for=""  class="form-control-sm show col-md-10" id=""><?=$aCliente['razon_social'];?></label>

								<div   class="col-md-2 col-form-label bold">RUC/ID Cliente</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['nro_documento'];?></label>

								<div   class="col-md-2 col-form-label bold">Telf. Fijo</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['telefono_fijo'];?></label>

								<div   class="col-md-2 col-form-label bold">Correo Electronico</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['email'];?></label>

								<div   class="col-md-2 col-form-label bold">FLO ID</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['flo_id'];?></label>

								<div   class="col-md-2 col-form-label bold">Direccion</div>
								<label for=""  class="form-control-sm show col-md-10" id=""><?=$aCliente['direccion'];?></label>

								<?php
								if($aCliente['id_tipo_nacionalidad'] == 1){
								?>
									<div   class="col-md-2 col-form-label bold">Departamento</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['departamento'];?></label>

									<div   class="col-md-2 col-form-label bold">Provincia</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['provincia'];?></label>

									<div   class="col-md-2 col-form-label bold">Distrito</div>
									<label for=""  class="form-control-sm show col-md-10" id=""><?=$aCliente['distrito'];?></label>
								<?php
								}else{
								?>
									<div   class="col-md-2 col-form-label bold">Pais</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['pais'];?></label>

									<div   class="col-md-2 col-form-label bold">Ciudad</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['ciudad'];?></label>
								<?php
								}?>

								<div   class="col-md-2 col-form-label bold">Gerente General</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['gerente_general_nombre'];?></label>

								<div   class="col-md-2 col-form-label bold">ID #</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['gerente_general_id'];?></label>

								<div   class="col-md-2 col-form-label bold">Presidente</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['presidente_nombre'];?></label>

								<div   class="col-md-2 col-form-label bold">ID #</div>
								<label for=""  class="form-control-sm show col-md-4" id=""><?=$aCliente['presidente_id'];?></label> 

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
		 		<a href="<?=base_url();?>cliente" class="social__button icon_pie"><i class="icon-undo2"></i></a>
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


