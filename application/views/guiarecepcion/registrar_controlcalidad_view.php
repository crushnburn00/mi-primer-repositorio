						<ul class="nav nav-tabs" id="controlTab" role="tablist">
						  <?php
							foreach ($menu_control as $key => $row) {
						?>			
							<li class="nav-item" role="presentation">
								<a class="nav-link <?=$row['class'];?>" id="<?=$row['id'];?>-tab" data-toggle="tab" href="#<?=$row['id'];?>" role="tab" aria-controls="<?=$row['id'];?>" <?=$row['atributo'];?>><?=$row['descripcion'];?></a>
							</li>
						<?php
							}
						?>

						</ul>
						<div class="tab-content" id="myTabContent1">

							<?php

								foreach ($menu_control as $key => $row) {
									$clase ="";
									if($row['class'] == "active"){
										$clase = "show active";
									}else{
										$clase="";
									}


							?>
								<div class="tab-pane fade <?=$clase;?>" id="<?=$row['id'];?>" role="tabpanel" aria-labelledby="<?=$row['id'];?>-tab">
								  	
							  		<?php 
							  		$accion = "registrar";
							  		if($aGuia['bit_'.$row['id']] == 1)
							  			$accion = "detalle";

							  		$vista = 'guiarecepcion/'.$accion.'_'.$row['id'].'_view';
							  		$this->load->view($vista);
							  		?>
							  	</div>
							<?php
								}
							?>	


						</div>