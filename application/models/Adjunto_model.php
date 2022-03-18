<?php
Class Adjunto_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}

	/*
	*	Funcion @insertAdjunto
	*	Inserta un nuevo adjunto a la base de datos
	*	Parametros :  Si
	*		aAdj (Array) : datos del adjunto
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/
	public function insert( $aAdjunto )
	{	
		$aAdjunto = $this->isExist($aAdjunto);

		$sqltext = "CALL insertAdjunto( ? ,? ,? ,? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aAdjunto );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}

	public function isExist( $aAdjunto ){
		$aAdjuntoBD = array(
							'p_descripcion' 	=> null,
							'p_nombrereal' 		=> null,
							'p_nombre' 			=> null,
							'p_ruta' 			=> null,
							'p_tabla' 			=> null,
							'p_id_tabla' 		=> null,
							'usureg'			=> null
		);
		
		return array_merge( $aAdjuntoBD , $aAdjunto );
	}


	/*
	*	Funcion @getAdjuntoxIdsolicitud
	*	Extrae el adjunto buscando por id de solicitud
	*	Parametros :  Si
	*		idsolicitud (String) : id de la solicitud
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/
	public function listar( $aAdjunto )
	{	
		$aAdjunto = $this->isExistlistar($aAdjunto);

		$sqltext = "CALL listarAdjunto( ? ,? )";
		$query = $this->db->query( $sqltext , $aAdjunto );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	}


	public function isExistlistar( $aAdjunto ){
		$aAdjuntoBD = array(
							'p_id_tabla' 	=> null,
							'p_tabla' 		=> null
		);
		
		return array_merge( $aAdjuntoBD , $aAdjunto );
	}



}
?>