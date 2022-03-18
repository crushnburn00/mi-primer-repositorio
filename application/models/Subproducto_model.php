<?php
Class SubProducto_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	
	public function getListarSubProducto($id){

		$sqltext = "CALL listarSubProducto( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}





}
?>