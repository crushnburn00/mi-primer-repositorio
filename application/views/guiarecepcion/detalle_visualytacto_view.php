
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<label class="col-md-6 col-form-label"> <label class="">% HUMEDAD</label> </label>
					<div class="col-md-6 row no-gutters">
					    <div class="col-12"><?=$aGuia['humedad_visual'];?></div>
					</div>
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
							$options = '<input type="checkbox" name="chkfresco" value="1" '.($aGuia['olor_fresco_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Fresco';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
							<?php
							$options = '<input type="checkbox" name="chknormal" value="1" '.($aGuia['color_normal_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Normal';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
						</tr>
						<tr>
							<?php
							$options = '<input type="checkbox" name="chkviejo" value="1" '.($aGuia['olor_viejo_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Viejo';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
							<?php
							$options = '<input type="checkbox" name="chkdisparejo" value="1" '.($aGuia['color_disparejo_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Disparejo';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
						</tr>
						<tr>
							<?php
							$options = '<input type="checkbox" name="chkfermento" value="1" '.($aGuia['olor_fermento_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Fermento';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
							<?php
							$options = '<input type="checkbox" name="chkmanchado" value="1" '.($aGuia['color_manchado_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Manchado';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
						</tr>
						<tr>
							<?php
							$options = '<input type="checkbox" name="chkterroso" value="1" '.($aGuia['olor_terroso_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Terroso';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
							<?php
							$options = '<input type="checkbox" name="chknegruzco" value="1" '.($aGuia['color_negruzco_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Negruzco';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
						</tr>
						<tr>
							<?php
							$options = '<input type="checkbox" name="chkmoho" value="1" '.($aGuia['olor_moho_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Moho';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
							<?php
							$options = '<input type="checkbox" name="chkotros_color" value="1" '.($aGuia['color_otros_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Otros';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
						</tr>
						<tr>
							<?php
							$options = '<input type="checkbox" name="chkhierbas" value="1" '.($aGuia['olor_hierbas_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Hierbas';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
							<td class="align-middle td_invisible_bottom td_invisible_rigth" scope="row"></td>
						</tr>
						<tr>
							<?php
							$options = '<input type="checkbox" name="chkcontaminado" value="1" '.($aGuia['olor_contaminado_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Contaminado';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
							<td class="align-middle td_invisible_bottom td_invisible_rigth" scope="row"></td>
						</tr>
						<tr>
							<?php
							$options = '<input type="checkbox" name="chkotros" value="1" '.($aGuia['olor_otros_visual'] == "1" ? 'checked' : ' ').' onclick="return false;"> Otros';
							?>
							<td class="align-middle" scope="row"><?=$options;?></td>
							<td class="align-middle td_invisible_bottom td_invisible_rigth" scope="row"></td>
						</tr>
					</tbody>
				</table>						

				<label class="col-md col-form-label bold"> Observaciones </label>
				<div class="col-md-12 col-form-label"><?=$aGuia['obs_analisis_visual'];?></div>

			</div>


		</div>
	</div>

</div>
