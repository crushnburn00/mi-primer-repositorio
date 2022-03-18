<?php
Class Usuario_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}


	/*
	*	Funcion @insertarAgente
	*	Inserta un nuevo agente a la base de datos
	*	Parametros :  Si
	*		idagente (String) : id de agente
	*		nomagente (String) : nombre de agente
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/
	public function getValidaUsuario( $usuario , $contrasenia ){
		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pusuario', 		'value' => $usuario,	    'type'=>SQLT_CHR, 		'length' => 50 ),
			array('name' => ':pcontrasenia', 	'value' => $contrasenia,	'type'=>SQLT_CHR, 		'length' => 150 ),
			array('name' => ':refusuario', 		'value' => $cursor ,		'type'=>OCI_B_CURSOR, 	'length' => -1 )
		);
		$result = $this->db->stored_procedure('SP_GETVALIDAUSUARIO', $params);
		//$result = $this->db->stored_procedurePackage('AVLDATA','SP_GETVALIDAUSUARIO', $params);
		return $result;
	}


	public function getValidaUsuario_AppTareas( $usuario , $contrasenia ){
		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pusuario', 		'value' => $usuario,	    'type'=>SQLT_CHR, 		'length' => 50 ),
			array('name' => ':pcontrasenia', 	'value' => $contrasenia,	'type'=>SQLT_CHR, 		'length' => 150 ),
			array('name' => ':refusuario',  	'value' => $cursor ,		'type'=>OCI_B_CURSOR, 	'length' => -1 )
		);
		$result = $this->db->stored_procedure('SP_GETVALIDAUSUARIO_APPTAREA', $params);
		//$result = $this->db->stored_procedurePackage('AVLDATA','SP_GETVALIDAUSUARIO', $params);
		return $result;
	}

	public function getValidaUsuario_AppIncidencia( $usuario , $contrasenia ){
		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pusuario', 		'value' => $usuario,	    'type'=>SQLT_CHR, 		'length' => 50 ),
			array('name' => ':pcontrasenia', 	'value' => $contrasenia,	'type'=>SQLT_CHR, 		'length' => 150 ),
			array('name' => ':refusuario',  	'value' => $cursor ,		'type'=>OCI_B_CURSOR, 	'length' => -1 )
		);
		$result = $this->db->stored_procedure('SP_GETVALIDAUSUARIO_APPINC', $params);
		//$result = $this->db->stored_procedurePackage('AVLDATA','SP_GETVALIDAUSUARIO', $params);
		return $result;
	}




	/*
	*	Funcion @getBuscarSolicitud
	*	Buscar el listado de solicitudes segun la cantidad de registros a mostrar y la pagina
	*	Parametros :  Si
	*		cantfilas 	(String) : cantidad de filas a mostrar
	*		pagina 		(String) : pagina
	*		aSol 		(Array)  : filtros de solicitud a buscar (vacio por defecto)
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/
	public function getBuscarUsuario( $cantfilas , $pagina  , $aUsu = array())
	{
		$aUsu  = $this->getEsUsuarioNull( $aUsu );
		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pidusuario', 		'value' => $aUsu['idusuario'],		'type'=>SQLT_CHR, 	'length' => 19 ),
			/*array('name' => ':pplaca', 			'value' => $aInc['placa'],			'type'=>SQLT_CHR, 	'length' => 10 ),
			array('name' => ':pvidexterno', 	'value' => $aInc['videxterno'],		'type'=>SQLT_CHR, 	'length' => 10 ),
			array('name' => ':pvidinterno', 	'value' => $aInc['vidinterno'],		'type'=>SQLT_CHR, 	'length' => 10 ),
			array('name' => ':pfechareporte', 	'value' => $aInc['fechareporte'],	'type'=>SQLT_CHR, 	'length' => 10 ),*/

			array('name' => ':rownumber', 		'value' => $cantfilas,				'type'=>SQLT_INT, 		'length' => 10 ),
			array('name' => ':pagina', 			'value' => $pagina,					'type'=>SQLT_INT, 		'length' => 10 ),
			array('name' => ':refresult', 		'value' => $cursor ,				'type'=>OCI_B_CURSOR, 	'length' => -1 )
		);
		$result = $this->db->stored_procedure('sp_buscarusuario', $params);
		return $result;
	}


	public function getListaTipoPerfil() {

		$result = $this->db->query('SELECT * FROM tipo_usuario');
		return $result->result();

	}

	public function getPermisos()
	{
		
		$result = $this->db->query('SELECT * FROM modulo');
		return $result;
	}

	public function getUsuarioporTipo( $pidtipousuario , $pidusuconsulta ){

		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pidtipousuario', 	'value' => $pidtipousuario,		'type'=>SQLT_INT, 		'length' => 19 ),
			array('name' => ':pidusuconsulta', 	'value' => $pidusuconsulta,		'type'=>SQLT_INT, 		'length' => 19 ),
			array('name' => ':refresult', 		'value' => $cursor ,			'type'=>OCI_B_CURSOR, 	'length' => -1 )
		);
		$result = $this->db->stored_procedure('sp_listausuarioxtipo', $params);
		return $result;
	}


			/*
	*	Funcion @getEsSolicitudNull
	*	Invocado por @getBuscarSolicitud para inicializar los filtros de la solicitud como vacios
	*	Parametros :  Si
	*		aSol (array) : datos de la solicitud
	*	Con retorno
	*		aSol (array) : datos de la solicitud
	*/
	private function getEsUsuarioNull( $aInc ){
		if(empty($aInc))
			return array(	'idusuario' => '' //,
							/*'placa' => '' ,
							'videxterno' => '' ,
							'vidinterno' => '' ,
							'fechareporte' => '' ,
							'idcau' => '' ,
							'nrotaractual' => '' ,
							'nrotaranterior' => '' ,
							'dni' => '' ,
							'nomusutarjeta' => '' ,
							'agente' => '' */
		);
		else
			return $aInc;
	}



}
?>