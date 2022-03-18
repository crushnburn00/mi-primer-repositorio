<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','security','utilitario_helper'));
		$this->load->model(array('modulo_model','usuario_model'));

	}
	/*
	*
	*
	*
	*/

		public function index(){	
		//if(esLogeado()):
			#	scripts y estilos
			$styles = array( );

			$scripts = array(
				'script1'		=> 'js/bootstrap.min.js',
				'script2'		=> 'js/bootstrap.bundle.min.js',
				
			);
		
			#	setear la cabecera
			$head    = array( 'styles'              => $styles , 
							  'scripts'				=> $scripts );

			$title   = array( 'title' => ''); 

			//$llink = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );
			$llink = $this->modulo_model->getLinkModuloUsuario( 0 );
			//print_r($llink);
			
			$data = array('links' => $llink);

			//write_log("Principal","PRINCIPAL: ".$this->session->usernameavl);

			$this->load->view('head_view',$head);
			$this->load->view('encabezado_view', $title);
			$this->load->view('principal/panelprincipal_view',$data);
			$this->load->view('foot_view');
			

		/*else:
			redirect(base_url());
		endif;*/
	}


}






