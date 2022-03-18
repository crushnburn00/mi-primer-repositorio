<?php
Class Inspeccion_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	
	public function buscar( $rownumber , $paginas , $aInspeccion ){

		$aInspeccion = $this->isFormatoBusqueda( $rownumber , $paginas , $aInspeccion );

		$sqltext = "CALL buscarInspeccion( ? ,? ,? ,? ,? ,? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aInspeccion );

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


	public function getDatoGeneralInspeccion( $id ){

		$sqltext = "CALL getDatoGeneralInspeccion( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}

	public function getInspeccionLevantarNoConf( $id ){

		$sqltext = "CALL getInspeccionLevantarNoConf( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}

	public function getInspeccionNoConformidad( $id ){

		$sqltext = "CALL getInspeccionNoConformidad( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}

	public function getInspeccionNormas( $id , $desc_cuestionario ){
		$aArray = array( 'p_id' => $id , 'p_descripcion_cuestionario' => $desc_cuestionario );

		$sqltext = "CALL getInspeccionNormas( ? , ?)";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}

	public function getInspeccionParcela( $id ){

		$sqltext = "CALL getInspeccionParcela( ? )";
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
	public function insert( $aArray ){

		$aArray = $this->isExist($aArray);

		$sqltext = "CALL insertInspeccion( ? , ?, ? , ?, ? , ?, ? , ?, ?, ?, ? , ?, ?, ? , ?, ?, ?, ?, ? , ?, ?, ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExist($aArray){


		if(isset($aArray['p_estandarNOP'])) 
			if($aArray['p_estandarNOP']=='0')
				unset($aArray['p_estandarNOP']);	

		if(isset($aArray['p_estandarCEE'])) 
			if($aArray['p_estandarCEE']=='0')
				unset($aArray['p_estandarCEE']);

		if(isset($aArray['p_estandarJAS'])) 
			if($aArray['p_estandarJAS']=='0')
				unset($aArray['p_estandarJAS']);

		if(isset($aArray['p_estandarperuDS'])) 
			if($aArray['p_estandarperuDS']=='0')
				unset($aArray['p_estandarperuDS']);

		if(isset($aArray['p_estandarbioSuisse'])) 
			if($aArray['p_estandarbioSuisse']=='0')
				unset($aArray['p_estandarbioSuisse']);

		if(isset($aArray['p_estandarRAS'])) 
			if($aArray['p_estandarRAS']=='0')
				unset($aArray['p_estandarRAS']);											

		if(isset($aArray['p_estandarUTZ'])) 
			if($aArray['p_estandarUTZ']=='0')
				unset($aArray['p_estandarUTZ']);			

		if(isset($aArray['p_estandarFairtrade'])) 
			if($aArray['p_estandarFairtrade']=='0')
				unset($aArray['p_estandarFairtrade']);

		if(isset($aArray['p_estandarCAFE'])) 
			if($aArray['p_estandarCAFE']=='0')
				unset($aArray['p_estandarCAFE']);

		if(isset($aArray['p_estandarNaturland'])) 
			if($aArray['p_estandarNaturland']=='0')
				unset($aArray['p_estandarNaturland']);			

		if(isset($aArray['p_exclusion_programa'])) 
			if($aArray['p_exclusion_programa']=='0')
				unset($aArray['p_exclusion_programa']);	

		if(isset($aArray['p_suspension_dias'])) 
			if($aArray['p_suspension_dias']=='0')
				unset($aArray['p_suspension_dias']);

		if(isset($aArray['p_tiempo_suspension'])) 
			if($aArray['p_tiempo_suspension']=='')
				unset($aArray['p_tiempo_suspension']);

		if(isset($aArray['p_levantar_no_confor'])) 
			if($aArray['p_levantar_no_confor']=='0')
				unset($aArray['p_levantar_no_confor']);	

		if(isset($aArray['p_aprueba_sin_condicion'])) 
			if($aArray['p_aprueba_sin_condicion']=='0')
				unset($aArray['p_aprueba_sin_condicion']);	

		if(isset($aArray['p_fec_inspeccion'])) 
			if($aArray['p_fec_inspeccion']=='' or $aArray['p_fec_inspeccion']=='00/00/0000')
				unset($aArray['p_fec_inspeccion']);	

		$aArrayBD = array(
							'p_id_inspector_interno' 	=> null,
							'p_fec_inspeccion'			=> null,
							'p_estandarNOP'				=> null,
							'p_estandarCEE'				=> null,
							'p_estandarJAS'				=> null,
							'p_estandarperuDS'			=> null,
							'p_estandarbioSuisse'		=> null,
							'p_estandarRAS'				=> null,
							'p_estandarUTZ'				=> null,
							'p_estandarFairtrade'		=> null,
							'p_estandarCAFE'			=> null,
							'p_estandarNaturland'		=> null,
							'p_cant_item_cumplido' 		=> null,
							'p_cant_item_aplica' 		=> null,
							'p_porcentaje_cumplimiento' => null,
							'p_exclusion_programa' 		=> null,
							'p_suspension_dias'			=> null,
							'p_tiempo_suspension' 		=> null,
							'p_levantar_no_confor' 		=> null,
							'p_aprueba_sin_condicion' 	=> null,
							'p_id_finca' 				=> null,
							'usureg'					=> null,

		);
		
		return array_merge($aArrayBD , $aArray);

	}


	public function insertInspeccionNormas( $aArray ){

		$aArray = $this->isExistIN($aArray);

		$sqltext = "CALL insertInspeccionNormas( ? , ? , ? , ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isExistIN($aArray){

		if(isset($aArray['p_obs_pregunta'])) 
			if($aArray['p_obs_pregunta']=='')
				unset($aArray['p_obs_pregunta']);		

		$aArrayBD = array(
							'p_id_pregunta' 	=> null,
							'p_estado_pregunta'	=> null,
							'p_obs_pregunta'	=> null,
							'p_id_inspeccion'	=> null,
		);
		
		return array_merge($aArrayBD , $aArray);


	}

	public function insertInspeccionNoConformidad( $aArray ){

		$aArray = $this->isExistNC($aArray);

		$sqltext = "CALL insertInspeccionNoConformidad( ? , ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isExistNC($aArray){

		if(isset($aArray['p_manifiesto'])) 
			if($aArray['p_manifiesto']=='')
				unset($aArray['p_manifiesto']);		

		$aArrayBD = array(
							'p_manifiesto'	=> null,
							'p_id_inspeccion'	=> null,
		);
		
		return array_merge($aArrayBD , $aArray);


	}


	public function insertInspeccionLevantarNoConf( $aArray ){

		$aArray = $this->isExistLNC($aArray);

		$sqltext = "CALL insertInspeccionLevantarNoConf( ? , ? , ? , ? , ? , ?)";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExistLNC($aArray){

		if(isset($aArray['p_punto_control'])) 
			if($aArray['p_punto_control']=='')
				unset($aArray['p_punto_control']);	

		if(isset($aArray['p_no_conformidad'])) 
			if($aArray['p_no_conformidad']=='')
				unset($aArray['p_no_conformidad']);	

		if(isset($aArray['p_accion_correctiva'])) 
			if($aArray['p_accion_correctiva']=='')
				unset($aArray['p_accion_correctiva']);

		if(isset($aArray['p_plazo_levantamiento'])) 
			if($aArray['p_plazo_levantamiento']=='')
				unset($aArray['p_plazo_levantamiento']);		

		if(isset($aArray['p_cumplio'])) 
			if($aArray['p_cumplio']=='-1')
				unset($aArray['p_cumplio']);	

		$aArrayBD = array(
							'p_id_inspeccion'		=> null,
							'p_punto_control'		=> null,
							'p_no_conformidad'		=> null,
							'p_accion_correctiva'	=> null,
							'p_plazo_levantamiento'	=> null,
							'p_cumplio'				=> null
		);
		
		return array_merge($aArrayBD , $aArray);


	}

	public function insertInspeccionParcela( $aArray ){

		$aArray = $this->isExistP($aArray);

		$sqltext = "CALL insertInspeccionParcela( ? , ? , ? , ? , ? , ?, ?)";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isExistP($aArray){

		if(isset($aArray['p_mes_cosecha'])) 
			if($aArray['p_mes_cosecha']=='')
				unset($aArray['p_mes_cosecha']);	

		if(isset($aArray['p_año_mes_siembra'])) 
			if($aArray['p_año_mes_siembra']=='')
				unset($aArray['p_año_mes_siembra']);	

		if(isset($aArray['p_edad'])) 
			if($aArray['p_edad']=='')
				unset($aArray['p_edad']);

		if(isset($aArray['p_area_total'])) 
			if($aArray['p_area_total']=='')
				unset($aArray['p_area_total']);		

		if(isset($aArray['p_cosecha_perg_anio_actual'])) 
			if($aArray['p_cosecha_perg_anio_actual']=='')
				unset($aArray['p_cosecha_perg_anio_actual']);	

		if(isset($aArray['p_estimado_perg_anio_prox'])) 
			if($aArray['p_estimado_perg_anio_prox']=='')
				unset($aArray['p_estimado_perg_anio_prox']);	

		$aArrayBD = array(
							'p_id_inspeccion'			=> null,
							'p_mes_cosecha'				=> null,
							'p_año_mes_siembra'			=> null,
							'p_edad'					=> null,
							'p_area_total'				=> null,
							'p_cosecha_perg_anio_actual'=> null,
							'p_estimado_perg_anio_prox'	=> null
		);
		
		return array_merge($aArrayBD , $aArray);
	}

	public function insertParcelaCafe( $aArray ){

		$sqltext = "CALL insertParcelaCafe( ? , ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function getInspeccion( $id ){

		$sqltext = "CALL getInspeccion( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}

	public function actualizar( $aInspeccion ){

		$sqltext = "CALL updateInspeccion( ? ,? ,? )";
		$query = $this->db->query( $sqltext , $aInspeccion );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

}
?>