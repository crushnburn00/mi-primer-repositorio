<?= form_open(base_url().'', array(
    'name' => 'form_guiarecepcionmp_sensorial',
    'id'=>'form_guiarecepcionmp_sensorial',
    'class'=> 'form-guiarecepcionmp_sensorial',
    'role' => 'form'
));

echo form_hidden('txtid', $aGuia['id_guiarecepcion_mp']);
		?>
								<div class="row">
									<div class="col-md-6">
										<div class="card">
											<div class="card-header text-center">
									    		REGISTRO DE TUESTE
								  			</div>

								  			<div class="card-body">
								  				<?php
								  				$data = array(
									                'name'    	=>  '',
									                'id'    	=>  '',
									                'class'    	=>  "form-control form-control-sm"
									            );
									            ?>
												<table class="table table-bordered table-hover table-sm">
													<thead>
														<tr class="table-dark text-center">
															<th scope="col">INDICADOR</th>
															<th scope="col">VALOR</th>
														</tr>
													</thead>

													<tbody>
														<tr>

															<td class="align-middle" scope="row">Rendimiento</td>
															<td>
															<?php
									            				$data['name']='txtrendimiento';
									            				$data['id']='rendimiento';
												            	echo form_input($data);
									            			?>
									            			</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">% Humedad</td>
															<td>
															<?php
									            				$data['name']='txthumedad_porc';
									            				$data['id']='humedad_porc';
												            	echo form_input($data);
									            			?>														
															</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Tambor</td>
															<td>
															<?php
									            				$data['name']='txttambor';
									            				$data['id']='tambor';
												            	echo form_input($data);
									            			?>														
															</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">T Tambor de entrada</td>
															<td>
															<?php
									            				$data['name']='txttamborentrada';
									            				$data['id']='tamborentrada';
												            	echo form_input($data);
									            			?>														
															</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Tiempo del 1er Crack</td>
															<td>
															<?php
									            				$data['name']='txttiempocrack';
									            				$data['id']='tiempocrack';
												            	echo form_input($data);
									            			?>														
															</td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">T del 1er Crack</td>
															<td>
															<?php
									            				$data['name']='txttcrack';
									            				$data['id']='tcrack';
												            	echo form_input($data);
									            			?>														
															</td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Tiempo de Salida</td>
															<td>
															<?php
									            				$data['name']='txttiemposalida';
									            				$data['id']='tiemposalida';
												            	echo form_input($data);
									            			?>														
															</td>
														</tr>																								
														
														<tr>
															<td class="align-middle" scope="row">T de Salida</td>
															<td>
															<?php
									            				$data['name']='txttsalida';
									            				$data['id']='tsalida';
												            	echo form_input($data);
									            			?>														
															</td>
														</tr>
													</tbody>
												</table>

												<label class="col-md col-form-label bold"> Observaciones </label>
												<?php
										             $data = array(
										                'name'          => 'txtobsregistrotueste',
										                'id'            => 'obsregistrotueste',
										                'class'         => "form-control form-control-sm",
														'rows'        => '3',
										            );

									            	echo '<div class="col-md-12 col-form-label">'.form_textarea($data).'</div>';
									            ?>
								  			</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="card">
											<div class="card-header text-center">
									    		ANALISIS SENSORIAL
								  			</div>

								  			<div class="card-body">
								  				<?php
								  				$data = array(
									                'name'    	=>  '',
									                'id'    	=>  '',
									                'class'    	=>  "form-control form-control-sm"
									            );
									            ?>
												<table class="table table-bordered table-hover table-sm">
													<thead>
														<tr class="table-dark text-center">
															<th class="col-4" rowspan="2">ATRIBUTOS</th>
															<th class="col-8" colspan="2">CLASIFICACION</th>
														</tr>
														<tr class="table-dark text-center">
															<th class="col-4">VALOR</th>
															<th class="col-4">RANKING</th>
														</tr>
													</thead>

													<tbody>
														<tr>

															<td class="align-middle" scope="row">Fragancia/Aroma</td>
															<td>
															<?php
									            				$data['name']='txtfragancia';
									            				$data['id']='fragancia';
												            	echo form_input($data);
									            			?>
									            			</td>
									            			<td><label id="lblfragancia"></label></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Sabor</td>
															<td>
															<?php
									            				$data['name']='txtsabor';
									            				$data['id']='sabor';
												            	echo form_input($data);
									            			?>														
															</td>
															<td><label id="lblsabor"></label></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Sabor Residual</td>
															<td>
															<?php
									            				$data['name']='txtsaborresidual';
									            				$data['id']='saborresidual';
												            	echo form_input($data);
									            			?>														
															</td>
															<td><label id="lblsaborresidual"></label></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Acidez</td>
															<td>
															<?php
									            				$data['name']='txtacidez';
									            				$data['id']='acidez';
												            	echo form_input($data);
									            			?>														
															</td>
															<td><label id="lblacidez"></label></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Cuerpo</td>
															<td>
															<?php
									            				$data['name']='txtcuerpo';
									            				$data['id']='cuerpo';
												            	echo form_input($data);
									            			?>														
															</td>
															<td><label id="lblcuerpo"></label></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Uniformidad</td>
															<td>
															<?php
									            				$data['name']='txtuniformidad';
									            				$data['id']='uniformidad';
												            	echo form_input($data);
									            			?>														
															</td>
															<td><label id="lbluniformidad"></label></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Balance</td>
															<td>
															<?php
									            				$data['name']='txtbalance';
									            				$data['id']='balance';
												            	echo form_input($data);
									            			?>														
															</td>
															<td><label id="lblbalance"></label></td>
														</tr>																								
														<tr>
															<td class="align-middle" scope="row">Taza de Limpieza</td>
															<td>
															<?php
									            				$data['name']='txttazalimpieza';
									            				$data['id']='tazalimpieza';
												            	echo form_input($data);
									            			?>														
															</td>
															<td><label id="lbltazalimpieza"></label></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Dulzor</td>
															<td>
															<?php
									            				$data['name']='txtdulzor';
									            				$data['id']='dulzor';
												            	echo form_input($data);
									            			?>														
															</td>
															<td><label id="lbldulzor"></label></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Puntaje de Catador</td>
															<td>
															<?php
									            				$data['name']='txtpuntajecatador';
									            				$data['id']='puntajecatador';
												            	echo form_input($data);
									            			?>														
															</td>
															<td><label id="lblpuntajecatador"></label></td>
														</tr>
													</tbody>
													<tfoot>
														<tr class="table-dark text-center">
															<th class="align-middle" scope="row">Puntaje Final</th>
															<th>
															<?php
									            				$data['name']='txtpuntajefinal';
									            				$data['id']='puntajefinal';
									            				$data['disabled']='disabled';
												            	echo form_input($data);
									            			?>														
															</th>
															<th><label id="lblpuntajefinal"></label></th>
														</tr>
													</tfoot>
												</table>
												<div class="row">
													<label class="col-md-12 col-form-label bold"> Defectos Graves </label>
													<div class="col-md-4"><input type="checkbox" name="chkfermento_defecto" value="1"> Fermento </div>
													<div class="col-md-4"><input type="checkbox" name="chktierra_defecto" value="1"> Tierra </div>
													<div class="col-md-4"><input type="checkbox" name="chkfenol_defecto" value="1"> Fenol </div>
													<div class="col-md-4"><input type="checkbox" name="chksucio_defecto" value="1"> Sucio </div>
													<div class="col-md-4"><input type="checkbox" name="chkmoho_defecto" value="1"> Moho </div>
													<div class="col-md-4"><input type="checkbox" name="chkcontaminado_defecto" value="1"> Contaminado </div>
													<div class="col-md-4"><input type="checkbox" name="chkreposado_defecto" value="1"> Reposado </div>
												</div>

												<label class="col-md col-form-label bold"> Observaciones </label>
												<?php
										             $data = array(
										                'name'          => 'txtobsanalisissensorial',
										                'id'            => 'obsanalisissensorial',
										                'class'         => "form-control form-control-sm",
														'rows'        => '3',
										            );

									            	echo '<div class="col-md-12 col-form-label">'.form_textarea($data).'</div>';
									            ?>
								  			</div>
										</div>
									</div>
								</div>

								<div class="form-group row">	
<?php
	foreach ($btn_sensorial as $key => $row) {
		echo '<div class="col-md-6">';
		echo '<button type ="submit" id="'.$row['id'].'" value="'.$row['descripcion'].'" name="'.$row['id'].'" class="btn btn-sm '.$row['class'].'" '.$row['atributo'].'>
				<i class="'.$row['icon'].'"></i> '.$row['descripcion'].'</button>';
		echo '</div>';
	}
?>
</div>
<?= form_close();?>