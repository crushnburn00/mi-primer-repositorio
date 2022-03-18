<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('validacion_errores_json'))
{
 function validacion_errores_json($aErrores)
 {
	$error =  json_encode($aErrores);
	$error =  str_replace('\u00d1', 'Ñ', $error);
	$error =  str_replace('\u00f1', 'ñ', $error);
	$error =  str_replace('S\/', 'S/', $error);
	$error =  str_replace('\u00da', 'Ú', $error);
	$error =  str_replace('\u00fa', 'ú', $error);
	$error =  str_replace('\u00f3', 'ó', $error);
	$error =  str_replace('\u00d3', 'Ó', $error);
	$error =  str_replace('"', '', $error);
	$error =  str_replace('<p>', '', $error);
	$error =  str_replace('<\/p>\n', '<br>', $error);
	$error =  str_replace('\u00ed', 'í', $error);
	$error =  str_replace('\u00b0', '°', $error);
	$error =  str_replace('\u00e1s', 'á', $error);
	$error =  str_replace('\u00e9', 'é', $error);
	
	
	$errors = array("respuesta" => $error,
					"imsj"		=> 0 );

	return json_encode($errors);
 }
}


if(!function_exists('validation_errors_json'))
{
 function validation_errors_parse($aErrores)
 {
	$error =  json_encode($aErrores);
	$error =  str_replace('\u00d1', 'Ñ', $error);
	$error =  str_replace('\u00f1', 'ñ', $error);
	$error =  str_replace('S\/', 'S/', $error);
	$error =  str_replace('\u00da', 'Ú', $error);
	$error =  str_replace('\u00fa', 'ú', $error);
	$error =  str_replace('\u00f3', 'ó', $error);
	$error =  str_replace('\u00d3', 'Ó', $error);
	$error =  str_replace('"', '', $error);
	$error =  str_replace('<p>', '', $error);
	$error =  str_replace('<\/p>\n', '<br>', $error);
	$error =  str_replace('\u00ed', 'í', $error);
	$error =  str_replace('\u00b0', '°', $error);
	$error =  str_replace('\u00e1s', 'á', $error);
	$error =  str_replace('\u00e1', 'á', $error);
	$error =  str_replace('\u00e9', 'é', $error);
	$error =  str_replace('\/', '/', $error);
	
	
	$errors = array("mensaje" => $error,
					"estado"  => 0 , 
					"result"  => array());

	return $errors;
 }
}



/*if(!function_exists('getError'))
{
 function getError($IdError , $class)
 {
	$aError = array();

	$aError[1000] = array(
						'Mensaje' => 'Id Usuario '.$class->session->userdata['idUsuario'].' no tiene permisos para continuar.',
						'Detalle' => 'Comunicarse con el Administrador del sistema');

	$aError[1001] = array(
						'Mensaje' => 'No se seleccionó Sede',
						'Detalle' => 'Para continuar, primero debe elegir una Sede predeterminada en el Módulo de Configuración y crear las Series.
						<a href="configuracion">Aquí</a>');
	$aError[1002] = array(
						'Mensaje' => 'El usuario no puede continuar',
						'Detalle' => 'Para continuar, primero debe elegir un usuario Emisor con sede asignada. Opcion "USAR USUARIO"
						<a href="usuario">Aquí</a>');

	return $aError[$IdError];

 }
}



if(!function_exists('getMensajeError'))
{
 function getMensajeError($IdError , $class)
 {
	$aError = getError($IdError , $class);
	$vMensaje = "Error: ".$IdError.'<br>Mensaje: '.$aError['Mensaje'].'<br>Detalle: '.$aError['Detalle'].'';
	return $vMensaje;

 }
}*/


if(!function_exists('getIPHost'))
{
 function getIPHost()
 {
 		$ipaddress = '';
 		
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;

 }
}


/*
*	Funcion @esLogeado
*	Verifica si existe una session creada
*	Parametros :  No
*	Con retorno
*		true (boolean) : si existe la session 'usuario'
*		false (boolean) : si no existe la session usuario
*/
if(!function_exists('esLogeado'))
{
 function esLogeado()
 {
	if(isset( $_SESSION['usuario'] ))
			return true;
		else
			return false;

 }
}


