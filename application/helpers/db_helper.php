<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
*	Funcion @esLogeado
*	Verifica si existe una session creada
*	Parametros :  No
*	Con retorno
*		true (boolean) : si existe la session 'usuario'
*		false (boolean) : si no existe la session usuario
*/
if(!function_exists('first_row'))
{
 function first_row( $result )
 {
	return (count($result) === 0) ? NULL : $result[0];

 }
}

