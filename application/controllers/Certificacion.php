<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Certificacion extends CI_Controller {

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
		$this->load->model(array('finca_model','modulo_model','certificacion_model','adjunto_model','tipocertificacion_model','entidadcertificadora_model','estado_model'));
	}


	public function listar( $id ){
		//if(esLogeado()):

			$query = $this->certificacion_model->buscar( 20 , 1 , array( 'p_id_finca' => $id) ); //
			$queryfinca = $this->finca_model->buscar( 20 , 1 , array( 'p_id' => $id)); //
			
			#	scripts y estilos
			$scripts1 = array(  /*'script0'       => 'js/jfuncion.js',*/
								'script1'       => 'js/jgeneral.js',
								'script2'       => 'js/models/certificacion.js',
								'script3'       => 'js/controllers/jcertificacion.js',
								'script4'       => 'js/librerias/jForm.js',
								'script5'       => 'js/librerias/jFormBuscar.js',

							);

			#	setear la cabecera
			$head    = array(	'scripts'       => $scripts1 );

			/*enviar listado a la vista*/
			/*$data['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );*/
			$data['btn'] = $this->modulo_model->getLinkModuloUsuario( 17 );

			/*$data['listaProductor'] = $this->htmlLista( $query , $this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/detallar' ));*/

			$data['lista'] = $this->htmlLista( $query );

			$data = array_merge($data, $this->generarPaginacion( 20 , 1 , $query ) );

			$data['busqueda'] =	$this->busqueda( $id );
			$data['finca'] = $queryfinca[0];
			

			/**/
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('certificacion/lista_view',$data);
			$this->load->view('foot_view');


			
		/*else:
			redirect(base_url());
		endif;*/
	}


	private function busqueda( $id ){
		
		$html = '';

		//if($this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/busqueda' )){

			$data1 = $this->getDataForm();
			$data1['idCertificacion'] = $id;
			$html  = $this->load->view('certificacion/busqueda_view', $data1 , TRUE );
		//}

		return $html;
	}

	private function getDataForm(){

        $query1 = $this->tipocertificacion_model->listar(); 
        $query2 = $this->entidadcertificadora_model->listar(); 

        $querys = array(
                 
                 'aTipoCertificacion' => $query1,
                 'aEntidadCertificadora' => $query2
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
		/*'script4'       => 'js/certificacion/jregistrar.js',
		'script5'       => 'js/certificacion/jfuncion_certificacion.js'*/
		'script3'       => 'js/models/certificacion.js',
		'script4'       => 'js/controllers/jcertificacion.js',
		'script5'       => 'js/librerias/jFormRegistrar.js',
		'script6'       => 'js/librerias/jForm.js',
         );

        #	setear la cabecera
        $head    = array( 'styles'=> $styles , 
                          'scripts'=> $scripts );

        $foot	= array( 'scripts'=> $scripts );	

        $querys =  $this->getDataForm();

        $querys['aFinca'] = $this->finca_model->buscar( 1 , 1 , array( 'p_id' => $id)); //

        $querys['btn'] = $this->modulo_model->getLinkModuloUsuario( 3 );

        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );         
        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );   
        
        $title   = array( 'title' => ''); 
        //write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

        $this->load->view('head_view',$head);
        $this->load->view('encabezado_view', $title);
        $this->load->view('certificacion/registrar_view',$querys);
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

	public function validarFecha( $campo ){
		if($campo == '')
			return true;
		else
			$fec = explode("/", $campo);
			if(sizeof($fec) == 3){
				if(strlen($fec[0]) == 2 && strlen($fec[1]) == 2 && strlen($fec[2]) == 4){
					if(es_natural($fec[0]) &&  es_natural($fec[1]) && es_natural($fec[2])){
						if($fec[0] >= 1 && $fec[0] <= 31 && $fec[1] >= 1 && $fec[1] <= 12 && $fec[2] >= 1850 )
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

			
				$this->form_validation->set_rules('cboTipocertificacion', 'Tipo Certificado', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('cboEntidadcertificadora', 'Entidad Certificadora', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('txtFecEmision', 'Fecha Emision', 'required|trim|xss_clean|callback_validarFormatoFecha');
				$this->form_validation->set_rules('txtFecExpiracion', 'Fecha Expiracion', 'required|trim|xss_clean|callback_validarFormatoFecha|callback_validarFecha');

				$this->form_validation->set_rules('fileAdjuntos', 'Documentos Adjuntos', 'xss_clean|callback_validarTipoArchivoAdjunto|callback_validarExtArchivoAdjunto');


				set_message_form_validation($this);
				
				
				if ($this->form_validation->run())
				{ 
					$aCertificacion = array(
							'p_id_tipocertificacion' 	=> $this->input->post('cboTipocertificacion'),
							'p_id_entidadcertificadora' => $this->input->post('cboEntidadcertificadora'),
							'p_fecha_emision'			=> $this->convertirfecha($this->input->post('txtFecEmision')),
							'p_fecha_expiracion'		=> $this->convertirfecha($this->input->post('txtFecExpiracion')),
							'p_id_finca' 				=> $this->input->post('txtid'),						
							'usureg'					=> 1
					);


					$rCertificacion = $this->certificacion_model->insert($aCertificacion);
					$id = null;
					if(isset($rCertificacion[0]['pid1'])):
							$result["estado"] 	= 1;		
					     	$result["mensaje"] 	= 'Se registró correctamente';
					     	$result["result"] 	= array( 	'codigo' => $rCertificacion[0]['pid1']   );
					     	$id = $rCertificacion[0]['pid1'];

					else:
						$result["estado"] 	= 3;		
					    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar la finca';
					    $result["result"] 	= array();
					endif;
					
					if($id!==null && isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0):
						$result["archivo_docadj"] = $this->archivo->guardarAdjuntos( 'fileAdjuntos' , $id , 'certificacion' , '');

					
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
				$this->form_validation->set_rules('txtidcertificacion', 'Id Certificacion', 'trim|xss_clean');
		
				$this->form_validation->set_rules('cboTipocertificacion', 'Tipo Certificacion', 'trim|xss_clean');
				$this->form_validation->set_rules('cboEntidadcertificadora', 'Entidad Certificadora', 'trim|xss_clean');
				$this->form_validation->set_rules('txtFecEmision', 'Fecha Emision', 'trim|xss_clean');
				$this->form_validation->set_rules('txtFecExpiracion', 'Fecha Expiracion', 'trim|xss_clean');

				$this->form_validation->set_rules('txtid', 'Id', 'required|trim|xss_clean');


				if ($this->form_validation->run())
				{ 
					$aFinca = array(
						'p_id' 	 				     => $this->input->post('txtidcertificacion'),
						'p_id_tipo_certificacion' 	 => $this->input->post('cboTipocertificacion'),
						'p_fecha_emision'			 => $this->input->post('txtFecEmision'),
						'p_fecha_expiracion'		 => $this->input->post('txtFecExpiracion'),
						'p_id_entidad_certificadora' => $this->input->post('cboTipocertificacion'),
						'p_id_finca' 				 => $this->input->post('txtid')					
					);

					$cantFilas = $this->input->post('value');
					$pagina = 	 $this->input->post('value1');

					$query1 = $this->certificacion_model->buscar( $cantFilas , $pagina , $aFinca);
					
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
						<div class="col-2">';
				if($bdetallar)
					$html .= '<a href="'.base_url().'certificacion/detallar/'.$l['id_certificacion'].'" title="MÁS DETALLES">'.$l['id_certificacion'].'</a></div>';
				else
					$html .= $l['id_certificacion'].'</div>';

			    $html .= '<div class="col-3">'.$l['tipo_certificacion'].'</div>
			    		<div class="col-3">'.$l['entidad_certificadora'].'</div>
					    <div class="col-2">'.$l['fecha_emision'].'</div>
					    <div class="col-2">'.$l['fecha_expiracion'].'</div>
						</div>';
			}

		endif;
		return $html;
    }



    public function detallar( $id ){
		//if(esLogeado()):
			//print_r($this->uri->uri_string());

			 /*LLAMA ACÁ LOS QUERYS.JS*/
	        $scripts = array(
		        'script1'		=> 'js/librerias/bootstrap.min.js',
		        'script2'		=> 'js/librerias/bootstrap.bundle.min.js',
				'script3'       => 'js/models/certificacion.js',
				'script4'       => 'js/controllers/jcertificacion.js',
				'script5'       => 'js/librerias/jFormModificar.js'
	         );

	        #	setear la cabecera
        	$head    = array( 'scripts'=> $scripts );


			#variables
			$query1 = $this->certificacion_model->getCertificacion( $id );	
			$query2 = $this->estado_model->getListarEstado(); 
			$query3 = $this->adjunto_model->listar( array( 'p_id_tabla'=> $id, 'p_tabla'=> 'certificacion' ) );	

			$data = array(
							'aCertificacion'	=>	$query1[0],
							'aListaEstado'		=>  $query2,
							'aAdjunto'			=>  $query3
			);
			
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('certificacion/detalle_view',$data);
			$this->load->view('modal_view', $data);
			$this->load->view('foot_view');
		/*else:
			redirect(base_url());
		endif;*/
	}


	/*public function buscarxCodigoAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):
				

				$aProductor = array(
					    'p_codigo_exact' 		=> $this->input->post('txtcodigoprod',true),
					    'p_id_tipo_documento' 	=> $this->input->post('cboTipoDoc',true),
					    'p_nro_documento' 		=> $this->input->post('txtnrodoc',true),
					    'p_nombre' 				=> $this->input->post('txtnombre',true),
					    'p_apellido' 			=> $this->input->post('txtapellidos',true),
					    'p_razon_social' 		=> $this->input->post('txtrazonsocial',true)


				);

				$result_sql = $this->productor_model->buscarProductor( 1 , 1 , $aProductor);	


				if( count($result_sql) >= 1 ):
					$result["estado"] 	= 1;		
					$result["mensaje"] 	= 'Encontrado';
					$result["result"] 	= $result_sql[0];
				else:
				    $result["estado"] 	= 2;		
				    $result["mensaje"] 	= 'No existe';
				    $result["result"] 	= array();
			    endif;


			//endif;
			echo json_encode($result);

		endif;
	}*/


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
						'idcertificacion' 	=> $this->input->post('txtIdCertificacion',TRUE),
						'idestado' 			=> $this->input->post('cboEstado',TRUE),
						'usureg'			=> 1
				);

				$resultado 	= $this->certificacion_model->actualizar($aArray);
		
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

	public function convertirfecha( $fecha ){
		$fec = explode("/", $fecha);
		return $fec[2]."-".$fec[1]."-".$fec[0];
	}





}
