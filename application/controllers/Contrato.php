<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contrato extends CI_Controller {

	/*
	*	Funcion @construct
	* 	Invocado por la clase Inicio
	*	Carga los helper del formulario
	*	Parametros :  No
	*	Sin retorno
	*/

	const _aCalculo = array(
							1 =>'per 100 lbs net',
							2 =>'cts/lb (cents per pound)',
							3 =>'per 46 kgs net'
	);

	const _aTipoEmpaque = array(
							1 => 'SACO DE YUTE', 
							2 => 'SACO DE PLASTICO', 
							3 => ' BULK '
	);


	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','security','utilitario_helper','cookie'));
		$this->load->library(array('paginacion'));
		$this->load->model(array('contrato_model','modulo_model','moneda_model','pais_model','certificacion_model','persona_model','cliente_model','ciudad_model','estado_model','calidad_model','adjunto_model','tipocertificacion_model','entidadcertificadora_model','pergamino_rendimiento_model'));
	}


	public function index(){
		//if(esLogeado()):

			$aTar['idusuconsulta'] = $this->session->userdata('idusuario');

			$query = $this->contrato_model->buscar( 20 , 1 ); //

			#	scripts y estilos
			$scripts1 = array(  'script1'       => 'js/jgeneral.js?03112021',
								'script2'       => 'js/models/contrato.js?03112021',
								'script3'       => 'js/controllers/jcontrato.js?03112021',
								'script4'       => 'js/librerias/jForm.js?03112021',
								'script5'       => 'js/librerias/jFormBuscar.js?03112021'
							);

			#	setear la cabecera
			$head    = array(	'scripts'       => $scripts1 );

			/*enviar listado a la vista*/
			/*$data['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );*/
			$data['btn'] = $this->modulo_model->getLinkModuloUsuario( 31 );

			/*$data['listaSocio'] = $this->htmlListaSocio( $query , $this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'socio/detallar' ));*/

			$data['lista'] = $this->htmlLista( $query );

			$data = array_merge($data, $this->generarPaginacion( 20 , 1 , $query ) );

			$data['busqueda'] =	$this->busqueda();

			/**/
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('contrato/lista_view',$data);
			$this->load->view('foot_view');


			
		/*else:
			redirect(base_url());
		endif;*/
	}


	private function busqueda( ){
		
		$html = '';

		//if($this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/busqueda' )){

			$data1 = $this->getDataForm();
			$html  = $this->load->view('contrato/busqueda_view', $data1 , TRUE );
		//}

		return $html;
	}

	private function getDataForm(){

        $query1 = $this->tipocertificacion_model->listar(); 
        $query2 = $this->pais_model->getListarPais(); 
        $query3 = $this->contrato_model->getListarCondicionEmbarque();
        $query4 = $this->moneda_model->listar();  
        $query5 = $this->entidadcertificadora_model->listar(); 
        $query6 = $this->contrato_model->getListarUnidadMedida(); 
        $query7 = $this->estado_model->getListarEstado(); 
        $query8 = $this->calidad_model->getListarCalidad( null ); 

       
        $querys = array(
                 'aTipoCertificacion' 		=> $query1,
                 'aListaPais' 				=> $query2,
                 'aListaCEmbarque' 			=> $query3,
                 'aListaMoneda' 			=> $query4,
                 'aEntidadCertificadora' 	=> $query5,
                 'aListaUnidad' 			=> $query6,
                 'aListaEstado' 			=> $query7,
                 'aListaCalidad'			=> $query8
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
        'script3'       => 'js/controllers/jcontrato.js?03112021',
        'script4'       => 'js/models/contrato.js?03112021',
        'script5'       => 'js/librerias/jForm.js?03112021',
        'script6'       => 'js/librerias/jFormRegistrar.js?03112021',

         );

        #	setear la cabecera
        $head    = array( 'styles'=> $styles , 
                          'scripts'=> $scripts );

        $foot	= array( 'scripts'=> $scripts );	

        $querys =  $this->getDataForm();

        $querys['btn'] = $this->modulo_model->getLinkModuloUsuario( 3 );
        $querys['aCalculo'] = self::_aCalculo;
        $querys['aTipoEmpaque'] = self::_aTipoEmpaque;

        

        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );         
        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );   
        
        $title   = array( 'title' => ''); 
        //write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

        $this->load->view('head_view',$head);
        $this->load->view('encabezado_view', $title);
        $this->load->view('contrato/registrar_view',$querys);
        $this->load->view('modal_view');
		$this->load->view('foot_view');
	}


	

	public function guardarAjax(){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
				$this->load->library(array('archivo'));

				$this->form_validation->set_rules('txtnrocontrato', 'Nro Contrato', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtcliente', 'Id Cliente', 'required|trim|xss_clean');
				$this->form_validation->set_rules('fileAdjuntos', 'Archivo Adjunto', 'xss_clean|callback_validarTipoArchivo|callback_validarExtArchivo');

				set_message_form_validation($this);
				
				
				if ($this->form_validation->run())
				{ 
					
					$aContrato = array(
							'p_nro_contrato' 			=> $this->input->post('txtnrocontrato'),
							'p_fecha' 					=> convertirfecha($this->input->post('txtfeccontrato')),
							'p_id_cliente' 				=> $this->input->post('txtcliente'),
							'p_id_condicion_embarque' 	=> $this->input->post('cboCondEmbarque'),
							'p_fecha_embarque' 			=> convertirfecha($this->input->post('txtfecembarque')),
							'p_id_ciudad' 				=> $this->input->post('cboCiudad'),
							'p_id_tipo_contrato' 		=> $this->input->post('cboTipoContrato'),
							'p_id_moneda' 				=> $this->input->post('cboMoneda'),
							'p_precio' 					=> $this->input->post('txtPrecio'),
							'p_id_calculo' 				=> $this->input->post('cboCalculo'),
							'p_periodo_cosecha' 		=> $this->input->post('txtPeriodoCosecha'),
							'p_id_tipo_produccion' 		=> $this->input->post('cboTipoProduccion'),
							'p_id_sub_producto' 		=> $this->input->post('cboSubProducto'),
							'p_id_entidad_certificadora' => $this->input->post('cboEntidadcertificadora'),
							'p_id_tipo_certificacion' 	=> 0,
							'p_peso_contrato' 			=> $this->input->post('txtPesoContrato'),
							'p_id_unidad_medida' 		=> $this->input->post('cboUnidadMedida'),
							'p_id_empaque_tipo' 		=> $this->input->post('cboEmpaqueTipo'),
							'p_total_sacos' 			=> $this->input->post('txtTotalSacos'),
							'p_id_calidad' 				=> $this->input->post('cboCalidad'),
							'p_peso_saco_kg' 			=> $this->input->post('txtPesoSacoKg'),
							'p_id_grado' 				=> $this->input->post('cboGrado'),
							'p_peso_neto_kg' 			=> $this->input->post('txtPesoNetoKg'),
							'p_cantidad_defectos' 		=> $this->input->post('txtCantDefectos'),
							'p_observaciones' 			=> $this->input->post('txtobs'),
							'p_id_facturaren' 			=> $this->input->post('cboFacturar'),
							'p_fecha_fijacion' 			=> convertirfecha($this->input->post('txtfecfijacioncontrato')),
							'p_kg_qq' 					=> $this->input->post('txtKgNetoQQ'),
							'p_kg_lb' 					=> $this->input->post('txtKgNetoLB'),
							'p_id_estado_fijacion' 		=> $this->input->post('cboEstFijacion'),
							'p_precio_nivel_fijacion' 	=> $this->input->post('txtPrecioNivelFijacion'),
							'p_diferencial' 			=> $this->input->post('txtDiferencial'),
							'p_nota_credito' 			=> $this->input->post('txtNotaCredito'),
							'p_gastos_exp' 				=> $this->input->post('txtGastosExp'),
							'p_pu_total_a' 				=> $this->input->post('txtPuTotala'),
							'p_pu_total_b' 				=> $this->input->post('txtPuTotalb'),
							'p_pu_total_c' 				=> $this->input->post('txtPuTotalc'),
							'p_total_facturar_1' 		=> $this->input->post('txtFacturar1'),
							'p_total_facturar_2' 		=> $this->input->post('txtFacturar2'),
							'p_total_facturar_3' 		=> $this->input->post('txtFacturar3'),
							'usureg'					=> 1
					);



					$rContrato = $this->contrato_model->insert($aContrato);
					if(isset($rContrato[0]['result'])):
						if($rContrato[0]['result'] == 1 ): //si esxiste el id

							$result["estado"] 	= 1;		
					     	$result["mensaje"] 	= 'Se registró correctamente';
					     	$result["result"] 	= array( 	'codigo' => $rContrato[0]['pid1']   );
					     	$result["archivo"]  = array();


					     	$certificacion = $this->input->post('cboTipocertificacion');

					     	foreach ($certificacion as $key => $value) {
					     		$aCC = array(
					     			'p_id_contrato' => $rContrato[0]['pid1'],
					     			'p_id_tipocertificacion' => $value
					     		);

					     		$resultCC = $this->contrato_model->insertContratoCertificacion($aCC);
					     		
					     	}

					     	if( $rContrato[0]['pid1']!==null && isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0 ):
								$result["archivo"] = $this->archivo->guardarAdjuntos( 'fileAdjuntos' , $rContrato[0]['pid1'] , 'contrato' );

								if(isset($result["archivo"]['error'][0])){
										$result["estado"] 	= 7;		
					   	 				$result["mensaje"] 	= 'Ocurrió un error al intentar grabar el Archivo.<br>'.$result["archivo"]['error'][0];
					    				$result["result"] 	= array( 'error' => $result["archivo"]['error']);

					    				$this->contrato_model->deleteContrato($rContrato[0]['pid1']);
									}
							endif;

						else:
					    	$result["estado"] 	= 3;		
					   	 	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar el Contrato';
					    	$result["result"] 	= array();
						endif;
					else:
						$result["estado"] 	= 3;		
					    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar el Contrato';
					    $result["result"] 	= array();
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
				
				$this->form_validation->set_rules('txtnrocontrato', 'codigo', 'trim|xss_clean');
				$this->form_validation->set_rules('txtfeccontrato', 'tipocliente', 'trim|xss_clean');
				$this->form_validation->set_rules('cboTipoContrato', 'ruc', 'trim|xss_clean');
				$this->form_validation->set_rules('txtcodigocliente', 'razon', 'trim|xss_clean');
				$this->form_validation->set_rules('txtrazon', 'direccion', 'trim|xss_clean');
				$this->form_validation->set_rules('cboProducto', 'Pais', 'trim|xss_clean');
				$this->form_validation->set_rules('cboTipoProduccion', 'Ciudad', 'trim|xss_clean');
				$this->form_validation->set_rules('cboCalidad', 'Ciudad', 'trim|xss_clean');
				$this->form_validation->set_rules('cboListaEstado', 'estado', 'trim|xss_clean');


				if ($this->form_validation->run())
				{ 
					$aArray = array(
						'p_nro_contrato' 			=> $this->input->post('txtnrocontrato'),
					    'p_fecha_contrato' 			=> $this->input->post('txtfeccontrato'),
						'p_id_tipo_contrato'		=> $this->input->post('cboTipoContrato'),
						'p_codigo_cliente'			=> $this->input->post('txtcodigocliente'),
						'p_razon_social'			=> $this->input->post('txtrazon'),
						'p_id_tipo_producto'		=> $this->input->post('cboProducto'),
						'p_id_tipo_produccion'		=> $this->input->post('cboTipoProduccion'),
						'p_id_calidad'				=> $this->input->post('cboCalidad'),
						'p_estado'					=> $this->input->post('cboListaEstado')

					);


					$cantFilas = $this->input->post('value');
					$pagina = 	 $this->input->post('value1');

					$query1 = $this->contrato_model->buscar( $cantFilas , $pagina , $aArray);
					
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
					$html .= '<a href="'.base_url().'contrato/detallar/'.$l['id_contrato'].'" id="'.$l['id_contrato'].'" title="MÁS DETALLES">'.$l['nro_contrato'].'</a></div>';
				else
					$html .= $l['codigo'].'</div>';

			    $html .= '<div class="col-1">'.$l['fecha'].'</div>
					    <div class="col-1">'.$l['tipo_contrato'].'</div>
					    <div class="col-1">'.$l['codigo_cliente'].'</div>
						<div class="col-2">'.$l['razon_social'].'</div>
						<div class="col-2">'.$l['tipo_producto'].'</div>
						<div class="col-2">'.$l['tipo_produccion'].'</div>
						<div class="col-1">'.$l['calidad'].'</div>
						<div class="col-1">'.$l['estado'].'</div>
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
		        //'script2'		=> 'js/jgeneral.js',  
				/*'script3'       => 'js/finca/jmodificar.js',*/
				'script3'		=> 'js/controllers/jcontrato.js',
				'script4'		=> 'js/models/contrato.js',
				'script5'		=> 'js/librerias/jFormModificar.js'
			);

	        #	setear la cabecera
        	$head    = array( 'scripts'=> $scripts );

			#variables
			$query1 = $this->contrato_model->getContrato( $id );
			//$query2 = $this->estado_model->getListarEstado(); 
			$query3 = $this->adjunto_model->listar( array( 'p_id_tabla'=> $id, 'p_tabla'=> 'contrato' ) );	
			$array = self::_aCalculo;
			$array1 = self::_aTipoEmpaque;
			
			$array_temp = array('calculo'=> '' , 'empaque_tipo'=> '' ) ;

			if($query1[0]['id_calculo'] !== null)
				$array_temp['calculo'] = $array[$query1[0]['id_calculo']];

			if($query1[0]['id_empaque_tipo'] !== null)
				$array_temp['empaque_tipo'] = $array1[$query1[0]['id_empaque_tipo']];
			
			$query_final = array_merge( $query1[0] , $array_temp );
			 
			

			$data = array(
							'aContrato'			=> $query_final,
							'aPergaRendimiento' => $this->pergamino_rendimiento_model->listar(),
							'aAdjunto'			=> $query3,
							'aAsignado'			=> $this->contrato_model->validarExisteAsignacionContrato( $id ),
							/*'aAsignar'			=> $this->contrato_model->listarxIdContrato( $id )*/
			);
			
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('contrato/detalle_view',$data);
			$this->load->view('modal_view', $data);
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
			
			$this->form_validation->set_rules('cboEstadoFijacion', 'Estado', 'required|trim|xss_clean|is_natural_no_zero');

			//MENSAJES DE REGLAS DE FORMULARIO
			set_message_form_validation($this);


			if ($this->form_validation->run())
			{ 
				$aArray = array(
						'idcontrato' 		=> $this->input->post('txtId',TRUE),
						'idestadofijacion' 	=> $this->input->post('cboEstadoFijacion',TRUE),
						'usureg'			=> 1
				);

				$resultado 	= $this->contrato_model->actualizarEstadoFijacion($aArray);
		
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
				    $result["mensaje"] 	= 'Ocurrió un error al intentar actualizar.';
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

	public function actualizarAsignarAjax(){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
				$this->load->library(array('archivo'));

				$this->form_validation->set_rules('txtIdContrato', 'Contrato', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtPesoNetoKg2', 'Peso Neto Kg (Oro)', 'required|trim|xss_clean');
				$this->form_validation->set_rules('cbokgpergamino', 'Pergamino | ¨Porcentaje', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtpesonetoqq', 'Peso Neto QQ', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txttotalkgpergamino', 'Total Pergamino', 'required|trim|xss_clean');

				set_message_form_validation($this);
				
				
				if ($this->form_validation->run())
				{ 
					
					$aAsignarContrato = array(
							'p_id_contrato' 			=> $this->input->post('txtIdContrato'),
							'p_id_pergamino_rendimiento'=> $this->input->post('cbokgpergamino'),
							'p_total_kg_pergamino'		=> $this->input->post('txttotalkgpergamino'),
							'usumod'					=> 1
					);

					$rArray = $this->contrato_model->updateAsignarContrato($aAsignarContrato);
					//print_r($rArray);
					

					if(isset($rArray[0]['result'])):
						if($rArray[0]['pid1'] > 0 ): //si esxiste el id

							$result["estado"] 	= 1;		
					     	$result["mensaje"] 	= 'Se registró correctamente';
					     	$result["result"] 	= array( 	'codigo' => $rArray[0]['pid1']   );

						else:
					    	$result["estado"] 	= 3;		
					   	 	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar el Contrato';
					    	$result["result"] 	= array();
						endif;
					else:
						$result["estado"] 	= 3;		
					    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar el Contrato';
					    $result["result"] 	= array();
					endif;
				}
				else{
					$result = validation_errors_parse(validation_errors());
						
				}

				echo json_encode($result);

		endif;

	}








}
