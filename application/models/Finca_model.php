<?php
Class Finca_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	
	public function buscar( $rownumber , $paginas , $aFinca ){

		$aFinca = $this->isFormatoBusqueda( $rownumber , $paginas , $aFinca);

		$sqltext = "CALL buscarFinca( ? ,? ,? ,? ,? ,? ,? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aFinca );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	

	public function isFormatoBusqueda( $rownumber , $paginas , $array ){

		$arrayBD = array(
							'p_id' => 0,
      						'p_nombre'  => '',
							'p_id_departamento' => 0,
							'p_id_provincia' => 0,
							'p_id_distrito' => 0,
							'p_id_zona' => 0,
							'p_estado'  => -1,
							'p_id_socio' => 0,
					        'rownumber' => $rownumber,
					      	'pagina' => $paginas
					      );

		
		$result =  array_merge($arrayBD , $array);

		return $result;

	}


	public function getFinca( $id ){

		$sqltext = "CALL getFinca( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
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
	public function insert( $aFinca ){

		$aFinca = $this->isExist($aFinca);

		$sqltext = "CALL insertFinca( ? , ?, ? , ?, ? , ?, ? , ? ,? ,? ,? , ?, ? , ?, ? , ?, ? , ? ,? ,? , ? , ?, ? , ?, ? , ?, ? )";
		$query = $this->db->query( $sqltext , $aFinca );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExist($aArray){

		if(isset($aArray['p_internet'])) 
			if($aArray['p_internet']==-1)
				unset($aArray['p_internet']);		

		if(isset($aArray['p_establecimiento_salud'])) 
			if($aArray['p_establecimiento_salud']==-1)
				unset($aArray['p_establecimiento_salud']);

		if(isset($aArray['p_centro_educativo'])) 
			if($aArray['p_centro_educativo']==-1)
				unset($aArray['p_centro_educativo']);

		if(isset($aArray['p_id_vivienda'])) 
			if($aArray['p_id_vivienda']==0)
				unset($aArray['p_id_vivienda']);

		if(isset($aArray['p_id_energia'])) 
			if($aArray['p_id_energia']==0)
				unset($aArray['p_id_energia']);

		if(isset($aArray['p_id_agua'])) 
			if($aArray['p_id_agua']==0)
				unset($aArray['p_id_agua']);

		if(isset($aArray['p_id_telefonia'])) 
			if($aArray['p_id_telefonia']==0)
				unset($aArray['p_id_telefonia']);

		if(isset($aArray['p_tiempo'])) 
			if($aArray['p_tiempo']=="")
				unset($aArray['p_tiempo']);

		$aArrayBD = array(
							'p_nombre' 					=> null,
							'p_direccion' 				=> null,
							'p_id_zona'					=> null,
							'p_id_vivienda'				=> null,
							'p_suelo' 					=> null,
							'p_latitud_gmd'				=> null,
							'p_longitud_gmd'			=> null,
							'p_latitud'					=> null,
							'p_longitud'				=> null,
							'p_altitud' 				=> null,
							'p_id_energia' 				=> null,
							'p_id_agua' 				=> null,
							'p_cant_animales' 			=> null,
							'p_internet' 				=> null,
							'p_id_telefonia' 			=> null,
							'p_establecimiento_salud' 	=> null,
							'p_tiempo_centro_salud' 	=> null,
							'p_centro_educativo' 		=> null,
							'p_vias_acceso' 			=> null,
							'p_distancia_km' 			=> null,
							'p_tiempo'					=> null,
							'p_medio_transporte'		=> null,
							'p_cultivo' 				=> null,
							'p_precipitacion' 			=> null,
							'p_cant_personal_cosecha' 	=> null,
							'p_id_socio' 				=> null,
							'usureg'					=> null
		);
		
		return array_merge($aArrayBD , $aArray);

	}


	public function insertFincaAnual( $aFinca ){
		//$aFinca = $this->isExist($aFinca);

		$sqltext = "CALL insertFincaAnual( ? , ?, ? , ? )";
		$query = $this->db->query( $sqltext , $aFinca );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function getFincaAnual( $id ){

		$sqltext = "CALL getFincaAnual( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function getFincaAnualxAnio( $id , $anio){

		$sqltext = "CALL getFincaAnualxAnio( ? , ?)";
		$query = $this->db->query( $sqltext , array($id , $anio));

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function actualizar( $aCliente ){

		$sqltext = "CALL updateFinca( ? ,? ,? )";
		$query = $this->db->query( $sqltext , $aCliente );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}




}
?>