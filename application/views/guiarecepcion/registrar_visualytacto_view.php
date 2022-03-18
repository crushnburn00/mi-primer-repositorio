<?= form_open(base_url().'', array(
	'name' => 'form_guiarecepcionmp_visualytacto',
	'id'=>'form_guiarecepcionmp_visualytacto',
	'class'=> 'form-guiarecepcionmp_visualytacto',
	'role' => 'form'
));

echo form_hidden('txtid', $aGuia['id_guiarecepcion_mp']);
?>

<div class="row">
	<div class="col-md-12">
		<div class="card">


			<div class="card-body">
				<?php
				$data = array(
				    'name'    	=>  '',
				    'id'    	=>  '',
				    'class'    	=>  "form-control form-control-sm"
				);
				?>

				<div class="row">
				<label class="col-md-6 col-form-label"> <label class="">% HUMEDAD</label> </label>
				<?php
					$data = array(
					    'name'    	=>  'txthumedadvisual',
					    'id'    	=>  'humedadvisual',
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
															<td class="align-middle" scope="row"><input type="checkbox" name="chkfresco" value="1"> Fresco</td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chknormal" value="1"> Normal</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkviejo" value="1"> Viejo</td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkdisparejo" value="1"> Disparejo</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkfermento" value="1"> Fermento</td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkmanchado" value="1"> Manchado</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkterroso" value="1"> Terroso</td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chknegruzco" value="1"> Negruzco</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkmoho" value="1"> Moho</td>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkotros_color" value="1"> Otros</td>
														</tr>
														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkhierbas" value="1"> Hierbas</td>
															<td class="align-middle td_invisible_bottom td_invisible_rigth" scope="row"></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkcontaminado" value="1"> Contaminado</td>
															<td class="align-middle td_invisible_bottom td_invisible_rigth" scope="row"></td>
														</tr>

														<tr>
															<td class="align-middle" scope="row"><input type="checkbox" name="chkotros" value="1"> Otros</td>
															<td class="align-middle td_invisible_bottom td_invisible_rigth" scope="row"></td>
														</tr>
													</tbody>
												</table>
												

												<label class="col-md col-form-label bold"> Observaciones </label>
												<?php
										            $data = array(
										                'name'          => 'txtobsvisualytacto',
										                'id'            => 'obsvisualytacto',
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
				                    <!-- CIERRE DE FORMULARIO -->

	<?php
			foreach ($btn_visualytacto as $key => $row) {
				echo '<div class="col-md-6">';
				echo '<button type ="submit" id="'.$row['id'].'" value="'.$row['descripcion'].'" name="'.$row['id'].'" class="btn btn-sm '.$row['class'].'" '.$row['atributo'].'>
												<i class="'.$row['icon'].'"></i> '.$row['descripcion'].'</button>';
				echo '</div>';
									}
	?>


</div>

<?= form_close();?>