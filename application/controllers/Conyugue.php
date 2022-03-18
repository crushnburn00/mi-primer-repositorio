<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conyugue extends CI_Controller {

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


	


    public function buscarPersonaxNroDocAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):
				

				$aArray = array(
					    'p_nro_documento' => $this->input->post('txtdniCony',true),
					    'p_id_tipo_documento' => $this->input->post('cboTipoDocCony',true)
				);

				$result_sql = $this->persona_model->buscarPersonaxNroDoc( $aArray );

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




}