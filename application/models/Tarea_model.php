<?php
Class Tarea_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('db_helper'));
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
	public function getBuscarTarea(  $cantfilas , $pagina  , $aTar = array() )
	{
		$aTar  = $this->getEsTareaNull( $aTar );
		//$query = null;

		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pidtarea', 		'value' => $aTar['idtarea'],		'type'=>SQLT_CHR, 		'length' => 19 ),
			array('name' => ':pfechaini', 		'value' => $aTar['fechaini'],		'type'=>SQLT_CHR, 		'length' => 12 ),
			array('name' => ':pidestado', 		'value' => $aTar['idestado'],		'type'=>SQLT_CHR, 		'length' => 19 ),
			array('name' => ':pidusuresp', 		'value' => $aTar['idusuresp'],		'type'=>SQLT_CHR, 		'length' => 19 ),
			array('name' => ':pfechafin', 		'value' => $aTar['fechafin'],		'type'=>SQLT_CHR, 		'length' => 12 ),
			array('name' => ':pidtipotarea', 	'value' => $aTar['idtipotarea'],	'type'=>SQLT_CHR, 		'length' => 19 ),
			array('name' => ':pnomtarea', 		'value' => $aTar['nomtarea'],		'type'=>SQLT_CHR, 		'length' => 150 ),
			array('name' => ':pdesctarea', 		'value' => $aTar['desctarea'],		'type'=>SQLT_CHR, 		'length' => 500 ),
			array('name' => ':pidusuconsulta', 	'value' => $aTar['idusuconsulta'],	'type'=>SQLT_CHR, 		'length' => 19 ),

			array('name' => ':rownumber', 		'value' => $cantfilas,				'type'=>SQLT_INT, 		'length' => 10 ),
			array('name' => ':pagina', 			'value' => $pagina,					'type'=>SQLT_INT, 		'length' => 10 ),
			array('name' => ':refresult', 		'value' => $cursor ,				'type'=>OCI_B_CURSOR, 	'length' => -1 )//,
			//array('name' => ':query', 			'value' => &$query,					'type'=>SQLT_CHR, 		'length' => 5000 )
		);

		//$result = $this->db->stored_procedure('SP_BUSCARTAREA', $params);
		$result = $this->db->stored_procedurePackage('PK_TAREA','SP_BUSCARTAREA', $params);

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
	private function getEsTareaNull( $aTar ){
		if(!isset($aTar['idtarea']))
			$aTar['idtarea'] = '';
		if(!isset($aTar['idestado']))
			$aTar['idestado'] = '';
		if(!isset($aTar['idusuresp']))
			$aTar['idusuresp'] = '';
		if(!isset($aTar['fechaini']))
			$aTar['fechaini'] = '';
		if(!isset($aTar['fechafin']))
			$aTar['fechafin'] = '';
		if(!isset($aTar['idtipotarea']))
			$aTar['idtipotarea'] = '';
		if(!isset($aTar['nomtarea']))
			$aTar['nomtarea'] = '';
		if(!isset($aTar['desctarea']))
			$aTar['desctarea'] = '';
		if(!isset($aTar['idusuconsulta']))
			$aTar['idusuconsulta'] = '';
		/*if(empty($aTar))
			return array(	
							'idtarea' 		=> '' ,
							'idestado' 		=> '' ,
							'idusuresp'		=> '' ,
							'fechaini' 		=> '' ,
							'fechafin' 		=> '' ,
							'idtipotarea' 	=> '' ,
							'nomtarea' 		=> '' ,
							'desctarea'     => '' ,
							'idusuconsulta'	=> ''

		);
		else*/
			return $aTar;
	}



	/*
	*	Funcion @insertSolicitud
	*	Inserta una nueva solicitud
	*	Parametros :  Si
	*		aSol (Array) : datos de la solicitud
	*	Con retorno
	*		idsolicitud (String) : el id de la nueva solicitud
	*/
	public function insertTarea( $aTar )
	{	
		
		$idtarea = null;
		$params = array(
			array('name' => ':pidusuarioresp', 		'value' => $aTar['idresponsable'],		'type'=>SQLT_CHR, 	'length' => 19 ),
			array('name' => ':pfecini', 			'value' => $aTar['fecini'],				'type'=>SQLT_CHR, 	'length' => 20 ),
			array('name' => ':pfecfin', 			'value' => $aTar['fecfin'],				'type'=>SQLT_CHR, 	'length' => 20 ),
			array('name' => ':pnomtarea', 			'value' => $aTar['nomtarea'],			'type'=>SQLT_CHR, 	'length' => 150 ),
			array('name' => ':pidtipotarea', 		'value' => $aTar['idtipotarea'],		'type'=>SQLT_CHR, 	'length' => 19 ),
			array('name' => ':pdestarea', 			'value' => $aTar['desctarea'],			'type'=>SQLT_CHR, 	'length' => 500 ),
			array('name' => ':pusureg', 			'value' => $aTar['usureg'],				'type'=>SQLT_CHR, 	'length' => 19 ),
			array('name' => ':idtarea', 			'value' => &$idtarea,					'type'=>SQLT_CHR, 	'length' => 40 )
		);
		//$result = $this->db->stored_procedure('sp_inserttarea', $params);
		$result = $this->db->stored_procedurePackage('PK_TAREA','SP_INSERTTAREA', $params);
		return $idtarea;
	}

		/*
	*	Funcion @insertSolicitud
	*	Inserta una nueva solicitud
	*	Parametros :  Si
	*		aSol (Array) : datos de la solicitud
	*	Con retorno
	*		idsolicitud (String) : el id de la nueva solicitud
	*/
	public function insertDetalleTarea( $aTar )
	{	
		$out['iddettarea'] = null;
		$out['fecregistro'] = null;


		$params = array(
			array('name' => ':pidtarea', 			'value' => $aTar['idtarea'],			'type'=>SQLT_CHR, 	'length' => 19 ),
			array('name' => ':pcomentario', 		'value' => $aTar['comentario'],			'type'=>SQLT_CHR, 	'length' => 500 ),
			array('name' => ':pusureg', 			'value' => $aTar['usureg'],				'type'=>SQLT_CHR, 	'length' => 20 ),
			array('name' => ':iddettarea', 			'value' => &$out['iddettarea'],			'type'=>SQLT_CHR, 	'length' => 40 ),
			array('name' => ':fecdettarea', 		'value' => &$out['fecregistro'],		'type'=>SQLT_CHR, 	'length' => 40 )
		);

		$result = $this->db->stored_procedure('sp_insertdetalletarea', $params);
		return $out;
	}



	/*
	*	Funcion @getListaLugar
	*	Extrae el listado de Caus segun el ID buscado
	*	Parametros :  No
	*		idcau (int) : id de cau 
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/
	/*public function getDetalleTarea( $idtarea ){

		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pidtarea', 		'value' => $idtarea,			'type'=> SQLT_CHR, 		'length' => 19 ),
			array('name' => ':refresult', 		'value' => $cursor ,			'type'=> OCI_B_CURSOR, 	'length' => -1 )
		);
		$result = $this->db->stored_procedure('sp_getdetalletarea', $params);

		return first_row($result);;
	}*/

		/*
	*	Funcion @getListaLugar
	*	Extrae el listado de Caus segun el ID buscado
	*	Parametros :  No
	*		idcau (int) : id de cau 
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/
	public function getDetalleTarea( $idtarea ){

		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pidtarea', 		'value' => $idtarea,			'type'=> SQLT_CHR, 		'length' => 19 ),
			array('name' => ':refresult', 		'value' => $cursor ,			'type'=> OCI_B_CURSOR, 	'length' => -1 )
		);
		//$result = $this->db->stored_procedure('sp_getdetalletarea', $params);
		$result = $this->db->stored_procedurePackage('PK_TAREA','SP_GETDETALLETAREA', $params);

		return $result;
	}

		/*
	*	Funcion @getAntSgtSolicitud
	*	Obtener el id de la siguiente y de la anterior solicitud
	*	Parametros :  Si
	*		idsolicitud (String) : id de la solicitud
	*	Con retorno
	*		result (array) : resultado de la consulta (primera fila)
	*/
	public function getAntSgtTarea( $idtarea ){
		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':idtarea', 		'value' => $idtarea,			'type'=>SQLT_CHR, 		'length' => 30 ),
			array('name' => ':refresult', 		'value' => $cursor ,			'type'=>OCI_B_CURSOR, 	'length' => -1 )
		);
		//$result = $this->db->stored_procedure('sp_getantsgtetarea', $params);
		$result = $this->db->stored_procedurePackage('PK_TAREA','sp_getantsgtetarea', $params);
		return first_row($result);
	}


			/*
	*	Funcion @insertSolicitud
	*	Inserta una nueva solicitud
	*	Parametros :  Si
	*		aSol (Array) : datos de la solicitud
	*	Con retorno
	*		idsolicitud (String) : el id de la nueva solicitud
	*/
	public function actualizarFinalizaTarea( $aTar )
	{	
		$out['estado'] = null;
		$out['icon'] = null;
		$out['style'] = null;

		$params = array(
			array('name' => ':pidtarea', 			'value' => $aTar['idtarea'],		'type'=>SQLT_CHR, 	'length' => 19 ),
			array('name' => ':pusumod', 			'value' => $aTar['usureg'],			'type'=>SQLT_CHR, 	'length' => 20 ),
			array('name' => ':estado', 				'value' => &$out['estado'],			'type'=>SQLT_CHR, 	'length' => 40 ),
			array('name' => ':icon', 				'value' => &$out['icon'],			'type'=>SQLT_CHR, 	'length' => 40 ),
			array('name' => ':style', 				'value' => &$out['style'],			'type'=>SQLT_CHR, 	'length' => 40 )
		);

		//$result = $this->db->stored_procedure('sp_setfinalizartarea', $params);
		$result = $this->db->stored_procedurePackage('PK_TAREA','SP_SETFINALIZARTAREA', $params);
		return $out;
	}

		/*
	*	Funcion @getListaLugar
	*	Extrae el listado de Caus segun el ID buscado
	*	Parametros :  No
	*		idcau (int) : id de cau 
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/
	public function getHistorialTarea( $idtarea ){

		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':pidtarea', 		'value' => $idtarea,			'type'=> SQLT_CHR, 		'length' => 19 ),
			array('name' => ':refresult', 		'value' => $cursor ,			'type'=> OCI_B_CURSOR, 	'length' => -1 )
		);
		//$result = $this->db->stored_procedure('sp_getauditoriaxidtarea', $params);
		$result = $this->db->stored_procedurePackage('PK_TAREA','SP_GETAUDITORIAXIDTAREA', $params);

		return $result;
	}



	/*
	*	Funcion @insertSolicitud
	*	Inserta una nueva solicitud
	*	Parametros :  Si
	*		aSol (Array) : datos de la solicitud
	*	Con retorno
	*		idsolicitud (String) : el id de la nueva solicitud
	*/
	public function actualizarTarea( $aTar ){

		$fecmod = null;

		$params = array(
			array('name' => ':pidtarea', 			'value' => $aTar['idtarea'],			'type'=>SQLT_CHR, 	'length' => 19 ),
			array('name' => ':pnomtarea', 			'value' => $aTar['nomtarea'],			'type'=>SQLT_CHR, 	'length' => 150 ),
			array('name' => ':pidtipotarea', 		'value' => $aTar['idtipotarea'],		'type'=>SQLT_CHR, 	'length' => 20 ),
			array('name' => ':pidusuarioresp', 		'value' => $aTar['idresponsable'],		'type'=>SQLT_CHR, 	'length' => 20 ),
			array('name' => ':pfecini', 			'value' => $aTar['fecini'],				'type'=>SQLT_CHR, 	'length' => 20 ),
			array('name' => ':pfecfin', 			'value' => $aTar['fecfin'],				'type'=>SQLT_CHR, 	'length' => 20 ),
			array('name' => ':pdesctarea', 			'value' => $aTar['desctarea'],			'type'=>SQLT_CHR, 	'length' => 500 ),
			array('name' => ':pusumod', 			'value' => $aTar['usureg'],				'type'=>SQLT_CHR, 	'length' => 20 ),
			array('name' => ':pfecultmod', 			'value' => &$fecmod,					'type'=>SQLT_CHR, 	'length' => 20 )
		);

		//$result = $this->db->stored_procedure('sp_settarea', $params);
		$result = $this->db->stored_procedurePackage('PK_TAREA','SP_SETTAREA', $params);
		return $fecmod;
	}



		/*
	*	Funcion @getListaLugar
	*	Extrae el listado de Caus segun el ID buscado
	*	Parametros :  No
	*		idcau (int) : id de cau 
	*	Con retorno
	*		result (array) : resultado de la consulta
	*/
	public function getEstado( $tipoestado = 2 ){

		$cursor = $this->db->new_cursor();
		$params = array(
			array('name' => ':ptipoestado',		'value' => $tipoestado,			'type'=> SQLT_CHR, 		'length' => 19 ),
			array('name' => ':refresult', 		'value' => $cursor ,			'type'=> OCI_B_CURSOR, 	'length' => -1 )
		);
		$result = $this->db->stored_procedure('SP_GETESTADOPORTIPO', $params);

		return $result;

	}



}
?>