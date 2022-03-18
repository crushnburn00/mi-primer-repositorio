<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Departamento extends CI_Controller {

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
		$this->load->model(array('departamento_model'));
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
				if($pid == 0)
					$pid = 1;

				$result_sql = $this->departamento_model->getListarDepartamento( $pid );

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
							

				$result_sql = $this->departamento_model->insert( $value );

				if( isset($result_sql[0]['result']) ):
					if($result_sql[0]['result'] == 1):
						$result["estado"] 	= 1;		
						$result["mensaje"] 	= 'Departamento Registrado';
						$result["result"] 	= $result_sql[0];
					else:
						if($result_sql[0]['result'] == -1 && $result_sql[0]['pid1'] == null):
							$result["estado"] 	= 2;		
							$result["mensaje"] 	= 'Error al registrar departamento';
							$result["result"] 	= $result_sql[0];
						else:
							$result["estado"] 	= 3;		
							$result["mensaje"] 	= 'Departamento Registrado anteriormente';
							$result["result"] 	= $result_sql[0];
						endif;
					endif;
				else:
				    $result["estado"] 	= 4;		
				    $result["mensaje"] 	= 'Error al registrar Departamento';
				    $result["result"] 	= array();
			    endif;


			//endif;
			echo json_encode($result);

		endif;
	}

}