/*if(!function_exists('convertirFechaEpoch'))
{
 function convertirFechaEpoch( $epoch )
 {
	$epoch = str_replace('/Date(', '', $epoch);
	$epoch = str_replace(')/', '', $epoch);
	$epoch = substr($epoch, 0, 9);
	$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
	return $dt->format('d/m/Y H:i');

 }
}


if(!function_exists('convertirFechaSimpleEpoch'))
{
 function convertirFechaSimpleEpoch( $epoch )
 {
	$epoch = str_replace('/Date(', '', $epoch);
	$epoch = str_replace(')/', '', $epoch);
	$largo = strlen($epoch) - 3;
	$epoch = substr($epoch, 0, $largo);
	$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
	return $dt->format('d/m/Y');

 }
}



if(!function_exists('generarHTMLHistorial'))
{
 function generarHTMLHistorial( $aHistorial )
 {
 	$html = '<div class=" row">
				<div class="col-md-12">';
	foreach($aHistorial as $l):
	$html .= '		<p class="bold">'.$l['DES_HISTORIAL'].' por '.$l['NOM_AGENTE'].' en '.$l['DES_CAU'].' el '.$l['FECOPE_HISTORIAL'].'</span><br>
						<span class="bold">'.$l['TEXT_HISTORIAL'].'</p>';
	endforeach;
	$html .= '	</div>
			</div>';
	return $html;

 }
}


if(!function_exists('generarHtmlNota'))
{
 function generarHtmlNota( $idnota , $fecregnota , $desnota , $usuario )
 {
 	$html = '<div class="col-12 row2" id="div_nota_'.$idnota.'">
				<span class="col-3 col-md-2 col-lg-1 icono1 order-lg-1">
					<a href="#" name="btnEditarNota" value="EDITAR" id="btn" class="modificar_nota" data-toggle="modal" data-target="#modal_nota" data="'.$idnota.'">
						<span class="icon-pencil2"></span>
					</a>
					<a href="#>" class="eliminar_nota" data="'.$idnota.'"><span class="icon-cross"></span></a>
				</span>
				<span class="col-6 col-md-4 col-lg-5 bold order-4 order-lg-2">Nota</span>
				<span class="col-3 col-md-1 col-lg-1 order-2 order-lg-3">Usuario</span>
				<span class="col-6 col-md-3 col-lg-3 bold order-3 order-lg-4">'.$usuario.'</span>
				<span class="col-6 col-md-3 col-lg-2 bold right order-5 order-md-6 order-lg-5">'.$fecregnota.'</span>
				<span class="col-12 col-md-8 col-lg-11 offset-lg-1 order-6 order-md-5 order-lg-6" id="nota'.$idnota.'">'.$desnota.'</span>
			</div>';
	return $html;
 }
}*/


if(!function_exists('getRemoteAddr'))
{
 function getRemoteAddr()
 {
 		$ipaddress = 'UNKNOWN';
        if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        return $ipaddress;

 }
}


if(!function_exists('getHost'))
{
 function getHost()
 {
 		$ipaddress = 'UNKNOWN';
        if (getenv('HTTP_HOST'))
            $ipaddress = getenv('HTTP_HOST');
        return $ipaddress;

 }
}



if(!function_exists('getReferer'))
{
 function getReferer()
 {
 		$ipaddress = 'UNKNOWN';
        if (getenv('HTTP_REFERER'))
            $ipaddress = getenv('HTTP_REFERER');
        return $ipaddress;

 }
}


if(!function_exists('getUserAgent'))
{
 function getUserAgent()
 {
 		$ipaddress = 'UNKNOWN';
        if (getenv('HTTP_USER_AGENT'))
            $ipaddress = getenv('HTTP_USER_AGENT');
        return $ipaddress;

 }
}


if(!function_exists('getRemoteHost'))
{
 function getRemoteHost()
 {
 		$ipaddress = 'UNKNOWN';
        if (getenv('REMOTE_HOST'))
            $ipaddress = getenv('REMOTE_HOST');
        return $ipaddress;

 }
}


