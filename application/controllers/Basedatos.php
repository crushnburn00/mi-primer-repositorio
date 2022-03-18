<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basedatos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','security','utilitario_helper'));
		$this->load->model(array('basedatos_model'));

	}
	/*
	*
	*
	*
	*/

		public function reiniciarTablas(){	
		//if(esLogeado()):
			#	scripts y estilos


			//$llink = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , $this->uri->segment(1) );
			$this->basedatos_model->reiniciarTablasBD();
			//print_r($llink);
			
			echo "Se reiniciaron las tablas";
			

		/*else:
			redirect(base_url());
		endif;*/
	}


}
