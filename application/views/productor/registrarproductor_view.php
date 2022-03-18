
<div class="container div-container">

<div class="col-12" id="validacion_errores_productor"></div>
	      <!-- TITULO DEL FORMULARIO -->
        <div class="col-12 div-encabezado">
                  REGISTRO DE PRODUCTORES
		</div>
	        <!-- campos del formulario-->
	        <!-- FORMULARIO -->
			<?= form_open(base_url().'', array(
		        'name' => 'form_productor',
		        'id'=>'form_productor',
		        'class'=> 'form-productor',
		        'role' => 'form'
		    ));

	      	?>

	        <div class = "div-marco">
	       
			    <div class="form-group row">			

                    <div class="col-12 row2">
                    	<div class="col-md-12 bold "> INFORMACION BIOMETRICA </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>


                    <label  class="col-md-2 col-form-label required" >Tipo Documento</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaTipoDoc as $key => $row) {
					    	$options[$row['id_tipo_documento']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="tipodoc"';

						echo '<div class="col-md-4">'.form_dropdown('cboTipoDoc', $options, 0 ,$adicional).'</div>';
                    ?>  

                    <label  class="col-md-2 col-form-label required" id="lblnrodoc">DNI / RUC</label>

					<?php

						$data = array(	
								'name'	=>	'txtnrodoc' , 
								'id'	=>	'nrodoc',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label required" style="display: none" id="lblnombre">Nombres</label>

					<?php

						$data = array(	
								'name'	=>	'txtnombre' , 
								'id'	=>	'nombre',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" style="display: none" id="divnombre">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label required"  style="display: none" id="lblApellido">Apellidos</label>

					<?php

						$data = array(	
								'name'	=>	'txtapellidos' , 
								'id'	=>	'apellidos',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" style="display: none" id="divapellido">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label required" id="lblrazonsocial" style="display: none">Razon Social</label>

					<?php

						$data = array(	
								'name'	=>	'txtrazonsocial' , 
								'id'	=>	'razonsocial',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-10 row no-gutters" style="display: none" id="divrazonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>



					<label  class="col-md-2 col-form-label">Telf.Fijo</label>

					<?php

						$data = array(	
								'name'	=>	'txttelfijo' , 
								'id'	=>	'telfijo',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label">Telf.Celular</label>

					<?php

						$data = array(	
								'name'	=>	'txtcelular' , 
								'id'	=>	'celular',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">Correo Electronico</label>

					<?php

						$data = array(	
								'name'	=>	'txtemail' , 
								'id'	=>	'email',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					 <label  class="col-md-2 col-form-label">Genero</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaGenero as $key => $row) {
					    	$options[$row['id_genero']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboGenero', $options, 0 ,$adicional).'</div>';
                    ?>  






					<label  class="col-md-2 col-form-label required">Direccion</label>

					<?php

						$data = array(	
								'name'	=>	'txtdireccion' , 
								'id'	=>	'direccion',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-10 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<div  class="col-md-12 col-form-label hidden" id="validacion_errores_div"></div>

					<label  class="col-md-2 col-form-label required">Departamento</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaDepartamento as $key => $row) {
					    	$options[$row['id_departamento']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="departamento"';

						echo '<div class="col-md-4 row no-gutters"  id="div-departamento">
                            <div class="col-11">'.form_dropdown('cboDepartamento', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-departamento"><span class="icon-plus"></span></div>
                            </div>';


                        $data = array(	
								'name'	=>	'txtdepartamento' , 
								'id'	=>	'departamento1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nuevo Departamento',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-departamento1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-departamento"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-departamento"><span class="icon-cross"></span></div>
                            </div>';


                    ?>  

                    <label  class="col-md-2 col-form-label required">Provincia</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
						                       
						$adicional = 'class="form-control form-control-sm" id="provincia"';

						echo '<div class="col-md-4 row no-gutters"  id="div-provincia">
                            <div class="col-11">'.form_dropdown('cboProvincia', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-provincia"><span class="icon-plus"></span></div>
                            </div>';


						$data = array(	
								'name'	=>	'txtprovincia' , 
								'id'	=>	'provincia1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nueva Provincia',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-provincia1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-provincia"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-provincia"><span class="icon-cross"></span></div>
                            </div>';

                    ?>  

 
                    <label  class="col-md-2 col-form-label required">Distrito</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
                     
						$adicional = 'class="form-control form-control-sm" id="distrito"';

						echo '<div class="col-md-4 row no-gutters"  id="div-distrito">
                            <div class="col-11">'.form_dropdown('cboDistrito', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-distrito"><span class="icon-plus"></span></div>
                            </div>';


						$data = array(	
								'name'	=>	'txtdistrito' , 
								'id'	=>	'distrito1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nuevo Distrito',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-distrito1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-distrito"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-distrito"><span class="icon-cross"></span></div>
                            </div>';

                    ?>  

                    <label  class="col-md-2 col-form-label required">Zona</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');                    
						$adicional = 'class="form-control form-control-sm" id="zona"';

						echo '<div class="col-md-4 row no-gutters"  id="div-zona">
                            <div class="col-11">'.form_dropdown('cboZona', $options, 0 ,$adicional).'</div>
                            <div class="col-1 icon-productor" id="icon-plus-zona"><span class="icon-plus"></span></div>
                            </div>';

                        $data = array(	
								'name'	=>	'txtzona' , 
								'id'	=>	'zona1',
								'class'	=>	"form-control form-control-sm ",
								'placeholder'=> 'Nueva Zona',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters hidden no-show" id="div-zona1">
                            <div class="col-10">'.form_input($data).'</div>
                            <div class="col-1 icon-productor" id="icon-disk-zona"><span class="icon-floppy-disk"></span></div>
                            <div class="col-1 icon-productor" id="icon-cross-zona"><span class="icon-cross"></span></div>
                            </div>';
                    ?>  

                    <label  class="col-md-2 col-form-label">Año ingreso a la Zona</label>

					<?php

						$data = array(	
								'name'	=>	'txtaniozona' , 
								'id'	=>	'aniozona',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


					<label  class="col-md-2 col-form-label">Estado Civil</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaEstadoCivil as $key => $row) {
					    	$options[$row['id_estado_civil']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboEstadoCivil', $options, 0 ,$adicional).'</div>';
                    ?>  

                    <label  class="col-md-2 col-form-label">Cant. Hijos</label>

					<?php

						$data = array(	
								'name'	=>	'txtcanthijos' , 
								'id'	=>	'canthijos',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

                    <label  class="col-md-2 col-form-label">Religion</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaReligion as $key => $row) {
					    	$options[$row['id_religion']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboReligion', $options, 0 ,$adicional).'</div>';
                    ?>  



                    <label  class="col-md-2 col-form-label">Grado Estudios</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaGradoEstudio as $key => $row) {
					    	$options[$row['id_grado_estudio']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboGradoEstudio', $options, 0 ,$adicional).'</div>';
                    ?>  


                    <label  class="col-md-2 col-form-label">Dialecto</label>

					<?php

						$data = array(	
								'name'	=>	'txtdialecto' , 
								'id'	=>	'dialecto',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>



                    <label  class="col-md-2 col-form-label">Fecha Nacimiento</label>

                    <?php

                    $data = array(
                            'name'			=>	'txtFecNac' , 
                            'value'			=> '',
                            'id'			=>	'fecNacProd',
                            'class'			=>	"form-control form-control-sm datetimepicker-input",
                            'placeholder'	=> '',
                            'data-toggle'	=> 'datetimepicker',
                            'data-target' 	=> "#fecNacProd",
                            'autocomplete' => 'off'
                            );

                    echo '<div class="col-md-4 row no-gutters">
                            <div class="col-11">'.form_input($data).'</div>
                            <div class="col-1" id="icon-delete-fecNacProd"><span class="icon-spinner11"></span></div>
                            </div>';
                    ?>

                    <label  class="col-md-2 col-form-label">Lugar Nacimiento</label>

					<?php

						$data = array(	
								'name'	=>	'txtlugarnac' , 
								'id'	=>	'lugarnac',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>


                    <label  class="col-md-2 col-form-label">Idioma</label>
                    
					<?php

						$options = '';
					    foreach ($aListaiIdioma as $key => $row) {
					    	$options .=  '<input type="checkbox" name="chkidioma[]" value="'.$row['id_idioma'].'"><label>&nbsp'.$row['descripcion'].'&nbsp&nbsp&nbsp</label>';
					    }
						                       
						echo '<div class="col-md-10">'.$options.'</div>';
                    ?>  



					<label class="col-md-2 col-form-label">Seleccionar Documentos</span></label>

					<div class="col-md-8 row no-gutters">
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
                    	<div class="col-md-12 bold "> INFORMACION DEL CONYUGE </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>


                    <label  class="col-md-2 col-form-label">Tipo Documento</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaTipoDoc as $key => $row) {
					    	$options[$row['id_tipo_documento']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"  id="tipodocCony"';

						echo '<div class="col-md-4">'.form_dropdown('cboTipoDocCony', $options, 0 ,$adicional).'</div>';
                    ?>  

                    <label  class="col-md-2 col-form-label" id="lblnrodocCony">DNI / RUC</label>

					<?php

						$data = array(	
								'name'	=>	'txtnrodocCony' , 
								'id'	=>	'nrodocCony',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label"  id="lblnombreCony" style="display: none">Nombres</label>

					<?php

						$data = array(	
								'name'	=>	'txtnombreCony' , 
								'id'	=>	'nombreCony',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters"  style="display: none" id="divapellidoCony">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label" id="lblApellidoCony" style="display: none">Apellidos</label>

					<?php

						$data = array(	
								'name'	=>	'txtapellidosCony' , 
								'id'	=>	'apellidosCony',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" style="display: none" id="divnombreCony">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label"  id="lblrazonsocialCony" style="display: none">Razon Social</label>

					<?php

						$data = array(	
								'name'	=>	'txtrazonsocialCony' , 
								'id'	=>	'razonsocialCony',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-10 row no-gutters" style="display: none" id="divrazonsocialCony">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>



					<label  class="col-md-2 col-form-label">Telf.Celular</label>

					<?php

						$data = array(	
								'name'	=>	'txtcelularCony' , 
								'id'	=>	'celularCony',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>



                    <label  class="col-md-2 col-form-label">Grado Estudios</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaGradoEstudio as $key => $row) {
					    	$options[$row['id_grado_estudio']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm"';

						echo '<div class="col-md-4">'.form_dropdown('cboGradoEstudioCony', $options, 0 ,$adicional).'</div>';
                    ?>  



                    <label  class="col-md-2 col-form-label">Fecha Nacimiento</label>

                    <?php

                    $data = array(
                            'name'			=>	'txtFecNacCony' , 
                            'value'			=> '',
                            'id'			=>	'fecNacCony',
                            'class'			=>	"form-control form-control-sm datetimepicker-input",
                            'placeholder'	=> '',
                            'data-toggle'	=> 'datetimepicker',
                            'data-target' 	=> "#fecNacCony",
                            'autocomplete' => 'off'
                            );

                    echo '<div class="col-md-4 row no-gutters">
                            <div class="col-11">'.form_input($data).'</div>
                            <div class="col-1" id="icon-delete-fecNacCony"><span class="icon-spinner11"></span></div>
                            </div>';
                    ?>

                    <label  class="col-md-2 col-form-label">Lugar Nacimiento</label>

					<?php

						$data = array(	
								'name'	=>	'txtlugarNacCony' , 
								'id'	=>	'lugarNacCony',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
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