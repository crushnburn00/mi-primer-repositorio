<?php
Class Personal_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}



	public function listarPersonal( $tipo ){

		$sqltext = "CALL listarPersonal( ? )";
		$query = $this->db->query( $sqltext , $tipo );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}
	

	public function insert( $aData ){

		$sqltext = "CALL insertPersonal( ? , ? , ? ,? )";
		$query = $this->db->query( $sqltext, $aData );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}



}
?>