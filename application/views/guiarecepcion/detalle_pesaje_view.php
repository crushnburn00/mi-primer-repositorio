<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header text-center">
				PESADO DEL CAFE
			</div>

			<div class="card-body">
										<table class="table table-bordered table-hover table-sm">
											<thead>
												<tr class="table-dark text-center">
													<th scope="col">DETALLE</th>
													<th scope="col">VALORES</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<th class="align-middle" scope="row">Tipo de Empaque</th>
													<td><?=$aGuia['empaque_pesaje'];?>
											        </td>
												</tr>
												<tr>
													<th class="align-middle" scope="row">Cantidad</th>
													<td><?=$aGuia['cant_pesaje'];?>
											        </td>
												</tr>
												<tr>
													<th class="align-middle" scope="row">Total Kilos Brutos</th>
													<td><?=$aGuia['total_kg_br_pesaje'];?>
													</td>
												</tr>
												<tr>
													<th class="align-middle" scope="row">Tara</th>
													<td><?=$aGuia['tara_pesaje'];?>
													</td>
												</tr>
												<tr>
													<th class="align-middle" scope="row">Total Kilos Netos</th>
													<td><?=$aGuia['total_kg_neto_pesaje'];?>
													</td>
												</tr>
											</tbody>
										</table>
										<br>
										<label class="col-md col-form-label bold"> Observaciones </label>
										<label class="col-md col-form-label"> <?=$aGuia['observaciones'];?> </label>
										
			</div>
		</div>
	</div>
	<div class="col-md-6">
		 <div class="card">
			<div class="card-header text-center">
				ANALISIS FISICO
			</div>
			<div class="card-body">
										<table class="table table-bordered table-hover table-sm">
											<thead>
												<tr class="table-dark text-center">
													<th scope="col">DETALLE</th>
													<th scope="col">VALORES</th>
													<th scope="col">%</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<?php $total_rendimiento = $aGuia['exportable_gr']+$aGuia['descarte_gr']+$aGuia['cascarilla_gr']; ?>
													<td class="align-middle" scope="row"><label class="">Exportable</label></td>
													<td><?=$aGuia['exportable_gr'];?></td>
													<?php
														if($aGuia['exportable_gr'] == 0)
															$porcentaje = "";
														else
															$porcentaje = number_format(($aGuia['exportable_gr']/$total_rendimiento)*100,2,".","")
													?>
													<td><?=$porcentaje;?></td>
												</tr>
												<tr>
													<td class="align-middle" scope="row"><label class="">Descarte</label></td>
													<td><?=$aGuia['descarte_gr'];?></td>
													<?php
														if($aGuia['descarte_gr'] == 0)
															$porcentaje = "";
														else
															$porcentaje = number_format(($aGuia['descarte_gr']/$total_rendimiento)*100,2,".","")
													?>
													<td><?=$porcentaje;?></td>
												</tr>
												<tr>
													<td class="align-middle" scope="row"><label class="">Cascarilla</label></td>
													<td><?=$aGuia['cascarilla_gr'];?></td>
													<?php
														if($aGuia['cascarilla_gr'] == 0)
															$porcentaje = "";
														else
															$porcentaje = number_format(($aGuia['cascarilla_gr']/$total_rendimiento)*100,2,".","")
													?>
													<td><?=$porcentaje;?></td>
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
										<label class="col-md col-form-label bold"> Observaciones </label>
										<?php
							            	echo '<div class="col-md-12 col-form-label">'.$aGuia['obs_analisisfisico'].'</div>';
							            ?>

			</div>
		</div>
	</div>
</div>