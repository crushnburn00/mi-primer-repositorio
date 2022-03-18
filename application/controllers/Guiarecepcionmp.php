<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GuiaRecepcionMP extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','security','utilitario_helper','cookie'));
		$this->load->library(array('paginacion'));
		$this->load->model(array('contrato_model','modulo_model','guiarecepcionmp_model','tipodocumento_model','','','','','estado_model','','','','',''));
	}


	public function index(){
		//if(esLogeado()):

			$aTar['idusuconsulta'] = $this->session->userdata('idusuario');

			$query = $this->guiarecepcionmp_model->buscar( 20 , 1 ); //

			#	scripts y estilos
			$scripts1 = array(  'script1'       => 'js/jgeneral.js?03112021',
								'script2'       => 'js/models/guiarecepcionmp.js?03112021',
								'script3'       => 'js/controllers/jguiarecepcionmp.js?03112021',
								'script4'       => 'js/librerias/jForm.js?03112021',
								'script5'       => 'js/librerias/jFormBuscar.js?03112021'
							);

			#	setear la cabecera
			$head    = array(	'scripts'       => $scripts1 );

			/*enviar listado a la vista*/
			/*$data['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );*/
			$data['btn'] = $this->modulo_model->getLinkModuloUsuario( 39 );

			/*$data['listaSocio'] = $this->htmlListaSocio( $query , $this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'socio/detallar' ));*/

			$data['lista'] = $this->htmlLista( $query );

			$data = array_merge($data, $this->generarPaginacion( 20 , 1 , $query ) );

			$data['busqueda'] =	$this->busqueda();

			/**/
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('guiarecepcion/lista_view',$data);
			$this->load->view('foot_view');


			
		/*else:
			redirect(base_url());
		endif;*/
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
					$html .= '<a href="'.base_url().'guiarecepcionmp/detallar/'.$l['id_guiarecepcion_mp'].'" id="'.$l['id_guiarecepcion_mp'].'" title="MÁS DETALLES">'.$l['codigo_guia'].'</a></div>';
				else
					$html .= $l['codigo_guia'].'</div>';

			    $html .= '<div class="col-1">'.$l['codigo_socio'].'</div>
					    <div class="col-1">'.$l['desc_tipo_documento'].'</div>
					    <div class="col-1">'.$l['nro_documento'].'</div>
						<div class="col-4">'.$l['nombre_razon'].'</div>
						<div class="col-2">'.$l['fec_registro'].'</div>
						<div class="col-2">'.$l['estado_guiarecepcionmp'].'</div>
						</div>';
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

	private function busqueda( ){
		
		$html = '';

		//if($this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/busqueda' )){

			$data1 = $this->getDataForm();
			$html  = $this->load->view('guiarecepcion/busqueda_view', $data1 , TRUE );
		//}

		return $html;
	}

	private function getDataForm(){

        $query7 = $this->estado_model->getListarEstadoxTipo( 'formulario' ); 
      
        $querys = array(
                 'aListaEstado' 	=> $query7,
                 'aListaTipoDoc' 	=> $this->tipodocumento_model->getListarTipoDocumento()
        );

        return $querys;

    }

    public function validarRegistro(){
    	if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			$result_sql = $this->contrato_model->validarAsignacionContratoGuia();

				if( !$result_sql[0]['p_result'] ):
					$result["estado"] 	= 1;		
					$result["mensaje"] 	= 'Validacion Correcta';
					$result["result"] 	= $result_sql[0];
				else:
				    $result["estado"] 	= 2;		
				    $result["mensaje"] 	= 'No validado';
				    $result["result"] 	= array();
			    endif;


			//endif;
			echo json_encode($result);

		endif;

    	

    }

    public function registrar(){
		        #	scripts y estilos
        $styles = array( );

         /*LLAMA ACÁ LOS QUERYS.JS*/
        $scripts = array(
        'script1'		=> 'js/librerias/bootstrap.min.js',
        'script2'		=> 'js/librerias/bootstrap.bundle.min.js',
        'script3'       => 'js/controllers/jguiarecepcionmp.js?03112021',
        'script4'       => 'js/models/guiarecepcionmp.js?03112021',
        'script5'       => 'js/librerias/jForm.js?03112021',
        'script6'       => 'js/librerias/jFormRegistrar.js?03112021',

         );

        #	setear la cabecera
        $head    = array( 'styles'=> $styles , 
                          'scripts'=> $scripts );

        $foot	= array( 'scripts'=> $scripts );

        $ac = $this->contrato_model->validarAsignacionContratoGuia();
        if(!$ac[0]['p_result']):
	        $querys =  $this->getDataForm();

	        $querys['btn'] = $this->modulo_model->getLinkModuloUsuario( 40 );
	        $querys['saldoAsignarContrato'] = $this->guiarecepcionmp_model->getSaldoAsignarContrato();
	        /*$querys['aCalculo'] = self::_aCalculo;
	        $querys['aTipoEmpaque'] = self::_aTipoEmpaque;*/
	  
	        
	        $title   = array( 'title' => ''); 
	        //write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

	        $this->load->view('head_view',$head);
	        $this->load->view('encabezado_view', $title);
	        $this->load->view('guiarecepcion/registrar_view',$querys);
	        $this->load->view('modal_view');
			$this->load->view('foot_view');
		endif;
	}

	public function buscarProductorAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):
				$this->load->model(array('socio_model','finca_model'));

				$aProductor = array(
					'p_nro_documento' 		=> $this->input->post('txtdocidentidad' , TRUE )
				);

				$result_sql = $this->socio_model->buscarSocio( 1 , 1 , $aProductor);
				

				if( count($result_sql) >= 1 ):
					$result_sql1 = $this->finca_model->buscar( 20 , 1 , array( 'p_id_socio' => $result_sql[0]['id_socio']) ); //

					if( count($result_sql1) >= 1 ):

						$result["estado"] 	= 1;		
						$result["mensaje"] 	= 'Encontrado';
						$result["result"] 	= $result_sql[0];
						$result["result"]['finca'] 	= $result_sql1;
					else:
						$result["estado"] 	= 3;		
						$result["mensaje"] 	= '* Socio no tiene fincas registradas';
						$result["result"] 	= $result_sql[0];
						$result["result"]['finca'] 	= $result_sql1;
					endif;	


				else:
				    $result["estado"] 	= 2;		
				    $result["mensaje"] 	= '* El documento no está registrado';
				    $result["result"] 	= array();
			    endif;


			//endif;
			echo json_encode($result);

		endif;
	}

	public function validarSaldoAsignarContrato( $campo ){

		$saldo = $this->guiarecepcionmp_model->getSaldoAsignarContrato();

		if($saldo[0]['p_saldo_total_kg']>=$campo)
			return false;
		else
			return true;
	}


	public function guardarAjax( $bRespuesta = false, $bCerrar = false ){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
				$this->form_validation->set_rules('txtdocidentidad', 'Documento de Identidad', 'required|trim|xss_clean');
				$this->form_validation->set_rules('cboTipo', 'Tipo', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtidsocio', 'Socio', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtidcontrato', 'Contrato', 'required|trim|xss_clean');
				$this->form_validation->set_rules('cboFinca', 'Finca', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('cboProducto', 'Producto', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('txtfeccosecha', 'Fecha Cosecha', 'required|trim|xss_clean');
				$this->form_validation->set_rules('cboTipoProduccion', 'Tipo Produccion', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('cboTipoEmpaque', 'tipo Empaque', 'required|trim|xss_clean|is_natural_no_zero');
				$this->form_validation->set_rules('txtcantidad', 'Cantidad', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txttotalkgbr', 'Total Kilos Brutos', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txttara', 'Tara', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txttotalkgnetos', 'Total de Kilos Netos', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtobspesaje', 'Observaciones', 'trim|xss_clean');
				$this->form_validation->set_rules('cboTipo', 'Tipo', 'trim|xss_clean|is_natural_no_zero');

				set_message_form_validation($this);
				
				if ($this->form_validation->run())
				{ 
					
					$saldo = $this->guiarecepcionmp_model->getSaldoAsignarContrato();
					$saldo_kg = $saldo[0]['p_saldo_total_kg']-$this->input->post('txttotalkgnetos');
					
					if( ($saldo_kg>=0 && $this->input->post('cboTipoProduccion')==1) || $this->input->post('cboTipoProduccion')!=1 ){
						if( !$bRespuesta && (
							($saldo_kg == 0 && $this->input->post('cboTipoProduccion')==1) || 
							($saldo[0]['p_saldo_total_kg'] == 0 && $this->input->post('cboTipoProduccion')!=1)) 
							){
							$result["estado"] 	= -1;		
							$result["mensaje"] 	= 'LA GUIA YA CUBRIÓ EL SALDO PENDIENTE. DESEA CERRAR EL CONTRATO?';
							$result["result"] 	= array( 
								'btnSi' => '<button type="submit" id="btnGuardarCerrar" value="GuardarCerrar" name="btnGuardarCerrar" class="btn btn-sm btn-effect-success btn-block"> CERRAR CONTRATO </button>',
								'btnNo' => '<button type="submit" id="btnGuardarContinuar" value="GuardarContinuar" name="btnGuardarContinuar" class="btn btn-sm btn-secondary btn-block"> CONTINUAR CREANDO OTRA GUIA </button>');
							
						}else{
							$aArray = array(
									'p_id_socio' 			=> $this->input->post('txtidsocio'),
									'p_id_contrato' 		=> $this->input->post('txtidcontrato'),
									'p_id_finca' 			=> $this->input->post('cboFinca'),
									'p_id_producto'			=> $this->input->post('cboProducto'),
									'p_id_sub_producto'		=> $this->input->post('cboSubProducto'),
									'p_fecha_cosecha'		=> convertirfecha($this->input->post('txtfeccosecha')),
									'p_id_tipo_produccion'	=> $this->input->post('cboTipoProduccion'),
									'p_id_empaque_pesaje'	=> $this->input->post('cboTipoEmpaque'),
									'p_cant_pesaje'			=> $this->input->post('txtcantidad'),
									'p_total_kg_br_pesaje'  => $this->input->post('txttotalkgbr'),
									'p_tara_pesaje'			=> $this->input->post('txttara'),
									'p_total_kg_neto_pesaje'=> $this->input->post('txttotalkgnetos'),
									'p_observaciones'		=> $this->input->post('txtobspesaje'),						
									'p_id_tipo'				=> $this->input->post('cboTipo'),
									'p_saldo_pendiente'		=> $saldo[0]['p_saldo_total_kg'],
									'p_cerrar'				=> $bCerrar,
									'usureg'				=> 1
							);

							$rArray = $this->guiarecepcionmp_model->insert($aArray);
							//print_r($rArray);

							if(isset($rArray[0]['pid1'])):
								if($rArray[0]['pid1'] >= 1 ): //si esxiste el id

									$result["estado"] 	= 1;		
							     	$result["mensaje"] 	= 'Se registró correctamente';
							     	$result["result"] 	= array( 	'codigo' => $rArray[0]['pid1']   );

								else:
							    	$result["estado"] 	= 2;		
							   	 	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la Guía';
							    	$result["result"] 	= array();
								endif;
							else:
								if(isset($rArray[0]['error'])):
									$result["estado"] 	= 3;		
							    	$result["mensaje"] 	= $rArray[0]['error'];
							    	$result["result"] 	= array();
							    else:
							    	$result["estado"] 	= 4;		
							    	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la Guía';
							    	$result["result"] 	= array();
							    endif;

							endif;
						}

					}else{
						$result["estado"] 	= 5;		
						$result["mensaje"] 	= 'El Total Kilos Neto debe ser menor o igual al saldo.';
						$result["result"] 	= array();
					}

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
				
				$this->form_validation->set_rules('txtnroguia', 'Id Finca', 'trim|xss_clean');
				$this->form_validation->set_rules('txtcodigosocio', 'Nombre', 'trim|xss_clean');
				$this->form_validation->set_rules('cbotipodocumento', 'Departamento', 'trim|xss_clean');
				$this->form_validation->set_rules('txtnrodoc', 'Provincia', 'trim|xss_clean');
				$this->form_validation->set_rules('txtnombrerazon', 'Distrito', 'trim|xss_clean');
				$this->form_validation->set_rules('txtfecguia', 'Zona', 'trim|xss_clean');
				$this->form_validation->set_rules('cboListaEstado', 'Estado', 'trim|xss_clean');
				/*$this->form_validation->set_rules('txtid', 'Id', 'required|trim|xss_clean');*/


				if ($this->form_validation->run())
				{ 
					$aArray = array(
					    'p_codigo' 					=> $this->input->post('txtnroguia'),
						'p_codigo_socio'			=> $this->input->post('txtcodigosocio'),
						'p_id_tipo_documento'		=> $this->input->post('cbotipodocumento'),
						'p_nro_documento'			=> $this->input->post('txtnrodoc'),
						'p_nombre_razon'			=> $this->input->post('txtnombrerazon'),
						'p_fecha'					=> $this->input->post('txtfecguia'),
						'p_id_estado'				=> $this->input->post('cboListaEstado')
					);

					$cantFilas = $this->input->post('value');
					$pagina = 	 $this->input->post('value1');

					$query1 = $this->guiarecepcionmp_model->buscar( $cantFilas , $pagina , $aArray);
					
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

	public function detallar( $id ){
		//if(esLogeado()):
			//print_r($this->uri->uri_string());

			 /*LLAMA ACÁ LOS QUERYS.JS*/
			$this->load->model(array('finca_model'));
	        $scripts = array(
		        'script1'		=> 'js/librerias/bootstrap.min.js',
		        'script2'		=> 'js/librerias/bootstrap.bundle.min.js',
		        //'script2'		=> 'js/jgeneral.js',  
				/*'script3'       => 'js/finca/jmodificar.js',*/
				'script3'		=> 'js/controllers/jguiarecepcionmp.js',
				'script4'		=> 'js/models/guiarecepcionmp.js',
				'script5'       => 'js/librerias/jFormRegistrar.js?03112021',
				'script6'       => 'js/librerias/jForm.js?03112021',
	         );

	        #	setear la cabecera
        	$head    = array( 'scripts'=> $scripts );

			#variables

			$query = $this->guiarecepcionmp_model->getGuiaRecepcionMP( $id );
			$query1 = $this->finca_model->buscar( 1 , 1 , array( 'p_id' => $query[0]['id_finca']) );
			$query2 = $this->finca_model->getFincaAnualxAnio(  $query[0]['id_finca'] , date("Y") );
			if(!isset($query2[0]))
				$query2[0] = array( 'kg_estimado' => '' , 'kg_consumido' => '');

			$data = array(
				'aGuia'		=> $query[0],
				'aFinca'	=> $query1[0],
				'aFincaAnual'=> $query2[0]
			);


			$data['menu'] = $this->modulo_model->getLinkModuloUsuario( 41 );
			$data['menu_control'] = $this->modulo_model->getLinkModuloUsuario( 48 );
			$data['btn_fisico'] = $this->modulo_model->getLinkModuloUsuario( 50 );
			$data['btn_sensorial'] = $this->modulo_model->getLinkModuloUsuario( 51 );
			$data['btn_visualytacto'] = $this->modulo_model->getLinkModuloUsuario( 52 );
			
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('guiarecepcion/detalle_view',$data);
			$this->load->view('modal_view', $data);
			$this->load->view('foot_view');
		/*else:
			redirect(base_url());
		endif;*/
	}

	public function guardarFisicoAjax(){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
				$this->form_validation->set_rules('txtexportable_gr', 'Exportable', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtdescarte_gr', 'Descarte', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtcascarilla_gr', 'Cascarilla', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txthumedadfisico', '% humedad', 'required|trim|xss_clean');

				set_message_form_validation($this);
				
				if ($this->form_validation->run())
				{ 
					
						$aArray = array(
								'p_id' 					=> $this->input->post('txtid'),
								'p_exportable_gr' 		=> $this->input->post('txtexportable_gr'),
								'p_descarte_gr' 		=> $this->input->post('txtdescarte_gr'),
								'p_cascarilla_gr' 		=> $this->input->post('txtcascarilla_gr'),
								'p_humedad_fisico'		=> $this->input->post('txthumedadfisico'),
								'p_olor_limpio'			=> $this->input->post('chklimpio'),
								'p_olor_fermento'		=> $this->input->post('chkfermento'),
								'p_olor_moho'			=> $this->input->post('chkmoho'),
								'p_olor_fenol'			=> $this->input->post('chkfenol'),
								'p_olor_tierra'			=> $this->input->post('chktierra'),
								'p_olor_otro'			=> $this->input->post('chkotro_olor'),
								'p_color_variado'  		=> $this->input->post('chkvariado'),
								'p_color_normal'		=> $this->input->post('chknormal'),
								'p_color_manchado'		=> $this->input->post('chkmanchado'),
								'p_color_negruzco'		=> $this->input->post('chknegruzco'),						
								'p_color_otro'			=> $this->input->post('chkotro_color'),
								'p_obs_analisisfisico'	=> $this->input->post('txtobsfisico'),
								'p_grano_negro'			=> $this->input->post('txtgranonegro'),
								'p_grano_agrio'			=> $this->input->post('txtgranoagrio'),
								'p_cereza_seca'			=> $this->input->post('txtcerezaseca'),
								'p_danio_hongo'			=> $this->input->post('txtdañoporhongo'),
								'p_materia_extrania'	=> $this->input->post('txtmateriaextraña'),
								'p_brocado_severo'		=> $this->input->post('txtbrocadosevero'),
								'p_negro_parcial'		=> $this->input->post('txtnegroparcial'),
								'p_agrio_parcial'		=> $this->input->post('txtagrioparcial'),
								'p_pergamino'			=> $this->input->post('txtpergamino'),
								'p_flotador'			=> $this->input->post('txtflotador'),
								'p_inmaduro'			=> $this->input->post('txtinmaduro'),
								'p_averanado'			=> $this->input->post('txtaveranado'),
								'p_conchas'				=> $this->input->post('txtconchas'),
								'p_partido'				=> $this->input->post('txtpartido'),
								'p_pulpa_seca'			=> $this->input->post('txtpulpaseca'),
								'p_viejo'				=> $this->input->post('txtviejo'),
								'p_brocado'				=> $this->input->post('txtbrocadoleve'),
								'p_usu_mod'				=> 1
						);

						$rArray = $this->guiarecepcionmp_model->updateGuiaRecepcionFisico($aArray);
						//print_r($rArray);

						if(isset($rArray[0]['pid1'])):
							if($rArray[0]['pid1'] >= 1 ): //si esxiste el id
								$result["estado"] 	= 1;		
						     	$result["mensaje"] 	= 'Se registró correctamente';
						     	$result["result"] 	= array( 	'codigo' => $rArray[0]['pid1']   );

							else:
						    	$result["estado"] 	= 2;		
						   	 	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la Guía';
						    	$result["result"] 	= array();
							endif;
						else:
							if(isset($rArray[0]['error'])):
								$result["estado"] 	= 3;		
						    	$result["mensaje"] 	= $rArray[0]['error'];
						    	$result["result"] 	= array();
						    else:
						    	$result["estado"] 	= 4;		
						    	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la Guía';
						    	$result["result"] 	= array();
						    endif;

						endif;

				}
				else{
					$result = validation_errors_parse(validation_errors());
						
				}

				echo json_encode($result);

		endif;

	}

	public function _validarValorSensorial($campo){
		if($campo>=6 && $campo<=10)
			return true;
		else
			if (empty($campo))
				return true;
			else
				return false;
	}


	public function guardarSensorialAjax(){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
				$this->form_validation->set_rules('txtid', 'Id de Guia', 'required|trim|xss_clean');

				$this->form_validation->set_rules('txtfragancia', 'Fragancia/Aroma', 'trim|xss_clean|callback__validarValorSensorial');
				$this->form_validation->set_rules('txtsabor', 'Sabor', 'trim|xss_clean|callback__validarValorSensorial');
				$this->form_validation->set_rules('txtsaborresidual', 'Sabor Residual', 'trim|xss_clean|callback__validarValorSensorial');
				$this->form_validation->set_rules('txtacidez', 'Acidez', 'trim|xss_clean|callback__validarValorSensorial');
				$this->form_validation->set_rules('txtcuerpo', 'Cuerpo', 'trim|xss_clean|callback__validarValorSensorial');
				$this->form_validation->set_rules('txtuniformidad', 'Uniformidad', 'trim|xss_clean|callback__validarValorSensorial');
				$this->form_validation->set_rules('txtbalance', 'Balance', 'trim|xss_clean|callback__validarValorSensorial');
				$this->form_validation->set_rules('txttazalimpieza', 'Taza de Limpieza', 'trim|xss_clean|callback__validarValorSensorial');
				$this->form_validation->set_rules('txtdulzor', 'Dulzor', 'trim|xss_clean|callback__validarValorSensorial');
				$this->form_validation->set_rules('txtpuntajecatador', 'Puntaje Catador', 'trim|xss_clean|callback__validarValorSensorial');

				set_message_form_validation($this);
				
				if ($this->form_validation->run())
				{ 
					
						$aArray = array(
							'p_id' 					=> $this->input->post('txtid'),
							'p_rendimiento' 		=> $this->input->post('txtrendimiento'),
							'p_porc_humedad' 		=> $this->input->post('txthumedad_porc'),
							'p_tambor' 				=> $this->input->post('txttambor'),
							'p_t_tambor'			=> $this->input->post('txttamborentrada'),
							'p_tiempo_primer_crack'	=> $this->input->post('txttiempocrack'),
							'p_t_primer_crack'		=> $this->input->post('txttcrack'),
							'p_tiempo_salida'		=> $this->input->post('txttiemposalida'),
							'p_t_salida'			=> $this->input->post('txttsalida'),
							'p_observaciones_tueste'=> $this->input->post('txtobsregistrotueste'),
							'p_fragancia'			=> $this->input->post('txtfragancia'),
							'p_sabor'  				=> $this->input->post('txtsabor'),
							'p_sabor_residual'		=> $this->input->post('txtsaborresidual'),
							'p_acidez'				=> $this->input->post('txtacidez'),
							'p_cuerpo'				=> $this->input->post('txtcuerpo'),						
							'p_uniformidad'			=> $this->input->post('txtuniformidad'),
							'p_balance'				=> $this->input->post('txtbalance'),
							'p_taza_limpieza'		=> $this->input->post('txttazalimpieza'),
							'p_dulzor'				=> $this->input->post('txtdulzor'),
							'p_puntaje_catador'		=> $this->input->post('txtpuntajecatador'),
							'p_defecto_fermento'	=> $this->input->post('chkfermento_defecto'),
							'p_defecto_tierra'		=> $this->input->post('chktierra_defecto'),
							'p_defecto_fenol'		=> $this->input->post('chkfenol_defecto'),
							'p_defecto_sucio'		=> $this->input->post('chksucio_defecto'),
							'p_defecto_moho'		=> $this->input->post('chkmoho_defecto'),
							'p_defecto_contaminado'	=> $this->input->post('chkcontaminado_defecto'),
							'p_defecto_reposado'	=> $this->input->post('chkreposado_defecto'),
							'p_obs_analisis_sensorial'	=> $this->input->post('txtobsanalisissensorial'),
							'p_usu_mod'				=> 1
						);

						$rArray = $this->guiarecepcionmp_model->updateGuiaRecepcionSensorial($aArray);
						

						if(isset($rArray[0]['pid1'])):
							if($rArray[0]['pid1'] >= 1 ): //si esxiste el id
								$result["estado"] 	= 1;		
						     	$result["mensaje"] 	= 'Se registró correctamente';
						     	$result["result"] 	= array( 	'codigo' => $rArray[0]['pid1']   );

							else:
						    	$result["estado"] 	= 2;		
						   	 	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la Guía';
						    	$result["result"] 	= array();
							endif;
						else:
							if(isset($rArray[0]['error'])):
								$result["estado"] 	= 3;		
						    	$result["mensaje"] 	= $rArray[0]['error'];
						    	$result["result"] 	= array();
						    else:
						    	$result["estado"] 	= 4;		
						    	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la Guía';
						    	$result["result"] 	= array();
						    endif;

						endif;

				}
				else{
					$result = validation_errors_parse(validation_errors());
						
				}

				echo json_encode($result);

		endif;

	}

	public function guardarVisualytactoAjax(){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
				$this->form_validation->set_rules('txtid', 'Id de Guia', 'required|trim|xss_clean');

				$this->form_validation->set_rules('txthumedadvisual', 'Fragancia/Aroma', 'trim|xss_clean');

				set_message_form_validation($this);
				
				if ($this->form_validation->run())
				{ 
					
						$aArray = array(
							'p_id' 						=> $this->input->post('txtid'),
							'p_humedad_visual'			=> $this->input->post('txthumedadvisual'),
							'p_olor_fresco_visual'		=> $this->input->post('chkfresco'),
							'p_olor_viejo_visual'		=> $this->input->post('chkviejo'),
							'p_olor_fermento_visual'	=> $this->input->post('chkfermento'),
							'p_olor_terroso_visual'		=> $this->input->post('chkterroso'),
							'p_olor_moho_visual'		=> $this->input->post('chkmoho'),
							'p_olor_hierbas_visual'		=> $this->input->post('chkhierbas'),
							'p_olor_contaminado_visual'	=> $this->input->post('chkcontaminado'),
							'p_olor_otros_visual'		=> $this->input->post('chkotros'),
							'p_color_normal_visual'		=> $this->input->post('chknormal'),
							'p_color_disparejo_visual'	=> $this->input->post('chkdisparejo'),
							'p_color_manchado_visual'	=> $this->input->post('chkmanchado'),
							'p_color_negruzco_visual'	=> $this->input->post('chknegruzco'),
							'p_color_otros_visual'		=> $this->input->post('chkotros_color'),
							'p_obs_analisis_visual'		=> $this->input->post('txtobsvisualytacto'),
							'p_usu_mod'					=> 1
						);

						$rArray = $this->guiarecepcionmp_model->updateGuiaRecepcionVisual($aArray);
						//print_r($rArray);

						if(isset($rArray[0]['pid1'])):
							if($rArray[0]['pid1'] >= 1 ): //si esxiste el id
								$result["estado"] 	= 1;		
						     	$result["mensaje"] 	= 'Se registró correctamente';
						     	$result["result"] 	= array( 	'codigo' => $rArray[0]['pid1']   );

							else:
						    	$result["estado"] 	= 2;		
						   	 	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la Guía';
						    	$result["result"] 	= array();
							endif;
						else:
							if(isset($rArray[0]['error'])):
								$result["estado"] 	= 3;		
						    	$result["mensaje"] 	= $rArray[0]['error'];
						    	$result["result"] 	= array();
						    else:
						    	$result["estado"] 	= 4;		
						    	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar la Guía';
						    	$result["result"] 	= array();
						    endif;

						endif;

				}
				else{
					$result = validation_errors_parse(validation_errors());
						
				}

				echo json_encode($result);

		endif;

	}

}
