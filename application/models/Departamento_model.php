<?php
Class Departamento_model extends CI_Model{
	
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
	public function getListarDepartamento( $id = 1 ){

		$sqltext = "CALL listarDepartamento( ? )";
		$query = $this->db->query( $sqltext , $id );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;		
	}


	public function insert( $descripcion , $id = 1 ){
		$data = array($descripcion , $id);

		$sqltext = "CALL insertDepartamento( ? , ? )";
		$query = $this->db->query( $sqltext, $data );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}







}
?>