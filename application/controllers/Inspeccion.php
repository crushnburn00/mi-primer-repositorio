<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Dompdf\Dompdf;

class Inspeccion extends CI_Controller {

	/*
	*	Funcion @construct
	* 	Invocado por la clase Inicio
	*	Carga los helper del formulario
	*	Parametros :  No
	*	Sin retorno
	*/
	const _aVariedadCafe = array(
							1 => 'CATIMOR', 
							2 => 'CATURRA', 
							3 => 'PACHE',
							4 => 'CATUAI',
							5 => 'BORBON',
							6 => 'TIPICA',
							7 => 'CASTILLA',
							8 => 'COSTA RICA',
							9 => 'GRAN COLOMBIA',
							10 => 'GEYSHA',
							11 => 'LIMANI'
	);


	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','security','utilitario_helper','cookie'));
		$this->load->library(array('paginacion'));
		$this->load->model(array('finca_model','modulo_model','adjunto_model','inspeccion_model','estado_model','pregunta_model','personal_model'));
	}


	public function listar( $id ){
		//if(esLogeado()):
			$query = $this->inspeccion_model->buscar( 20 , 1 , array( 'p_id_finca' => $id) ); //		
			$queryfinca = $this->finca_model->buscar( 20 , 1 , array( 'p_id' => $id)); //
			
			#	scripts y estilos
			$scripts1 = array(  /*'script0'       => 'js/jfuncion.js',*/
								'script1'       => 'js/jgeneral.js',
								'script2'       => 'js/models/inspeccion.js?24112021',
								'script3'       => 'js/controllers/jinspeccion.js?24112021',
								'script4'       => 'js/librerias/jForm.js?24112021',
								'script5'       => 'js/librerias/jFormBuscar.js?24112021'
							);

			#	setear la cabecera
			$head    = array(	'scripts'       => $scripts1 );

			/*enviar listado a la vista*/
			/*$data['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );*/
			$data['btn'] = $this->modulo_model->getLinkModuloUsuario( 18 );

			/*$data['listaProductor'] = $this->htmlLista( $query , $this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/detallar' ));*/

			$data['lista'] = $this->htmlLista( $query );

			$data = array_merge($data, $this->generarPaginacion( 20 , 1 , $query ) );

			$data['busqueda'] =	$this->busqueda( $id );
			$data['finca'] = $queryfinca[0];
			

			/**/
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('inspeccion/lista_view',$data);
			$this->load->view('foot_view');


			
		/*else:
			redirect(base_url());
		endif;*/
	}


	private function busqueda( $id ){
		
		$html = '';

		//if($this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/busqueda' )){

			$data1 = $this->getDataForm();
			$data1['idinspeccion'] = $id;
			$html  = $this->load->view('inspeccion/busqueda_view', $data1 , TRUE );
		//}

		return $html;
	}

	private function getDataForm( $id = 0 ){
        $query2 = $this->estado_model->getListarEstado(); 

        $querys = array(
                'aListaEstado' 	=> $query2
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
		'script3'       => 'js/models/inspeccion.js?24112021',
		'script4'       => 'js/controllers/jinspeccion.js?24112021',
		'script5'       => 'js/librerias/jFormRegistrar.js?24112021',
		'script6'       => 'js/librerias/jForm.js?24112021',
         );

        #	setear la cabecera
        $head    = array( 'styles'=> $styles , 
                          'scripts'=> $scripts );

        $foot	= array( 'scripts'=> $scripts );	

        $querys = array_merge( $this->getDataForm(), $this->getDataFormRegistro($id)); //

        $querys['btn'] = $this->modulo_model->getLinkModuloUsuario( 3 );
       
        $querys['aListaInspector'] = $this->personal_model->listarPersonal( 'INSPECTOR' );
       
        

        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );         
        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );   
        
        $title   = array( 'title' => ''); 
        //write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

        $this->load->view('head_view',$head);
        $this->load->view('encabezado_view', $title);
        $this->load->view('inspeccion/registrar_view',$querys);
        $this->load->view('modal_view');
		$this->load->view('foot_view');
	}

	private function getDataFormRegistro( $id ){
		$querys['aFinca'] = $this->finca_model->buscar( 1 , 1 , array( 'p_id' => $id)); //
		$querys['aDatoGeneral'] = $this->inspeccion_model->getDatoGeneralInspeccion( $id );
		$querys['aCuestionario1'] = $this->pregunta_model->listarPregunta('sistema_de_gestion_documentado');
        $querys['aCuestionario2'] = $this->pregunta_model->listarPregunta('bienestar_social_laboral');
        $querys['aCuestionario3'] = $this->pregunta_model->listarPregunta('conservacion_ecosistemas');
        $querys['aCuestionario4'] = $this->pregunta_model->listarPregunta('cultivo_residuos');

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

			
				$this->form_validation->set_rules('cboInspector', 'Inspector Interno', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('txtFecInspeccion', 'Fecha Inspeccion', 'required|trim|xss_clean|callback_validarFormatoFecha|callback_validarFecha');

				$this->form_validation->set_rules('txtItemCumplido', 'Item Cumplidos', 'required|trim|xss_clean|is_natural');
				$this->form_validation->set_rules('txtItemAplica', 'Item Aplica', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('txtPorcentajeItem', 'Porcentaje de Item', 'required|trim|xss_clean|numeric');

				$this->form_validation->set_rules('fileAdjuntos', 'Documentos Adjuntos', 'xss_clean|callback_validarTipoArchivoAdjunto|callback_validarExtArchivoAdjunto');


				set_message_form_validation($this);
				
				
				if ($this->form_validation->run())
				{ 
					$aInspeccion = array(
							'p_id_inspector_interno' 	=> $this->input->post('cboInspector'),
							'p_fec_inspeccion' 			=> $this->convertirfecha($this->input->post('txtFecInspeccion')),
							'p_estandarNOP'				=> $this->input->post('estandarNOP'),
							'p_estandarCEE'				=> $this->input->post('estandarCEE'),
							'p_estandarJAS'				=> $this->input->post('estandarJAS'),
							'p_estandarperuDS'			=> $this->input->post('estandarperuDS'),
							'p_estandarbioSuisse'		=> $this->input->post('estandarbioSuisse'),
							'p_estandarRAS'				=> $this->input->post('estandarRAS'),
							'p_estandarUTZ'				=> $this->input->post('estandarUTZ'),
							'p_estandarFairtrade'		=> $this->input->post('estandarFairtrade'),
							'p_estandarCAFE'			=> $this->input->post('estandarCAFE'),
							'p_estandarNaturland'		=> $this->input->post('estandarNaturland'),
							'p_cant_item_cumplido' 		=> $this->input->post('txtItemCumplido'),
							'p_cant_item_aplica' 		=> $this->input->post('txtItemAplica'),
							'p_porcentaje_cumplimiento' => $this->input->post('txtPorcentajeItem'),
							'p_exclusion_programa' 		=> $this->input->post('chkExclusionPrograma'),
							'p_suspension_dias'			=> $this->input->post('chksuspensionDias'),
							'p_tiempo_suspension' 		=> $this->input->post('txtTiempoSuspension'),
							'p_levantar_no_confor' 		=> $this->input->post('chkLevantarNoconf'),
							'p_aprueba_sin_condicion' 	=> $this->input->post('chkAprueba'),
							'p_id_finca'				=> $this->input->post('txtid'),
							'usureg'					=> 1
					);

					$rInspeccion = $this->inspeccion_model->insert($aInspeccion);
					$id = null;
					//print_r($rInspeccion);

					if(isset($rInspeccion[0]['pid1'])):
							$result["estado"] 	= 1;		
					     	$result["mensaje"] 	= 'Se registró correctamente';
					     	$result["result"] 	= array( 	'codigo' => $rInspeccion[0]['p_codigo']   );
					     	$id = $rInspeccion[0]['pid1'];

					     	$totalParcela = $this->input->post('txtidparcela');

					     	for ($i=0; $i <= $totalParcela; $i++) { 

									$aParcela['p_id_inspeccion'] 			= $id;
									$aParcela['p_mes_cosecha'] 				= $this->input->post('txtinputParcela2_'.$i);
									$aParcela['p_año_mes_siembra'] 			= $this->input->post('txtinputParcela3_'.$i);
									$aParcela['p_edad']						= $this->input->post('txtinputParcela4_'.$i);
									$aParcela['p_area_total']				= $this->input->post('txtinputParcela5_'.$i);
									$aParcela['p_cosecha_perg_anio_actual']	= $this->input->post('txtinputParcela6_'.$i);
									$aParcela['p_estimado_perg_anio_prox']	= $this->input->post('txtinputParcela7_'.$i);
									
									$rParcela = $this->inspeccion_model->insertInspeccionParcela($aParcela);

									if(isset($rParcela[0]['error'])):
										$result["estado"] 	= 3;		
									    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar la inspeccion.Dirigase al modulo de actualización.<br>';
									    $result["mensaje"] 	.=  $rParcela[0]['error'];
									else:
										$aCafe = $this->input->post('chkParcela_'.$i);
										
										foreach ($aCafe as $key => $value) {
											$aParcelaCafe['p_id_inspeccion_parcela'] = $rParcela[0]['pid1'];
											$aParcelaCafe['p_id_variedadcafe'] = $value;
											$rParcelaCafe = $this->inspeccion_model->insertParcelaCafe($aParcelaCafe);
										
											if(isset($rParcelaCafe[0]['error'])):
												$result["estado"] 	= 3;		
											    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar la inspeccion.Dirigase al modulo de actualización.<br>';
											    $result["mensaje"] 	.=  $rParcelaCafe[0]['error'];
											endif;
										}
									endif;	
					     			
							}


					     	$totalPreguntas = $this->input->post('txtTotalPregunta');

							for ($i=0; $i < $totalPreguntas; $i++) { 
								if($this->input->post('radPregunta_'.$i)!==null):
									$aPregunta['p_id_pregunta'] 	= $this->input->post('txtidPregunta_'.$i);
									$aPregunta['p_estado_pregunta'] = $this->input->post('radPregunta_'.$i);
									$aPregunta['p_obs_pregunta']	= $this->input->post('txtObsPregunta_'.$i);
									$aPregunta['p_id_inspeccion'] 	= $id;

									$rPregunta = $this->inspeccion_model->insertInspeccionNormas($aPregunta);

									if(isset($rPregunta[0]['error'])):
										$result["estado"] 	= 3;		
									    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar la inspeccion.Dirigase al modulo de actualización.<br>';
									    $result["mensaje"] 	.=  $rPregunta[0]['error'];
									endif;	
					     			

								endif;
							}

							$totalManifiesto = $this->input->post('txtidmanifiesto');

							for ($i=0; $i <= $totalManifiesto; $i++) { 
								if($this->input->post('txtinputManifiesto1_'.$i)!==null && $this->input->post('txtinputManifiesto1_'.$i)!="" ):
									$aManifiesto['p_manifiesto'] 		= $this->input->post('txtinputManifiesto1_'.$i);
									$aManifiesto['p_id_inspeccion'] 	= $id;

									$rManifiesto = $this->inspeccion_model->insertInspeccionNoConformidad($aManifiesto);

									if(isset($rManifiesto[0]['error'])):
											$result["estado"] 	= 3;		
										    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar la inspeccion.Dirigase al modulo de actualización.<br>';
										    $result["mensaje"] 	.=  $rManifiesto[0]['error'];
									endif;
								endif;
							}


							$totalLevantarNC = $this->input->post('txtidconformidad');

							for ($i=0; $i <= $totalLevantarNC; $i++) { 
								if($this->input->post('txtinputConformidad1_'.$i)!==null && $this->input->post('txtinputConformidad1_'.$i)!="" ):
									$aLevantNC['p_id_inspeccion'] 		= $id;
									$aLevantNC['p_punto_control'] 		= $this->input->post('txtinputConformidad1_'.$i);
									$aLevantNC['p_no_conformidad'] 		= $this->input->post('txtinputConformidad2_'.$i);
									$aLevantNC['p_accion_correctiva'] 	= $this->input->post('txtinputConformidad3_'.$i);
									$aLevantNC['p_plazo_levantamiento'] = $this->input->post('txtinputConformidad4_'.$i);
									$aLevantNC['p_cumplio'] 			= $this->input->post('txtinputConformidad5_'.$i);

									$rLevantNC = $this->inspeccion_model->insertInspeccionLevantarNoConf($aLevantNC);

									if(isset($rLevantNC[0]['error'])):
											$result["estado"] 	= 3;		
										    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar la inspeccion.Dirigase al modulo de actualización.<br>';
										    $result["mensaje"] 	.=  $rLevantNC[0]['error'];
									endif;
								endif;
							}


							if($id!==null && isset($_FILES['fileAdjuntos']) && strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0):
								$result["archivo_docadj"] = $this->archivo->guardarAdjuntos( 'fileAdjuntos' , $id , 'inspeccion' , '');
								//print_r($result["archivo_docadj"]);
								if(isset($result["archivo_docadj"]["error"][0])):
											$result["estado"] 	= 3;		
										    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar la inspeccion.Dirigase al modulo de actualización.<br>';
										    $result["mensaje"] 	.=  $result["archivo_docadj"]["error"][0];

								endif;

							endif;

					else:
						$result["estado"] 	= 3;		
					    $result["mensaje"] 	= 'Ocurrió un error al intentar registrar la inspeccion<br>';
					    $result["mensaje"] 	.=  $rInspeccion[0]['error'];
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
      					'p_codigo'  => $this->input->post('txtcodigo'),
						'p_fecha_ini' => $this->input->post('txtFecIni'),
						'p_fecha_fin' => $this->input->post('txtFecFin'),
						'p_estado' => $this->input->post('cboEstado')	
					);

					$cantFilas = $this->input->post('value');
					$pagina = 	 $this->input->post('value1');

					$query1 = $this->inspeccion_model->buscar( $cantFilas , $pagina , $aFinca);
					
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
					$html .= '<a href="'.base_url().'inspeccion/detallar/'.$l['id_inspeccion'].'" id="'.$l['id_inspeccion'].'" title="MÁS DETALLES">'.$l['codigo'].'</a></div>';
				else
					$html .= $l['codigo'].'</div>';

			    $html .= '
			    		<div class="col-4">'.$l['fec_registro'].'</div>
					    <div class="col-4">'.$l['estado_inspeccion'].'</div>
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
		        'script3'       => 'js/models/inspeccion.js',
				'script4'       => 'js/controllers/jinspeccion.js',
				'script5'       => 'js/librerias/jFormModificar.js'
	         );

	        #	setear la cabecera
        	$head    = array( 'scripts'=> $scripts );


			#variables
			$query1 = $this->inspeccion_model->getInspeccion( $id );	
			$query2 = $this->estado_model->getListarEstado(); 
			$query3 = $this->adjunto_model->listar( array( 'p_id_tabla'=> $id, 'p_tabla'=> 'inspeccion' ) );
			$query4 = $this->inspeccion_model->getDatoGeneralInspeccion( $query1[0]['id_finca'] );
			$query5 = $this->inspeccion_model->getInspeccionLevantarNoConf( $id );
			$query6 = $this->inspeccion_model->getInspeccionNoConformidad( $id );
			$query7 = $this->inspeccion_model->getInspeccionParcela( $id );


			$data = array(
							'aInspeccion'	=>	$query1[0],
							'aListaEstado'	=>  $query2,
							'aAdjunto'		=>  $query3,
							'aDatoGeneral'	=>  $query4[0],
							'aInspeccionLNC'=>  $query5,
							'aInspeccionNC'	=>  $query6,
							'aInspeccionP'  => $query7
			);

			$data['aCuestionario1'] = $this->inspeccion_model->getInspeccionNormas($id,'sistema_de_gestion_documentado');
       		$data['aCuestionario2'] = $this->inspeccion_model->getInspeccionNormas($id,'bienestar_social_laboral');
        	$data['aCuestionario3'] = $this->inspeccion_model->getInspeccionNormas($id,'conservacion_ecosistemas');
        	$data['aCuestionario4'] = $this->inspeccion_model->getInspeccionNormas($id,'cultivo_residuos');

			
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('inspeccion/detalle_view',$data);
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
						'idinspeccion' 		=> $this->input->post('txtIdInspeccion',TRUE),
						'idestado' 			=> $this->input->post('cboEstado',TRUE),
						'usureg'			=> 1
				);

				$resultado 	= $this->inspeccion_model->actualizar($aArray);
		
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

	public function convertirfecha( $fecha ){
		$fec = explode("/", $fecha);
		return $fec[2]."-".$fec[1]."-".$fec[0];
	}

	public function getVariedadCafe(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result['aVariedadCafe'] = self::_aVariedadCafe;
			$result['aVariedadCafe'][0] = '';
			$result['aTamaño'] = sizeof($result['aVariedadCafe']);
			echo json_encode($result);
		endif;
	}


	public function visualizarPDF( $id , $bImprimirAuto = 'N' ){
		$this->load->helper(array('pdf_helper'));

		$datos = $this->getDataFormRegistro($id); //
		//print_r($datos['aDatoGeneral'][0]['codigo_productor']);

		
		$vAccion = 0 ; //mostrar
		include APPPATH . 'third_party/dompdf/autoload.inc.php';
		
		$content = generarHTMLPdfInspeccion( $datos , $bImprimirAuto );
		$name = 'Plantilla_Inspeccion.pdf';

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
