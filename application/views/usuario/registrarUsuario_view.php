
<div class="container div-container">

<div class="col-12" id="validacion_errores_solicitud"></div>
	      <!-- TITULO DEL FORMULARIO -->
          <div class="col-12 div-encabezado">
				REGISTRAR DATOS DEL USUARIO
		        </div>
	        <!-- campos del formulario-->
	        <div class = "div-marco">
                
	        	
	       
			    <div class="form-group row">			
                    
                    <div class="col-6" style="padding:50px; width:50px" >
                        
                    </div>

                    <label  class="col-md-2 col-form-label">NOMBRES</label>
					<?php

						$data = array(	
								'name'	=>	'txtNomCliente' , 
								/* 'value'	=>	$aCau['DESC_CAT'] , */
								'id'	=>	'nomCliente',
								'class'	=>	"form-control form-control-sm",
								'placeholder'		=> ''
								);
						
						echo '<div class="col-md-4">'.form_input($data).'</div>';
                    ?>
                    

					<label  class="col-md-2 col-form-label">EMAIL</label>
					<?php

						$data = array(	
								'name'	=>	'txtEmail' , 
								/* 'value'	=>	$aCau['DESC_CAT'] , */
								'id'	=>	'email',
								'class'	=>	"form-control form-control-sm",
								'placeholder'		=> ''
								);
						
						echo '<div class="col-md-4">'.form_input($data).'</div>';
					?>
					

					<label  class="col-md-2 col-form-label">USUARIO</label>
					<?php

						$data = array(	
								'name'	=>	'txtUsuario' , 
								/* 'value'	=>	$aCau['DESC_CAT'] , */
                                'id'	=>	'usuregister',
                                'autcomplete'=> 'off',
								'class'	=>	"form-control form-control-sm",
								'placeholder'		=> ''
								);
						
						echo '<div class="col-md-4">'.form_input($data).'</div>';
					?>
				

                <label  class="col-md-2 col-form-label">PERFIL</label>
                    <?php
                    
                        $adicional = 'class="form-control form-control-sm"';

                        foreach ($aListaTipoPerfil as $l) {
                            $options[$l ->ID_TIPO_USUARIO] = $l->ID_TIPO_USUARIO.'-'.$l->DESC_TIPO_USUARIO;
                        }
                        echo '<div class="col-md-4">'.form_dropdown('cboTipoPerfil', $options, $aListaTipoPerfil[0]->ID_TIPO_USUARIO ,$adicional).'</div>';
                    ?>
                    

                    <label  class="col-md-2 col-form-label">CONTRASEÑA</label>
					<?php

						$data = array(	
                                'name'	=>	'txtContraseña' , 
                                'type' => 'password',
								/* 'value'	=>	$aCau['DESC_CAT'] , */
								'id'	=>	'password',
								'class'	=>	"form-control form-control-sm",
								'placeholder'		=> ''
								);
						
						echo '<div class="col-md-4">'.form_input($data).'</div>';
					?>
					                     
				</div>
				
            </div>
            <div class="col-12 div-encabezado">
				PERMISOS DEL USUARIO
		        </div>
            <div class = "div-marco">
	        	
           
            <div class="row pre-scrollable-sol-permisos">

            <div class="" id="div_tb_permisos">

                <div class="table table-bordered" id="tb_permisos">
                    <div class="thead_usuario" >
                        <div class="row2 tr_usuario" >
                        <div class="td_permisos">PERMISOS</div>
                        <div class="td_permisos">VER</div>
                        <div class="td_permisos">EDITAR</div>
                        <div class="td_permisos">ELIMINAR</div>
                        </div>
                    </div>
                    <div class="tbus_solicitud hidden" >

                    </div>	
                    <div class="tbody_solicitud" >
                        <!-- <?=$listaUsuarios;?> -->
                
                    </div>
                </div>
                </div>
            </div>

			    <div class="form-group row">			
                    <!-- CIERRE DE FORMULARIO -->
		            <div class="col-md-6">
					
		    	           <button type="submit" class="btn btn-sm btn-protransporte btn-block" name='btnRegistrar' value='Registrar' id='btnRegistrar'> 
                                 <i class="icon-floppy-disk"></i> REGISTRAR
                          </button>
		            </div> <!-- CIERRE DE FORMULARIO -->
                    <div class="col-md-6">
					<a href="<?=base_url();?>usuario">
							                        <button type="submit" class="btn btn-sm btn-protransporte btn-block" name='btnCancelar' value='Cancelar' id='btnCancelar'> 
                            <i class="icon-floppy-disk"></i> CANCELAR
                        </button>
                    </div>

				</div>
				
            </div>
	
	</div><!--FIN ROW-->
</div>

<div class="row" id="enlaceautomatico">

</div>