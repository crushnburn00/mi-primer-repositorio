<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header text-center">
				REGISTRO DE TUESTE
			</div>

			<div class="card-body">
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
															<td><?=$aGuia['rendimiento'];?></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">% Humedad</td>
															<td><?=$aGuia['porc_humedad'];?></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Tambor</td>
															<td><?=$aGuia['tambor'];?></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">T Tambor de entrada</td>
															<td><?=$aGuia['t_tambor'];?></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Tiempo del 1er Crack</td>
															<td><?=$aGuia['tiempo_primer_crack'];?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">T del 1er Crack</td>
															<td><?=$aGuia['t_primer_crack'];?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Tiempo de Salida</td>
															<td><?=$aGuia['tiempo_salida'];?></td>
														</tr>																								
														
														<tr>
															<td class="align-middle" scope="row">T de Salida</td>
															<td><?=$aGuia['t_salida'];?></td>
														</tr>
													</tbody>
												</table>

												<label class="col-md col-form-label bold"> Observaciones </label>
												<div class="col-md-12 col-form-label"><?=$aGuia['observaciones_tueste'];?></div>
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
					$tot_sensorial = 0;
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
															<td><?=$aGuia['fragancia']; $tot_sensorial += $aGuia['fragancia'];?></td>
									            			<td><?=$aGuia['rkg_fragancia'];?></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Sabor</td>
															<td><?=$aGuia['sabor']; $tot_sensorial += $aGuia['sabor'];?></td>
															<td><?=$aGuia['rkg_sabor'];?></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Sabor Residual</td>
															<td><?=$aGuia['sabor_residual']; $tot_sensorial += $aGuia['sabor_residual'];?></td>
															<td><?=$aGuia['rkg_sabor_residual'];?></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Acidez</td>
															<td><?=$aGuia['acidez']; $tot_sensorial += $aGuia['acidez'];?></td>
															<td><?=$aGuia['rkg_acidez'];?></td>
														</tr>
														<tr>
															<td class="align-middle" scope="row">Cuerpo</td>
															<td><?=$aGuia['cuerpo']; $tot_sensorial += $aGuia['cuerpo'];?></td>
															<td><?=$aGuia['rkg_cuerpo'];?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Uniformidad</td>
															<td><?=$aGuia['uniformidad']; $tot_sensorial += $aGuia['uniformidad'];?></td>
															<td><?=$aGuia['rkg_uniformidad'];?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Balance</td>
															<td><?=$aGuia['balance']; $tot_sensorial += $aGuia['balance'];?></td>
															<td><?=$aGuia['rkg_balance'];?></td>
														</tr>																								
														<tr>
															<td class="align-middle" scope="row">Taza de Limpieza</td>
															<td><?=$aGuia['taza_limpieza']; $tot_sensorial += $aGuia['taza_limpieza'];?></td>
															<td><?=$aGuia['rkg_taza_limpieza'];?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Dulzor</td>
															<td><?=$aGuia['dulzor']; $tot_sensorial += $aGuia['dulzor'];?></td>
															<td><?=$aGuia['rkg_dulzor'];?></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row">Puntaje de Catador</td>
															<td><?=$aGuia['puntaje_catador']; $tot_sensorial += $aGuia['puntaje_catador'];?></td>
															<td><?=$aGuia['rkg_puntaje_catador'];?></td>
														</tr>
													</tbody>
													<tfoot>
														<tr class="table-dark text-center">
															<th class="align-middle" scope="row">Puntaje Final</th>
															<th><?=$tot_sensorial;?></th>
															<th><?=$aGuia['rkg_general'];?></th>
														</tr>
													</tfoot>
												</table>
				<div class="row">
					<label class="col-md-12 col-form-label bold"> Defectos Graves </label>
					<?php
						$options = '<input type="checkbox" name="chkfermento_defecto" value="1" '.($aGuia['defecto_fermento'] == "1" ? 'checked' : ' ').' onclick="return false;"> Fermento';
					?>
					<div class="col-md-4"><?=$options;?></div>
					<?php
						$options = '<input type="checkbox" name="chktierra_defecto" value="1" '.($aGuia['defecto_tierra'] == "1" ? 'checked' : ' ').' onclick="return false;"> Tierra';
					?>
					<div class="col-md-4"><?=$options;?></div>
					<?php
						$options = '<input type="checkbox" name="chkfenol_defecto" value="1" '.($aGuia['defecto_fenol'] == "1" ? 'checked' : ' ').' onclick="return false;"> Fenol';
					?>
					<div class="col-md-4"><?=$options;?></div>
					<?php
						$options = '<input type="checkbox" name="chksucio_defecto" value="1" '.($aGuia['defecto_sucio'] == "1" ? 'checked' : ' ').' onclick="return false;"> Sucio';
					?>
					<div class="col-md-4"><?=$options;?></div>
					<?php
						$options = '<input type="checkbox" name="chkmoho_defecto" value="1" '.($aGuia['defecto_moho'] == "1" ? 'checked' : ' ').' onclick="return false;"> Moho';
					?>
					<div class="col-md-4"><?=$options;?></div>
					<?php
						$options = '<input type="checkbox" name="chkcontaminado_defecto" value="1" '.($aGuia['defecto_contaminado'] == "1" ? 'checked' : ' ').' onclick="return false;"> Contaminado';
					?>
					<div class="col-md-4"><?=$options;?></div>
					<?php
						$options = '<input type="checkbox" name="chkreposado_defecto" value="1" '.($aGuia['defecto_reposado'] == "1" ? 'checked' : ' ').' onclick="return false;"> Reposado';
					?>
					<div class="col-md-4"><?=$options;?></div>
				</div>

				<label class="col-md col-form-label bold"> Observaciones </label>
				<div class="col-md-12 col-form-label"><?=$aGuia['obs_analisis_sensorial'];?></div>
			</div>
		</div>
	</div>
</div>
