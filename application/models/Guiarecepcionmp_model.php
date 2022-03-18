<?php
Class GuiaRecepcionMP_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	
	public function buscar( $rownumber , $paginas , $aArray = array() ){

		$aArray = $this->isFormatoBusqueda( $rownumber , $paginas , $aArray);

		$sqltext = "CALL buscarGuiaRecepcionMP( ? ,? ,? ,? ,? ,? ,? ,? ,? ,? )";

		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();	
	        
	    return $data;

	}

	

	public function isFormatoBusqueda( $rownumber , $paginas , $array ){

		$arrayBD = array(
							'p_id' => 0,
      						'p_codigo'  => null,
							'p_codigo_socio' => null,
							'p_id_tipo_documento' => 0,
							'p_nro_documento' => '',
							'p_nombre_razon' => '',
							'p_fecha' => null,
							'p_id_estado' => 0,
					        'rownumber' => $rownumber,
					      	'pagina' => $paginas
					      );

		
		$result =  array_merge($arrayBD , $array);

		return $result;

	}

	public function getSaldoAsignarContrato( ){

		$sqltext = "CALL getSaldoAsignarContrato()";

		$query = $this->db->query( $sqltext );

	    $data = $query->result_array();
	    $query->free_result();	
	        
	    return $data;

	}

	public function getGuiaRecepcionMP( $id ){

		$sqltext = "CALL getGuiaRecepcionMP( ? )";

		$query = $this->db->query( $sqltext , $id);

	    $data = $query->result_array();
	    $query->free_result();	
	        
	    return $data;

	}



	/*
	*	Funcion @insert
	*	Extrae el listado de Caus segun el ID buscado
	*	Parametros :  No
	*		idcau (int) : id de cau 
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/

	public function insert( $aArray ){

		$aArray = $this->isExist($aArray);

		$sqltext = "CALL insertGuiaRemisionMP( ? , ?, ? , ?, ? , ?, ? , ? ,?, ? ,? ,? ,? ,? ,?, ? , ?)";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExist($aArray){

		if(isset($aArray['p_id_producto'])) 
			if($aArray['p_id_producto']==0)
				unset($aArray['p_id_producto']);

		if(isset($aArray['p_id_sub_producto'])) 
			if($aArray['p_id_sub_producto']==0)
				unset($aArray['p_id_sub_producto']);
										
		if(isset($aArray['p_fecha_cosecha'])) 
			if($aArray['p_fecha_cosecha']=='' or $aArray['p_fecha_cosecha']=='00/00/0000')
				unset($aArray['p_fecha_cosecha']);	

		if(isset($aArray['p_id_tipo_produccion'])) 
			if($aArray['p_id_tipo_produccion']==0)
				unset($aArray['p_id_tipo_produccion']);

		if(isset($aArray['p_id_empaque_pesaje'])) 
			if($aArray['p_id_empaque_pesaje']==0)
				unset($aArray['p_id_empaque_pesaje']);

		if(isset($aArray['p_cant_pesaje'])) 
			if($aArray['p_cant_pesaje']=="")
				unset($aArray['p_cant_pesaje']);

		if(isset($aArray['p_total_kg_br_pesaje'])) 
			if($aArray['p_total_kg_br_pesaje']=="")
				unset($aArray['p_total_kg_br_pesaje']);

		if(isset($aArray['p_tara_pesaje'])) 
			if($aArray['p_tara_pesaje']=="")
				unset($aArray['p_tara_pesaje']);

		if(isset($aArray['p_total_kg_neto_pesaje'])) 
			if($aArray['p_total_kg_neto_pesaje']=="")
				unset($aArray['p_total_kg_neto_pesaje']);

		if(isset($aArray['p_observaciones'])) 
			if($aArray['p_observaciones']=="")
				unset($aArray['p_observaciones']);
			
		if(isset($aArray['p_id_tipo'])) 
			if($aArray['p_id_tipo']=="")
				unset($aArray['p_id_tipo']);

		if(isset($aArray['p_cerrar'])) 
			if($aArray['p_cerrar']==false) unset($aArray['p_cerrar']);
			else $aArray['p_cerrar'] = 1 ;


		$aArrayBD = array(
							'p_id_socio' 			=> null,
							'p_id_contrato' 		=> null,
							'p_id_finca' 			=> null,
							'p_id_producto'			=> null,
							'p_id_sub_producto'		=> null,
							'p_fecha_cosecha'		=> null,
							'p_id_tipo_produccion'	=> null,
							'p_id_empaque_pesaje'	=> null,
							'p_cant_pesaje'			=> null,
							'p_total_kg_br_pesaje'  => null,
							'p_tara_pesaje'			=> null,
							'p_total_kg_neto_pesaje'=> null,
							'p_observaciones'		=> null,						
							'p_id_tipo'				=> null,
							'p_saldo_pendiente'		=> null,
							'p_cerrar'				=> 0,
							'usureg'				=> null
		);
		
		return array_merge($aArrayBD , $aArray);

	}

	public function updateGuiaRecepcionFisico( $aArray ){

		$aArray = $this->isExistFisico($aArray);

		$sqltext = "CALL updateGuiaRecepcionFisico( ? , ?, ? , ?, ? , ?, ? , ? ,?, ?, ? , ?, ? , ?, ? , ?, ? , ? ,?, ?,? , ?, ? , ?, ? , ?, ? , ? ,?, ?, ?, ? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isExistFisico($aArray){

		if(isset($aArray['p_olor_limpio'])) if($aArray['p_olor_limpio']==0 || $aArray['p_olor_limpio']=="") unset($aArray['p_olor_limpio']);

		if(isset($aArray['p_olor_fermento']))  if($aArray['p_olor_fermento']==0 || $aArray['p_olor_fermento']=="") unset($aArray['p_olor_fermento']);

		if(isset($aArray['p_olor_moho'])) if($aArray['p_olor_moho']==0 || $aArray['p_olor_moho']=="") unset($aArray['p_olor_moho']);

		if(isset($aArray['p_olor_fenol'])) if($aArray['p_olor_fenol']==0 || $aArray['p_olor_fenol']=="") unset($aArray['p_olor_fenol']);

		if(isset($aArray['p_olor_tierra'])) if($aArray['p_olor_tierra']==0 || $aArray['p_olor_tierra']=="") unset($aArray['p_olor_tierra']);

		if(isset($aArray['p_olor_otro'])) if($aArray['p_olor_otro']==0 || $aArray['p_olor_otro']=="") unset($aArray['p_olor_otro']);

		if(isset($aArray['p_color_variado'])) if($aArray['p_color_variado']==0 || $aArray['p_color_variado']=="") unset($aArray['p_color_variado']);

		if(isset($aArray['p_color_normal'])) if($aArray['p_color_normal']==0 || $aArray['p_color_normal']=="") unset($aArray['p_color_normal']);

		if(isset($aArray['p_color_manchado'])) if($aArray['p_color_manchado']==0 || $aArray['p_color_manchado']=="") unset($aArray['p_color_manchado']);

		if(isset($aArray['p_color_negruzco']))  if($aArray['p_color_negruzco']==0 || $aArray['p_color_negruzco']=="") unset($aArray['p_color_negruzco']);

		if(isset($aArray['p_color_otro'])) if($aArray['p_color_otro']==0 || $aArray['p_color_otro']=="") unset($aArray['p_color_otro']);

		if(isset($aArray['p_obs_analisisfisico']))  if($aArray['p_obs_analisisfisico']=="") unset($aArray['p_obs_analisisfisico']);

		if(isset($aArray['p_grano_negro']))  if($aArray['p_grano_negro']=="") unset($aArray['p_grano_negro']);

		if(isset($aArray['p_grano_agrio'])) if($aArray['p_grano_agrio']=="") unset($aArray['p_grano_agrio']);

		if(isset($aArray['p_cereza_seca'])) if($aArray['p_cereza_seca']=="") unset($aArray['p_cereza_seca']);

		if(isset($aArray['p_danio_hongo'])) if($aArray['p_danio_hongo']=="") unset($aArray['p_danio_hongo']);

		if(isset($aArray['p_materia_extrania'])) if($aArray['p_materia_extrania']=="") unset($aArray['p_materia_extrania']);

		if(isset($aArray['p_brocado_severo'])) if($aArray['p_brocado_severo']=="") unset($aArray['p_brocado_severo']);

		if(isset($aArray['p_brocado_severo'])) if($aArray['p_brocado_severo']=="") unset($aArray['p_brocado_severo']);

		if(isset($aArray['p_negro_parcial'])) if($aArray['p_negro_parcial']=="") unset($aArray['p_negro_parcial']);

		if(isset($aArray['p_agrio_parcial'])) if($aArray['p_agrio_parcial']=="") unset($aArray['p_agrio_parcial']);

		if(isset($aArray['p_pergamino'])) if($aArray['p_pergamino']=="") unset($aArray['p_pergamino']);

		if(isset($aArray['p_inmaduro'])) if($aArray['p_inmaduro']=="") unset($aArray['p_inmaduro']);

		if(isset($aArray['p_flotador'])) if($aArray['p_flotador']=="") unset($aArray['p_flotador']);

		if(isset($aArray['p_averanado'])) if($aArray['p_averanado']=="") unset($aArray['p_averanado']);

		if(isset($aArray['p_conchas'])) if($aArray['p_conchas']=="") unset($aArray['p_conchas']);

		if(isset($aArray['p_partido'])) if($aArray['p_partido']=="") unset($aArray['p_partido']);

		if(isset($aArray['p_pulpa_seca'])) if($aArray['p_pulpa_seca']=="") unset($aArray['p_pulpa_seca']);

		if(isset($aArray['p_viejo'])) if($aArray['p_viejo']=="") unset($aArray['p_viejo']);

		if(isset($aArray['p_brocado'])) if($aArray['p_brocado']=="") unset($aArray['p_brocado']);

		$aArrayBD = array(
							'p_id' 					=> null,
							'p_exportable_gr' 		=> null,
							'p_descarte_gr' 		=> null,
							'p_cascarilla_gr' 		=> null,
							'p_humedad_fisico'		=> null,
							'p_olor_limpio'			=> 0,
							'p_olor_fermento'		=> 0,
							'p_olor_moho'			=> 0,
							'p_olor_fenol'			=> 0,
							'p_olor_tierra'			=> 0,
							'p_olor_otro'			=> 0,
							'p_color_variado'  		=> 0,
							'p_color_normal'		=> 0,
							'p_color_manchado'		=> 0,
							'p_color_negruzco'		=> 0,						
							'p_color_otro'			=> 0,
							'p_obs_analisisfisico'	=> null,
							'p_grano_negro'			=> null,
							'p_grano_agrio'			=> null,
							'p_cereza_seca'			=> null,
							'p_danio_hongo'			=> null,
							'p_materia_extrania'	=> null,
							'p_brocado_severo'		=> null,
							'p_negro_parcial'		=> null,
							'p_agrio_parcial'		=> null,
							'p_pergamino'			=> null,
							'p_flotador'			=> null,
							'p_inmaduro'			=> null,
							'p_averanado'			=> null,
							'p_conchas'				=> null,
							'p_partido'				=> null,
							'p_pulpa_seca'			=> null,
							'p_viejo'				=> null,
							'p_brocado'				=> null,
							'p_usu_mod'				=> 1
		);
		
		return array_merge($aArrayBD , $aArray);
	}

	public function updateGuiaRecepcionSensorial( $aArray ){

		$aArray = $this->isExistSensorial($aArray);

		$sqltext = "CALL updateGuiaRecepcionSensorial( ? , ?, ? , ?, ? , ?, ? , ? ,?, ?, ? , ?, ? , ?, ? , ?, ? , ? ,?, ?, ? , ?, ? , ?, ? , ?, ? , ? ,? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isExistSensorial($aArray){

		if(isset($aArray['p_rendimiento'])) if($aArray['p_rendimiento']==0 || $aArray['p_rendimiento']=="") unset($aArray['p_rendimiento']);

		if(isset($aArray['p_porc_humedad']))  if($aArray['p_porc_humedad']==0 || $aArray['p_porc_humedad']=="") unset($aArray['p_porc_humedad']);

		if(isset($aArray['p_tambor'])) if($aArray['p_tambor']==0 || $aArray['p_tambor']=="") unset($aArray['p_tambor']);

		if(isset($aArray['p_t_tambor'])) if($aArray['p_t_tambor']==0 || $aArray['p_t_tambor']=="") unset($aArray['p_t_tambor']);

		if(isset($aArray['p_tiempo_primer_crack'])) if($aArray['p_tiempo_primer_crack']==0 || $aArray['p_tiempo_primer_crack']=="") unset($aArray['p_tiempo_primer_crack']);

		if(isset($aArray['p_t_primer_crack'])) if($aArray['p_t_primer_crack']==0 || $aArray['p_t_primer_crack']=="") unset($aArray['p_t_primer_crack']);

		if(isset($aArray['p_tiempo_salida'])) if($aArray['p_tiempo_salida']==0 || $aArray['p_tiempo_salida']=="") unset($aArray['p_tiempo_salida']);

		if(isset($aArray['p_t_salida'])) if($aArray['p_t_salida']==0 || $aArray['p_t_salida']=="") unset($aArray['p_t_salida']);

		if(isset($aArray['p_observaciones_tueste'])) if($aArray['p_observaciones_tueste']=="") unset($aArray['p_observaciones_tueste']);

		if(isset($aArray['p_fragancia']))  if($aArray['p_fragancia']==0 || $aArray['p_fragancia']=="") unset($aArray['p_fragancia']);

		if(isset($aArray['p_sabor'])) if($aArray['p_sabor']==0 || $aArray['p_sabor']=="") unset($aArray['p_sabor']);

		if(isset($aArray['p_sabor_residual']))  if($aArray['p_sabor_residual']==0 || $aArray['p_sabor_residual']=="") unset($aArray['p_sabor_residual']);

		if(isset($aArray['p_acidez']))  if($aArray['p_acidez']==0 || $aArray['p_acidez']=="") unset($aArray['p_acidez']);

		if(isset($aArray['p_cuerpo']))  if($aArray['p_cuerpo']==0 || $aArray['p_cuerpo']=="") unset($aArray['p_cuerpo']);

		if(isset($aArray['p_uniformidad']))  if($aArray['p_uniformidad']==0 || $aArray['p_uniformidad']=="") unset($aArray['p_uniformidad']);

		if(isset($aArray['p_balance']))  if($aArray['p_balance']==0 || $aArray['p_balance']=="") unset($aArray['p_balance']);

		if(isset($aArray['p_taza_limpieza']))  if($aArray['p_taza_limpieza']==0 || $aArray['p_taza_limpieza']=="") unset($aArray['p_taza_limpieza']);

		if(isset($aArray['p_dulzor']))  if($aArray['p_dulzor']==0 || $aArray['p_dulzor']=="") unset($aArray['p_dulzor']);

		if(isset($aArray['p_puntaje_catador']))  if($aArray['p_puntaje_catador']==0 || $aArray['p_puntaje_catador']=="") unset($aArray['p_puntaje_catador']);

		if(isset($aArray['p_defecto_fermento']))  if($aArray['p_defecto_fermento']==0 || $aArray['p_defecto_fermento']=="") unset($aArray['p_defecto_fermento']);

		if(isset($aArray['p_defecto_tierra']))  if($aArray['p_defecto_tierra']==0 || $aArray['p_defecto_tierra']=="") unset($aArray['p_defecto_tierra']);

		if(isset($aArray['p_defecto_fenol']))  if($aArray['p_defecto_fenol']==0 || $aArray['p_defecto_fenol']=="") unset($aArray['p_defecto_fenol']);

		if(isset($aArray['p_defecto_sucio']))  if($aArray['p_defecto_sucio']==0 || $aArray['p_defecto_sucio']=="") unset($aArray['p_defecto_sucio']);

		if(isset($aArray['p_defecto_moho']))  if($aArray['p_defecto_moho']==0 || $aArray['p_defecto_moho']=="") unset($aArray['p_defecto_moho']);

		if(isset($aArray['p_defecto_contaminado']))  if($aArray['p_defecto_contaminado']==0 || $aArray['p_defecto_contaminado']=="") unset($aArray['p_defecto_contaminado']);

		if(isset($aArray['p_defecto_reposado']))  if($aArray['p_defecto_reposado']==0 || $aArray['p_defecto_reposado']=="") unset($aArray['p_defecto_reposado']);

		if(isset($aArray['p_obs_analisis_sensorial']))  if($aArray['p_obs_analisis_sensorial']=="") unset($aArray['p_obs_analisis_sensorial']);

		$aArrayBD = array(
							'p_id' 					=> null,
							'p_rendimiento' 		=> null,
							'p_porc_humedad' 		=> null,
							'p_tambor' 				=> null,
							'p_t_tambor'			=> null,
							'p_tiempo_primer_crack'	=> null,
							'p_t_primer_crack'		=> null,
							'p_tiempo_salida'		=> null,
							'p_t_salida'			=> null,
							'p_observaciones_tueste'=> null,
							'p_fragancia'			=> null,
							'p_sabor'  				=> null,
							'p_sabor_residual'		=> null,
							'p_acidez'				=> null,
							'p_cuerpo'				=> null,						
							'p_uniformidad'			=> null,
							'p_balance'				=> null,
							'p_taza_limpieza'		=> null,
							'p_dulzor'				=> null,
							'p_puntaje_catador'		=> null,
							'p_defecto_fermento'	=> 0,
							'p_defecto_tierra'		=> 0,
							'p_defecto_fenol'		=> 0,
							'p_defecto_sucio'		=> 0,
							'p_defecto_moho'		=> 0,
							'p_defecto_contaminado'	=> 0,
							'p_defecto_reposado'	=> 0,
							'p_obs_analisis_sensorial'	=> null,
							'p_usu_mod'				=> 1
		);
		
		return array_merge($aArrayBD , $aArray);
	}


	public function updateGuiaRecepcionVisual( $aArray ){

		$aArray = $this->isExistVisual($aArray);

		$sqltext = "CALL updateGuiaRecepcionVisual( ? , ?, ? , ?, ? , ?, ? , ? ,?, ?, ? , ?, ? , ?, ? , ?, ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isExistVisual($aArray){

		if(isset($aArray['p_humedad_visual'])) if($aArray['p_humedad_visual']==0 || $aArray['p_humedad_visual']=="") unset($aArray['p_humedad_visual']);

		if(isset($aArray['p_olor_fresco_visual']))  if($aArray['p_olor_fresco_visual']==0 || $aArray['p_olor_fresco_visual']=="") unset($aArray['p_olor_fresco_visual']);

		if(isset($aArray['p_olor_viejo_visual'])) if($aArray['p_olor_viejo_visual']==0 || $aArray['p_olor_viejo_visual']=="") unset($aArray['p_olor_viejo_visual']);

		if(isset($aArray['p_olor_fermento_visual'])) if($aArray['p_olor_fermento_visual']==0 || $aArray['p_olor_fermento_visual']=="") unset($aArray['p_olor_fermento_visual']);

		if(isset($aArray['p_olor_terroso_visual'])) if($aArray['p_olor_terroso_visual']==0 || $aArray['p_olor_terroso_visual']=="") unset($aArray['p_olor_terroso_visual']);

		if(isset($aArray['p_olor_moho_visual'])) if($aArray['p_olor_moho_visual']==0 || $aArray['p_olor_moho_visual']=="") unset($aArray['p_olor_moho_visual']);

		if(isset($aArray['p_olor_hierbas_visual'])) if($aArray['p_olor_hierbas_visual']==0 || $aArray['p_olor_hierbas_visual']=="") unset($aArray['p_olor_hierbas_visual']);

		if(isset($aArray['p_olor_contaminado_visual'])) if($aArray['p_olor_contaminado_visual']==0 || $aArray['p_olor_contaminado_visual']=="") unset($aArray['p_olor_contaminado_visual']);

		if(isset($aArray['p_olor_otros_visual'])) if($aArray['p_olor_otros_visual']==0 || $aArray['p_olor_otros_visual']=="") unset($aArray['p_olor_otros_visual']);

		if(isset($aArray['p_color_normal_visual'])) if($aArray['p_color_normal_visual']==0 || $aArray['p_color_normal_visual']=="") unset($aArray['p_color_normal_visual']);

		if(isset($aArray['p_color_disparejo_visual'])) if($aArray['p_color_disparejo_visual']==0 || $aArray['p_color_disparejo_visual']=="") unset($aArray['p_color_disparejo_visual']);

		if(isset($aArray['p_color_manchado_visual'])) if($aArray['p_color_manchado_visual']==0 || $aArray['p_color_manchado_visual']=="") unset($aArray['p_color_manchado_visual']);

		if(isset($aArray['p_color_negruzco_visual'])) if($aArray['p_color_negruzco_visual']==0 || $aArray['p_color_negruzco_visual']=="") unset($aArray['p_color_negruzco_visual']);

		if(isset($aArray['p_color_otros_visual'])) if($aArray['p_color_otros_visual']==0 || $aArray['p_color_otros_visual']=="") unset($aArray['p_color_otros_visual']);

		if(isset($aArray['p_obs_analisis_visual'])) if($aArray['p_obs_analisis_visual']=="") unset($aArray['p_obs_analisis_visual']);


		$aArrayBD = array(
							'p_id' 						=> null,
							'p_humedad_visual'			=> null,
							'p_olor_fresco_visual'		=> null,
							'p_olor_viejo_visual'		=> null,
							'p_olor_fermento_visual'	=> null,
							'p_olor_terroso_visual'		=> null,
							'p_olor_moho_visual'		=> null,
							'p_olor_hierbas_visual'		=> null,
							'p_olor_contaminado_visual'	=> null,
							'p_olor_otros_visual'		=> null,
							'p_color_normal_visual'		=> null,
							'p_color_disparejo_visual'	=> null,
							'p_color_manchado_visual'	=> null,
							'p_color_negruzco_visual'	=> null,
							'p_color_otros_visual'		=> null,
							'p_obs_analisis_visual'		=> null,
							'p_usu_mod'					=> 1
		);
		
		return array_merge($aArrayBD , $aArray);
	}





}
?>