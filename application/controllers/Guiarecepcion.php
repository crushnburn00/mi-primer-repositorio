<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GuiaRecepcion extends CI_Controller {

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
					$html .= '<a href="'.base_url().'guiarecepcion/detallar/'.$l['id_contrato'].'" id="'.$l['id_contrato'].'" title="MÁS DETALLES">'.$l['nro_contrato'].'</a></div>';
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
        //$querys['aCalculo'] = self::_aCalculo;
        $querys['aTipoEmpaque'] = self::_aTipoEmpaque;

        

        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );         
        //$querys['btn'] = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1).'/'.$this->uri->segment(2) );   
        
        $title   = array( 'title' => ''); 
        //write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

        $this->load->view('head_view',$head);
        $this->load->view('encabezado_view', $title);
        $this->load->view('guiarecepcion/registrar_view',$querys);
        $this->load->view('modal_view');
		$this->load->view('foot_view');
	}


}
