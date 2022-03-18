<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finca extends CI_Controller {

	/*
	*	Funcion @construct
	* 	Invocado por la clase Inicio
	*	Carga los helper del formulario
	*	Parametros :  No
	*	Sin retorno
	*/

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','security','utilitario_helper','cookie'));
		$this->load->library(array('paginacion'));
		$this->load->model(array('finca_model','modulo_model','departamento_model','gradoestudio_model','estado_model','adjunto_model','socio_model','vivienda_model','agua_model','energia_model','telefonia_model'));
	}


	public function listar( $id ){
		//if(esLogeado()):

			$query = $this->finca_model->buscar( 20 , 1 , array( 'p_id_socio' => $id)); //
			$querysocio = $this->socio_model->buscarSocio( 20 , 1 , array( 'p_id' => $id)); //
			#	scripts y estilos
			$scripts1 = array(  
								'script1'       => 'js/jgeneral.js?20211028',
								'script2'       => 'js/models/finca.js?20211028',
								'script3'       => 'js/controllers/jfinca.js?20211028',
								'script4'       => 'js/librerias/jForm.js?20211028',
								'script5'       => 'js/librerias/jFormBuscar.js?20211028',

							);

			#	setear la cabecera
			$head    = array(	'scripts'       => $scripts1 );

			/*enviar listado a la vista*/
			/*$data['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );*/
			$data['btn'] = $this->modulo_model->getLinkModuloUsuario( 13 );

			/*$data['listaProductor'] = $this->htmlLista( $query , $this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/detallar' ));*/

			$data['lista'] = $this->htmlLista( $query );

			$data = array_merge($data, $this->generarPaginacion( 20 , 1 , $query ) );

			$data['busqueda'] =	$this->busqueda( $id );
			
			$data['socio'] = $querysocio[0];

			/**/
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('finca/lista_view',$data);

			$this->load->view('foot_view');


			
		/*else:
			redirect(base_url());
		endif;*/
	}


	private function busqueda( $id ){
		
		$html = '';

		//if($this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/busqueda' )){

			$data1 = $this->getDataForm();
			$data1['idSocio'] = $id;
			$html  = $this->load->view('finca/busqueda_view', $data1 , TRUE );
		//}

		return $html;
	}

	private function getDataForm(){

        $query1 = $this->departamento_model->getListarDepartamento(); 
        $query2 = $this->estado_model->getListarEstado(); 
        $query3 = $this->gradoestudio_model->getListarGradoEstudio(); 
        $query4 = $this->vivienda_model->listar(); 
        $query5 = $this->energia_model->listar(); 
        $query6 = $this->agua_model->listar(); 
        $query7 = $this->telefonia_model->listar(); 
        
        $querys = array(
                 
                 'aListaDepartamento' => $query1,
                 'aListaEstado' => $query2,
                 'aListaGradoEstudio' => $query3,
                 'aVivienda' => $query4,
                 'aEnergia' => $query5,
                 'aAgua' => $query6,
                 'aTelefonia' => $query7
        );

        return $querys;

    }




    private function generarPaginacion( $cantFilas , $pagina , $data ){
		if(empty($data))
			$resultado['pag'] 			= array( 'TOTALPAGINAS' => 0 , 'TOTALREGISTROS' => 0 );
		else
			$resultado['pag'] 			= array( 'TOTALPAGINAS' => $data[0]['TOTALPAGINAS'] , 'TOTALREGISTROS' => $data[0]['TOTALREGISTROS'] );

		$this->paginacion->setFilas( $cantFilas );
		$this->paginacion->setTotalPaginas($resultado['pag']['TOTALPAGINAS']);
		$this->paginacion->setPagina( $pagina );

		$resultado['paginacion'] 	= $this->paginacion->htmlPaginacion();

		return $resultado;

	}


	public function registrar( $id ){
		        #	scripts y estilos
        $styles = array( );

         /*LLAMA ACÁ LOS QUERYS.JS*/
        $scripts = array(
        'script1'		=> 'js/librerias/bootstrap.min.js',
        'script2'		=> 'js/librerias/bootstrap.bundle.min.js',
        'script3'       => 'js/controllers/jfinca.js?20211028',
        'script4'       => 'js/models/finca.js?20211028',
        'script5'       => 'js/librerias/jForm.js?20211028',
        'script6'       => 'js/librerias/jFormRegistrar.js?20211028',

         );

        #	setear la cabecera
        $head    = array( 'styles'=> $styles , 
                          'scripts'=> $scripts );

        $foot	= array( 'scripts'=> $scripts );	

        $querys =  $this->getDataForm();

        $querys['aSocio'] = $this->socio_model->buscarSocio( 1 , 1 , array( 'p_id' => $id)); //

        $querys['btn'] = $this->modulo_model->getLinkModuloUsuario( 3 );

        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );         
        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );   
        
        $title   = array( 'title' => ''); 
        //write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

        $this->load->view('head_view',$head);
        $this->load->view('encabezado_view', $title);
        $this->load->view('finca/registrar_view',$querys);
        $this->load->view('modal_view');
		$this->load->view('foot_view');
	}


	public function validarEstadoCivil ( $campo ){
		if($campo == 2 || $campo == 3)
			return true;
		else
			return false;
	}


	public function validarFormatoFecha( $campo ){
		if($campo == '')
			return true;
		else
			$fec = explode("/", $campo);
			if(sizeof($fec) == 3){
				if(strlen($fec[0]) == 2 && strlen($fec[1]) == 2 && strlen($fec[2]) == 4){
					if(es_natural($fec[0]) &&  es_natural($fec[1]) && es_natural($fec[2]))
						return true;
					else return false;
				}else{
					return false;
				}
			}else{
				return false;
			}
			
	}

	public function validarFechaNac( $campo ){
		if($campo == '')
			return true;
		else
			$fec = explode("/", $campo);
			if(sizeof($fec) == 3){
				if(strlen($fec[0]) == 2 && strlen($fec[1]) == 2 && strlen($fec[2]) == 4){
					if(es_natural($fec[0]) &&  es_natural($fec[1]) && es_natural($fec[2])){
						if($fec[0] >= 1 && $fec[0] <= 31 && $fec[1] >= 1 && $fec[1] <= 12 && $fec[2] >= 1850 && $fec[2] <= date("Y") )
							return true;
						else
							return false;
					}else return false;
				}else{
					return false;
				}
			}else{
				return false;
			}
			
	}

	

	public function guardarAjax(){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
				$this->load->library(array('archivo'));

				$this->form_validation->set_rules('txtnombre', 'Tipo de Documento', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtdireccion', 'Direccion', 'required|trim|xss_clean');
				
				$this->form_validation->set_rules('cboDepartamento', 'Departamento', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('cboProvincia', 'Provincia', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('cboDistrito', 'Distrito', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('cboZona', 'Zona', 'required|trim|xss_clean|is_natural_no_zero');

				$this->form_validation->set_rules('txtlatitudgmd', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtlatitud', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtlongitudgmd', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtlongitud', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtaltitud', '', 'trim|xss_clean|is_natural');
				$this->form_validation->set_rules('cboVivienda', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtsuelo', '', 'trim|xss_clean');
				$this->form_validation->set_rules('cboEnergia', '', 'trim|xss_clean');
				$this->form_validation->set_rules('cboAgua', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtcantanimales', '', 'trim|xss_clean|is_natural');
				$this->form_validation->set_rules('cboInternet', '', 'trim|xss_clean');
				$this->form_validation->set_rules('cboTelefonia', '', 'trim|xss_clean');
				$this->form_validation->set_rules('cboSalud', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txttiempocsalud', '', 'trim|xss_clean');
				$this->form_validation->set_rules('cboCEducativo', '', 'trim|xss_clean');
				$this->form_validation->set_rules('chkgrado_estudio', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtvias', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtdistancia', '', 'trim|xss_clean|is_natural');
				$this->form_validation->set_rules('txttiempo', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtmediotrans', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtcultivo', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtprecipitacion', '', 'trim|xss_clean');
				$this->form_validation->set_rules('txtcantcosecha', '', 'trim|xss_clean');

				$this->form_validation->set_rules('fileAdjMapa', 'Mapa de la finca', 'xss_clean|callback_validarTipoArchivoMapa|callback_validarExtArchivoMapa');
				$this->form_validation->set_rules('fileAdjFoto', 'Foto Georeferencial', 'xss_clean|callback_validarTipoArchivoFoto|callback_validarExtArchivoFoto');
				$this->form_validation->set_rules('fileAdjuntos', 'Documentos Adjuntos', 'xss_clean|callback_validarTipoArchivoAdjunto|callback_validarExtArchivoAdjunto');


				set_message_form_validation($this);
				
				
				if ($this->form_validation->run())
				{ 
					$aFinca = array(
							'p_nombre' 					=> $this->input->post('txtnombre'),
							'p_direccion' 				=> $this->input->post('txtdireccion'),
							'p_id_zona'					=> $this->input->post('cboZona'),
							'p_id_vivienda'				=> $this->input->post('cboVivienda'),
							'p_suelo' 					=> $this->input->post('txtsuelo'),
							'p_latitud_gmd'				=> $this->input->post('txtlatitudgmd'),
							'p_longitud_gmd'			=> $this->input->post('txtlongitudgmd'),
							'p_latitud'					=> $this->input->post('txtlatitud'),
							'p_longitud'				=> $this->input->post('txtlongitud'),
							'p_altitud' 				=> $this->input->post('txtaltitud'),
							'p_id_energia' 				=> $this->input->post('cboEnergia'),
							'p_id_agua' 				=> $this->input->post('cboAgua'),
							'p_cant_animales' 			=> $this->input->post('txtcantanimales'),
							'p_internet' 				=> $this->input->post('cboInternet'),
							'p_id_telefonia' 			=> $this->input->post('cboTelefonia'),
							'p_establecimiento_salud' 	=> $this->input->post('cboSalud'),
							'p_tiempo_centro_salud' 	=> $this->input->post('txttiempocsalud'),
							'p_centro_educativo' 		=> $this->input->post('cboCEducativo'),
							'p_vias_acceso' 			=> $this->input->post('txtvias'),
							'p_distancia_km' 			=> $this->input->post('txtdistancia'),
							'p_tiempo'					=> $this->input->post('txttiempo'),
							'p_medio_transporte'		=> $this->input->post('txtmediotrans'),
							'p_cultivo' 				=> $this->input->post('txtcultivo'),
							'p_precipitacion' 			=> $this->input->post('txtprecipitacion'),
							'p_cant_personal_cosecha' 	=> $this->input->post('txtcantcosecha'),
							'p_id_socio' 				=> $this->input->post('txtid'),
							'usureg'					=> 1
					);

					$aGradoEst = $this->input->post('chkGradoEstudio');


					$rFinca = $this->finca_model->insert($aFinca);
					$id = null;
					if($rFinca[0]['result'] == 1):
							$result["estado"] 	= 1;		
					     	$result["mensaje"] 	= 'Se registró correctamente';
					     	$result["result"] 	= array( 	'codigo' => $rFinca[0]['pid1']   );
					     	$id = $rFinca[0]['pid1'];

							if(!empty($aGradoEst)):
								foreach ($aGradoEst as $key => $value) {
								$aGE = array(
									 'idfinca' 			 => $rFinca[0]['pid1'],
									 'idgradoestudio'	 => $value
								);
								$rGE = $this->gradoestudio_model->insertFincaGE($aGE);
								}
							endif;

							$cant_filas = $this->input->post('txtidanual');
							$cant_filas++;
							for ($i=0; $i < $cant_filas; $i++) { 
								$aAnual = array(
									'p_id_finca' 		=> $rFinca[0]['pid1'],
									'p_anio' 			=> $this->input->post('txtinput1_'.$i),
									'p_kg_estimado' 	=> $this->input->post('txtinput2_'.$i),
									'p_kg_consumido' 	=> $this->input->post('txtinput3_'.$i)
								);

								$rAnual = $this->finca_model->insertFincaAnual($aAnual);
							}

					else:
						if($rFinca[0]['result'] == -1):
							$result["estado"] 	= 2;		
					    	$result["mensaje"] 	= 'Finca registrado anteriormente al Socio.</br>Dirigase al modulo de actualización';
					    	$result["result"] 	= array();
						else:
							$result["estado"] 	= 3;		
					    	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la finca';
					    	$result["result"] 	= array();
					    endif;
					endif;
					
					if($id!==null && isset($_FILES['fileAdjMapa']) && strlen($_FILES['fileAdjMapa']['tmp_name'][0])>0):

						$result["archivo_mapa"] = $this->archivo->guardarAdjuntos( 'fileAdjMapa' , $id , 'finca' , 'mapa');
					endif;

					if($id!==null && isset($_FILES['fileAdjFoto']) && strlen($_FILES['fileAdjFoto']['tmp_name'][0])>0):
						$result["archivo_foto"] = $this->archivo->guardarAdjuntos( 'fileAdjFoto' , $id , 'finca' , 'foto_georeferencial');
					endif;

					if($id!==null && isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0):
						$result["archivo_docadj"] = $this->archivo->guardarAdjuntos( 'fileAdjuntos' , $id , 'finca' , 'documento_adjunto');
					endif;


				}
				else{
						$result = validation_errors_parse(validation_errors());
						
					}

				echo json_encode($result);

		endif;

	}


	public function buscarAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			//if(esLogeado()):
				
				$this->form_validation->set_rules('txtidfinca', 'Id Finca', 'trim|xss_clean');
				$this->form_validation->set_rules('txtNombre', 'Nombre', 'trim|xss_clean');
				
				$this->form_validation->set_rules('cboDepartamento', 'Departamento', 'trim|xss_clean');
				$this->form_validation->set_rules('cboProvincia', 'Provincia', 'trim|xss_clean');
				$this->form_validation->set_rules('cboDistrito', 'Distrito', 'trim|xss_clean');
				$this->form_validation->set_rules('cboZona', 'Zona', 'trim|xss_clean');
				$this->form_validation->set_rules('cboListaEstado', 'Estado', 'trim|xss_clean');
				$this->form_validation->set_rules('txtid', 'Id', 'required|trim|xss_clean');


				if ($this->form_validation->run())
				{ 
					$aFinca = array(
						'p_id' 						=> $this->input->post('txtidfinca'),
					    'p_nombre' 					=> $this->input->post('txtNombre'),
						'p_id_departamento'			=> $this->input->post('cboDepartamento'),
						'p_id_provincia'			=> $this->input->post('cboProvincia'),
						'p_id_distrito'				=> $this->input->post('cboDistrito'),
						'p_id_zona'					=> $this->input->post('cboZona'),
						'p_estado'					=> $this->input->post('cboListaEstado'),
						'p_id_socio'				=> $this->input->post('txtid')
					);

					$cantFilas = $this->input->post('value');
					$pagina = 	 $this->input->post('value1');

					$query1 = $this->finca_model->buscar( $cantFilas , $pagina , $aFinca);
					
					$this->generarHtmlListayPaginacion( $cantFilas , $pagina , $query1 );

				}else{
					echo validacion_errores_json(validation_errors());
				}

			/*else:
				$resultado['respuesta']	= 'Login';
				echo json_encode($resultado);
			endif;*/
		endif;	
	}


	private function generarHtmlListayPaginacion( $cantFilas , $pagina , $query1 ){

		/*enviar listado a la vista*/
		$resultado['respuesta']		= 'Ok';
		$resultado['lista'] 		= $this->htmlLista( $query1 );
		
		$resultado = array_merge($resultado, $this->generarPaginacion( $cantFilas , $pagina , $query1 ) );

		echo json_encode($resultado);
	}


    public function htmlLista( $lista , $bdetallar = true){
		if(empty($lista)):
			$html = '<div class="row2" ><div class"text-center">No hay información para mostrar</div></div>';
		else:
			$html = '';
			foreach ($lista as $l) {
				$html .= '<div class="row2 form-group col-12 row_div" >
						<div class="col-1">';
				if($bdetallar)
					$html .= '<a href="'.base_url().'finca/detallar/'.$l['id_finca'].'" id="'.$l['id_finca'].'" title="MÁS DETALLES">'.$l['id_finca'].'</a></div>
					<div class="col-2"><a href="'.base_url().'finca/detallar/'.$l['id_finca'].'" id="'.$l['id_finca'].'" title="MÁS DETALLES">'.$l['nombre'].'</a></div>';
				else
					$html .= $l['id_finca'].'</div>
					<div class="col-2">'.$l['nombre'].'</div>';

			    $html .= '
					    <div class="col-2">'.$l['departamento'].'</div>
					    <div class="col-2">'.$l['provincia'].'</div>
						<div class="col-2">'.$l['distrito'].'</div>
						<div class="col-2">'.$l['zona'].'</div>
						<div class="col-1">'.$l['estado'].'</div>
						</div>';
			}

		endif;
		return $html;
    }



    public function detallar( $idfinca ){
		//if(esLogeado()):
			//print_r($this->uri->uri_string());

			 /*LLAMA ACÁ LOS QUERYS.JS*/
	        $scripts = array(
		        'script1'		=> 'js/librerias/bootstrap.min.js',
		        'script2'		=> 'js/librerias/bootstrap.bundle.min.js',
				'script3'       => 'js/librerias/jForm.js?20211028',
				'script4'       => 'js/controllers/jfinca.js?20211028',
				'script5'       => 'js/models/finca.js?20211028',
				'script6'       => 'js/librerias/jFormModificar.js?20211028',
	         );

	        #	setear la cabecera
        	$head    = array( 'scripts'=> $scripts );


			#variables
			$query1 = $this->finca_model->getFinca( $idfinca );	
			$query2 = $this->estado_model->getListarEstado(); 
			$query3 = $this->adjunto_model->listar( array( 'p_id_tabla'=> $idfinca, 'p_tabla'=> 'finca' ) );	
			$query4 = $this->finca_model->getFincaAnual( $idfinca ); 
			

			$data = array(
							'aFinca'			=>	$query1[0],
							'aListaEstado'		=>  $query2,
							'aListaAnual'		=>  $query4,
							'idfinca'			=>  $idfinca
			);
			$i = array(
				'mapa' => 0,
				'foto_georeferencial' => 0,
				'documento_adjunto' => 0
			 );

			foreach ($query3 as $key => $row) {
				if($row['descripcion'] == "mapa"){
					$data['aAdjuntoMapa'][$i['mapa']] = $row;
					$i['mapa']++;
				}
				if($row['descripcion'] == "foto_georeferencial"){
					$data['aAdjuntoFotoGeoReferencial'][$i['foto_georeferencial']] = $row;
					$i['foto_georeferencial']++;
				}
				if($row['descripcion'] == "documento_adjunto"){
					$data['aAdjuntoDocumento'][$i['documento_adjunto']] = $row;
					$i['documento_adjunto']++;
				}				
			}
			
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('finca/detalle_view',$data);
			$this->load->view('modal_view');
			$this->load->view('foot_view');
		/*else:
			redirect(base_url());
		endif;*/
	}





	/*
	*	Funcion @actualizarAjax
	* 	Invocado por 
	*	
	*	Parametros :  
	*	Con retorno
	*		True : Si la extensión cumple con la condición
	*		False: La extensión no cumple
	*/
	public function actualizarAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			
			$this->form_validation->set_rules('cboEstado', 'Estado', 'required|trim|xss_clean|is_natural');

			//MENSAJES DE REGLAS DE FORMULARIO
			set_message_form_validation($this);


			if ($this->form_validation->run())
			{ 
				$aArray = array(
						'idfinca' 		=> $this->input->post('txtIdFinca',TRUE),
						'idestado' 			=> $this->input->post('cboEstado',TRUE),
						'usureg'			=> 1
				);

				$resultado 	= $this->finca_model->actualizar($aArray);
		
				if(isset($resultado[0])):
					if($resultado[0]['result'] == 1):
						$result["estado"] 	= 1;		
				     	$result["mensaje"] 	= 'Se registró correctamente';
				     	$result["result"] 	= array();
				     else:
				     	if($resultado[0]['result'] == -1 && $resultado[0]['pid1']=="" && $resultado[0]['pid1']==null):
				     		$result["estado"] 	= 2;		
				     		$result["mensaje"] 	= 'No existen cambios';
				     		$result["result"] 	= array();
				     	else:
				     		$result["estado"] 	= 2;		
				     		$result["mensaje"] 	= 'No existe';
				     		$result["result"] 	= array();
				     	endif;
				     endif;
				else:
					$result["estado"] 	= 3;		
				    $result["mensaje"] 	= 'Ocurrió un error al intentar actualizar la tarea';
				    $result["result"] 	= array();
				endif;
			
			}
			else{
					$result = validation_errors_parse(validation_errors());
					
				}

			echo json_encode($result);



		endif;

    }


	/*
	*	Funcion @validarTipoArchivoIMG
	* 	Invocado por @guardar
	*	Valida que los archivos cargados cumplan la extensión JPG, JPEG, PNG Y GIF
	*	Parametros :  No
	*	Con retorno
	*		True : Si la extensión cumple con la condición
	*		False: La extensión no cumple
	*/
	public function validarTipoArchivoMapa( ){
		
		if( isset($_FILES['fileAdjMapa']) && strlen($_FILES['fileAdjMapa']['tmp_name'][0])>0):
			foreach ($_FILES['fileAdjMapa']['type'] as $key => $typeArchivo) {
				$ext=explode('/',$typeArchivo); 

				if($ext[1] == 'jpg' || $ext[1] == 'jpeg' || $ext[1] == 'pdf'){

				}
				else return false;
			}
		endif;

		return true;

	}

	public function validarTipoArchivoFoto( ){
		
		if( isset($_FILES['fileAdjFoto']) && strlen($_FILES['fileAdjFoto']['tmp_name'][0])>0):
			foreach ($_FILES['fileAdjFoto']['type'] as $key => $typeArchivo) {
				$ext=explode('/',$typeArchivo); 

				if($ext[1] == 'jpg' || $ext[1] == 'jpeg' || $ext[1] == 'pdf'){

				}
				else return false;
			}
		endif;

		return true;

	}

	public function validarTipoArchivoAdjunto( ){
		
		if( isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0):
			foreach ($_FILES['fileAdjuntos']['type'] as $key => $typeArchivo) {
				$ext=explode('/',$typeArchivo); 

				if($ext[1] == 'jpg' || $ext[1] == 'jpeg' || $ext[1] == 'pdf'){

				}
				else return false;
			}
		endif;

		return true;

	}

	public function validarExtArchivoFoto(){
		if( isset($_FILES['fileAdjFoto']) && strlen($_FILES['fileAdjFoto']['tmp_name'][0])>0 ):
			for ($i=0; $i < count($_FILES['fileAdjFoto']['type']); $i++) { 
				$typeArchivo = $_FILES['fileAdjFoto']['type'][$i];
				$tmpname = $_FILES['fileAdjFoto']['tmp_name'][$i];

				$ext  = explode('/',$typeArchivo); 
				$ext1 = explode('/',mime_content_type($tmpname));
				$tipo = $ext[1];

				if($ext[1] == 'jpg' || $ext[1] == 'jpeg' || $ext[1] == 'pdf'){
				    if($ext[1]!=$ext1[1]):
				    	return false;
				    else:
				    	return true;
			    	endif;
				}
				else return false;
			}

		endif;

		return true;

	}

	public function validarExtArchivoMapa(){
		if( isset($_FILES['fileAdjMapa']) && strlen($_FILES['fileAdjMapa']['tmp_name'][0])>0 ):
			for ($i=0; $i < count($_FILES['fileAdjMapa']['type']); $i++) { 
				$typeArchivo = $_FILES['fileAdjMapa']['type'][$i];
				$tmpname = $_FILES['fileAdjMapa']['tmp_name'][$i];

				$ext  = explode('/',$typeArchivo); 
				$ext1 = explode('/',mime_content_type($tmpname));
				$tipo = $ext[1];

				if($ext[1] == 'jpg' || $ext[1] == 'jpeg' || $ext[1] == 'pdf'){
				    if($ext[1]!=$ext1[1]):
				    	return false;
				    else:
				    	return true;
			    	endif;
				}
				else return false;
			}

		endif;

		return true;

	}

	public function validarExtArchivoAdjunto(){
		if( isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0 ):
			for ($i=0; $i < count($_FILES['fileAdjuntos']['type']); $i++) { 
				$typeArchivo = $_FILES['fileAdjuntos']['type'][$i];
				$tmpname = $_FILES['fileAdjuntos']['tmp_name'][$i];

				$ext  = explode('/',$typeArchivo); 
				$ext1 = explode('/',mime_content_type($tmpname));
				$tipo = $ext[1];

				if($ext[1] == 'jpg' || $ext[1] == 'jpeg' || $ext[1] == 'pdf'){
				    if($ext[1]!=$ext1[1]):
				    	return false;
				    else:
				    	return true;
			    	endif;
				}
				else return false;
			}

		endif;

		return true;

	}


	public function actualizarFincaAnualAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:

			$this->form_validation->set_rules('txtidanual', 'Cantidad de Filas', 'required|trim|xss_clean');

			if($this->input->post('txtidanual') >= 0):

				for ($i=0; $i <= $this->input->post('txtidanual'); $i++) { 
					if($this->input->post('txtinput1_'.$i) !== null){
						$this->form_validation->set_rules('txtinput1_'.$i, 'Año', 'required|trim|xss_clean');
						$this->form_validation->set_rules('txtinput2_'.$i, 'Estimado Kg', 'required|trim|xss_clean');
					}
				}
			endif;


			if ($this->form_validation->run()){ 

				$cant_filas = $this->input->post('txtidanual');

				$b_anual = true;
					
				for ($i=0; $i <= $cant_filas; $i++) { 
					if($this->input->post('txtinput1_'.$i) !== null){
						$aAnual = array(
							'p_id_finca' 		=> $this->input->post('txtidfinca'),
							'p_anio' 			=> $this->input->post('txtinput1_'.$i),
							'p_kg_estimado' 	=> $this->input->post('txtinput2_'.$i),
							'p_kg_consumido' 	=> $this->input->post('txtinput3_'.$i)
						);

						$rAnual = $this->finca_model->insertFincaAnual($aAnual);

						if($rAnual[0]['result'] == -1)
							$b_anual = false;
					}
				}
					
				if($b_anual):
					$result["estado"] 	= 1;		
					$result["mensaje"] 	= 'Se registró de manera correcta';
					$result["result"] 	= array();
				else:
					$result["estado"] 	= 3;		
					$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la finca';
					$result["result"] 	= array();
				endif;
					
			}else{
						$result = validation_errors_parse(validation_errors());
						
					}

			echo json_encode($result);

			


		endif;

    }


    public function buscarFincaAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):

				$aFinca = array(
					'p_id' 	=> $this->input->post('value')
				);
				
				$result_sql = $this->finca_model->buscar( 1,1 , $aFinca);				
				$result_sql1 = $this->finca_model->getFincaAnualxAnio( $this->input->post('value') , date("Y"));

				if( count($result_sql) == 1 ):
					
						$result["estado"] 	= 1;		
						$result["mensaje"] 	= 'Encontrado';
						$result["result"] 	= $result_sql[0];
						$result["result"]['anio'] 	= $result_sql1;
				else:
				    $result["estado"] 	= 2;		
				    $result["mensaje"] 	= 'Existe un error';
				    $result["result"] 	= array();
			    endif;

			//endif;
			echo json_encode($result);

		endif;
	}



}
