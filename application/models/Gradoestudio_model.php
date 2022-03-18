<?php
Class GradoEstudio_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}



	/*
	*	Funcion @getListaLugar
	*	Extrae el listado de Caus segun el ID buscado
	*	Parametros :  No
	*		idcau (int) : id de cau 
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/

	//public function getLinkModuloUsuario( $idusuario ,  $linkpadre = '' , $idmodulopadre = ''){
	public function getListarGradoEstudio(){

		$sqltext = "CALL listarGradoEstudio()";
		$query = $this->db->query( $sqltext );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}

	public function insertFincaGE( $aFincaGE ){

		$aFinca = $this->isExistGFE($aFincaGE);

		$sqltext = "CALL insertFincaGE( ? , ? )";
		$query = $this->db->query( $sqltext , $aFincaGE );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExistGFE($aArray){

		if(isset($aArray['p_id_finca'])) 
			if($aArray['p_id_finca']==0)
				unset($aArray['p_id_finca']);

		if(isset($aArray['p_id_grado_estudio'])) 
			if($aArray['p_id_grado_estudio']==0)
				unset($aArray['p_id_grado_estudio']);


		$aArrayBD = array(
							'p_id_finca' 				=> null,
							'p_id_grado_estudio' 		=> null,
		);
		
		return array_merge($aArrayBD , $aArray);

	}





}
?>