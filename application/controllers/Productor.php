<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productor extends CI_Controller {

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
		$this->load->model(array('productor_model','modulo_model','tipodocumento_model','departamento_model','religion_model','genero_model','estadocivil_model','gradoestudio_model','idioma_model','persona_model','estado_model','adjunto_model'));
	}


	public function index(){
		//if(esLogeado()):

			$query = $this->productor_model->buscarProductor( 20 , 1 , array()); //

			#	scripts y estilos
			$scripts1 = array( 
								/*'script1'       => 'js/librerias/productor/jlistar.js',
								'script2'       => 'js/librerias/productor/jfuncion_productor.js',*/

								'script1'       => 'js/jgeneral.js',
								'script2'       => 'js/models/productor.js',
								'script3'       => 'js/controllers/jproductor.js',
								'script4'       => 'js/librerias/jForm.js',
								'script5'       => 'js/librerias/jFormBuscar.js'

							);

			#	setear la cabecera
			$head    = array(	'scripts'       => $scripts1 );

			/*enviar listado a la vista*/
			/*$data['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );*/
			$data['btn'] = $this->modulo_model->getLinkModuloUsuario( 1 );

			/*$data['listaProductor'] = $this->htmlListaProductor( $query , $this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/detallar' ));*/

			$data['listaProductor'] = $this->htmlListaProductor( $query );

			$data = array_merge($data, $this->generarPaginacion( 20 , 1 , $query ) );

			$data['busqueda'] =	$this->busqueda();

			/**/
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('productor/listaproductor_view',$data);
			$this->load->view('foot_view');
			
		/*else:
			redirect(base_url());
		endif;*/
	}


	private function busqueda(){
		
		$html = '';

		//if($this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/busqueda' )){

			$data1 = $this->getDataForm();
			$html  = $this->load->view('productor/busqueda_view', $data1 , TRUE );
		//}

		return $html;
	}

	private function getDataForm(){
    	$query1 = $this->tipodocumento_model->getListarTipoDocumento(); 
        $query2 = $this->departamento_model->getListarDepartamento(); 
        $query3 = $this->estado_model->getListarEstado(); 
        $query4 = $this->religion_model->getListarReligion(); 
        $query5 = $this->genero_model->getListarGenero(); 
        $query6 = $this->estadocivil_model->getListarEstadoCivil(); 
        $query7 = $this->gradoestudio_model->getListarGradoEstudio(); 
        $query8 = $this->idioma_model->getListarIdioma(); 
        

        $querys = array(
                 'aListaTipoDoc' 	=> $query1,
                 'aListaDepartamento' => $query2,
                 'aListaEstado' => $query3,
                 'aListaReligion' => $query4,
                 'aListaGenero' => $query5,
                 'aListaEstadoCivil' => $query6,
                 'aListaGradoEstudio' => $query7,
                 'aListaiIdioma' => $query8,
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


	public function registrar(){
		        #	scripts y estilos
        $styles = array( );

         /*LLAMA ACÁ LOS QUERYS.JS*/
        $scripts = array(
        'script1'		=> 'js/librerias/bootstrap.min.js',
        'script2'		=> 'js/librerias/bootstrap.bundle.min.js',
		'script3'       => 'js/productor/jregistrar.js',
		'script4'       => 'js/productor/jfuncion_productor.js',

		'script5'       => 'js/controllers/jproductor.js?03112021',
        'script6'       => 'js/models/productor.js?03112021',
        'script7'       => 'js/librerias/jForm.js?03112021',
        'script8'       => 'js/librerias/jFormRegistrar.js?03112021',
         );

        #	setear la cabecera
        $head    = array( 'styles'=> $styles , 
                          'scripts'=> $scripts );

        $foot	= array( 'scripts'=> $scripts );	

        $querys =  $this->getDataForm();

        $querys['btn'] = $this->modulo_model->getLinkModuloUsuario( 3 );

        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );         
        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );   
        
        $title   = array( 'title' => ''); 
        //write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

        $this->load->view('head_view',$head);
        $this->load->view('encabezado_view', $title);
        $this->load->view('productor/registrarproductor_view',$querys);
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

				/*$this->form_validation->set_rules('cboTipoDoc', 'Tipo de Documento', 'required|trim|xss_clean|min_length[1]|max_length[150]');*/
				$this->form_validation->set_rules('cboTipoDoc', 'Tipo de Documento', 'required|trim|xss_clean|is_natural_no_zero');
				if($this->input->post('cboTipoDoc') == 1 ){
					$this->form_validation->set_rules('txtnrodoc', 'Nro de Documento', 'required|trim|xss_clean|exact_length[8]|numeric');
					$this->form_validation->set_rules('txtnombre', 'Nombre', 'required|trim|xss_clean|alpha_spaces');
					$this->form_validation->set_rules('txtapellidos', 'Apellidos', 'required|trim|xss_clean|alpha_spaces');
				}else{
					$this->form_validation->set_rules('txtnrodoc', 'Nro de Documento', 'required|trim|xss_clean|min_length[11]|max_length[13]');
					$this->form_validation->set_rules('txtrazonsocial', 'Razon Social', 'required|trim|xss_clean');
				}

				$this->form_validation->set_rules('txtdireccion', 'Direccion', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtemail', 'Email', 'trim|xss_clean|valid_email');
				$this->form_validation->set_rules('txttelfijo', 'Telf.Fijo', 'trim|xss_clean|min_length[11]|max_length[13]|numeric_telf');
				$this->form_validation->set_rules('txtcelular', 'Telf.Celular', 'trim|xss_clean|numeric');

				$this->form_validation->set_rules('cboDepartamento', 'Departamento', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('cboProvincia', 'Provincia', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('cboDistrito', 'Distrito', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('cboZona', 'Zona', 'required|trim|xss_clean|is_natural_no_zero');

				$this->form_validation->set_rules('txtaniozona', 'Año de Ingreso a la Zona', 'trim|xss_clean|is_natural');
				$this->form_validation->set_rules('txtcanthijos', 'Cantidad de Hijos', 'trim|xss_clean|is_natural');
				$this->form_validation->set_rules('txtdialecto', 'Dialecto', 'trim|xss_clean|alpha_spaces');
				$this->form_validation->set_rules('txtlugarnac', 'Lugar de Nacimiento', 'trim|xss_clean|alpha_spaces_dash');

				$this->form_validation->set_rules('txtFecNac', 'Fecha de Nacimiento', 'trim|xss_clean|callback_validarFormatoFecha|callback_validarFechaNac');

				$this->form_validation->set_rules('cboEstadoCivil', 'Estado Civil', 'required|trim|xss_clean|is_natural');




				$this->form_validation->set_rules('cboTipoDocCony', 'Tipo de Documento Conyugue', 'trim|xss_clean|is_natural');
				if($this->input->post('cboTipoDocCony') > 0 ){
					if($this->input->post('cboTipoDocCony') == 1 ){
						$this->form_validation->set_rules('txtnrodocCony', 'Nro de Documento Conyugue', 'required|trim|xss_clean|exact_length[8]|numeric');
						$this->form_validation->set_rules('txtnombreCony', 'Nombre Conyugue', 'required|trim|xss_clean|alpha_spaces');
						$this->form_validation->set_rules('txtapellidosCony', 'Apellidos Conyugue', 'required|trim|xss_clean|alpha_spaces');
					}else{
						$this->form_validation->set_rules('txtnrodocCony', 'Nro de Documento Conyugue', 'required|trim|xss_clean|min_length[11]|max_length[13]');
						$this->form_validation->set_rules('txtrazonsocialCony', 'Razon Social Conyugue', 'required|trim|xss_clean');
					}
				}

				if( $this->input->post('txtnrodocCony') != "" && $this->input->post('cboTipoDocCony') == 0){
					$this->form_validation->set_rules('cboTipoDocCony', 'Tipo de Documento Conyugue', 'trim|xss_clean|is_natural_no_zero');
				}

				$this->form_validation->set_rules('txtcelularCony', 'Telf.Celular Conyugue', 'trim|xss_clean|numeric');
				$this->form_validation->set_rules('txtFecNacCony', 'Fecha de Nacimiento Conyugue', 'trim|xss_clean|callback_validarFormatoFecha|callback_validarFechaNac');
				$this->form_validation->set_rules('txtlugarNacCony', 'Lugar de Nacimiento Conyugue', 'trim|xss_clean|alpha_spaces_dash');

				if( $this->input->post('cboTipoDocCony') > 0 || $this->input->post('txtnrodocCony') !=="" || $this->input->post('txtnombreCony') !=="" || 
					$this->input->post('txtapellidosCony') !=="" || $this->input->post('txtrazonsocialCony') !=="" || $this->input->post('txtcelularCony') !=="" || 
					$this->input->post('cboGradoEstudioCony') > 0 || $this->input->post('txtFecNacCony') !=="" || $this->input->post('txtlugarNacCony') !=="" ){

					$this->form_validation->set_rules('cboEstadoCivil', 'Estado Civil', 'required|trim|xss_clean|callback_validarEstadoCivil');
				}

				$this->form_validation->set_rules('fileAdjuntos', 'Archivo Adjunto', 'xss_clean|callback_validarTipoArchivo|callback_validarExtArchivo');


				set_message_form_validation($this);
				
				
				if ($this->form_validation->run())
				{ 
					$aPersona = array(
							'idtipodoc' 	=> $this->input->post('cboTipoDoc'),
							'nrodoc'		=> $this->input->post('txtnrodoc'),
							'nombre'		=> $this->input->post('txtnombre'),
							'apellidos'		=> $this->input->post('txtapellidos'),
							'razonsocial'	=> $this->input->post('txtrazonsocial'),
							'zona'			=> $this->input->post('cboZona'),
							'direccion'		=> $this->input->post('txtdireccion'),
							'telfijo'		=> $this->input->post('txttelfijo'),
							'celular'		=> $this->input->post('txtcelular'),
							'fecNac'		=> convertirfecha($this->input->post('txtFecNac')),
							'lugarnac'		=> $this->input->post('txtlugarnac'),
							'email'			=> $this->input->post('txtemail'),
							'religion'		=> $this->input->post('cboReligion'),
							'estadoCivil'	=> $this->input->post('cboEstadoCivil'),
							'gradoEstudio'	=> $this->input->post('cboGradoEstudio'),
							'aniozona'		=> $this->input->post('txtaniozona'),
							'genero'		=> $this->input->post('cboGenero'),
							'canthijos'		=> $this->input->post('txtcanthijos'),
							/*'idioma'		=> $this->input->post('cboIdioma'),*/
							'dialecto'		=> $this->input->post('txtdialecto'),
							'idconyugue'	=> 0,
							'usureg'		=> 1
					);


					$aConyugue = array(
							'idtipodoc' 	=> $this->input->post('cboTipoDocCony'),
							'nrodoc'		=> $this->input->post('txtnrodocCony'),
							'nombre'		=> $this->input->post('txtnombreCony'),
							'apellidos'		=> $this->input->post('txtapellidosCony'),
							'razonsocial'	=> $this->input->post('txtrazonsocialCony'),
							'celular'		=> $this->input->post('txtcelularCony'),
							'gradoEstudio'	=> $this->input->post('cboGradoEstudioCony'),
							'fecNac'		=> convertirfecha($this->input->post('txtFecNacCony')),
							'lugarnac'		=> $this->input->post('txtlugarNacCony'),
							'usureg'		=> 1
					);

					

					if($this->input->post('txtnrodocCony') !== "" ){
						$rConyugue = $this->persona_model->insertPersona($aConyugue);
						$aPersona['idconyugue'] = $rConyugue[0]['pid1'];
					}
					
					$rPersona = $this->persona_model->insertPersona($aPersona);

					$aProductor = array(
							'idpersona' => $rPersona[0]['pid1'],
							'usureg'	=> 1 
					);

					if( $rPersona[0]['result'] == 1):
						$aIdioma = $this->input->post('chkidioma[]');

						if(!empty($aIdioma)){
							foreach ($aIdioma as $key => $value) {
							$aPI = array(
								 'idpersona' => $aProductor['idpersona'],
								 'ididioma'	 => $value
							);
							$rPI = $this->persona_model->insertPersonaIdioma($aPI);
							}
						}
					endif;
					

					$rProductor = $this->productor_model->insertProductor($aProductor);
					$id = null;
					if($rProductor[0]['result'] == 1):
							$result["estado"] 	= 1;		
					     	$result["mensaje"] 	= 'Se registró correctamente';
					     	$result["result"] 	= array( 	'codigo' => $rProductor[0]['codigo']   );
					     	$id = $rProductor[0]['pid1'];

					else:
						if($rProductor[0]['result'] == -1):
							$result["estado"] 	= 2;		
					    	$result["mensaje"] 	= 'Productor registrado anteriormente.</br>Dirigase al modulo de actualización';
					    	$result["result"] 	= array();
						else:
							$result["estado"] 	= 3;		
					    	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar el productor';
					    	$result["result"] 	= array();
					    endif;
					endif;

					if(isset($rConyugue[0]['result'])){
						if( $rConyugue[0]['result'] == -1 )
							$result["mensaje"] 	.= '</br>Conyugue registrado anteriormente';
					}

					if($id!==null && isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0):
						$result["archivo"] = $this->archivo->guardarAdjuntos( 'fileAdjuntos' , $id , 'productor' );

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
				$this->form_validation->set_rules('cbotipodocumento', 'Tipo Documento', 'trim|xss_clean');
				$this->form_validation->set_rules('txtNrodocumento', 'Nro Documento', 'trim|xss_clean');
				$this->form_validation->set_rules('txtNombre_razon', 'Nombre / Razon', 'trim|xss_clean');

				$this->form_validation->set_rules('cboDepartamento', 'Departamento', 'trim|xss_clean');
				$this->form_validation->set_rules('cboProvincia', 'Provincia', 'trim|xss_clean');
				$this->form_validation->set_rules('cboDistrito', 'Distrito', 'trim|xss_clean');
				$this->form_validation->set_rules('cboZona', 'Zona', 'trim|xss_clean');
				$this->form_validation->set_rules('txtFecIni', 'Fecha Inicio', 'trim|xss_clean');
				$this->form_validation->set_rules('txtFecFin', 'Fecha Fin', 'trim|xss_clean');
				$this->form_validation->set_rules('cboListaEstado', 'Estado', 'trim|xss_clean');


				if ($this->form_validation->run())
				{ 
					$aProductor = array(
						'p_id' 					=> 0,
					    'p_codigo' 				=> $this->input->post('txtcodigo'),
						'p_id_tipo_documento' 	=> $this->input->post('cbotipodocumento' , TRUE ),
						'p_nro_documento' 		=> $this->input->post('txtNrodocumento' , TRUE ),
						'p_nombre_razon' 		=> $this->input->post('txtNombre_razon'),
						'p_id_departamento' 	=> $this->input->post('cboDepartamento'),
						'p_id_provincia' 		=> $this->input->post('cboProvincia'),
						'p_id_distrito' 		=> $this->input->post('cboDistrito'),
						'p_id_zona' 			=> $this->input->post('cboZona'),
						'p_fecha_ini'			=> $this->input->post('txtFecIni'),
						'p_fecha_fin' 			=> $this->input->post('txtFecFin'),
						'p_estado' 				=> $this->input->post('cboListaEstado'),
						'p_orderby'				=> $this->input->post('orderby')
					);

					$cantFilas = $this->input->post('value');
					$pagina = 	 $this->input->post('value1');

					$query1 = $this->productor_model->buscarProductor( $cantFilas , $pagina , $aProductor);		
					
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
		$resultado['lista'] 		= $this->htmlListaProductor( $query1 );
		
		$resultado = array_merge($resultado, $this->generarPaginacion( $cantFilas , $pagina , $query1 ) );

		echo json_encode($resultado);
	}


    public function htmlListaProductor( $lista , $bdetallar = true){
		if(empty($lista)):
			$html = '<div class="row2" ><div class"text-center">No hay información para mostrar</div></div>';
		else:
			$html = '';
			foreach ($lista as $l) {
				$html .= '<div class="row2 form-group col-12 row_div" >
						<div class="col-1">';
				if($bdetallar)
					$html .= '<a id="'.$l['id_productor'].'" href="'.base_url().'productor/detallar/'.$l['id_productor'].'" title="MÁS DETALLES">'.$l['codigo'].'</a></div>';
				else
					$html .= str_pad($l['codigo'], 5, "0", STR_PAD_LEFT).'</div>';

			    $html .= '<div class="col-1">'.$l['tipo_documento'].'</div>
					    <div class="col-1">'.$l['nro_documento'].'</div>
					    <div class="col-2">'.$l['nombre_razon'].'</div>
						<div class="col-1">'.$l['departamento'].'</div>
						<div class="col-1">'.$l['provincia'].'</div>
						<div class="col-1">'.$l['distrito'].'</div>
						<div class="col-2">'.$l['zona'].'</div>
						<div class="col-1">'.$l['fec_registro'].'</div>
						<div class="col-1">'.$l['estado'].'</div>
						</div>';
			}

		endif;
		return $html;
    }



    public function detallar( $idproducto ){
		//if(esLogeado()):
			//print_r($this->uri->uri_string());

			 /*LLAMA ACÁ LOS QUERYS.JS*/
	        $scripts = array(
		        'script1'		=> 'js/librerias/bootstrap.min.js',
		        'script2'		=> 'js/librerias/bootstrap.bundle.min.js',
				'script3'       => 'js/models/productor.js',
				'script4'       => 'js/controllers/jproductor.js',
				'script5'       => 'js/librerias/jFormModificar.js',
				'script6'       => 'js/librerias/jFormRegistrar.js',
	         );

   			#	setear la cabecera
        	$head    = array( 'scripts'=> $scripts );


			$aProducto = array(
				'idproducto' 		=> $idproducto,
			);

			#variables
			$query1 = $this->productor_model->getProductor( $aProducto['idproducto'] );	
			$query2 = $this->estado_model->getListarEstado(); 
			$query3 = $this->adjunto_model->listar( array( 'p_id_tabla'=> $idproducto, 'p_tabla'=> 'productor' ) );	
			$query4 = $this->tipodocumento_model->getListarTipoDocumento(); 
			$query5 = $this->gradoestudio_model->getListarGradoEstudio(); 

			$data = array(
							'aProductor'		=>	$query1[0],
							'aListaEstado'		=>  $query2,
							'aAdjunto'			=>  $query3,
							'aListaTipoDoc'		=>  $query4,
							'aListaGradoEstudio' => $query5,
			);
			
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('productor/detalle_view',$data);
			$this->load->view('modal_view');
			$this->load->view('foot_view');
		/*else:
			redirect(base_url());
		endif;*/
	}


	public function buscarxCodigoAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):
				

				$aProductor = array(
					    'p_codigo' 				=> $this->input->post('txtcampobusqueda1',true),
					    'p_nro_documento' 		=> $this->input->post('txtcampobusqueda2',true),
					    'p_nombre_razon' 		=> $this->input->post('txtcampobusqueda3',true)
				);

				$result_sql = $this->productor_model->buscarProductor( 25 , 1 , $aProductor);	


				if( count($result_sql) >= 1 ):
					$result["estado"] 	= 1;		
					$result["mensaje"] 	= 'Encontrado';
					$result["result"] 	= $result_sql;
				else:
				    $result["estado"] 	= 2;		
				    $result["mensaje"] 	= 'No existe';
				    $result["result"] 	= array();
			    endif;


			//endif;
			echo json_encode($result);

		endif;
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
				$aProductor = array(
						'idproductor' 		=> $this->input->post('txtId',TRUE),
						'idestado' 			=> $this->input->post('cboEstado',TRUE),
						'usureg'			=> 1
				);

				$resultado 	= $this->productor_model->actualizar($aProductor);
		
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


	/*
	*	Funcion @actualizarConyugueAjax
	* 	Invocado por 
	*	
	*	Parametros :  
	*	Con retorno
	*		True : Si la extensión cumple con la condición
	*		False: La extensión no cumple
	*/
	public function guardarConyugueAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			
			$this->form_validation->set_rules('cboTipoDocCony', 'Tipo de Documento', 'required|trim|xss_clean|is_natural_no_zero');
			
			if($this->input->post('cboTipoDocCony') > 0 ){
				if($this->input->post('cboTipoDocCony') == 1 ){
					$this->form_validation->set_rules('txtdniCony', 'DNI', 'required|trim|xss_clean|exact_length[8]|numeric');
					$this->form_validation->set_rules('txtnomCony', 'Nombre', 'required|trim|xss_clean');
					$this->form_validation->set_rules('txtapeCony', 'Apellidos', 'required|trim|xss_clean');
				}else{
					$this->form_validation->set_rules('txtdniCony', 'RUC', 'required|trim|xss_clean|min_length[11]|max_length[13]');
					$this->form_validation->set_rules('txtrazonCony', 'Razon Social', 'required|trim|xss_clean');
				}
			}

			if( $this->input->post('txtdniCony') != "" && $this->input->post('cboTipoDocCony') == 0){
				$this->form_validation->set_rules('cboTipoDocCony', 'Tipo de Documento Conyugue', 'trim|xss_clean|is_natural_no_zero');
			}


			//MENSAJES DE REGLAS DE FORMULARIO
			set_message_form_validation($this);


			if ($this->form_validation->run())
			{ 			

				    $aConyugue = array(
							'idtipodoc' 	=> $this->input->post('cboTipoDocCony'),
							'nrodoc'		=> $this->input->post('txtdniCony'),
							'nombre'		=> $this->input->post('txtnomCony'),
							'apellidos'		=> $this->input->post('txtapeCony'),
							'razonsocial'	=> $this->input->post('txtrazonCony'),
							'celular'		=> $this->input->post('txttelfCony'),
							'gradoEstudio'	=> $this->input->post('cboGradoEstudioCony'),
							'fecNac'		=> convertirfecha($this->input->post('txtfecNacCony')),
							'lugarnac'		=> $this->input->post('txtlugarNacCony'),
							'usureg'		=> 1
					);

					
					//registrar nuevo conyugue
					$rConyugue = $this->persona_model->insertPersona($aConyugue);


					if( isset($rConyugue[0]) ){
						//nuevo conyugue
						if( $rConyugue[0]['result'] == 1):

							$aProductor = array(
									'p_id' 				=> $this->input->post('txtId'),
									'p_id_conyugue'		=> $rConyugue[0]['pid1'],
									'p_usu_mod'			=> 1
							);

							//actualizar el conyugue en la persona
							$rProductor = $this->productor_model->actualizarIdConyugue($aProductor);

							if( isset($rProductor[0]) ):
								if( $rProductor[0]['result'] == 1):
									$result["estado"] 	= 1;		
				     				$result["mensaje"] 	= 'Se registró correctamente';
				     				$result["result"] 	= array( 	'codigo' => $rProductor[0]['codigo']    );
								else:
									$result["estado"] 	= 3;		
									$result["mensaje"] 	= 'Ocurrió un error al intentar actualizar el conyugue';
									$result["result"] 	= array();
								endif;
				     		else:
				     			$result["estado"] 	= 4;		
								$result["mensaje"] 	= 'Ocurrió un error al intentar actualizar el conyugue';
								$result["result"] 	= array();
				     		endif;

						else:
							if($rConyugue[0]['result'] == -1 && $rConyugue[0]['pid1']=="" && $rConyugue[0]['pid1']==null):
								$result["estado"] 	= 2;		
				     			$result["mensaje"] 	= 'No existen cambios';
				     			$result["result"] 	= array();
							else:
								//registrado anteriormente
								$aPersona = array(
									'p_id' 					=> $rConyugue[0]['pid1'],
									'p_id_tipo_documento' 	=> $aConyugue['idtipodoc'],
									'p_nro_documento' 		=> $aConyugue['nrodoc'],
									'p_nombre' 				=> $aConyugue['nombre'],
									'p_apellido' 			=> $aConyugue['apellidos'],
									'p_razon_social' 		=> $aConyugue['razonsocial'],
									'p_telefono_celular' 	=> $aConyugue['celular'],
									'p_id_grado_estudio' 	=> $aConyugue['gradoEstudio'],
									'p_fecha_nacimiento' 	=> $aConyugue['fecNac'],
									'p_lugar_nacimiento' 	=> $aConyugue['lugarnac'],
									'p_usu_mod' 			=> 1

								);
								$rPersona = $this->persona_model->actualizar($aPersona);
								
								if( isset($rPersona[0]) ):
									if( $rPersona[0]['result'] == 1):
										$aProductor = array(
											'p_id' 				=> $this->input->post('txtId'),
											'p_id_conyugue'		=> $rConyugue[0]['pid1'],
											'p_usu_mod'			=> 1
										);
										print_r($aProductor);

										//actualizar el conyugue en la persona
										$rProductor = $this->productor_model->actualizarIdConyugue($aProductor);

										if(isset($rProductor[0])):
											if( $rProductor[0]['result'] == 1):
												$result["estado"] 	= 1;		
							     				$result["mensaje"] 	= 'Ya existe conyugue. Se actualizó correctamente';
							     				$result["result"] 	= array();
							     			else:
							     				if( $rProductor[0]['result'] == -1 && $rProductor[0]['pid1']!=null):
								     				$result["estado"] 	= 1;		
													$result["mensaje"] 	= 'Ya existe conyugue. Se actualizó correctamente';
													$result["result"] 	= array();
												else:
													$result["estado"] 	= 5;		
													$result["mensaje"] 	= 'Ocurrió un error al intentar actualizar el conyugue';
													$result["result"] 	= array();
												endif;
							     			endif;	
										else:
											$result["estado"] 	= 6;		
											$result["mensaje"] 	= 'Ocurrió un error al intentar actualizar el conyugue';
											$result["result"] 	= array();
										endif;
									else:
										if( $rPersona[0]['result'] == -2):
											$result["estado"] 	= 7;		
											$result["mensaje"] 	= 'El conyugue ya se encuentra agregado a otro Productor';
											$result["result"] 	= array();
										else:
											$result["estado"] 	= 8;		
											$result["mensaje"] 	= 'Ocurrió un error al intentar actualizar el conyugue';
											$result["result"] 	= array();
										endif;	
									endif;		
								else:
									if($rPersona[0]['result'] == -1 && $rPersona[0]['pid1']=="" && $rPersona[0]['pid1']==null):
										$result["estado"] 	= 2;		
						     			$result["mensaje"] 	= 'No existen cambios';
						     			$result["result"] 	= array();
									else:
										$result["estado"] 	= 2;		
				     					$result["mensaje"] 	= 'Ya existe conyugue. Se deben actualizar los datos del conyugue';
				     					$result["result"] 	= array();
									endif;
								endif;
							endif;
						endif;
					}
			
			}
			else{
					$result = validation_errors_parse(validation_errors());
					
				}

			echo json_encode($result);


		endif;

    }



}
