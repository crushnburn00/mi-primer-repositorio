<?php
Class Provincia_model extends CI_Model{
	
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
	public function getListarProvincia( $idDepartamento ){

		$sqltext = "CALL listarProvincia( ? )";
		$query = $this->db->query( $sqltext , $idDepartamento );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}


	public function insert( $descripcion , $idDepartamento  ){

		$data = array( 'descripcion' => $descripcion , 'iddepartamento' => $idDepartamento );

		$sqltext = "CALL insertProvincia( ? , ? )";
		$query = $this->db->query( $sqltext, $data );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
		
	}







}
?>