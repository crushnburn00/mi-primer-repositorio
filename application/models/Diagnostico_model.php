<?php
Class Diagnostico_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	
	public function buscar( $rownumber , $paginas , $aArray ){

		$aArray = $this->isFormatoBusqueda( $rownumber , $paginas , $aArray );

		$sqltext = "CALL buscarDiagnostico( ? ,? ,? ,? ,? ,? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}

	public function isFormatoBusqueda( $rownumber , $paginas , $array ){

		$arrayBD = array(
							'p_id' => 0,
      						'p_codigo'  => '',
							'p_fecha_ini' => '',
							'p_fecha_fin' => '',
							'p_estado' => -1,
							'p_id_finca' => 0,
							'p_codigo_exact'  => '',
					        'rownumber' => $rownumber,
					      	'pagina' => $paginas
					      );

		$result =  array_merge($arrayBD , $array);

		return $result;

	}


	public function getProductorIdFinca( $id ){

		$sqltext = "CALL getProductorIdFinca( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}

	/*public function listarInspector(){

		$sqltext = "CALL listarInspector( )";
		$query = $this->db->query( $sqltext );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}*/
	

	public function listarPregunta( $descripcion_pregunta){

		$sqltext = "CALL listarPregunta( ? )";
		$query = $this->db->query( $sqltext , $descripcion_pregunta );

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
	public function insert( $aArray ){

		$aArray = $this->isExist($aArray);

		$sqltext = "CALL insertDiagnostico( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExist($aArray){


		if(isset($aArray['p_nro_ficha'])) 
			if($aArray['p_nro_ficha']=='')
				unset($aArray['p_nro_ficha']);	

		if(isset($aArray['p_fecha'])) 
			if($aArray['p_fecha']=='' or $aArray['p_fecha']=='00/00/0000')
				unset($aArray['p_fecha']);	

		if(isset($aArray['p_obs_infraestructura'])) 
			if($aArray['p_obs_infraestructura']=='')
				unset($aArray['p_obs_infraestructura']);

		if(isset($aArray['p_total_hectareas_prod'])) 
			if($aArray['p_total_hectareas_prod']=='')
				unset($aArray['p_total_hectareas_prod']);

		if(isset($aArray['p_total_costo_has_prod'])) 
			if($aArray['p_total_costo_has_prod']=='')
				unset($aArray['p_total_costo_has_prod']);

		if(isset($aArray['p_prom_mensual_socio'])) 
			if($aArray['p_prom_mensual_socio']=='')
				unset($aArray['p_prom_mensual_socio']);

		if(isset($aArray['p_ingreso_agricultura'])) 
			if($aArray['p_ingreso_agricultura']=='')
				unset($aArray['p_ingreso_agricultura']);

		if(isset($aArray['p_ingreso_bodega'])) 
			if($aArray['p_ingreso_bodega']=='')
				unset($aArray['p_ingreso_bodega']);

		if(isset($aArray['p_ingreso_transporte'])) 
			if($aArray['p_ingreso_transporte']=='')
				unset($aArray['p_ingreso_transporte']);

		if(isset($aArray['p_otro'])) 
			if($aArray['p_otro']=='')
				unset($aArray['p_otro']);

		if(isset($aArray['p_id_responsable_area'])) 
			if($aArray['p_id_responsable_area']=='')
				unset($aArray['p_id_responsable_area']);	

		if(isset($aArray['p_id_tecnico_campo'])) 
			if($aArray['p_id_tecnico_campo']=='')
				unset($aArray['p_id_tecnico_campo']);	

		if(isset($aArray['p_total_hectareas'])) 
			if($aArray['p_total_hectareas']=='')
				unset($aArray['p_total_hectareas']);	

		if(isset($aArray['p_total_variedad'])) 
			if($aArray['p_total_variedad']=='')
				unset($aArray['p_total_variedad']);	

		if(isset($aArray['p_total_edad'])) 
			if($aArray['p_total_edad']=='')
				unset($aArray['p_total_edad']);	

		if(isset($aArray['p_total_meses_cosecha'])) 
			if($aArray['p_total_meses_cosecha']=='')
				unset($aArray['p_total_meses_cosecha']);	

		if(isset($aArray['p_total_cosecha_anterior'])) 
			if($aArray['p_total_cosecha_anterior']=='')
				unset($aArray['p_total_cosecha_anterior']);	

		if(isset($aArray['p_total_cosecha_actual'])) 
			if($aArray['p_total_cosecha_actual']=='')
				unset($aArray['p_total_cosecha_actual']);	

		if(isset($aArray['p_area_total'])) 
			if($aArray['p_area_total']=='')
				unset($aArray['p_area_total']);	

		if(isset($aArray['p_area_cafe'])) 
			if($aArray['p_area_cafe']=='')
				unset($aArray['p_area_cafe']);

		if(isset($aArray['p_crecimiento'])) 
			if($aArray['p_crecimiento']=='')
				unset($aArray['p_crecimiento']);		

		if(isset($aArray['p_bosque'])) 
			if($aArray['p_bosque']=='')
				unset($aArray['p_bosque']);		

		if(isset($aArray['p_purma'])) 
			if($aArray['p_purma']=='')
				unset($aArray['p_purma']);									

		if(isset($aArray['p_pan_llevar'])) 
			if($aArray['p_pan_llevar']=='')
				unset($aArray['p_pan_llevar']);		

		if(isset($aArray['p_vivienda'])) 
			if($aArray['p_vivienda']=='')
				unset($aArray['p_vivienda']);		


		$aArrayBD = array(
							'p_nro_ficha' 				=> null,
							'p_fecha' 					=> null,
							'p_obs_infraestructura' 	=> null ,
							'p_total_hectareas_prod' 	=> null ,
							'p_total_costo_has_prod' 	=> null ,
							'p_total_costo_total_prod' 	=> null ,
							'p_prom_mensual_socio' 		=> null ,
							'p_ingreso_agricultura' 	=> null ,
							'p_ingreso_bodega' 			=> null ,
							'p_ingreso_transporte' 		=> null ,
							'p_otro'					=> null ,
							'p_prestamo_entidades'		=> null ,
							'p_id_responsable_area'		=> null ,
							'p_id_tecnico_campo'		=> null ,
							'p_total_hectareas'			=> null ,
							'p_total_variedad'			=> null ,
							'p_total_edad'				=> null ,
							'p_total_meses_cosecha'		=> null ,
							'p_total_cosecha_anterior'	=> null ,
							'p_total_cosecha_actual'	=> null ,
							'p_area_total'				=> null ,
							'p_area_cafe'				=> null ,
							'p_crecimiento'				=> null ,
							'p_bosque'					=> null ,
							'p_purma'					=> null ,
							'p_pan_llevar'				=> null ,
							'p_vivienda'				=> null ,
							'p_id_finca' 				=> null ,
							'usureg'					=> null
		);

		return array_merge($aArrayBD , $aArray);

	}


	public function insertDI( $aArray ){

		$aArray = $this->isExistDI($aArray);

		$sqltext = "CALL insertDiagnosticoInfraestructura( ?, ?, ?, ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}
	
	public function isExistDI($aArray){

		if(isset($aArray['p_id_diagnostico'])) 
			if($aArray['p_id_diagnostico']=='')
				unset($aArray['p_id_diagnostico']);	

		if(isset($aArray['p_id_pregunta'])) 
			if($aArray['p_id_pregunta']=='')
				unset($aArray['p_id_pregunta']);	

		if(isset($aArray['p_estado_pregunta'])) 
			if($aArray['p_estado_pregunta']=='')
				unset($aArray['p_estado_pregunta']);

		if(isset($aArray['p_observacion'])) 
			if($aArray['p_observacion']=='')
				unset($aArray['p_observacion']);


		$aArrayBD = array(
							'p_id_diagnostico' 		=> null,
							'p_id_pregunta' 		=> null,
							'p_estado_pregunta' 	=> null,
							'p_observacion' 		=> null 
		);

		return array_merge($aArrayBD , $aArray);

	}

	public function insertDC( $aArray ){

		$aArray = $this->isExistDC($aArray);

		$sqltext = "CALL insertDiagnosticoCampo( ?, ?, ?, ?, ?, ?, ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}

	public function isExistDC($aArray){

		if(isset($aArray['p_hectareas'])) 
			if($aArray['p_hectareas']=='')
				unset($aArray['p_hectareas']);	

		if(isset($aArray['p_variedad'])) 
			if($aArray['p_variedad']=='')
				unset($aArray['p_variedad']);	

		if(isset($aArray['p_edad'])) 
			if($aArray['p_edad']=='')
				unset($aArray['p_edad']);

		if(isset($aArray['p_meses_cosecha'])) 
			if($aArray['p_meses_cosecha']=='')
				unset($aArray['p_meses_cosecha']);

		if(isset($aArray['p_cosecha_anterior'])) 
			if($aArray['p_cosecha_anterior']=='')
				unset($aArray['p_cosecha_anterior']);

		if(isset($aArray['p_cosecha_actual'])) 
			if($aArray['p_cosecha_actual']=='')
				unset($aArray['p_cosecha_actual']);			

		$aArrayBD = array(
							'p_id_diagnostico' 	=> null,
							'p_hectareas' 		=> null,
							'p_variedad' 		=> null,
							'p_edad' 			=> null,
							'p_meses_cosecha' 	=> null,
							'p_cosecha_anterior'=> null,
							'p_cosecha_actual' 	=> null,
		);

		return array_merge($aArrayBD , $aArray);

	}


	public function insertDCP( $aArray ){

		$aArray = $this->isExistDCP($aArray);

		$sqltext = "CALL insertDiagnosticoCosto( ?, ?, ?, ?, ?, ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isExistDCP($aArray){

		if(isset($aArray['p_hectareas'])) 
			if($aArray['p_hectareas']=='')
				unset($aArray['p_hectareas']);	

		if(isset($aArray['p_costo_has'])) 
			if($aArray['p_costo_has']=='')
				unset($aArray['p_costo_has']);	

		if(isset($aArray['p_costo_total'])) 
			if($aArray['p_costo_total']=='')
				unset($aArray['p_costo_total']);

		if(isset($aArray['p_observaciones'])) 
			if($aArray['p_observaciones']=='')
				unset($aArray['p_observaciones']);		

		$aArrayBD = array(
							'p_id_diagnostico' 	=> null,
							'p_id_pregunta' 	=> null,
							'p_hectareas' 		=> null,
							'p_costo_has' 		=> null,
							'p_costo_total' 	=> null,
							'p_observaciones'	=> null
		);

		return array_merge($aArrayBD , $aArray);

	}

	public function getDiagnostico( $id ){

		$sqltext = "CALL getDiagnostico( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}


	public function getDiagnosticoInfra( $idDiagnostico ){

		$sqltext = "CALL getDiagnosticoInfra( ? )";
		$query = $this->db->query( $sqltext , $idDiagnostico );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}


	public function getDiagnosticoCostoProd( $idDiagnostico ){

		$sqltext = "CALL getDiagnosticoCostoProd( ? )";
		$query = $this->db->query( $sqltext , $idDiagnostico );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}


	public function getDiagnosticoCampo( $idDiagnostico ){

		$sqltext = "CALL getDiagnosticoCampo( ? )";
		$query = $this->db->query( $sqltext , $idDiagnostico );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}
	
	public function actualizar( $aArray ){

		$sqltext = "CALL updateDiagnostico( ? ,? ,? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

}
?>