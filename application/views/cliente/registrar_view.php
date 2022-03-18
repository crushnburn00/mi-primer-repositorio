
<div class="container div-container">

<div class="col-12" id="validacion_errores_cliente"></div>
	      <!-- TITULO DEL FORMULARIO -->
        <div class="col-12 div-encabezado">
                  REGISTRO DE CLIENTE
		</div>
	        <!-- campos del formulario-->
	        <!-- FORMULARIO -->
			<?= form_open(base_url().'', array(
		        'name' => 'form_cliente',
		        'id'=>'form_cliente',
		        'class'=> 'form-cliente',
		        'role' => 'form'
		    ));

	      	?>

	        <div class = "div-marco">
	       
			    <div class="form-group row">			

                    <div class="col-12 row2">
                    	<div class="col-md-12 bold "> INFORMACION BIOMETRICA </div>
					</div>

                    <div class="col-md-12 bold" id="msj-busubi"></div>


                    <label  class="col-md-2 col-form-label required" >Tipo Cliente</label>
                    
					<?php
						$dataRad = array(	
								'name'	=>	'rbtnTipoCliente' , 
								'class'	=>	"form-control form-control-sm",
								'value' => 1,
								'checked'=> false,

								);

						echo '<div class="col-md-1 col-form-label">'.form_radio($dataRad).'</div><div class="col-md-4 col-form-label bold">NACIONAL</div>';

						$dataRad['value'] = 2;

						echo '<div class="col-md-1 col-form-label">'.form_radio($dataRad).'</div><div class="col-md-4 col-form-label bold">INTERNACIONAL</div>';

                    ?>  

                    

					<label  class="col-md-2 col-form-label required" id="lblrazonsocial" >Razón Social/Cliente</label>

					<?php

						$data = array(	
								'name'	=>	'txtrazonsocial' , 
								'id'	=>	'razonsocial',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-10 row no-gutters" id="div-razonsocial">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label required" id="lblruc" >RUC/ID Cliente</label>

					<?php

						$data = array(	
								'name'	=>	'txtruc' , 
								'id'	=>	'ruc',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters" id="div-ruc" >
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>



					<label  class="col-md-2 col-form-label">Telf. Fijo</label>

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

					 <label  class="col-md-2 col-form-label required">FLO ID</label>
                    
					<?php

						$data = array(	
								'name'	=>	'txtfloid' , 
								'id'	=>	'floid',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> 'Numero de Identificacion FLOCERT',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
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

					<div  class="col-md-12 col-form-label hidden no-show" id="validacion_errores_div"></div>

					<label  class="col-md-2 col-form-label required" style="display: none" id="lblpais">País</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
					    foreach ($aListaPais as $key => $row) {
					    	$options[$row['id_pais']] = $row['descripcion'];
					    }
						                       
						$adicional = 'class="form-control form-control-sm" id="pais"';

						echo '<div class="col-md-4 row no-gutters"  id="div-pais" style="display: none">
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

                    <label  class="col-md-2 col-form-label required" style="display: none" id="lblciudad">Ciudad</label>
                    
					<?php
						$options = array( 0 => ' - Seleccionar - ');
						                       
						$adicional = 'class="form-control form-control-sm" id="ciudad"';

						echo '<div class="col-md-4 row no-gutters"  id="div-ciudad" style="display: none">
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


                    <label  class="col-md-2 col-form-label required" style="display: none" id="lbldepartamento">Departamento</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
                 		foreach ($aListaDepart as $key => $row) {
					    	$options[$row['id_departamento']] = $row['descripcion'];
					    }

						$adicional = 'class="form-control form-control-sm" id="departamento"';

						echo '<div class="col-md-4 row no-gutters"  id="div-departamento" style="display: none">
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



                    <label  class="col-md-2 col-form-label required" style="display: none" id="lblprovincia">Provincia</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
						                       
						$adicional = 'class="form-control form-control-sm" id="provincia"';

						echo '<div class="col-md-4 row no-gutters"  id="div-provincia" style="display: none">
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

 
                    <label  class="col-md-2 col-form-label required" style="display: none" id="lbldistrito">Distrito</label>
                    
					<?php

						$options = array( 0 => ' - Seleccionar - ');
                     
						$adicional = 'class="form-control form-control-sm" id="distrito"';

						echo '<div class="col-md-4 row no-gutters"  id="div-distrito" style="display: none">
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

                    <label  class="col-md-6 col-form-label" id="div-completar2" style="display:none"></label>
                    <label  class="col-md-2 col-form-label">Gerente General</label>

					<?php

						$data = array(	
								'name'	=>	'txtgerentegeneral' , 
								'id'	=>	'gerentegeneral',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">ID #</label>

					<?php

						$data = array(	
								'name'	=>	'txtgerentegeneralid' , 
								'id'	=>	'gerentegeneralid',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

                    <label  class="col-md-2 col-form-label">Presidente</label>

					<?php

						$data = array(	
								'name'	=>	'txtpresidente' , 
								'id'	=>	'presidente',
								'class'	=>	"form-control form-control-sm",
								'placeholder'=> '',
								'autocomplete' => 'off'
								);
						
						echo '<div class="col-md-4 row no-gutters">
								<div class="col-12">'.form_input($data).'</div>
							</div>';
					?>

					<label  class="col-md-2 col-form-label">ID #</label>

					<?php

						$data = array(	
								'name'	=>	'txtpresidenteid' , 
								'id'	=>	'presidenteid',
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