<?php
Class socio_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}


	public function insert( $aFinca ){

		$aFinca = $this->isExist($aFinca);

		$sqltext = "CALL insertSocio( ? ,? )";
		$query = $this->db->query( $sqltext , $aFinca );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isExist( $aArray ){

		$aArrayBD = array(
							'idproductor' 	=> null,
							'usureg'		=> null
		);

		return array_merge($aArrayBD , $aArray);

	}


	public function buscarSocio( $rownumber , $paginas , $aSocio ){

		$aSocio = $this->isSocioBusqueda( $rownumber , $paginas , $aSocio);

		$sqltext = "CALL buscarSocio( ? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aSocio );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isSocioBusqueda( $rownumber , $paginas , $aSocio){

		$aSocioBD = array(
							'p_id' => 0,
      						'p_codigo'  => '',
      						'p_codigo_productor'  => '',
							'p_id_tipo_documento' => 0,
							'p_nro_documento' => '',
							'p_nombre_razon'   => '',
							'p_fecha_ini' => '',
							'p_fecha_fin'  => '',
							'p_estado'  => -1,
							'p_codigo_exact'  => '',
					        'rownumber' => $rownumber,
					      	'pagina' => $paginas
					      );

		
		
		$result =  array_merge($aSocioBD , $aSocio);

		return $result;

	}


	public function getSocio( $idSocio ){

		$sqltext = "CALL getSocio( ? )";
		$query = $this->db->query( $sqltext , $idSocio  );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function actualizar( $aProductor ){

		$sqltext = "CALL updateSocio( ? ,? ,? )";
		$query = $this->db->query( $sqltext , $aProductor );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}
	



}
?>