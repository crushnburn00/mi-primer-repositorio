
<div class="container div-container">

<div class="col-12" id="validacion_errores_solicitud"></div>
	      <!-- TITULO DEL FORMULARIO -->
        <div class="col-12 div-encabezado">
                  REGISTRO DE SOCIO
		</div>
	        <!-- campos del formulario-->
	        <!-- FORMULARIO -->
			<?= form_open(base_url().'', array(
		        'name' => 'form_socio',
		        'id'=>'form_socio',
		        'class'=> 'form-socio',
		        'role' => 'form'
		    ));

	      	?>

	        <div class = "div-marco">
	       
			    <div class="form-group row">			

                    <div class="col-12 row2">
                    	<div class="col-12 bold "> BUSQUEDA DE PRODUCTOR 
                    	<span style ="font-size: 12px; color:red "> (*** Ingresar al menos 3 caracteres ***) </span> </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>


			<div class="container-fluid form-group" id="div_listado_filtro">

				<div class="table table-bordered" id="">	

					<div class="form-group col-12 row2 thead_div" >
						<div class="col-4 ">Codigo Productor *</div>
						<div class="col-4 ">DNI / RUC * </div>
						<div class="col-4 ">Apellidos y Nombres / Razon Social *</div>
					</div>

					<div class="" id="div_bus_filtro">
						<div class="form-group col-12 row2 tbus_div" > 
							<?php
							$data = array(	
									'name'	=>	'txtcampobusqueda1' , 
									'id'	=>	'campobusqueda1',
									'class'	=>	"form-control form-control-sm busqueda-socio",
									'placeholder'=> '* Codigo ... ',
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-md-4 col-form-label ">'.form_input($data).'</div>';

							$data = array(	
									'name'	=>	'txtcampobusqueda2' , 
									'id'	=>	'campobusqueda2',
									'class'	=>	"form-control form-control-sm busqueda-socio",
									'placeholder'=> '* DNI / RUC ... ',
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-md-4 col-form-label ">'.form_input($data).'</div>';

							$data = array(	
									'name'	=>	'txtcampobusqueda3' , 
									'id'	=>	'campobusqueda3',
									'class'	=>	"form-control form-control-sm busqueda-socio",
									'placeholder'=> '* Apellidos y Nombres / Razon Social ... ',
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-md-4 col-form-label ">'.form_input($data).'</div>';
							?>
						</div>
					</div>

					<!-- <div class="form-group col-12 row tbody_div" > -->
					<div class="tbody_div row pre-scrollable-filtro" >
						Resultado de la búsqueda
					</div>
				 </div>
			</div> 


                    
					<label  class="col-md-2 col-form-label" id="" style=""></label>
					<br/>
					<div   class="col-md-12"><div  class="col-md-12 bold encabezado1 ">PRODUCTOR ENCONTRADO</div></div>

							<div   class="col-md-2 col-form-label">Codigo</div>
							<label for=""  class="form-control-sm show col-md-4" id="lblcodigo"></label>

							<?=form_hidden('txtid', '');?>

							<div   class="col-md-2 col-form-label">Tipo Documento</div>
							<label for=""  class="form-control-sm show col-md-4" id="lbltipodoc"></label>

							<div   class="col-md-2 col-form-label" id="lbltipodoc">DNI / RUC</div>
							<label for=""  class="form-control-sm show col-md-4" id="lblnrodoc"></label>

							<div   class="col-md-2 col-form-label">Nombres</div>
							<label for=""  class="form-control-sm show col-md-4" id="lblnombres"></label>

							<div   class="col-md-2 col-form-label">Apellidos</div>
							<label for=""  class="form-control-sm show col-md-4" id="lblApellido"></label>

							<div   class="col-md-2 col-form-label">Razon Social</div>
							<label for=""  class="form-control-sm show col-md-4" id="lblrazonsocial"></label>


							<div   class="col-md-2 col-form-label">Telf. Fijo</div>
							<label for=""  class="form-control-sm show col-md-4" id="lbltelfijo"></label>

							<div   class="col-md-2 col-form-label">Telf. Celular</div>
							<label for=""  class="form-control-sm show col-md-4" id="lbltelfcelular"></label>

							<div   class="col-md-2 col-form-label">Direccion</div>
							<label for=""  class="form-control-sm show col-md-4" id="lbldireccion"></label>
					
					        <div   class="col-md-2 col-form-label">Departamento</div>
							<label for=""  class="form-control-sm show col-md-4" id="lbldepartamento"></label>

							<div   class="col-md-2 col-form-label">Provincia</div>
							<label for=""  class="form-control-sm show col-md-4" id="lblprovincia"></label>

							<div   class="col-md-2 col-form-label">Distrito</div>
							<label for=""  class="form-control-sm show col-md-4" id="lbldistrito"></label>

							<div   class="col-md-2 col-form-label">Zona</div>
							<label for=""  class="form-control-sm show col-md-4" id="lblzona"></label>     

							<div   class="col-md-6 col-form-label"></div>
							<label class="col-md-2 col-form-label">Seleccionar Documentos</span></label>
							<div class="col-md-10 row no-gutters">
								<?php

									$data = array(	
										'name'	=>	'fileAdjuntos[]' , 
										'value'	=>	'' ,
										'id'	=>	'fileAdjuntos',
										'class'	=>	"form-control form-control-sm required-input",
										'placeholder' => '',
										'multiple'=>"multiple"
									);
													
									echo ''.form_upload($data).'';
									echo form_hidden('txtruta_archivo', '');

									
								?>
							</div>

				</div>

				



			</div>
			

			<div class="form-group row">			
                    <!-- CIERRE DE FORMULARIO -->

                <?php
					foreach ($btn as $key => $row) {
						echo '<div class="col-md-6">';
						echo '<button type ="submit" id="'.$row['id'].'" value="'.$row['descripcion'].'" name="'.$row['id'].'" class="btn btn-sm '.$row['class'].'" '.$row['atributo'].'>
								<i class="'.$row['icon'].'"></i> '.$row['descripcion'].'</button>';
						echo '</div>';
					}
				?>


			</div>

			<?= form_close();?>
				
	
	</div><!--FIN ROW-->
</div>

<!-- FIN REGISTRAR -->