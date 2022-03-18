<?php
Class Cliente_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	
	public function buscar( $rownumber , $paginas , $aArray = array() ){

		$aArray = $this->isFormatoBusqueda( $rownumber , $paginas , $aArray);

		$sqltext = "CALL buscarCliente( ? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? )";

		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();	
	        
	    return $data;
	
	}

	

	public function isFormatoBusqueda( $rownumber , $paginas , $array ){

		$arrayBD = array(
							'p_id' => 0,
      						'p_codigo'  => '',
							'p_tipo_nacionalidad' => 0,
							'p_ruc' => '',
							'p_razon' => '',
							'p_direccion' => '',
							'p_id_pais' => 0,
							'p_id_ciudad' => 0,
							'p_estado'  => -1,
							'p_codigo_exact'  => '',
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
	public function insert( $aArray ){

		$aArray = $this->isExist($aArray);

		$sqltext = "CALL insertCliente( ? , ?, ? , ?, ? , ?, ? , ? ,?, ? ,? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExist($aArray){

		if(isset($aArray['idciudad'])) 
			if($aArray['idciudad']==0)
				unset($aArray['idciudad']);

		if(isset($aArray['iddistrito'])) 
			if($aArray['iddistrito']==0)
				unset($aArray['iddistrito']);
										
		if(isset($aArray['gerentegeneralnombre'])) 
			if($aArray['gerentegeneralnombre']=="")
				unset($aArray['gerentegeneralnombre']);

		if(isset($aArray['gerentegeneralid'])) 
			if($aArray['gerentegeneralid']==0)
				unset($aArray['gerentegeneralid']);

		if(isset($aArray['presidentenombre'])) 
			if($aArray['presidentenombre']=="")
				unset($aArray['presidentenombre']);

		if(isset($aArray['presidenteid'])) 
			if($aArray['presidenteid']==0)
				unset($aArray['presidenteid']);

		if(isset($aArray['tiponacionalidad'])) 
			if($aArray['tiponacionalidad']=="")
				unset($aArray['tiponacionalidad']);

		$aArrayBD = array(
							'cliente_id' 			=> null,
							'cliente_nombre' 		=> null,
							'direccion' 			=> null,
							'telefono' 				=> null,
							'email' 				=> null,
							'floid'					=> null,
							'idciudad' 				=> null,
							'iddistrito' 			=> null,
							'gerentegeneralnombre'	=> null,
							'gerentegeneralid' 		=> null,
							'presidentenombre'		=> null,
							'presidenteid'			=> null,
							'tiponacionalidad'		=> null,						
							'usureg'				=> null
		);
		
		return array_merge($aArrayBD , $aArray);

	}

	public function getCliente( $id ){

		$sqltext = "CALL getCliente( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}

	public function actualizar( $aCliente ){

		$sqltext = "CALL updateCliente( ? ,? ,? )";
		$query = $this->db->query( $sqltext , $aCliente );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


}
?>