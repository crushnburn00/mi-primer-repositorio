<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipoCertificacion extends CI_Controller {

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
		$this->load->model(array('tipocertificacion_model'));
	}


	public function listarAjax(){
		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$result["estado"] 	= -1;		
			$result["mensaje"] 	= 'NL';
			$result["result"] 	= array();

			//if(esLogeado()):

				$result_sql = $this->tipocertificacion_model->listar();

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

				$aArray = array(
					'tipocertificacion' => $this->input->post('value',true),
					'usu_reg'			=> 1
				);
							
				$result_sql = $this->tipocertificacion_model->insert( $aArray );

				if( isset($result_sql[0]['result']) ):
					if($result_sql[0]['result'] == 1):
						$result["estado"] 	= 1;		
						$result["mensaje"] 	= 'Tipo Certificacion Registrado';
						$result["result"] 	= $result_sql[0];
					else:
						if($result_sql[0]['result'] == -1 && $result_sql[0]['pid1'] == null):
							$result["estado"] 	= 3;		
							$result["mensaje"] 	= 'Error al registrar Tipo Certificacion';
							$result["result"] 	= $result_sql[0];
						else:
							$result["estado"] 	= 3;		
							$result["mensaje"] 	= 'Tipo Certificacion Registrado anteriormente';
							$result["result"] 	= $result_sql[0];
						endif;
					endif;
				else:
				    $result["estado"] 	= 2;		
				    $result["mensaje"] 	= 'Error al registrar Tipo Certificacion';
				    $result["result"] 	= array();
			    endif;


			//endif;
			echo json_encode($result);

		endif;
	}

}
