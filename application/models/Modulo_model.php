<?php
Class Modulo_model extends CI_Model{
	
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
	public function getListaModulo( $pidlugar = 0 ){

		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pidlugar', 	'value' => $pidlugar,	'type'=>SQLT_CHR, 		'length' => 15 ),
			array('name' => ':refmodulo', 	'value' => $cursor ,	'type'=> OCI_B_CURSOR, 	'length' => -1 )
		);
		$result = $this->db->stored_procedure('sp_listarmodulo', $params);

		return $result;
	}


	/*public function getModuloUsuario( $idusuario ,  $idlinkpadre = 0 ){
		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':idusuario', 		'value' => $idusuario,		'type'=>SQLT_CHR, 		'length' => 15 ),
			array('name' => ':idmodulopadre', 	'value' => $idlinkpadre,	'type'=>SQLT_CHR, 		'length' => 15 ),
			array('name' => ':psistema', 	    'value' => 'ACSGESTION',	'type'=>SQLT_CHR, 		'length' => 15 ),
			array('name' => ':refmodulo', 		'value' => $cursor ,		'type'=>OCI_B_CURSOR, 	'length' => -1 )
		);
		$result = $this->db->stored_procedure('sp_getmodulousuario', $params);
		
		return $result;
	}*/

	//public function getLinkModuloUsuario( $idusuario ,  $linkpadre = '' , $idmodulopadre = ''){
	public function getLinkModuloUsuario( $linkpadre = ''){
		//$data = array();
		$sqltext = "CALL listarModuloPadreUsuario( ? )";
		$query = $this->db->query( $sqltext , $linkpadre );

        //if ($query) {
	    $data = $query->result_array();
	    $query->free_result();
	        
	    //}
	    return $data;

		
	}

	public function getValidaLinkUsuario( $idusuario ,  $link = '' ){
		/*$validacion = null;

		$params = array(
			array('name' => ':idusuario', 		'value' => $idusuario,		'type'=>SQLT_CHR, 		'length' => 15 ),
			array('name' => ':plinkmodulo', 	'value' => $link,			'type'=>SQLT_CHR, 		'length' => 100 ),
			array('name' => ':psistema', 	    'value' => 'ACSGESTION',	'type'=>SQLT_CHR, 		'length' => 15 ),
			array('name' => ':validacion', 		'value' => &$validacion ,	'type'=>SQLT_CHR, 		'length' => 2 )
		);
		$result = $this->db->stored_procedure('sp_getvalidalinkmodulousuario', $params);
		
		return $validacion;*/
	}



}
?>