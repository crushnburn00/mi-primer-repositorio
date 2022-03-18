<?php
Class Persona_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
	}




	/*
	*	Funcion @insertPersona
	*	Extrae el listado de Caus segun el ID buscado
	*	Parametros :  No
	*		idcau (int) : id de cau 
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/

	//public function getLinkModuloUsuario( $idusuario ,  $linkpadre = '' , $idmodulopadre = ''){
	public function insertPersona( $aPersona ){

		$aPersona = $this->isnull($aPersona);

		$sqltext = "CALL insertPersona( ? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aPersona );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isnull($aPersona){

		if(isset($aPersona['religion'])) 
			if($aPersona['religion']==0)
				unset($aPersona['religion']);

		if(isset($aPersona['estadoCivil'])) 
			if($aPersona['estadoCivil']==0)
				unset($aPersona['estadoCivil']);

		if(isset($aPersona['gradoEstudio'])) 
			if($aPersona['gradoEstudio']==0)
				unset($aPersona['gradoEstudio']);

		if(isset($aPersona['genero'])) 
			if($aPersona['genero']==0)
				unset($aPersona['genero']);

		if(isset($aPersona['idconyugue'])) 
			if($aPersona['idconyugue']==0)
				unset($aPersona['idconyugue']);

		if(isset($aPersona['fecNac'])) 
			if($aPersona['fecNac']=='' or $aPersona['fecNac']=='00-00-0000')
				unset($aPersona['fecNac']);		


		$aPersonaBD = array(
							'idtipodoc' 	=> null,
							'nrodoc'		=> null,
							'nombre'		=> null,
							'apellidos'		=> null,
							'razonsocial'	=> null,
							'zona'			=> null,
							'direccion'		=> null,
							'telfijo'		=> null,
							'celular'		=> null,
							'fecNac'		=> null,
							'lugarnac'		=> null,
							'email'			=> null,
							'religion'		=> null,
							'estadoCivil'	=> null,
							'gradoEstudio'	=> null,
							'aniozona'		=> null,
							'genero'		=> null,
							'canthijos'		=> null,
							'idioma'		=> null,
							'dialecto'		=> null,
							'idconyugue'	=> null,
							'usureg'		=> null
		);

		return array_merge($aPersonaBD , $aPersona);

	}

	public function insertPersonaIdioma( $aPersonaIdioma ){

		$aPersonaIdioma = $this->isExistPI( $aPersonaIdioma );

		$sqltext = "CALL insertPersonaIdioma( ? ,? )";
		$query = $this->db->query( $sqltext , $aPersonaIdioma );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isExistPI($aPersonaIdioma){
		$aPersonaPIBD = array(
							'idpersona' 	=> null,
							'ididioma'		=> null
		);
		
		return array_merge($aPersonaPIBD , $aPersonaIdioma);
	}


	public function actualizar( $aPersona ){

		$aPersona = $this->isnullConyugue($aPersona);

		$sqltext = "CALL updatePersona( ? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? )";
		$query = $this->db->query( $sqltext , $aPersona );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}


	public function isnullConyugue($aPersona){

		if(isset($aPersona['p_id_tipo_documento'])) 
			if($aPersona['p_id_tipo_documento']==0)
				unset($aPersona['p_id_tipo_documento']);

		if(isset($aPersona['p_nro_documento'])) 
			if($aPersona['p_nro_documento']=='')
				unset($aPersona['p_nro_documento']);

		if(isset($aPersona['p_nombre'])) 
			if($aPersona['p_nombre']=='')
				unset($aPersona['p_nombre']);

		if(isset($aPersona['p_apellido'])) 
			if($aPersona['p_apellido']=='')
				unset($aPersona['p_apellido']);

		if(isset($aPersona['p_razon_social'])) 
			if($aPersona['p_razon_social']=='')
				unset($aPersona['p_razon_social']);

		if(isset($aPersona['p_telefono_celular'])) 
			if($aPersona['p_telefono_celular']=='')
				unset($aPersona['p_telefono_celular']);

		if(isset($aPersona['p_id_grado_estudio'])) 
			if($aPersona['p_id_grado_estudio']==0)
				unset($aPersona['p_id_grado_estudio']);

		if(isset($aPersona['p_fecha_nacimiento'])) 
			if($aPersona['p_fecha_nacimiento']=='' or $aPersona['p_fecha_nacimiento']=='00-00-0000')
				unset($aPersona['p_fecha_nacimiento']);		

		if(isset($aPersona['p_lugar_nacimiento'])) 
			if($aPersona['p_lugar_nacimiento']=='')
				unset($aPersona['p_lugar_nacimiento']);

		$aPersonaBD = array(
							'p_id' 						=> null,
							'p_id_tipo_documento'		=> null,
							'p_nro_documento'			=> null,
							'p_nombre'					=> null,
							'p_apellido'				=> null,
							'p_razon_social'			=> null,
							'p_telefono_celular'		=> null,
							'p_id_grado_estudio'		=> null,
							'p_fecha_nacimiento'		=> null,
							'p_lugar_nacimiento'		=> null,
							'p_usu_mod'					=> 1
		);

		return array_merge($aPersonaBD , $aPersona);

	}


	public function buscarPersonaxNroDoc( $aPersona ){

		$aPersona = $this->isPersonaBusqueda($aPersona);

		$sqltext = "CALL buscarPersonaxNroDoc( ? ,? )";
		$query = $this->db->query( $sqltext , $aPersona );

	    $data = $query->result_array();
	    $query->free_result();
	        
	    return $data;
	
	}

	public function isPersonaBusqueda( $aPersona ){

		if(isset($aPersona['p_nro_documento'])) 
			if($aPersona['p_nro_documento']=="")
				unset($aPersona['p_nro_documento']);

		if(isset($aPersona['p_id_tipo_documento'])) 
			if($aPersona['p_id_tipo_documento']==0)
				unset($aPersona['p_id_tipo_documento']);

		$aPersonaBD = array(
							'p_nro_documento' 		=> null,
							'p_id_tipo_documento'	=> null,
		);

		return array_merge($aPersonaBD , $aPersona);

	}






}
?>