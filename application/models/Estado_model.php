<?php
Class Estado_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
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
	public function getListarEstado(){

		$sqltext = "CALL listarEstado()";
		$query = $this->db->query( $sqltext );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}

	public function getListarEstadoxTipo( $p_tipo ){

		$sqltext = "CALL listarEstadoxTipo( ? )";
		$query = $this->db->query( $sqltext , $p_tipo );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}




}
?>