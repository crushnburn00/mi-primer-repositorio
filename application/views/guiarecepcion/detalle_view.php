
<div class="container div-container">

	<div class="row row-principal">

    	<div class="col-12 div-encabezado">
				Guia de Recepcion Detalle
		</div>

		<div class="col-12">
			<div class="col-12" id="validacion_errores"></div>

			<div class ="" id="div-detalle" >

				<div class = "div-marco" id="div-">
					<div class = "" id="div-productor">	        	
						    <div class="row">					
								<div class="col-md-12 row2">
									<label class="col-md-12 bold" id="lblRegistroProductor">
										Registrado el <?=$aGuia['fec_registro'];?>
									</label>
								</div>
							</div>
					</div>

					<div class="col-12 row2">
									<div class="col-12" id="validacion_productor"></div>
									<div  class="col-md-10 bold encabezado1 ">DATOS DEL PROVEEDOR</div>
					</div>

					<div class = "" id="div-">	
						<div class="row">

									<div   class="col-md-2 col-form-label bold">Doc.Identidad</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aGuia['nro_documento'];?></label>
									
									<div   class="col-md-2 col-form-label bold">Departamento</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['departamento'];?></label>

									<div   class="col-md-2 col-form-label bold">Nombre</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aGuia['nombre_razon'];?></label>

									<div   class="col-md-2 col-form-label bold">Provincia</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['provincia'];?></label>

									<div   class="col-md-2 col-form-label bold">Tipo</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aGuia['tipo'];?></label>

									<div   class="col-md-2 col-form-label bold">Distrito</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['distrito'];?></label>

									<div   class="col-md-2 col-form-label bold">Codigo</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aGuia['codigo_socio'];?></label>

									<div   class="col-md-2 col-form-label bold">Zona</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['zona'];?></label>

									<div   class="col-md-2 col-form-label bold">Finca</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['nombre'];?></label>																																									
									<div   class="col-md-2 col-form-label bold">Certificacion</div>
									<label for=""  class="form-control-sm show col-md-4" id=""><?=$aFinca['tipo_certificacion'];?></label>	

									<div   class="col-md-2 col-form-label bold">Estimado (Kgs)</div>
									<div   class="col-md-2 col-form-label bold">Total</div>
									<div   class="col-md-2 col-form-label bold">Saldo pendiente</div>
									<div   class="col-md-6 col-form-label bold"></div>
									<div   class="col-md-2 col-form-label bold"></div>
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aFincaAnual['kg_estimado'];?></label>	
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aFincaAnual['kg_consumido'];?></label>																	
						</div>

					</div>

					<div class="col-12 row2">
									<div class="col-12" id="validacion_productor"></div>
									<div  class="col-md-10 bold encabezado1 ">DATOS DEL PRODUCTO</div>
					</div>
							
					<div class = "" id="div-">	
								<div class="row">

									<div   class="col-md-2 col-form-label bold">Producto</div>
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aGuia['producto'];?></label>
									
									<div   class="col-md-2 col-form-label bold">Fec. de Cosecha</div>
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aGuia['fecha_cosecha'];?></label>

									<div   class="col-md-2 col-form-label bold">Asignado (kgs) Total KG Pergamino</div>
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aGuia['total_kg_pergamino'];?></label>

									<div   class="col-md-2 col-form-label bold">Subproducto</div>
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aGuia['sub_producto'];?></label>

									<div   class="col-md-2 col-form-label bold">Tipo Produccion</div>
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aGuia['tipo_produccion'];?></label>

									<div   class="col-md-2 col-form-label bold">% Rendimiento</div>
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aGuia['ini_rendimiento'];?></label>

									<div   class="col-md-8 col-form-label bold"></div>

									<div   class="col-md-2 col-form-label bold">Saldo Pendiente</div>
									<label for=""  class="form-control-sm show col-md-2" id=""><?=$aGuia['saldo_pendiente'];?></label>

																									
								</div>
					</div>

			<div class = "" id="div-">	

				<ul class="nav nav-tabs" id="myTab" role="tablist">
				<?php
					foreach ($menu as $key => $row) {
				?>			
					<li class="nav-item" role="presentation">
						<a class="nav-link <?=$row['class'];?>" id="<?=$row['id'];?>-tab" data-toggle="tab" href="#<?=$row['id'];?>" role="tab" aria-controls="<?=$row['id'];?>" <?=$row['atributo'];?>><?=$row['descripcion'];?></a>
					</li>
				<?php
					}
				?>
				</ul>

				<div class="tab-content" id="myTabContent">
				<?php

					foreach ($menu as $key => $row) {
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
				</div>
			</div>
		</div>


		</div>
	</div>
	<div class="row">
		<div class="col-6 col-md-2">
			<div class="social">
		 		<a href="<?=base_url();?>contrato" class="social__button icon_pie"><i class="icon-undo2"></i></a>
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
