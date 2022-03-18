<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pais extends CI_Controller {

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
		$this->load->model(array('pais_model'));
	}


	public function listarAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):

				$result_sql = $this->pais_model->getListarPais();

				if( count($result_sql) >= 1 ):
					$result["estado"] 	= 1;		
					$result["mensaje"] 	= 'Encontrado';
					$result["result"] 	= $result_sql;
				else:
				    $result["estado"] 	= 2;		
				    $result["mensaje"] 	= 'No existen';
				    $result["result"] 	= array();
			    endif;


			//endif;
			echo json_encode($result);

		endif;
	}


	public function guardarAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):

				$value = $this->input->post('value',true);
							

				$result_sql = $this->pais_model->insert( $value );

				if( isset($result_sql[0]['result']) ):
					if($result_sql[0]['result'] == 1):
						$result["estado"] 	= 1;		
						$result["mensaje"] 	= 'Pais Registrado';
						$result["result"] 	= $result_sql[0];
					else:
						if($result_sql[0]['result'] == -1 && $result_sql[0]['pid1'] == null):
							$result["estado"] 	= 3;		
							$result["mensaje"] 	= 'Error al registrar Pais';
							$result["result"] 	= $result_sql[0];
						else:
							$result["estado"] 	= 3;		
							$result["mensaje"] 	= 'Pais Registrado anteriormente';
							$result["result"] 	= $result_sql[0];
						endif;
					endif;
				else:
				    $result["estado"] 	= 2;		
				    $result["mensaje"] 	= 'Error al registrar Pais';
				    $result["result"] 	= array();
			    endif;


			//endif;
			echo json_encode($result);

		endif;
	}

}
