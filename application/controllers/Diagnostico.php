<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diagnostico extends CI_Controller {

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
		$this->load->model(array('finca_model','modulo_model','adjunto_model','diagnostico_model','estado_model','pregunta_model','personal_model'));
	}


	public function listar( $id ){
		//if(esLogeado()):
			$query = $this->diagnostico_model->buscar( 20 , 1 , array( 'p_id_finca' => $id) ); //		
			$queryfinca = $this->finca_model->buscar( 20 , 1 , array( 'p_id' => $id)); //
			
			#	scripts y estilos
			$scripts1 = array(  /*'script0'       => 'js/jfuncion.js',*/
								'script1'       => 'js/jgeneral.js',
								'script2'       => 'js/models/diagnostico.js',
								'script3'       => 'js/controllers/jdiagnostico.js',
								'script4'       => 'js/librerias/jForm.js',
								'script5'       => 'js/librerias/jFormBuscar.js',

							);

			#	setear la cabecera
			$head    = array(	'scripts'       => $scripts1 );

			/*enviar listado a la vista*/
			/*$data['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );*/
			$data['btn'] = $this->modulo_model->getLinkModuloUsuario( 19 );

			/*$data['listaProductor'] = $this->htmlLista( $query , $this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/detallar' ));*/

			$data['lista'] = $this->htmlLista( $query );

			$data = array_merge($data, $this->generarPaginacion( 20 , 1 , $query ) );

			$data['busqueda'] =	$this->busqueda( $id );
			$data['finca'] = $queryfinca[0];
			

			/**/
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('diagnostico/lista_view',$data);
			$this->load->view('foot_view');


			
		/*else:
			redirect(base_url());
		endif;*/
	}


	private function busqueda( $id ){
		
		$html = '';

		//if($this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/busqueda' )){

			$data1 = $this->getDataForm();
			$data1['iddiagnostico'] = $id;
			$html  = $this->load->view('diagnostico/busqueda_view', $data1 , TRUE );
		//}

		return $html;
	}

	private function getDataForm( $id = 0 ){

        $query2 = $this->estado_model->getListarEstado(); 

        $querys = array(
                'aListaEstado' => $query2
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
			'script3'       => 'js/models/diagnostico.js?25112021',
			'script4'       => 'js/controllers/jdiagnostico.js?25112021',
			'script5'       => 'js/librerias/jFormRegistrar.js?25112021',
			'script6'       => 'js/librerias/jForm.js?25112021'
         );

        #	setear la cabecera
        $head    = array( 'styles'=> $styles , 
                          'scripts'=> $scripts );

        $foot	= array( 'scripts'=> $scripts );	

        $querys = array_merge( $this->getDataForm(), $this->getDataFormRegistro($id)); //

        $querys['btn'] = $this->modulo_model->getLinkModuloUsuario( 3 );
        $querys['aDatoGeneral'] = $this->diagnostico_model->getProductorIdFinca( $id );
        $querys['aCuestionario1'] = $this->pregunta_model->listarPregunta('diagnostico_infraestructura');
        $querys['aCuestionario2'] = $this->diagnostico_model->listarPregunta('costo_prod');
        $querys['aListaResponsable'] = $this->personal_model->listarPersonal( 'RESPONSABLE_AREA' );        
        $querys['aListaTecnico'] = $this->personal_model->listarPersonal( 'TECNICO_CAMPO' );                

        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );         
        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );   
        
        $title   = array( 'title' => ''); 
        //write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

        $this->load->view('head_view',$head);
        $this->load->view('encabezado_view', $title);
        $this->load->view('diagnostico/registrar_view',$querys);
        $this->load->view('modal_view');
		$this->load->view('foot_view');
	}

	private function getDataFormRegistro( $id ){
		$querys['aFinca'] = $this->finca_model->getFinca( $id ); //
		return $querys;
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

			
				$this->form_validation->set_rules('txtNro', 'Nro de Ficha Diagnostico', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtFec', 'Fecha Diagnostico', 'required|trim|xss_clean|callback_validarFormatoFecha');
				$this->form_validation->set_rules('txtCampoTotal1_0', 'Area Total', 'trim|xss_clean|numeric');
				$this->form_validation->set_rules('txtCampoTotal2_0', 'Area de café en Producción', 'trim|xss_clean|numeric');
				$this->form_validation->set_rules('txtinput2_Total', 'Hectáreas (DATOS DE CAMPO)', 'trim|xss_clean|numeric');
				$this->form_validation->set_rules('txthectareas_Total', 'Hectáreas (COSTO DE PRODUCCION)', 'trim|xss_clean|numeric');
				$this->form_validation->set_rules('txtcostohas_Total', 'Costo/Has (COSTO DE PRODUCCION)', 'trim|xss_clean|numeric');

				$this->form_validation->set_rules('txtPromedio', 'Ingreso promedio mensual del socio', 'trim|xss_clean|numeric');
				$this->form_validation->set_rules('txtAgricultura', 'Concepto de Ingreso Agricultura', 'trim|xss_clean|numeric');
				$this->form_validation->set_rules('txtBodega', 'Bodega', 'trim|xss_clean|numeric');
				$this->form_validation->set_rules('txtTransporte', 'Transporte', 'trim|xss_clean|numeric');
				$this->form_validation->set_rules('txtOtros', 'Otros', 'trim|xss_clean');
				$this->form_validation->set_rules('txtPrestamos', 'Entidades de Prestamos ', 'trim|xss_clean');
				
				/*
				$this->form_validation->set_rules('txtFecExpiracion', 'Fecha Expiracion', 'required|trim|xss_clean|callback_validarFormatoFecha|callback_validarFecha');*/

				$this->form_validation->set_rules('fileAdjuntos', 'Documentos Adjuntos', 'xss_clean|callback_validarTipoArchivoAdjunto|callback_validarExtArchivoAdjunto');


				set_message_form_validation($this);
				
				
				if ($this->form_validation->run())
				{ 
					$aDiagnostico = array(
							'p_nro_ficha' 				=> $this->input->post('txtNro'),
							'p_fecha'					=> $this->convertirfecha($this->input->post('txtFec')),
							'p_obs_infraestructura' 	=> $this->input->post('txtobsinfra'),
							'p_total_hectareas_prod' 	=> $this->input->post('txthectareasTotal'),
							'p_total_costo_has_prod' 	=> $this->input->post('txtcostohasTotal') ,
							'p_total_costo_total_prod' 	=> $this->input->post('txtcostototalTotal') ,
							'p_prom_mensual_socio' 		=> $this->input->post('txtPromedio') ,
							'p_ingreso_agricultura' 	=> $this->input->post('txtAgricultura') ,
							'p_ingreso_bodega' 			=> $this->input->post('txtBodega') ,
							'p_ingreso_transporte' 		=> $this->input->post('txtTransporte') ,
							'p_otro'					=> $this->input->post('txtOtros') ,
							'p_prestamo_entidades'		=> $this->input->post('txtPrestamos') ,
							'p_id_responsable_area'		=> $this->input->post('cboResponsable') ,
							'p_id_tecnico_campo'		=> $this->input->post('cboTecnico') ,
							'p_total_hectareas'			=> $this->input->post('txtinput2_Total') ,
							'p_total_variedad'			=> $this->input->post('txtinput3_Total') ,
							'p_total_edad'				=> $this->input->post('txtinput4_Total') ,
							'p_total_meses_cosecha'		=> $this->input->post('txtinput5_Total') ,
							'p_total_cosecha_anterior'	=> $this->input->post('txtinput6_Total') ,
							'p_total_cosecha_actual'	=> $this->input->post('txtinput7_Total') ,
							'p_area_total'				=> $this->input->post('txtCampoTotal1_0') ,
							'p_area_cafe'				=> $this->input->post('txtCampoTotal2_0') ,
							'p_crecimiento'				=> $this->input->post('txtCampoTotal3_0') ,
							'p_bosque'					=> $this->input->post('txtCampoTotal4_0') ,
							'p_purma'					=> $this->input->post('txtCampoTotal5_0') ,
							'p_pan_llevar'				=> $this->input->post('txtCampoTotal6_0') ,
							'p_vivienda'				=> $this->input->post('txtCampoTotal7_0') ,
							'p_id_finca' 				=> $this->input->post('txtid'),						
							'usureg'					=> 1
					);


					$rDiagnostico = $this->diagnostico_model->insert($aDiagnostico);
					$id = null;
					if(isset($rDiagnostico[0]['pid1'])):
							$result["estado"] 	= 1;		
					     	$result["mensaje"] 	= 'Se registró correctamente';
					     	$result["result"] 	= array( 	'codigo' => $rDiagnostico[0]['pid1']   );
					     	$id = $rDiagnostico[0]['pid1'];

					     	$total = $this->input->post('txtTotalPregunta');

						     for ($i=0; $i <= $total ; $i++) { 

						     	if($this->input->post('radPregunta_'.$i) !== null ):
						     		$aInfra = array(
						     			'p_id_diagnostico' 	=> $id , 
						     			'p_id_pregunta' 	=> $this->input->post('txtidPregunta_'.$i) , 
						     			'p_estado_pregunta' => $this->input->post('radPregunta_'.$i) , 
						     			'p_observacion' 	=> $this->input->post('txtObsPregunta_'.$i) , 
						     		);

						     		$rInfra = $this->diagnostico_model->insertDI($aInfra);

						     		$result["result"]['aInfra'] = $rInfra;
						     	endif;
						    }

						    $total = $this->input->post('txtidcampo');

						    for ($i=0; $i <= $total ; $i++) { 

						     	if($this->input->post('txtinputCampo1_'.$i) !== null ):
						     		$aCampo = array(
						     			'p_id_diagnostico' 	=> $id , 
						     			'p_hectareas' 		=> $this->input->post('txtinputCampo1_'.$i) , 
						     			'p_variedad' 		=> $this->input->post('txtinputCampo2_'.$i) , 
						     			'p_edad' 			=> $this->input->post('txtinputCampo3_'.$i) , 
						     			'p_meses_cosecha' 	=> $this->input->post('txtinputCampo4_'.$i) , 
						     			'p_cosecha_anterior'=> $this->input->post('txtinputCampo5_'.$i) , 
						     			'p_cosecha_actual' 	=> $this->input->post('txtinputCampo6_'.$i) 
						     		);

						     		$rCampo = $this->diagnostico_model->insertDC($aCampo);

						     		$result["result"]['aCampo'] = $rCampo;
						     	endif;
						    }

						    $total = $this->input->post('txtTotalPreguntaCosto');

						    for ($i=0; $i < $total ; $i++) { 

						     	if($this->input->post('txthectareas_'.$i) !== '' ):
						     		$aCosto = array(
						     			'p_id_diagnostico' 	=> $id , 
						     			'p_id_pregunta'		=> $this->input->post('txtidPreguntacosto_'.$i) , 
						     			'p_hectareas' 		=> $this->input->post('txthectareas_'.$i) , 
						     			'p_costo_has' 		=> $this->input->post('txtcostohas_'.$i) , 
						     			'p_costo_total' 	=> $this->input->post('txtcostototal_'.$i) , 
						     			'p_observaciones' 	=> $this->input->post('txtobscosto_'.$i)
						     		);

						     		$rCosto = $this->diagnostico_model->insertDCP($aCosto);

						     		$result["result"]['aCosto'] = $rCosto;
						     	endif;
						    }


					     	
					else:
						$result["estado"] 	= 3;		
					    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar la finca';
					    $result["result"] 	= $rDiagnostico[0]['error'];
					endif;
					
					if($id!==null && isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0):
						$result["archivo_docadj"] = $this->archivo->guardarAdjuntos( 'fileAdjuntos' , $id , 'diagnostico' , '');
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
				$this->form_validation->set_rules('txtFecIni', 'Fecha Inicial', 'trim|xss_clean');
				$this->form_validation->set_rules('txtFecFin', 'Fecha Final', 'trim|xss_clean');
				$this->form_validation->set_rules('cboEstado', 'Estado', 'trim|xss_clean');

				$this->form_validation->set_rules('txtid', 'Id', 'required|trim|xss_clean');


				if ($this->form_validation->run())
				{ 
					$aFinca = array(
						'p_codigo' 	 		=> $this->input->post('txtcodigo'),
						'p_fecha_ini' 	 	=> $this->input->post('txtFecIni'),
						'p_fecha_fin'		=> $this->input->post('txtFecFin'),
						'p_estado'		 	=> $this->input->post('cboEstado'),
						'p_id_finca' 		=> $this->input->post('txtid')					
					);

					$cantFilas = $this->input->post('value');
					$pagina = 	 $this->input->post('value1');

					$query1 = $this->diagnostico_model->buscar( $cantFilas , $pagina , $aFinca);
					
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
						<div class="col-4">';
				if($bdetallar)
					$html .= '<a href="'.base_url().'diagnostico/detallar/'.$l['id_diagnostico'].'" id="'.$l['id_diagnostico'].'" title="MÁS DETALLES">'.$l['codigo'].'</a></div>';
				else
					$html .= $l['codigo'].'</div>';

			    $html .= '
			    		<div class="col-4">'.$l['fec_registro'].'</div>
					    <div class="col-4">'.$l['estado_diagnostico'].'</div>
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
		        'script3'       => 'js/models/diagnostico.js',
				'script4'       => 'js/controllers/jdiagnostico.js',
				'script5'       => 'js/librerias/jFormModificar.js'
	         );

	        #	setear la cabecera
        	$head    = array( 'scripts'=> $scripts );


			#variables
			$query1 = $this->diagnostico_model->getDiagnostico( $id );	
			$query2 = $this->estado_model->getListarEstado(); 
			$query3 = $this->adjunto_model->listar( array( 'p_id_tabla'=> $id, 'p_tabla'=> 'diagnostico' ) );	
			$query4 = $this->diagnostico_model->getProductorIdFinca( $query1[0]['id_finca'] );
			$query5 = $this->finca_model->getFinca( $query1[0]['id_finca'] ); 
			$query6 = $this->diagnostico_model->getDiagnosticoInfra( $id );
			$query7 = $this->diagnostico_model->getDiagnosticoCostoProd( $id );
			$query8 = $this->diagnostico_model->getDiagnosticoCampo( $id );

			$data = array(
							'aDiagnostico'		=>	$query1[0],
							'aListaEstado'		=>  $query2,
							'aAdjunto'			=>  $query3,
							'aDatoGeneral'		=>  $query4,
							'aFinca'			=>  $query5,
							'aInfra'			=>  $query6,
							'aCostoProd'		=>  $query7,
							'aCampo'			=>  $query8
			);

			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('diagnostico/detalle_view',$data);
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
						'iddiagnostico' 	=> $this->input->post('txtIdDiagnostico',TRUE),
						'idestado' 			=> $this->input->post('cboEstado',TRUE),
						'usureg'			=> 1
				);

				$resultado 	= $this->diagnostico_model->actualizar($aArray);
		
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
				    $result["mensaje"] 	= 'Ocurrió un error al intentar actualizar';
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

	public function convertirfecha( $fecha ){
		$fec = explode("/", $fecha);
		return $fec[2]."-".$fec[1]."-".$fec[0];
	}


	public function visualizarPDF( $id , $bImprimirAuto = 'N' ){
		$this->load->helper(array('pdf_helper'));

		$datos = $this->getDataFormRegistro($id); //
		//print_r($datos['aDatoGeneral'][0]['codigo_productor']);

		
		$vAccion = 0 ; //mostrar
		include APPPATH . 'third_party/dompdf/autoload.inc.php';
		
		$content = generarHTMLPdfInspeccion( $datos , $bImprimirAuto );
		$name = 'Ticket_.pdf';

		if($content!='No existe plantilla' && $bImprimirAuto=='N'){
			//echo $content;
			$dompdf = new Dompdf();
				
			$dompdf -> loadHtml($content);
			$dompdf->setPaper('A4', 'portrait');
			
			$dompdf -> render();
			$pdf = $dompdf -> output();
			$dompdf -> stream( $name, array("Attachment" => $vAccion) );
		}else{
			echo $content;
		}
	}





}
