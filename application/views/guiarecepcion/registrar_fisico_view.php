<?= form_open(base_url().'', array(
	'name' => 'form_guiarecepcionmp_fisico',
	'id'=>'form_guiarecepcionmp_fisico',
	'class'=> 'form-guiarecepcionmp_fisico',
	'role' => 'form'
));

echo form_hidden('txtid', $aGuia['id_guiarecepcion_mp']);
?>

<div class="row">
	<div class="col-md-6">
										<div class="card">
											<div class="card-header text-center">
									    		ANALISIS FISICO
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
															<th scope="col" colspan="3" >RENDIMIENTO EXPORTABLE</th>
														</tr>
														<tr class="table-dark text-center">
															<th class="col-4">DETALLE</th>
															<th class="col-4">GRAMOS</th>
															<th class="col-4"> % </th>
														</tr>
													</thead>

													<tbody>
														<tr>

															<td class="align-middle" scope="row"><label class="required">Exportable</label></td>
															<td>
															<?php
									            				$data['name']='txtexportable_gr';
									            				$data['id']='exportable_gr';
												            	echo form_input($data);
									            			?>
									            			</td>
															<td>
															<?php
									            				$data['name']='txtexportable_porc';
									            				$data['id']='exportable_porc';
									            				$data['disabled']='disabled';
												            	echo form_input($data);
									            			?>
															</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><label class="required">Descarte</label></td>
															<td>
															<?php
									            				$data['name']='txtdescarte_gr';
									            				$data['id']='descarte_gr';
									            				unset($data['disabled']);
												            	echo form_input($data);
									            			?>														
															</td>
															<td>
															<?php
									            				$data['name']='txtdescarte_porc';
									            				$data['id']='descarte_porc';
									            				$data['disabled']='disabled';
												            	echo form_input($data);
									            			?>
															</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><label class="required">Cascarilla</label></td>
															<td>
															<?php
									            				$data['name']='txtcascarilla_gr';
									            				$data['id']='cascarilla_gr';
									            				unset($data['disabled']);
												            	echo form_input($data);
									            			?>														
															</td>
															<td>
															<?php
									            				$data['name']='txtcascarilla_porc';
									            				$data['id']='cascarilla_porc';
									            				$data['disabled']='disabled';
												            	echo form_input($data);
									            			?>
															</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Total</td>
															<td>
															<?php
									            				$data['name']='txttotal_gr';
									            				$data['id']='total_gr';
									            				$data['disabled']='disabled';
												            	echo form_input($data);
									            			?>														
															</td>
															<td>
															<?php
									            				$data['name']='txttotal_porc';
									            				$data['id']='total_porc';
												            	echo form_input($data);
									            			?>
															</td>
														</tr>
													</tbody>
												</table>

												<div class="row">
												<label class="col-md-6 col-form-label"> <label class="required">% HUMEDAD</label> </label>
												<?php
									            $data = array(
									                'name'    	=>  'txthumedadfisico',
									                'id'    	=>  'humedadfisico',
									                'class'    	=>  "form-control form-control-sm"
									            );

									            echo '<div class="col-md-6 row no-gutters">
									                <div class="col-12">' . form_input($data) . '</div>
									                </div>';
									            ?>
									        	</div>
									        	<br>
									        	<table class="table table-bordered table-hover table-sm">
													<thead>
														<tr class="table-dark text-center">
															<th scope="col" >OLOR</th>
															<th scope="col" >COLOR</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chklimpio" value="1"> A limpio Fresco</td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkvariado" value="1"> Variado o Disparejo</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkfermento" value="1"> A fermento</td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chknormal" value="1"> Normal</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkmoho" value="1"> A moho </td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkmanchado" value="1"> Manchado</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkfenol" value="1"> A fenol</td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chknegruzco" value="1"> Negruzco</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chktierra" value="1"> A tierra</td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkotro_color" value="1"> Otro</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkotro_olor" value="1"> Otro</td>
															<td class="align-middle td_invisible_bottom td_invisible_rigth" scope="row"></td>
														</tr>
													</tbody>
												</table>
												

												<label class="col-md col-form-label bold"> Observaciones </label>
												<?php
										            $data = array(
										                'name'          => 'txtobsfisico',
										                'id'            => 'obsfisico',
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
									    		EQUIVALENCIA DE DEFECTOS (SCA)
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
															<th scope="col" colspan="3">DEFECTOS PRIMARIOS</th>
															<th scope="col" colspan="3">DEFECTOS SECUNDARIOS</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="align-middle" scope="row" class="col-5">Grano Negro</td>
															<td class="align-middle" scope="row" class="col-1">1*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtgranonegro';
									            				$data['id']='granonegro';
												            	echo form_input($data);
									            			?></td>
									            			<td class="align-middle" scope="row" class="col-5">Negro Parcial</td>
															<td class="align-middle" scope="row" class="col-1">3*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtnegroparcial';
									            				$data['id']='negroparcial';
												            	echo form_input($data);
									            			?></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row" class="col-5">Grano Agrio</td>
															<td class="align-middle" scope="row" class="col-1">1*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtgranoagrio';
									            				$data['id']='granoagrio';
												            	echo form_input($data);
									            			?></td>
									            			<td class="align-middle" scope="row" class="col-5">Agrio Parcial</td>
															<td class="align-middle" scope="row" class="col-1">3*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtagrioparcial';
									            				$data['id']='agrioparcial';
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row" class="col-5">Cereza Seca</td>
															<td class="align-middle" scope="row" class="col-1">1*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtcerezaseca';
									            				$data['id']='cerezaseca';
												            	echo form_input($data);
									            			?></td>
									            			<td class="align-middle" scope="row" class="col-5">Pergamino</td>
															<td class="align-middle" scope="row" class="col-1">5*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtpergamino';
									            				$data['id']='pergamino';
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row" class="col-5">Daño por Hongo</td>
															<td class="align-middle" scope="row" class="col-1">1*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtdañoporhongo';
									            				$data['id']='dañoporhongo';
												            	echo form_input($data);
									            			?></td>
									            			<td class="align-middle" scope="row" class="col-5">Flotador</td>
															<td class="align-middle" scope="row" class="col-1">5*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtflotador';
									            				$data['id']='flotador';
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row" class="col-5">Materia Extraña</td>
															<td class="align-middle" scope="row" class="col-1">1*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtmateriaextraña';
									            				$data['id']='materiaextraña';
												            	echo form_input($data);
									            			?></td>
									            			<td class="align-middle" scope="row" class="col-5">Inmaduro</td>
															<td class="align-middle" scope="row" class="col-1">5*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtinmaduro';
									            				$data['id']='inmaduro';
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row" class="col-5">Brocado Severo</td>
															<td class="align-middle" scope="row" class="col-1">5*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtbrocadosevero';
									            				$data['id']='brocadosevero';
												            	echo form_input($data);
									            			?></td>
									            			<td class="align-middle" scope="row" class="col-5">Averanado</td>
															<td class="align-middle" scope="row" class="col-1">5*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtaveranado';
									            				$data['id']='averanado';
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row" class="col-5" colspan="2">Subtotal</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtsubtotalprimario';
									            				$data['id']='subtotalprimario';
									            				$data['disabled'] = 'disable';
												            	echo form_input($data);
									            			?></td>
									            			<td class="align-middle" scope="row" class="col-5">Conchas</td>
									            			<td class="align-middle" scope="row" class="col-1">5*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtconchas';
									            				$data['id']='conchas';
									            				unset($data['disabled']);
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle td_invisible_bottom td_invisible_left" scope="row" colspan="3"></td>
									            			<td class="align-middle" scope="row" class="col-5">Partido/Mordido</td>
															<td class="align-middle" scope="row" class="col-1">5*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtpartido';
									            				$data['id']='partido';
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle td_invisible_bottom td_invisible_left" scope="row" colspan="3"></td>
									            			<td class="align-middle" scope="row" class="col-5">Pulpa Seca</td>
															<td class="align-middle" scope="row" class="col-1">5*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtpulpaseca';
									            				$data['id']='pulpaseca';
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle td_invisible_bottom td_invisible_left" scope="row" colspan="3"></td>
									            			<td class="align-middle" scope="row" class="col-5">Viejo/Blanqueado</td>
															<td class="align-middle" scope="row" class="col-1">5*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtviejo';
									            				$data['id']='viejo';
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle td_invisible_bottom td_invisible_left " scope="row" colspan="3"></td>
									            			<td class="align-middle" scope="row" class="col-5">Brocado Leve</td>
															<td class="align-middle" scope="row" class="col-1">10*1</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtbrocadoleve';
									            				$data['id']='brocadoleve';
												            	echo form_input($data);
									            			?></td>
														</tr>

														<tr>
															<td class="align-middle td_invisible_bottom td_invisible_left" scope="row" colspan="3"></td>
									            			<td class="align-middle" scope="row" class="col-5" colspan="2">Subtotal</td>
															<td class="align-middle" scope="row" class="col-6">
															<?php
									            				$data['name']='txtsubtotalsecundario';
									            				$data['id']='subtotalsecundario';
									            				$data['disabled']='disabled';
												            	echo form_input($data);
									            			?></td>
														</tr>

													</tbody>
													<tfoot>
														<tr class="table-dark text-center">
															<th class="align-middle" scope="row" colspan="4">Total(Defectos Primarios + Secundarios)</th>
									            			<th class="align-middle" scope="row" colspan="2">
															<?php
									            				$data['name']='txttotaldefecto';
									            				$data['id']='totaldefecto';
									            				$data['disabled']='disabled';
												            	echo form_input($data);
									            			?></th>
														</tr>
													</tfoot>
												</table>
								  			</div>
										</div>
	</div>
</div>
<div class="form-group row">			
				                    <!-- CIERRE DE FORMULARIO -->

	<?php
			foreach ($btn_fisico as $key => $row) {
				echo '<div class="col-md-6">';
				echo '<button type ="submit" id="'.$row['id'].'" value="'.$row['descripcion'].'" name="'.$row['id'].'" class="btn btn-sm '.$row['class'].'" '.$row['atributo'].'>
												<i class="'.$row['icon'].'"></i> '.$row['descripcion'].'</button>';
				echo '</div>';
									}
	?>


</div>

<?= form_close();?>