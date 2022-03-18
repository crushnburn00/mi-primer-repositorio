<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header text-center">
				ANALISIS FISICO
			</div>

			<div class="card-body">

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
								<?php $total_rendimiento = $aGuia['exportable_gr']+$aGuia['descarte_gr']+$aGuia['cascarilla_gr']; ?>
								<td class="align-middle" scope="row"><label class="required">Exportable</label></td>
								<td><?=$aGuia['exportable_gr'];?></td>
								<td><?=number_format(($aGuia['exportable_gr']/$total_rendimiento)*100,2,".","");?></td>
							</tr>
							<tr>
								<td class="align-middle" scope="row"><label class="required">Descarte</label></td>
								<td><?=$aGuia['descarte_gr'];?></td>
								<td><?=number_format(($aGuia['descarte_gr']/$total_rendimiento)*100,2,".","");?></td>
							</tr>
							<tr>
								<td class="align-middle" scope="row"><label class="required">Cascarilla</label></td>
								<td><?=$aGuia['cascarilla_gr'];?></td>
								<td><?=number_format(($aGuia['cascarilla_gr']/$total_rendimiento)*100,2,".","");?></td>
							</tr>
						</tbody>	
						<tfoot>
							<tr class="table-dark text-center">
								<th class="align-middle" scope="row">Total</th>
								<th><?=$total_rendimiento;?></th>
								<th>100.00</th>
							</tr>
						</tfoot>
				</table>

				<div class="row">
					<label class="col-md-6 col-form-label"> <label class="required">% HUMEDAD</label> </label>
					<label class="col-md-6 col-form-label"><?=number_format($aGuia['humedad_fisico'],2,".","");?></label>
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
								<?php
								$options = '<input type="checkbox" name="chklimpio" value="1" '.($aGuia['olor_limpio'] == "1" ? 'checked' : ' ').' onclick="return false;"> A limpio Fresco';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
								<?php
								$options = '<input type="checkbox" name="chkvariado" value="1" '.($aGuia['color_variado'] == "1" ? 'checked' : ' ').' onclick="return false;"> Variado o Disparejo';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
							</tr>
							<tr>
								<?php
								$options = '<input type="checkbox" name="chkfermento" value="1" '.($aGuia['olor_fermento'] == "1" ? 'checked' : ' ').' onclick="return false;"> A fermento';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
								<?php
								$options = '<input type="checkbox" name="chknormal" value="1" '.($aGuia['color_normal'] == "1" ? 'checked' : ' ').' onclick="return false;"> Normal';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
							</tr>
							<tr>
								<?php
								$options = '<input type="checkbox" name="chkmoho" value="1" '.($aGuia['olor_moho'] == "1" ? 'checked' : ' ').' onclick="return false;"> A moho';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
								<?php
								$options = '<input type="checkbox" name="chkmanchado" value="1" '.($aGuia['color_manchado'] == "1" ? 'checked' : ' ').' onclick="return false;"> Manchado';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>

							</tr>
							<tr>
								<?php
								$options = '<input type="checkbox" name="chkfenol" value="1" '.($aGuia['olor_fenol'] == "1" ? 'checked' : ' ').' onclick="return false;"> A fenol';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
								<?php
								$options = '<input type="checkbox" name="chknegruzco" value="1" '.($aGuia['color_negruzco'] == "1" ? 'checked' : ' ').' onclick="return false;"> Negruzco';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
							</tr>
							<tr>
								<?php
								$options = '<input type="checkbox" name="chktierra" value="1" '.($aGuia['olor_tierra'] == "1" ? 'checked' : ' ').' onclick="return false;"> A tierra';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
								<?php
								$options = '<input type="checkbox" name="chkotro_color" value="1" '.($aGuia['color_otro'] == "1" ? 'checked' : ' ').' onclick="return false;"> Otro';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
							</tr>
							<tr>
								<?php
								$options = '<input type="checkbox" name="chkotro_olor" value="1" '.($aGuia['olor_otro'] == "1" ? 'checked' : ' ').' onclick="return false;"> Otro';
								?>
								<td class="align-middle" scope="row"><?=$options;?></td>
								<td class="align-middle td_invisible_bottom td_invisible_rigth" scope="row"></td>
							</tr>
						</tbody>
				</table>
												

				<label class="col-md col-form-label bold"> Observaciones </label>
				<?php
	            	echo '<div class="col-md-12 col-form-label">'.$aGuia['obs_analisisfisico'].'</div>';
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

				<table class="table table-bordered table-hover table-sm">
					<thead>
						<tr class="table-dark text-center">
							<th scope="col" colspan="3">DEFECTOS PRIMARIOS</th>
							<th scope="col" colspan="3">DEFECTOS SECUNDARIOS</th>
						</tr>
					</thead>
					<tbody>
						<?php $total_primario = 0; $total_secu = 0;?>
						<tr>
							<td class="align-middle" scope="row" class="col-5">Grano Negro</td>
							<td class="align-middle" scope="row" class="col-1">1*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['grano_negro']; $total_primario += $aGuia['grano_negro'];?></td>
							<td class="align-middle" scope="row" class="col-5">Negro Parcial</td>
							<td class="align-middle" scope="row" class="col-1">3*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['negro_parcial']; $total_secu += $aGuia['negro_parcial'];?></td>
						</tr>
						<tr>
							<td class="align-middle" scope="row" class="col-5">Grano Agrio</td>
							<td class="align-middle" scope="row" class="col-1">1*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['grano_agrio']; $total_primario += $aGuia['grano_agrio'];?></td>
							<td class="align-middle" scope="row" class="col-5">Agrio Parcial</td>
							<td class="align-middle" scope="row" class="col-1">3*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['agrio_parcial']; $total_secu += $aGuia['agrio_parcial'];?></td>
						</tr>

						<tr>
							<td class="align-middle" scope="row" class="col-5">Cereza Seca</td>
							<td class="align-middle" scope="row" class="col-1">1*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['cereza_seca']; $total_primario += $aGuia['cereza_seca'];?></td>
							<td class="align-middle" scope="row" class="col-5">Pergamino</td>
							<td class="align-middle" scope="row" class="col-1">5*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['pergamino']; $total_secu += $aGuia['pergamino'];?></td>
						</tr>

						<tr>
							<td class="align-middle" scope="row" class="col-5">Daño por Hongo</td>
							<td class="align-middle" scope="row" class="col-1">1*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['danio_hongo']; $total_primario += $aGuia['danio_hongo'];?></td>
							<td class="align-middle" scope="row" class="col-5">Flotador</td>
							<td class="align-middle" scope="row" class="col-1">5*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['flotador']; $total_secu += $aGuia['flotador'];?></td>
						</tr>

						<tr>
							<td class="align-middle" scope="row" class="col-5">Materia Extraña</td>
							<td class="align-middle" scope="row" class="col-1">1*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['materia_extrania']; $total_primario += $aGuia['materia_extrania'];?></td>
							<td class="align-middle" scope="row" class="col-5">Inmaduro</td>
							<td class="align-middle" scope="row" class="col-1">5*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['inmaduro']; $total_secu += $aGuia['inmaduro'];?></td>
						</tr>

						<tr>
							<td class="align-middle" scope="row" class="col-5">Brocado Severo</td>
							<td class="align-middle" scope="row" class="col-1">5*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['brocado_severo']; $total_primario += $aGuia['brocado_severo'];?></td>
							<td class="align-middle" scope="row" class="col-5">Averanado</td>
							<td class="align-middle" scope="row" class="col-1">5*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['averanado']; $total_secu += $aGuia['averanado'];?></td>
						</tr>

						<tr>
							<td class="align-middle" scope="row" class="col-5" colspan="2">Subtotal</td>
							<td class="align-middle" scope="row" class="col-6"><?=$total_primario;?></td>
							<td class="align-middle" scope="row" class="col-5">Conchas</td>
							<td class="align-middle" scope="row" class="col-1">5*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['conchas']; $total_secu += $aGuia['conchas'];?></td>
						</tr>

						<tr>
							<td class="align-middle td_invisible_bottom td_invisible_left" scope="row" colspan="3"></td>
							<td class="align-middle" scope="row" class="col-5">Partido/Mordido</td>
							<td class="align-middle" scope="row" class="col-1">5*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['partido']; $total_secu += $aGuia['partido'];?></td>
						</tr>

						<tr>
							<td class="align-middle td_invisible_bottom td_invisible_left" scope="row" colspan="3"></td>
							<td class="align-middle" scope="row" class="col-5">Pulpa Seca</td>
							<td class="align-middle" scope="row" class="col-1">5*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['pulpa_seca']; $total_secu += $aGuia['pulpa_seca'];?></td>
						</tr>

						<tr>
							<td class="align-middle td_invisible_bottom td_invisible_left" scope="row" colspan="3"></td>
							<td class="align-middle" scope="row" class="col-5">Viejo/Blanqueado</td>
							<td class="align-middle" scope="row" class="col-1">5*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['viejo']; $total_secu += $aGuia['viejo'];?></td>
						</tr>

						<tr>
							<td class="align-middle td_invisible_bottom td_invisible_left " scope="row" colspan="3"></td>
							<td class="align-middle" scope="row" class="col-5">Brocado Leve</td>
							<td class="align-middle" scope="row" class="col-1">10*1</td>
							<td class="align-middle" scope="row" class="col-6"><?=$aGuia['brocado']; $total_secu += $aGuia['brocado'];?></td>
						</tr>

						<tr>
							<td class="align-middle td_invisible_bottom td_invisible_left" scope="row" colspan="3"></td>
							<td class="align-middle" scope="row" class="col-5" colspan="2">Subtotal</td>
							<td class="align-middle" scope="row" class="col-6"><?=$total_secu;?></td>
						</tr>

						</tbody>
						<tfoot>
							<tr class="table-dark text-center">
								<th class="align-middle" scope="row" colspan="4">Total(Defectos Primarios + Secundarios)</th>
									       	<th class="align-middle" scope="row" colspan="2"><?=($total_primario+$total_secu);?></th>
							</tr>
						</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

