<?php
Class Productor_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
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
	public function insertProductor( $aProductor){

		$aProductor = $this->isExist($aProductor);

		$sqltext = "CALL insertProductor( ? ,? )";
		$query = $this->db->query( $sqltext , $aProductor );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExist($aProductor){
		$aProductorBD = array(
							'idpersona' 	=> null,
							'usureg'		=> null
		);
		
		return array_merge($aProductorBD , $aProductor);
	}




	public function getProductor( $idProductor ){

		$sqltext = "CALL getProductor( ? )";
		$query = $this->db->query( $sqltext , $idProductor  );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function buscarProductor( $rownumber , $paginas , $aProductor ){

		$aProductor = $this->isProductorBusqueda( $rownumber , $paginas , $aProductor);

		$sqltext = "CALL buscarProductor( ? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,?, ?, ?, ?, ?, ?)";
		$query = $this->db->query( $sqltext , $aProductor );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isProductorBusqueda( $rownumber , $paginas , $aProductor){

		$aProductorBD = array(
							'p_id' => 0,
      						'p_codigo'  => '',
							'p_id_tipo_documento' => 0,
							'p_nro_documento' => '',
							'p_nombre_razon'   => '',
							'p_id_departamento' => 0,
							'p_id_provincia' => 0,
							'p_id_distrito' => 0,
							'p_id_zona' => 0,
							'p_fecha_ini' => '',
							'p_fecha_fin'  => '',
							'p_estado'  => -1,
							'p_codigo_exact'  => '',
							'p_nombre'  => '',
							'p_apellido'  => '',
							'p_razon_social'  => '',
							'p_orderby' => '1 desc',
					        'rownumber' => $rownumber,
					      	'pagina' => $paginas
					      );

		
		$result =  array_merge($aProductorBD , $aProductor);

		return $result;

	}


	public function actualizar( $aProductor ){

		$sqltext = "CALL updateProductor( ? ,? ,? )";
		$query = $this->db->query( $sqltext , $aProductor );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function actualizarIdConyugue( $aProductor ){

		$sqltext = "CALL updateProductorIdConyugue( ? ,? ,? )";
		$query = $this->db->query( $sqltext , $aProductor );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}








}
?>