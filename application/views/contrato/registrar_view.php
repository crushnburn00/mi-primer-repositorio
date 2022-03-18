
<div class="container div-container">

<div class="col-12" id="validacion_errores_cliente"></div>
	      <!-- TITULO DEL FORMULARIO -->
        <div class="col-12 div-encabezado">
                  REGISTRO DE CONTRATO
		</div>
	        <!-- campos del formulario-->
	        <!-- FORMULARIO -->
			<?= form_open(base_url().'', array(
		        'name' => 'form_contrato',
		        'id'=>'form_contrato',
		        'class'=> 'form-contrato',
		        'role' => 'form'
		    ));

	      	?>

	      	<div class = "div-marco">
	       
			    <div class="form-group row">			

                    <div class="col-12 row2">
                    	<div class="col-12 bold "> BUSQUEDA DE CLIENTE 
                    	<span style ="font-size: 12px; color:red "> ( * Ingresar al menos 3 caracteres ) </span> </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>

			<div class="container-fluid form-group" id="div_listado_filtro">

				<div class="table table-bordered" id="">	

					<div class="form-group col-12 row2 thead_div" >
						<div class="col-4 ">Codigo Cliente *</div>
						<div class="col-4 ">RUC / ID * </div>
						<div class="col-4 ">Razón Social / Cliente *</div>
					</div>

					<div class="" id="div_bus_filtro">
						<div class="form-group col-12 row2 tbus_div" > 
							<?php
							$data = array(	
									'name'	=>	'txtcampobusqueda1' , 
									'id'	=>	'campobusqueda1',
									'class'	=>	"form-control form-control-sm busqueda-cliente",
									'placeholder'=> '* Codigo ... ',
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-md-4 col-form-label ">'.form_input($data).'</div>';

							$data = array(	
									'name'	=>	'txtcampobusqueda2' , 
									'id'	=>	'campobusqueda2',
									'class'	=>	"form-control form-control-sm busqueda-cliente",
									'placeholder'=> '* RUC / ID ... ',
									'autocomplete' => 'off'
									);
							
							echo '<div class="col-md-4 col-form-label ">'.form_input($data).'</div>';

							$data = array(	
									'name'	=>	'txtcampobusqueda3' , 
									'id'	=>	'campobusqueda3',
									'class'	=>	"form-control form-control-sm busqueda-cliente",
									'placeholder'=> '* Razón Social / Cliente ... ',
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
                   
				</div>
			</div>


	      	<div class = "div-marco">
	       
			    <div class="form-group row">			

                    <div class="col-12 row2">
                    	<div class="col-md-12 bold "> DATOS GENERALES </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>

                    <label  class="col-md-2 col-form-label required">Nro contrato</label>

					<?php

						$data = array(	
								'name'	=>	'txtnrocontrato' , 
								'id'	=>	'nrocontrato',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">Fecha Contrato</label>

					<?php

						$data = array(	
								'name'			=>	'txtfeccontrato' , 
								'id'			=>	'feccontrato',
								'class'			=>	"form-control form-control-sm datetimepicker-input",
								'placeholder'	=> '',
								'autocomplete' 	=> 'off',
	                            'data-toggle'	=> 'datetimepicker',
	                            'data-target' 	=> "#feccontrato",
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

                   

					<label  class="col-md-2 col-form-label required">Codigo Cliente</label>
					<label  class="col-md-4 col-form-label" id="lblcodigocliente"></label>
					<?=form_hidden('txtcliente', '');?>


					 <label  class="col-md-2 col-form-label">Flo Id</label>
					 <label  class="col-md-4 col-form-label" id="lblfloid"></label>

					<label  class="col-md-2 col-form-label">Cliente</label>
					<label  class="col-md-10 col-form-label" id="lblcliente"></label>
				

					
             
					<label  class="col-md-2 col-form-label">Condicion de Embarque</label>
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaCEmbarque as $key => $row) {
					    	$options[$row['id_condicion_embarque']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="condembarque"';

						echo '<div class="col-md-4 row no-gutters"  id="div-condembarque">
                            <div class="col-11">'.form_dropdown('cboCondEmbarque', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-condembarque"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txtcondembarque' , 
								'id'	=>	'condembarque1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nuevo Condicion Embarque',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-condembarque1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-condembarque"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-condembarque"><span class="icon-cross"></span></div>
                            </div>';


                    ?>  



					<label  class="col-md-2 col-form-label">Fecha de Embarque</label>
                    
					<?php

						$data = array(	
								'name'			=>	'txtfecembarque' , 
								'id'			=>	'fecembarque',
								'class'			=>	"form-control form-control-sm datetimepicker-input",
								'placeholder'	=> '',
								'autocomplete' 	=> 'off',
	                            'data-toggle'	=> 'datetimepicker',
	                            'data-target' 	=> "#fecembarque",
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">Destino: Pais </label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaPais as $key => $row) {
					    	$options[$row['id_pais']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="pais"';

						echo '<div class="col-md-4 row no-gutters"  id="div-pais">
                            <div class="col-11">'.form_dropdown('cboPais', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-pais"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txtpais' , 
								'id'	=>	'pais1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nuevo Pais',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-pais1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-pais"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-pais"><span class="icon-cross"></span></div>
                            </div>';


                    ?>  

                    <label  class="col-md-2 col-form-label">Destino: Ciudad</label>
                    
					<?php
						$options = array( 0 => ' - Seleccionar - ');
						                       
						$adicional = 'class="form-control form-control-sm" id="ciudad"';

						echo '<div class="col-md-4 row no-gutters"  id="div-ciudad">
                            <div class="col-11">'.form_dropdown('cboCiudad', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-ciudad"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txtciudad' , 
								'id'	=>	'ciudad1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nuevo Ciudad',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-ciudad1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-ciudad"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-ciudad"><span class="icon-cross"></span></div>
                            </div>';

                    ?>  	                     
				</div>
			</div>


	        <div class = "div-marco">
	       
			    <div class="form-group row">			

                    <div class="col-12 row2">
                    	<div class="col-md-12 bold "> DETALLE DE LA COMPRA </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>


                    <label  class="col-md-2 col-form-label" >Tipo Contrato</label>

					<?php
						$options = array( 0 => ' - Seleccionar - ' , 1 => 'ABIERTO' ,2 =>'CERRADO');          
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboTipoContrato', $options, 0 ,$adicional).'</div>';
                    ?>  

					<label  class="col-md-2 col-form-label" >Moneda</label>


					<?php

						$options = array( 0 => ' - Seleccionar - ');
						foreach ($aListaMoneda as $key => $row) {
					    	$options[$row['id_moneda']] = $row['descripcion'];
					    }

						echo '<div class="col-md-4">'.form_dropdown('cboMoneda', $options, 0 ,$adicional).'</div>';
                    ?>  

					<label  class="col-md-2 col-form-label" >Precio</label>

					<?php

						$data = array(	
								'name'	=>	'txtPrecio' , 
								'id'	=>	'precio',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label" >Calculo</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ');
						$options = array_merge($options, $aCalculo);
						
						echo '<div class="col-md-4">'.form_dropdown('cboCalculo', $options, 0 ,$adicional).'</div>';
                    ?> 

					<label  class="col-md-2 col-form-label" >Periodo Cosecha</label>

					<?php

						$data = array(	
								'name'	=>	'txtPeriodoCosecha' , 
								'id'	=>	'periodoCosecha',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label " >Tipo Produccion</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ',	1 =>'ORGANICO', 2 =>'CONVENCIONAL' );
						$adicional = 'class="form-control form-control-sm" id="tipoproduccion"';
						
						echo '<div class="col-md-4">'.form_dropdown('cboTipoProduccion', $options, 0 ,$adicional).'</div>';
                    ?> 
					

					<label  class="col-md-2 col-form-label " >Producto</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ',	1 =>'CAFE PERGAMINO', 2 =>'CAFE ORO/VERDE' );
						$adicional = 'class="form-control form-control-sm" id="producto"';
						
						echo '<div class="col-md-4">'.form_dropdown('cboProducto', $options, 0 ,$adicional).'</div>';
                    ?> 

					


					<label  class="col-md-2 col-form-label " >SubProducto</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ');
						$adicional = 'class="form-control form-control-sm" id="subproducto"';

						echo '<div class="col-md-4">'.form_dropdown('cboSubProducto', $options, 0 ,$adicional).'</div>';
					?>

					<label  class="col-md-2 col-form-label " >Certificadora</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aEntidadCertificadora as $key => $row) {
					    	$options[$row['id_entidadcertificadora']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="entidadcertificadora"';

						echo '<div class="col-md-4 row no-gutters"  id="div-entidadcertificadora">
                            <div class="col-11">'.form_dropdown('cboEntidadcertificadora', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-entidadcertificadora"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txtentidadcertificadora' , 
								'id'	=>	'entidadcertificadora1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nueva Entidad',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-entidadcertificadora1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-entidadcertificadora"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-entidadcertificadora"><span class="icon-cross"></span></div>
                            </div>';


                    ?>

					<label  class="col-md-2 col-form-label " >Certificacion</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aTipoCertificacion as $key => $row) {
					    	$options[$row['id_tipocertificacion']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="tipocertificacion"';

						echo '<div class="col-md-4 row no-gutters"  id="div-tipocertificacion">
                            <div class="col-11">'.form_multiselect('cboTipocertificacion[]', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-tipocertificacion"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txttipocertificacion' , 
								'id'	=>	'tipocertificacion1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nuevo Tipo',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-tipocertificacion1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-tipocertificacion"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-tipocertificacion"><span class="icon-cross"></span></div>
                            </div>';


                    ?>

					<label  class="col-md-2 col-form-label " >Peso Contrato</label>

					<?php

						$data = array(	
								'name'	=>	'txtPesoContrato' , 
								'id'	=>	'pesoContrato',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label " >Unidad Medida</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ');
						foreach ($aListaUnidad as $key => $row) {
					    	$options[$row['id_unidad_medida']] = $row['descripcion'];
					    }

						echo '<div class="col-md-4">'.form_dropdown('cboUnidadMedida', $options, 0 ,$adicional).'</div>';
					?>

					<label  class="col-md-2 col-form-label " >Empaque/Tipo</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ');
						$options = array_merge($options, $aTipoEmpaque);

						echo '<div class="col-md-4">'.form_dropdown('cboEmpaqueTipo', $options, 0 ,$adicional).'</div>';

					?>

					<label  class="col-md-6 col-form-label " ></label>

					<label  class="col-md-2 col-form-label " >Total Sacos</label>

					<?php

						$data = array(	
								'name'	=>	'txtTotalSacos' , 
								'id'	=>	'totalSacos',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label " >Calidad</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ');
						$adicional = 'class="form-control form-control-sm" id="calidad"';
					
						echo '<div class="col-md-4">'.form_dropdown('cboCalidad', $options, 0 ,$adicional).'</div>';
					?>

					<label  class="col-md-2 col-form-label " >Peso Por Saco KG</label>

					<?php

						$data = array(	
								'name'	=>	'txtPesoSacoKg' , 
								'id'	=>	'pesoSacoKg',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label " >Grado</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ');
						for ($i=1; $i < 21; $i++) { 
							$options[$i] = "GRADO ".$i;
							
						}
						$adicional = 'class="form-control form-control-sm" id=""';
					
						echo '<div class="col-md-4">'.form_dropdown('cboGrado', $options, 0 ,$adicional).'</div>';
					?>

					

					<label  class="col-md-2 col-form-label " >Peso Neto KG</label>

					<?php

						$data = array(	
								'name'	=>	'txtPesoNetoKg' , 
								'id'	=>	'pesoNetoKg',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label " >Cantidad de defectos</label>

					<?php

						$data = array(	
								'name'	=>	'txtCantDefectos' , 
								'id'	=>	'cantDefectos',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label " >Observaciones</label>

					<?php

						$data = array(
						        'name'        => 'txtobs',
						        'id'          => 'obs',
						        'rows'        => '3',
						        'class'	=>	"form-control form-control-sm required-input"
						);

						echo '<div class="col-md-12 col-form-label">'.form_textarea($data).'</div>';


					?>

					<label class="col-md-2 col-form-label">Cargar Contrato</span></label>

					<div class="col-md-10 row no-gutters">
					<?php

						$data = array(	
							'name'	=>	'fileAdjuntos[]' , 
							'value'	=>	'' ,
							'id'	=>	'fileAdjuntos',
							'class'	=>	"form-control form-control-sm required-input",
							'placeholder'		=> '',
							'multiple'=>"multiple"
						);
										
						echo ''.form_upload($data).'';
						echo form_hidden('txtruta_archivo', '');
					?>
			        </div>           
				</div>
			</div>


			<div class = "div-marco">
	       
			    <div class="form-group row">			

                    <div class="col-12 row2">
                    	<div class="col-md-12 bold "> DETALLE DE VALORES PARA CALCULO DEL PRECIO DEL DIA </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>


                    <label  class="col-md-2 col-form-label" >Factura en</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ' , 1 => 'QQ', 2 => 'LB');
						$adicional = 'class="form-control form-control-sm" id="facturaen"';
						echo '<div class="col-md-4">'.form_dropdown('cboFacturar', $options, 0 ,$adicional).'</div>';
					?>

					<label  class="col-md-2 col-form-label" >Estado Fijacion</label>

					<?php

						$options = array( 0 => ' - Seleccionar - ' , 6 => 'FIJADO', 7 => 'SIN FIJAR');
						$adicional = 'class="form-control form-control-sm" id="estfijacion"';
						echo '<div class="col-md-4">'.form_dropdown('cboEstFijacion', $options, 0 ,$adicional).'</div>';
					?>

					<label  class="col-md-2 col-form-label" >KG Neto en QQ(a)</label>

					<?php

						$data = array(	
								'name'	=>	'txtKgNetoQQ' , 
								'id'	=>	'kgNetoQQ',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label" >Fec. Fijacion Contrato</label>

					<?php

						$data = array(	
								'name'			=>	'txtfecfijacioncontrato' , 
								'id'			=>	'fecfijacioncontrato',
								'class'			=>	"form-control form-control-sm datetimepicker-input",
								'placeholder'	=> '',
								'autocomplete' 	=> 'off',
	                            'data-toggle'	=> 'datetimepicker',
	                            'data-target' 	=> "#fecfijacioncontrato",
	                            'readonly'		=> 'readonly'
								);

						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					

					<label  class="col-md-2 col-form-label" >KG Neto en LB(b)</label>

					<?php

						$data = array(	
								'name'	=>	'txtKgNetoLB' , 
								'id'	=>	'kgNetoLB',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label " >Precio Nivel de Fijacion (1)</label>

					<?php

						$data = array(	
								'name'	=>	'txtPrecioNivelFijacion' , 
								'id'	=>	'precioNivelFijacion',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label " >Diferencial (2)</label>


					<?php

						$data = array(	
								'name'	=>	'txtDiferencial' , 
								'id'	=>	'diferencial',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label " >Nota Credito/Comision</label>

					<?php

						$data = array(	
								'name'	=>	'txtNotaCredito' , 
								'id'	=>	'notaCredito',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label " >Gastos Exp./Costos</label>

					<?php

						$data = array(	
								'name'	=>	'txtGastosExp' , 
								'id'	=>	'gastosExp',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>
					<label  class="col-md-6 col-form-label " ></label>

					<label  class="col-md-2 col-form-label " >PU TOTAL A (1+2)</label>

					<?php

						$data = array(	
								'name'	=>	'txtPuTotala' , 
								'id'	=>	'puTotala',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label " >Total Facturar (1)</label>

					<?php

						$data = array(	
								'name'	=>	'txtFacturar1' , 
								'id'	=>	'facturar1',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label " >PU TOTAL B (A - NC/C)</label>

					<?php

						$data = array(	
								'name'	=>	'txtPuTotalb' , 
								'id'	=>	'puTotalb',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label " >Total Facturar (2)</label>

					<?php

						$data = array(	
								'name'	=>	'txtFacturar2' , 
								'id'	=>	'facturar2',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label " >PU TOTAL C (B - G.EXP/Cs)</label>

					<?php

						$data = array(	
								'name'	=>	'txtPuTotalc' , 
								'id'	=>	'puTotalc',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label " >Total Facturar (3)</label>

					<?php

						$data = array(	
								'name'	=>	'txtFacturar3' , 
								'id'	=>	'facturar3',	
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off',
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					          
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