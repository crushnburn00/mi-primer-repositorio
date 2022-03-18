<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Socio extends CI_Controller {

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
		$this->load->model(array('socio_model','modulo_model','tipodocumento_model','estado_model','adjunto_model'));
	}


	public function index(){
		//if(esLogeado()):

			$aTar['idusuconsulta'] = $this->session->userdata('idusuario');

			$query = $this->socio_model->buscarSocio( 20 , 1 , array()); //

			#	scripts y estilos
			$scripts1 = array(  'script1'       => 'js/socio/jlistar.js',
								'script2'       => 'js/socio/jfuncion_socio.js' ,
								'script3'       => 'js/jgeneral.js',
								'script4'       => 'js/controllers/jsocio.js' ,
								'script5'       => 'js/librerias/jForm.js?20211028'

							);

			#	setear la cabecera
			$head    = array(	'scripts'       => $scripts1 );

			/*enviar listado a la vista*/
			/*$data['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );*/
			$data['btn'] = $this->modulo_model->getLinkModuloUsuario( 2 );

			/*$data['listaSocio'] = $this->htmlListaSocio( $query , $this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'socio/detallar' ));*/

			$data['listaSocio'] = $this->htmlListaSocio( $query );

			$data = array_merge($data, $this->generarPaginacion( 20 , 1 , $query ) );

			$data['busqueda'] =	$this->busqueda();

			/**/
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('socio/listasocio_view',$data);
			$this->load->view('foot_view');
			
		/*else:
			redirect(base_url());
		endif;*/
	}


	private function busqueda(){
		
		$html = '';

		//if($this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'tarea/busqueda' )){

			$data1 = $this->getDataForm();
			$html  = $this->load->view('socio/busqueda_view', $data1 , TRUE );
		//}

		return $html;
	}

	private function getDataForm(){
    	$query1 = $this->tipodocumento_model->getListarTipoDocumento(); 
        $query3 = $this->estado_model->getListarEstado(); 


        $querys = array(
                 'aListaTipoDoc' 	=> $query1,
                 'aListaEstado' => $query3
        );

        return $querys;

    }


    public function htmlListaSocio( $lista , $bdetallar = true){
		if(empty($lista)):
			$html = '<div class="row2" ><div class"text-center">No hay información para mostrar</div></div>';
		else:
			$html = '';
			foreach ($lista as $l) {
				$html .= '<div class="row2 form-group col-12 row_div" >
						<div class="col-1">';
				if($bdetallar)
					$html .= '<a id="'.$l['id_socio'].'" href="'.base_url().'socio/detallar/'.$l['id_socio'].'" title="MÁS DETALLES">'.$l['codigo'].'</a></div>';
				else
					$html .= $l['codigo'].'</div>';

			    $html .= '
					    <div class="col-1">'.$l['codigo_productor'].'</div>
					    <div class="col-2">'.$l['tipo_documento'].'</div>
						<div class="col-2">'.$l['nro_documento'].'</div>
						<div class="col-3">'.$l['nombre_razon'].'</div>
						<div class="col-2">'.$l['fec_registro'].'</div>
						<div class="col-1">'.$l['estado'].'</div></div>';
			}

		endif;
		return $html;
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

	public function registrar(){
		        #	scripts y estilos
        $styles = array( );

         /*LLAMA ACÁ LOS QUERYS.JS*/
        $scripts = array(
        'script1'		=> 'js/librerias/bootstrap.min.js',
        'script2'		=> 'js/librerias/bootstrap.bundle.min.js',
        'script3'		=> 'js/jgeneral.js',  
		/*'script4'       => 'js/socio/jregistrar.js',*/
		'script5'       => 'js/models/socio.js?03112021',
		'script6'       => 'js/controllers/jsocio.js?03112021',
        'script7'       => 'js/librerias/jForm.js?03112021',
        'script8'       => 'js/librerias/jFormRegistrar.js?03112021',
         );

        #	setear la cabecera
        $head    = array( 'styles'=> $styles , 
                          'scripts'=> $scripts );

        $foot	= array( 'scripts'=> $scripts );	

        $querys =  $this->getDataForm();

        $querys['btn'] = $this->modulo_model->getLinkModuloUsuario( 8 );

        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );         
        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );   
        
        $title   = array( 'title' => ''); 
        //write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

        $this->load->view('head_view',$head);
        $this->load->view('encabezado_view', $title);
        $this->load->view('socio/registrarsocio_view',$querys);
        $this->load->view('modal_view');
		$this->load->view('foot_view');
	}


	public function guardarAjax(){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
				$this->load->library(array('archivo'));

				$this->form_validation->set_rules('txtid', 'Codigo de Productor', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('fileAdjuntos', 'Archivo Adjunto', 'xss_clean|callback_validarTipoArchivo|callback_validarExtArchivo');

				set_message_form_validation($this);
				
				
				if ($this->form_validation->run())
				{ 
					$aSocio = array(
							'idproductor' 	=> $this->input->post('txtid'),
							'usureg'		=> 1
					);

					$rSocio = $this->socio_model->insert( $aSocio );
					$id = null;

					if($rSocio[0]['result'] == 1):
							$result["estado"] 	= 1;		
					     	$result["mensaje"] 	= 'Se registró correctamente';
					     	$result["result"] 	= array( 	'codigo' => $rSocio[0]['codigo']   );
					     	$id = $rSocio[0]['pid1'];

					else:
						if($rSocio[0]['result'] == -1):
							$result["estado"] 	= 2;		
					    	$result["mensaje"] 	= 'Productor asociado registrado anteriormente.</br>Dirigase al modulo de actualización';
					    	$result["result"] 	= array();
						else:
							if($rSocio[0]['result'] == -2):
								$result["estado"] 	= 3;		
						    	$result["mensaje"] 	= 'Id de Productor(hidden) no existe';
						    	$result["result"] 	= array();
						    else:
								$result["estado"] 	= 4;		
						    	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar el socio';
						    	$result["result"] 	= array();
					    	endif;
					    endif;
					endif;
					/*print_r($_FILES['fileAdjuntos']);*/

					if($id!==null && isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0):
						$result["archivo"] = $this->archivo->guardarAdjuntos( 'fileAdjuntos' , $id , 'socio' );

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
				
				$this->form_validation->set_rules('txtcodigo', 'Codigo', 'trim|xss_clean');
				$this->form_validation->set_rules('txtcodigoprod', 'Codigo Productor', 'trim|xss_clean');
				$this->form_validation->set_rules('cbotipodocumento', 'Tipo Documento', 'trim|xss_clean');
				$this->form_validation->set_rules('txtnrodocumento', 'Nro Documento', 'trim|xss_clean');
				$this->form_validation->set_rules('txtNombre_razon', 'Nombre / Razon', 'trim|xss_clean');

				$this->form_validation->set_rules('txtFecIni', 'Fecha Inicio', 'trim|xss_clean');
				$this->form_validation->set_rules('txtFecFin', 'Fecha Fin', 'trim|xss_clean');
				$this->form_validation->set_rules('cboListaEstado', 'Estado', 'trim|xss_clean');


				if ($this->form_validation->run())
				{ 
					$aProductor = array(
						'p_id' 					=> 0,
					    'p_codigo' 				=> $this->input->post('txtcodigo'),
					    'p_codigo_productor'	=> $this->input->post('txtcodigoprod'),
						'p_id_tipo_documento' 	=> $this->input->post('cbotipodocumento' , TRUE ),
						'p_nro_documento' 		=> $this->input->post('txtnrodocumento' , TRUE ),
						'p_nombre_razon' 		=> $this->input->post('txtNombre_razon'),
						'p_fecha_ini'			=> $this->input->post('txtFecIni'),
						'p_fecha_fin' 			=> $this->input->post('txtFecFin'),
						'p_estado' 				=> $this->input->post('cboListaEstado'),
					);

					$cantFilas = $this->input->post('value');
					$pagina = 	 $this->input->post('value1');

					$query1 = $this->socio_model->buscarSocio( $cantFilas , $pagina , $aProductor);		
					
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
		$resultado['lista'] 		= $this->htmlListaSocio( $query1 );
		
		$resultado = array_merge($resultado, $this->generarPaginacion( $cantFilas , $pagina , $query1 ) );

		echo json_encode($resultado);
	}


	public function detallar( $id ){
		//if(esLogeado()):
			//print_r($this->uri->uri_string());

			 /*LLAMA ACÁ LOS QUERYS.JS*/
	        $scripts = array(
		        'script1'		=> 'js/librerias/bootstrap.min.js',
		        'script2'		=> 'js/librerias/bootstrap.bundle.min.js',
				'script3'       => 'js/controllers/jsocio.js',
				'script5'       => 'js/models/socio.js?03112021',
				'script4'       => 'js/librerias/jFormModificar.js',
	         );

	        #	setear la cabecera
        	$head    = array( 'scripts'=> $scripts );


			$aSocio = array(
				'idsocio' 		=> $id,
			);

			#variables
			$query1 = $this->socio_model->getSocio( $aSocio['idsocio'] );	
			$query2 = $this->estado_model->getListarEstado(); 
			$query3 = $this->adjunto_model->listar( array( 'p_id_tabla'=> $id, 'p_tabla'=> 'socio' ) );	


			$data = array(
							'aSocio'		=>	$query1[0],
							'aListaEstado'	=> $query2,
							'aAdjunto'		=>  $query3
			);
			
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('socio/detalle_view',$data);
			$this->load->view('modal_view', array());
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
				$aSocio = array(
						'idsocio' 			=> $this->input->post('txtId',TRUE),
						'idestado' 			=> $this->input->post('cboEstado',TRUE),
						'usureg'			=> 1
				);

				$resultado 	= $this->socio_model->actualizar($aSocio);
		
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
				     		$result["mensaje"] 	= 'No existe el Productor';
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
	public function validarTipoArchivo(){
		if(isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0):

			foreach ($_FILES['fileAdjuntos']['type'] as $key => $typeArchivo) {
				$ext=explode('/',$typeArchivo); 

				if($ext[1] == 'jpg' || $ext[1] == 'jpeg' || $ext[1] == 'pdf'){

				}
				else return false;
			}
		endif;

		return true;

	}


	public function validarExtArchivo(){
		if(isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0):

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



}
