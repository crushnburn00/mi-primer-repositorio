<?php
Class Pregunta_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	

	public function listarPregunta( $descripcion_pregunta){

		$sqltext = "CALL listarPregunta( ? )";
		$query = $this->db->query( $sqltext , $descripcion_pregunta );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}



}
?>