if(!function_exists('getRquestUri'))
{
 function getRquestUri()
 {
 		$ipaddress = 'UNKNOWN';
        if (getenv('REQUEST_URI'))
            $ipaddress = getenv('REQUEST_URI');
        return $ipaddress;

 }
}
/*
if(!function_exists('write_log'))
{
	function write_log($cadena = "" ,$tipo)
	{	
		//$fichero = realpath( '.' )."/logs/milog_".date("Y-m-d").".log";
		$fichero = realpath( '.' )."/logs/logti.log";
		
		if (file_exists($fichero)){ 
		   $arch = fopen($fichero, "a+"); 
		}else{ 
			$arch = fopen($fichero, "w+"); 
		    $cab = "[YYYY-mm-dd HH:mi:ss - DATA]\t\tREMOTE_ADDR\t|\ttHTTP_REFERER\t|\tHTTP_USER_AGENT\t|\tREMOTE_HOST\t|\tREQUEST_URI\r\n";
		    fwrite($arch, $cab);
		   
		} 

		//$arch = fopen($fichero, "a+"); 

		//fwrite($arch, "[".date("Y-m-d H:i:s.u")." ".$_SERVER['REMOTE_ADDR']." ".$_SERVER['HTTP_X_FORWARDED_FOR']." - $tipo ] ".$cadena."\n");
		$ip = getRemoteAddr()." |".getReferer()." |".getUserAgent()." |".getRemoteHost()." |".getRquestUri();
		fwrite($arch, "[".date("Y-m-d H:i:s")." - $tipo ] \t".$ip." :  ".$cadena."\r\n");
		fclose($arch);

	}
}
*/


if(!function_exists('set_message_form_validation'))
{
	function set_message_form_validation( $CI )
	{	
		$CI->form_validation->set_message('required', 'El campo %s es obligatorio');
		$CI->form_validation->set_message('is_natural', 'El %s debe contener solo números');
		$CI->form_validation->set_message('is_natural_no_zero', 'Debe seleccionar un %s válido');
		$CI->form_validation->set_message('min_length', 'El %s debe contener mas de %s caracteres');
		$CI->form_validation->set_message('max_length', 'El %s debe contener menos de %s caracteres');
		$CI->form_validation->set_message('exact_length', 'El %s debe contener %s caracteres');
		$CI->form_validation->set_message('numeric', 'El %s debe contener solo numeros');
		$CI->form_validation->set_message('alpha_numeric_spaces', '%s debe contener solo caracteres alfanumericos y espacios');
		$CI->form_validation->set_message('valid_email', '%s debe contener un correo electronico válido');
		$CI->form_validation->set_message('alpha_spaces', '%s debe contener solo caracteres alfabeticos y espacios');
		$CI->form_validation->set_message('alpha_spaces_dash', '%s debe contener solo caracteres alfabeticos, guiones y espacios');
		$CI->form_validation->set_message('alpha_numeric', '%s debe contener solo caracteres alfabeticos y numericos');
		$CI->form_validation->set_message('numeric_telf', '%s debe contener solo números con formato (XX) XXXXXXX');
		$CI->form_validation->set_message('numeric_telf', '%s debe contener solo números con formato (XX) XXXXXXX');

		
		$CI->form_validation->set_message('validarCantDecimal', 'El %s debe contener %s decimales ');
		$CI->form_validation->set_message('validarFormatoFecha', '%s debe ser fecha DD/MM/YYYY');
		$CI->form_validation->set_message('validarEstadoCivil', 'Debe seleccionar un %s que enlace al Conyugue, de otra forma deberá borrar los datos del Conyugue.');

		$CI->form_validation->set_message('validarArchivo', 'Debe subir un archivo jpg|jpeg|pdf.');
		$CI->form_validation->set_message('validarTipoArchivoAdjunto', 'Los archivos %s deben ser imagen o PDF ( extensión jpg | jpeg | pdf)');
		$CI->form_validation->set_message('validarExtArchivoAdjunto', 'Los archivos %s se encuentran corrompidos o la extensión no es la original.');
		$CI->form_validation->set_message('validarTipoArchivoFoto', 'Los archivos %s deben ser imagen o PDF ( extensión jpg | jpeg | pdf)');
		$CI->form_validation->set_message('validarExtArchivoFoto', 'Los archivos %s se encuentran corrompidos o la extensión no es la original.');
		$CI->form_validation->set_message('validarTipoArchivoMapa', 'Los archivos %s deben ser imagen o PDF ( extensión jpg | jpeg | pdf)');
		$CI->form_validation->set_message('validarExtArchivoMapa', 'Los archivos %s se encuentran corrompidos o la extensión no es la original.');

		$CI->form_validation->set_message('_validarValorSensorial', 'El Valor de %s debe ser entre 6 y 10.');

		//$CI->form_validation->set_error_delimiters('<span class="error">', '</span>');

	}
}


if(!function_exists('es_natural'))
{
	function es_natural( $str )
	{	
		return ctype_digit((string) $str);

	}
}


if(!function_exists('convertirfecha'))
{
	function convertirfecha( $fecha )
	{	
		if( !empty($fecha)) {
			$fec = explode("/", $fecha);
			return $fec[2]."-".$fec[1]."-".$fec[0];	
		}else
			return null;

	}
}



