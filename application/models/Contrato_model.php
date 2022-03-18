<?php
Class Contrato_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	
	public function buscar( $rownumber , $paginas , $aArray = array() ){

		$aArray = $this->isFormatoBusqueda( $rownumber , $paginas , $aArray);

		$sqltext = "CALL buscarContrato( ? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? )";

		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();	
	        
	    return $data;
	
	}

	

	public function isFormatoBusqueda( $rownumber , $paginas , $array ){

		$arrayBD = array(
							'p_id' => 0,
      						'p_nro_contrato'  => '',
							'p_fecha_contrato' => '',
							'p_id_tipo_contrato' => 0,
							'p_codigo_cliente' => '',
							'p_razon_social' => '',
							'p_id_tipo_producto' => 0,
							'p_id_tipo_produccion' => 0,
							'p_id_calidad' => 0,
							'p_estado'  => -1,
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

		$sqltext = "CALL insertContrato( ? , ?, ? , ?, ? , ?, ? , ? ,?, ?, 
										? , ?, ? , ?, ? , ?, ? , ? ,?, ?, 
										? , ?, ? , ?, ? , ?, ? , ? ,?, ?, 
										? , ?, ? , ?, ? , ?, ? , ? ,?, ?, 
										?  )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExist($aArray){

		if(isset($aArray['p_nro_contrato'])) 
			if($aArray['p_nro_contrato']=="")
				unset($aArray['p_nro_contrato']);

		if(isset($aArray['p_fecha'])) 
			if($aArray['p_fecha']=='' or $aArray['p_fecha']=="00-00-0000")
				unset($aArray['p_fecha']);

		if(isset($aArray['p_id_condicion_embarque'])) 
			if($aArray['p_id_condicion_embarque']==0)
				unset($aArray['p_id_condicion_embarque']);

		if(isset($aArray['p_fecha_embarque'])) 
			if($aArray['p_fecha_embarque']=='' or $aArray['p_fecha_embarque']=="00-00-0000")
				unset($aArray['p_fecha_embarque']);

		if(isset($aArray['p_id_ciudad'])) 
			if($aArray['p_id_ciudad']==0)
				unset($aArray['p_id_ciudad']);

		if(isset($aArray['p_id_tipo_contrato'])) 
			if($aArray['p_id_tipo_contrato']==0)
				unset($aArray['p_id_tipo_contrato']);

		if(isset($aArray['p_id_moneda'])) 
			if($aArray['p_id_moneda']==0)
				unset($aArray['p_id_moneda']);

		if(isset($aArray['p_precio'])) 
			if($aArray['p_precio']=="")
				unset($aArray['p_precio']);

		if(isset($aArray['p_id_calculo'])) 
			if($aArray['p_id_calculo']==0)
				unset($aArray['p_id_calculo']);

		if(isset($aArray['p_periodo_cosecha'])) 
			if($aArray['p_periodo_cosecha']=="")
				unset($aArray['p_periodo_cosecha']);

		if(isset($aArray['p_id_tipo_produccion'])) 
			if($aArray['p_id_tipo_produccion']==0)
				unset($aArray['p_id_tipo_produccion']);

		if(isset($aArray['p_id_sub_producto'])) 
			if($aArray['p_id_sub_producto']==0)
				unset($aArray['p_id_sub_producto']);

		if(isset($aArray['p_id_entidad_certificadora'])) 
			if($aArray['p_id_entidad_certificadora']==0)
				unset($aArray['p_id_entidad_certificadora']);

		if(isset($aArray['p_id_tipo_certificacion'])) 
			if($aArray['p_id_tipo_certificacion']==0)
				unset($aArray['p_id_tipo_certificacion']);

		if(isset($aArray['p_peso_contrato'])) 
			if($aArray['p_peso_contrato']==0)
				unset($aArray['p_peso_contrato']);

		if(isset($aArray['p_id_unidad_medida'])) 
			if($aArray['p_id_unidad_medida']==0)
				unset($aArray['p_id_unidad_medida']);

		if(isset($aArray['p_id_empaque_tipo'])) 
			if($aArray['p_id_empaque_tipo']==0)
				unset($aArray['p_id_empaque_tipo']);

		if(isset($aArray['p_total_sacos'])) 
			if($aArray['p_total_sacos']=="")
				unset($aArray['p_total_sacos']);

		if(isset($aArray['p_id_calidad'])) 
			if($aArray['p_id_calidad']==0)
				unset($aArray['p_id_calidad']);

		if(isset($aArray['p_peso_saco_kg'])) 
			if($aArray['p_peso_saco_kg']=="")
				unset($aArray['p_peso_saco_kg']);

		if(isset($aArray['p_id_grado'])) 
			if($aArray['p_id_grado']==0)
				unset($aArray['p_id_grado']);

		if(isset($aArray['p_peso_neto_kg'])) 
			if($aArray['p_peso_neto_kg']=="")
				unset($aArray['p_peso_neto_kg']);

		if(isset($aArray['p_cantidad_defectos'])) 
			if($aArray['p_cantidad_defectos']=="")
				unset($aArray['p_cantidad_defectos']);

		if(isset($aArray['p_observaciones'])) 
			if($aArray['p_observaciones']=="")
				unset($aArray['p_observaciones']);

		if(isset($aArray['p_id_facturaren'])) 
			if($aArray['p_id_facturaren']==0)
				unset($aArray['p_id_facturaren']);

		if(isset($aArray['p_fecha_fijacion'])) 
			if($aArray['p_fecha_fijacion']=='' or $aArray['p_fecha_fijacion']=="00-00-0000")
				unset($aArray['p_fecha_fijacion']);

		if(isset($aArray['p_kg_qq'])) 
			if($aArray['p_kg_qq']=="")
				unset($aArray['p_kg_qq']);

		if(isset($aArray['p_kg_lb'])) 
			if($aArray['p_kg_lb']=="")
				unset($aArray['p_kg_lb']);

		if(isset($aArray['p_id_estado_fijacion'])) 
			if($aArray['p_id_estado_fijacion']==0)
				unset($aArray['p_id_estado_fijacion']);

		if(isset($aArray['p_precio_nivel_fijacion'])) 
			if($aArray['p_precio_nivel_fijacion']=="")
				unset($aArray['p_precio_nivel_fijacion']);

		if(isset($aArray['p_diferencial'])) 
			if($aArray['p_diferencial']=="")
				unset($aArray['p_diferencial']);

		if(isset($aArray['p_nota_credito'])) 
			if($aArray['p_nota_credito']=="")
				unset($aArray['p_nota_credito']);

		if(isset($aArray['p_gastos_exp'])) 
			if($aArray['p_gastos_exp']=="")
				unset($aArray['p_gastos_exp']);

		if(isset($aArray['p_pu_total_a'])) 
			if($aArray['p_pu_total_a']=="")
				unset($aArray['p_pu_total_a']);

		if(isset($aArray['p_pu_total_b'])) 
			if($aArray['p_pu_total_b']=="")
				unset($aArray['p_pu_total_b']);

		if(isset($aArray['p_pu_total_c'])) 
			if($aArray['p_pu_total_c']=="")
				unset($aArray['p_pu_total_c']);

		if(isset($aArray['p_total_facturar_1'])) 
			if($aArray['p_total_facturar_1']=="")
				unset($aArray['p_total_facturar_1']);

		if(isset($aArray['p_total_facturar_2'])) 
			if($aArray['p_total_facturar_2']=="")
				unset($aArray['p_total_facturar_2']);

		if(isset($aArray['p_total_facturar_3'])) 
			if($aArray['p_total_facturar_3']=="")
				unset($aArray['p_total_facturar_3']);															

		$aArrayBD = array(
							'p_nro_contrato' => null,
							'p_fecha' => null,
							'p_id_cliente' => null,
							'p_id_condicion_embarque' => null,
							'p_fecha_embarque' => null,
							'p_id_ciudad' => null,
							'p_id_tipo_contrato' => null,
							'p_id_moneda' => null,
							'p_precio' => null,
							'p_id_calculo' => null,
							'p_periodo_cosecha' => null,
							'p_id_tipo_produccion' => null,
							'p_id_sub_producto' => null,
							'p_id_entidad_certificadora' => null,
							'p_id_tipo_certificacion' => null,
							'p_peso_contrato' => null,
							'p_id_unidad_medida' => null,
							'p_id_empaque_tipo' => null,
							'p_total_sacos' => null,
							'p_id_calidad' => null,
							'p_peso_saco_kg' => null,
							'p_id_grado' => null,
							'p_peso_neto_kg' => null,
							'p_cantidad_defectos' => null,
							'p_observaciones' => null,
							'p_id_facturaren' => null,
							'p_fecha_fijacion' => null,
							'p_kg_qq' => null,
							'p_kg_lb' => null,
							'p_id_estado_fijacion' => null,
							'p_precio_nivel_fijacion' => null,
							'p_diferencial' => null,
							'p_nota_credito' => null,
							'p_gastos_exp' => null,
							'p_pu_total_a' => null,
							'p_pu_total_b' => null,
							'p_pu_total_c' => null,
							'p_total_facturar_1' => null,
							'p_total_facturar_2' => null,
							'p_total_facturar_3' => null,
							'usureg' => null
		);
		
		return array_merge($aArrayBD , $aArray);
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
	public function getListarCondicionEmbarque(){

		$sqltext = "CALL listarCondicionEmbarque()";
		$query = $this->db->query( $sqltext );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}


	public function getListarSubProducto($id){

		$sqltext = "CALL listarSubProducto( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}


	public function getListarUnidadMedida(){

		$sqltext = "CALL listarUnidadMedida()";
		$query = $this->db->query( $sqltext );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}

	public function getContrato( $id ){

		$sqltext = "CALL getContrato( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}

	public function updateAsignarContrato( $aArray ){

		$sqltext = "CALL updateAsignarContrato( ? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}


	public function insertContratoCertificacion( $aArray ){

		$sqltext = "CALL insertContratoCertificacion( ? , ? )";
		$query = $this->db->query( $sqltext , $aArray );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function validarExisteAsignacionContrato( $pid ){

		$sqltext = "CALL validarExisteAsignacionContrato( ? )";
		$query = $this->db->query( $sqltext , $pid);

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}

	public function deleteContrato ($pid){
		$sqltext = "CALL deleteContrato( ? )";
		$query = $this->db->query( $sqltext , $pid);

	    $data = $query->result_array();
	    $query->free_result();
	       
	    return $data;
	}


	public function actualizarEstadoFijacion( $aContrato ){

		$sqltext = "CALL updateContratoEstadoFijacion( ? ,? ,? )";
		$query = $this->db->query( $sqltext , $aContrato );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function validarAsignacionContratoGuia(){

		$sqltext = "CALL validarAsignacionContratoGuia()";
		$query = $this->db->query( $sqltext);

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}	



}
?>