<?php
Class EntidadCertificadora_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}



	public function listar(){

		$sqltext = "CALL listarEntidadCertificadora()";
		$query = $this->db->query( $sqltext );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}

	public function insert( $aData ){

		$sqltext = "CALL insertEntidadCertificadora( ? , ? )";
		$query = $this->db->query( $sqltext, $aData );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}



}
?>