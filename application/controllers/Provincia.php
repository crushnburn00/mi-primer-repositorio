<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provincia extends CI_Controller {

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
		$this->load->model(array('provincia_model'));
	}


	public function listarAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):
				$pid = json_decode($this->input->post('id',true));

				$result_sql = $this->provincia_model->getListarProvincia( $pid );

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
				$value1 = $this->input->post('value1',true);
				

				$result_sql = $this->provincia_model->insert( $value , $value1 );

				if( isset($result_sql[0]['result']) ):
					if($result_sql[0]['result'] == 1):
						$result["estado"] 	= 1;		
						$result["mensaje"] 	= 'Provincia Registrada';
						$result["result"] 	= $result_sql[0];
					else:
						$result["estado"] 	= 3;		
						$result["mensaje"] 	= 'Provincia Registrado anteriormente';
						$result["result"] 	= $result_sql[0];
					endif;
				else:
				    $result["estado"] 	= 2;		
				    $result["mensaje"] 	= 'Error al registrar Provincia';
				    $result["result"] 	= array();
			    endif;


			//endif;
			echo json_encode($result);

		endif;
	}

}
