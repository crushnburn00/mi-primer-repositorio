<?php
Class Certificacion_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	
	public function buscar( $rownumber , $paginas , $aCertificacion ){

		$aCertificacion = $this->isFormatoBusqueda( $rownumber , $paginas , $aCertificacion );

		$sqltext = "CALL buscarCertificacion( ? ,? ,? ,? ,? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aCertificacion );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isFormatoBusqueda( $rownumber , $paginas , $array ){

		$arrayBD = array(
							'p_id' => 0,
      						'p_id_tipo_certificacion'  => 0,
							'p_fecha_emision' => '',
							'p_fecha_expiracion' => '',
							'p_id_entidad_certificadora' => 0,
							'p_id_finca' => 0,
					        'rownumber' => $rownumber,
					      	'pagina' => $paginas
					      );

		
		$result =  array_merge($arrayBD , $array);

		return $result;

	}


	/*
	*	Funcion @insertPersona
	*	Extrae el listado de Caus segun el ID buscado
	*	Parametros :  No
	*		idcau (int) : id de cau 
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/

	//public function getLinkModuloUsuario( $idusuario ,  $linkpadre = '' , $idmodulopadre = ''){
	public function insert( $aCertificacion ){

		$aCertificacion = $this->isExist($aCertificacion);
		//print_r($aCertificacion);

		$sqltext = "CALL insertCertificacion( ? , ?, ? , ?, ? , ? )";
		$query = $this->db->query( $sqltext , $aCertificacion );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExist($aArray){


		if(isset($aArray['p_fecha_emision'])) 
			if($aArray['p_fecha_emision']=='' or $aArray['p_fecha_emision']=='00/00/0000')
				unset($aArray['p_fecha_emision']);	

		if(isset($aArray['p_fecha_expiracion'])) 
			if($aArray['p_fecha_expiracion']=='' or $aArray['p_fecha_expiracion']=='00/00/0000')
				unset($aArray['p_fecha_expiracion']);	

		$aArrayBD = array(
							'p_id_tipocertificacion' 	=> null,
							'p_id_entidadcertificadora' => null,
							'p_fecha_emision'			=> null,
							'p_fecha_expiracion'		=> null,
							'p_id_finca' 				=> null,
							'usureg'					=> null
		);
		
		return array_merge($aArrayBD , $aArray);

	}




	public function getCertificacion( $id ){

		$sqltext = "CALL getCertificacion( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}


	public function actualizar( $aArray ){

		$sqltext = "CALL updateCertificacion( ? ,? ,? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

}
?>