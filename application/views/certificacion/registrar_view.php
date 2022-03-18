
<div class="container div-container">

<div class="col-12" id="validacion_errores_productor"></div>
	      <!-- TITULO DEL FORMULARIO -->
        <div class="col-12 div-encabezado">
                  REGISTRO DE CERTIFICACION
		</div>
	        <!-- campos del formulario-->
	        <!-- FORMULARIO -->
			<?= form_open(base_url().'', array(
		        'name' => 'form_certificacion',
		        'id'=>'form_certificacion',
		        'class'=> 'form-certificacion',
		        'role' => 'form'
		    ));
	      	?>

	        <div class = "div-marco">
	       
			    <div class="form-group row">			

                    <div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> INFORMACION FINCA </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>

                    <label  class="col-md-2 col-form-label"  id="lblnombre">Nombre</label>

					<?php

						$data = array(	
								'name'	=>	'txtnombre' , 
								'id'	=>	'nombre',
								'class'	=>	"form-control form-control-sm",
								'value'	=> $aFinca[0]['nombre'],
								'readonly' => 'readonly'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';

						echo form_hidden('txtid', $aFinca[0]['id_finca']);
					?>
					<br/><br/>
					<div class="col-12 row2">
                    	<div class="col-md-12 bold encabezado1"> INFORMACION CERTIFICACION </div>
					</div>


					<label  class="col-md-2 col-form-label required">Tipo Certificacion</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aTipoCertificacion as $key => $row) {
					    	$options[$row['id_tipocertificacion']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="tipocertificacion"';

						echo '<div class="col-md-4 row no-gutters"  id="div-tipocertificacion">
                            <div class="col-11">'.form_dropdown('cboTipocertificacion', $options, 0 ,$adicional).'</div>
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


                    <label  class="col-md-2 col-form-label required">Entidad Certificadora</label>
                    
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


                    <label  class="col-md-2 col-form-label required">Fecha Emision</label>

                    <?php

                    $data = array(
                            'name'			=>	'txtFecEmision' , 
                            'value'			=> '',
                            'id'			=>	'fecEmision',
                            'class'			=>	"form-control form-control-sm datetimepicker-input",
                            'placeholder'	=> '',
                            'data-toggle'	=> 'datetimepicker',
                            'data-target' 	=> "#fecEmision",
                            'autocomplete' => 'off'
                            );

                    echo '<div class="col-md-4 row no-gutters">
                            <div class="col-11">'.form_input($data).'</div>
                            <div class="col-1" id="icon-delete-fecEmision"><span class="icon-spinner11"></span></div>
                            </div>';
                    ?>



                    <label  class="col-md-2 col-form-label required">Fecha Expiracion</label>

                    <?php

                    $data = array(
                            'name'			=>	'txtFecExpiracion' , 
                            'value'			=> '',
                            'id'			=>	'fecExpiracion',
                            'class'			=>	"form-control form-control-sm datetimepicker-input",
                            'placeholder'	=> '',
                            'data-toggle'	=> 'datetimepicker',
                            'data-target' 	=> "#fecExpiracion",
                            'autocomplete' => 'off'
                            );

                    echo '<div class="col-md-4 row no-gutters">
                            <div class="col-11">'.form_input($data).'</div>
                            <div class="col-1" id="icon-delete-fecExpiracion"><span class="icon-spinner11"></span></div>
                            </div>';
                    ?>


					<label class="col-md-2 col-form-label">Documentos Adjuntos</span></label>

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