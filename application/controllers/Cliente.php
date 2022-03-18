<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {

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
		$this->load->model(array('cliente_model','modulo_model','departamento_model','pais_model','estado_model','persona_model','ciudad_model'));
	}


	public function index(){
		//if(esLogeado()):

			$aTar['idusuconsulta'] = $this->session->userdata('idusuario');

			$query = $this->cliente_model->buscar( 20 , 1 ); //

			#	scripts y estilos
			$scripts1 = array(  'script1'       => 'js/jgeneral.js',
								'script2'       => 'js/models/clienteComercial.js',
								'script3'       => 'js/controllers/jclienteComercial.js',
								'script4'       => 'js/librerias/jForm.js',
								'script5'       => 'js/librerias/jFormBuscar.js'
							);

			#	setear la cabecera
			$head    = array(	'scripts'       => $scripts1 );

			/*enviar listado a la vista*/
			/*$data['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );*/
			$data['btn'] = $this->modulo_model->getLinkModuloUsuario( 30 );

			/*$data['listaSocio'] = $this->htmlListaSocio( $query , $this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'socio/detallar' ));*/

			$data['lista'] = $this->htmlLista( $query );

			$data = array_merge($data, $this->generarPaginacion( 20 , 1 , $query ) );

			$data['busqueda'] =	$this->busqueda();

			/**/
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('cliente/lista_view',$data);
			$this->load->view('foot_view');


			
		/*else:
			redirect(base_url());
		endif;*/
	}


	private function busqueda( ){
		
		$html = '';

		//if($this->modulo_model->getValidaLinkUsuario( $this->session->userdata('idusuario') , 'productor/busqueda' )){

			$data1 = $this->getDataForm();
			$html  = $this->load->view('cliente/busqueda_view', $data1 , TRUE );
		//}

		return $html;
	}

	private function getDataForm(){

        $query1 = $this->estado_model->getListarEstado(); 
        $query2 = $this->pais_model->getListarPais(); 
        $query3 = $this->departamento_model->getListarDepartamento(1); 
       
        $querys = array(
                 'aListaEstado' => $query1,
                 'aListaPais' => $query2,
                 'aListaDepart' => $query3
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
        'script3'       => 'js/controllers/jclienteComercial.js',
        'script4'       => 'js/models/clienteComercial.js',
        'script5'       => 'js/librerias/jForm.js',
        'script6'       => 'js/librerias/jFormRegistrar.js',

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
        $this->load->view('cliente/registrar_view',$querys);
        $this->load->view('modal_view');
		$this->load->view('foot_view');
	}


	

	public function guardarAjax(){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
				$this->load->library(array('archivo'));

				$this->form_validation->set_rules('rbtnTipoCliente', 'Tipo Cliente', 'required|trim|xss_clean');
				$this->form_validation->set_rules('txtrazonsocial', 'Razon Social', 'required|trim|xss_clean');
				
				$this->form_validation->set_rules('txtemail', 'Email', 'trim|xss_clean|valid_email');
				$this->form_validation->set_rules('txttelfijo', 'Telf.Fijo', 'trim|xss_clean|min_length[8]|max_length[13]|numeric_telf');

				$this->form_validation->set_rules('txtfloid', 'flo id', 'required|trim|xss_clean|is_natural');
				$this->form_validation->set_rules('txtdireccion', 'Direccion', 'required|trim|xss_clean');



				if( $this->input->post('rbtnTipoCliente') == 1 ){
					$this->form_validation->set_rules('txtruc', 'RUC', 'required|trim|xss_clean|min_length[11]|max_length[13]');
					$this->form_validation->set_rules('cboDepartamento', 'Departamento', 'required|trim|xss_clean|is_natural_no_zero');
					$this->form_validation->set_rules('cboProvincia', 'Provincia', 'required|trim|xss_clean|is_natural_no_zero');
					$this->form_validation->set_rules('cboDistrito', 'Distrito', 'required|trim|xss_clean|is_natural_no_zero');
				}else{
					$this->form_validation->set_rules('txtruc', 'RUC', 'required|trim|xss_clean|min_length[2]');
					$this->form_validation->set_rules('cboPais', 'Pais', 'required|trim|xss_clean|is_natural_no_zero');
					$this->form_validation->set_rules('cboCiudad', 'Ciudad', 'required|trim|xss_clean|is_natural_no_zero');
				}

				
				
				$this->form_validation->set_rules('txtgerentegeneral', 'Gerente General', 'trim|xss_clean');
				$this->form_validation->set_rules('txtgerentegeneralid', 'Gerente General ID #', 'trim|xss_clean|is_natural');
			
				$this->form_validation->set_rules('txtpresidente', 'Presidente', 'trim|xss_clean');
				$this->form_validation->set_rules('txtpresidenteid', 'Presidente ID #', 'trim|xss_clean|is_natural');

				set_message_form_validation($this);
				
				
				if ($this->form_validation->run())
				{ 
					
					

					$aCliente = array(
							'cliente_id'			=> $this->input->post('txtruc'),
							'cliente_nombre'		=> $this->input->post('txtrazonsocial'),
							'direccion'				=> $this->input->post('txtdireccion'),
							'telefono'				=> $this->input->post('txttelfijo'),
							'email'					=> $this->input->post('txtemail'),
							'floid'					=> $this->input->post('txtfloid'),
							'idciudad'				=> 0,
							'iddistrito'			=> 0,
							'gerentegeneralnombre'	=> $this->input->post('txtgerentegeneral'),
							'gerentegeneralid' 		=> $this->input->post('txtgerentegeneralid'),
							'presidentenombre'		=> $this->input->post('txtpresidente'),
							'presidenteid'			=> $this->input->post('txtpresidenteid'),
							'tiponacionalidad'		=> $this->input->post('rbtnTipoCliente'),	
							'usureg'				=> 1
					);
					if( $this->input->post('rbtnTipoCliente') == 1 )
						$aCliente['iddistrito'] 	= $this->input->post('cboDistrito');
					else
						$aCliente['idciudad'] 		= $this->input->post('cboCiudad');


					$rCliente = $this->cliente_model->insert($aCliente); // registrar cliente

							//print_r($rCliente);
					if(isset($rCliente[0]['result'])):
								if($rCliente[0]['result'] == 1 ): //si esxiste el id
									$result["estado"] 	= 1;		
					     			$result["mensaje"] 	= 'Se registró correctamente';
					     			$result["result"] 	= array( 	'codigo' => $rCliente[0]['codigo']   );
								else:
							    	$result["estado"] 	= 2;		
							   	 	$result["mensaje"] 	= 'Cliente registrado anteriormente.</br>Dirigase al modulo de actualización';
							    	$result["result"] 	= array();
								endif;
					else:
						    	$result["estado"] 	= 3;		
						   	 	$result["mensaje"] 	= 'Ocurrió un error al intentar registrar el cliente';
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
				
				$this->form_validation->set_rules('txtcodigo', 'codigo', 'trim|xss_clean');
				$this->form_validation->set_rules('cbotipocliente', 'tipocliente', 'trim|xss_clean');
				$this->form_validation->set_rules('txtruc', 'ruc', 'trim|xss_clean');
				$this->form_validation->set_rules('txtrazon', 'razon', 'trim|xss_clean');
				$this->form_validation->set_rules('txtdireccion', 'direccion', 'trim|xss_clean');
				$this->form_validation->set_rules('cboPais', 'Pais', 'trim|xss_clean');
				$this->form_validation->set_rules('cboCiudad', 'Ciudad', 'trim|xss_clean');
				$this->form_validation->set_rules('cboListaEstado', 'estado', 'trim|xss_clean');


				if ($this->form_validation->run())
				{ 
					$aArray = array(
						'p_codigo' 					=> $this->input->post('txtcodigo'),
					    'p_tipo_nacionalidad' 		=> $this->input->post('cbotipocliente'),
						'p_ruc'						=> $this->input->post('txtruc'),
						'p_razon'					=> $this->input->post('txtrazon'),
						'p_direccion'				=> $this->input->post('txtdireccion'),
						'p_id_pais'					=> $this->input->post('cboPais'),
						'p_id_ciudad'				=> $this->input->post('cboCiudad'),
						'p_estado'					=> $this->input->post('cboListaEstado')

					);

					$cantFilas = $this->input->post('value');
					$pagina = 	 $this->input->post('value1');

					$query1 = $this->cliente_model->buscar( $cantFilas , $pagina , $aArray);
					
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
					$html .= '<a href="'.base_url().'cliente/detallar/'.$l['id_cliente'].'" id="'.$l['id_cliente'].'" title="MÁS DETALLES">'.$l['codigo'].'</a></div>';
				else
					$html .= $l['codigo'].'</div>';

			    $html .= '<div class="col-2">'.$l['tipo_nacionalidad_desc'].'</div>
					    <div class="col-2">'.$l['nro_documento'].'</div>
					    <div class="col-2">'.$l['razon_social'].'</div>
						<div class="col-2">'.$l['direccion'].'</div>
						<div class="col-1">'.$l['pais'].'</div>
						<div class="col-1">'.$l['ciudad'].'</div>
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
				'script3'       => 'js/models/clienteComercial.js',
				'script4'       => 'js/controllers/jclienteComercial.js',
				'script5'       => 'js/librerias/jFormModificar.js'
	         );

	        #	setear la cabecera
        	$head    = array( 'scripts'=> $scripts );


			#variables
			$query1 = $this->cliente_model->getCliente( $id );	
			$query2 = $this->estado_model->getListarEstado(); 
			//$query3 = $this->adjunto_model->listar( array( 'p_id_tabla'=> $id, 'p_tabla'=> 'cliente' ) );	

			$data = array(
							'aCliente'		=>	$query1[0],
							'aListaEstado'	=>  $query2,
							//'aAdjunto'			=>  $query3
			);
			
			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view');
			$this->load->view('cliente/detalle_view',$data);
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
			
			$this->form_validation->set_rules('cboEstado', 'Estado', 'required|trim|xss_clean|is_natural');

			//MENSAJES DE REGLAS DE FORMULARIO
			set_message_form_validation($this);


			if ($this->form_validation->run())
			{ 
				$aArray = array(
						'idcliente' 		=> $this->input->post('txtId',TRUE),
						'idestado' 			=> $this->input->post('cboEstado',TRUE),
						'usureg'			=> 1
				);

				$resultado 	= $this->cliente_model->actualizar($aArray);
		
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


    public function buscarxCodigoAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):
				

				$aArray = array(
					'p_codigo' 		=> $this->input->post('txtcampobusqueda1',true),
					'p_ruc' 		=> $this->input->post('txtcampobusqueda2',true),
					'p_razon' 		=> $this->input->post('txtcampobusqueda3',true)
				);

				$result_sql = $this->cliente_model->buscar( 20 , 1 , $aArray);	


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







}
