<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adjunto extends CI_Controller {

	/*
	*	Funcion @construct
	* 	Invocado por la clase Inicio
	*	Carga los helper del formulario
	*	Parametros :  No
	*	Sin retorno
	*/

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form','security','utilitario_helper'));
		$this->load->model(array('adjunto_model'));
		$this->load->library(array('archivo'));
	}

	/*
	*	Funcion @agregarAdjunto
	*	Invocado por ajax jmodificar #btnGuardarFichero
	*	Recibe los archivos adjuntos verifica que cumplan con las extensiones jpg | jpeg | gif | png y procede a trasladarlo al servidor y a la bd
	*	Parametros :  No
	*	Sin retorno
	*/
	public function agregarAdjunto(){

		if(!$this->input->is_ajax_request()):
			redirect('404');
		else:
			$this->load->library(array('form_validation'));
			$this->load->model(array('historial_model'));
			$this->form_validation->set_rules('txtId', 'Id de Socio', 'required|trim|xss_clean');
			$this->form_validation->set_rules('fileAdjuntos', 'Archivo Adjunto', 'callback_validarArchivo|callback_validarTipoArchivo');
			$this->form_validation->set_message('validarArchivo', 'Debe subir un archivo jpg | jpeg | gif | png');
			$this->form_validation->set_message('validarTipoArchivoIMG', 'Los archivos adjuntos deben ser jpg | jpeg | gif | png');

			if ($this->form_validation->run())
			{ 
				$resultado = array( 'respuesta' => '' , 'resultado' => '' ,'html' => '');
				$resultado['resultado'] = $this->archivo->guardarAdjuntos( 'fileAdjuntos' , $this->input->post('txtId'));

				if(empty($resultado['resultado']['error'])){
					$resultado['respuesta'] = 'Ok';
					$resultado['html'] = $this->generarHtmlFichero($resultado['resultado']['success']);

					/*if($this->session->tipoacceso==1):
						$historial = $this->historial_model->getHistorialxIdsolicitud($this->input->post('txtId'));
						$resultado['htmlHis'] = generarHTMLHistorial($historial);
					endif;*/
				}
				echo json_encode($resultado);
			}else{
				echo validacion_errores_json(validation_errors());
			}

		endif;

	}

	/*
	*	Funcion @generarHtmlFichero
	*	Invocado por @agregarAdjunto
	*	Genera el HTML de cada fichero cargado
	*	Parametros :  No
	*	Sin retorno
	*/
	private function generarHtmlFichero( $aAdjunto ){
		$html = '';
		foreach ($aAdjunto as $row) : 
			$html = '<span class="col-md-7 icono1">
						<a href="'.base_url().'adjunto/mostrarImagen/'.str_replace('=','',base64_encode($row['rutadjunto'])).'" target="_blank" title="MOSTRAR IMAGEN"><span class="icon-eye-plus"></span></a>
						<a href="'.base_url().'adjunto/descargar/'.str_replace('=','',base64_encode($row['rutadjunto'])).'/'.str_replace('=','',base64_encode($row['nomtmpadjunto'])).'" title="DESCARGAR IMAGEN"><span class="icon-download"></span></a>
						<span class="">'.$row['nomtmpadjunto'].'</span>
					</span>	
					<span for="" class="col-md-5 bold right">'.$row['fecregadjunto'].'</span>';
		endforeach;
		return $html;
	}

	/*
	*	Funcion @descargar
	*	Invocado por enlace "Descargar fichero " (@generarHtmlFichero)
	*	Recibe la ruta y el archivo a descargar y realiza la descarga inmediata con readfile
	*	Parametros :  Si
	*		file (String) ruta y nombre de archivo
	*		nombrefile (String) nombre de archivo
	*	Sin retorno
	*/
	public function descargar( $file , $nombrefile = "img_solicitud_prueba.jpg" ){
		$file = base64_decode($file);
		$nombrefile = base64_decode($nombrefile);
		$this->archivo->descargarArchivo( $file , $nombrefile);
	}

	/*
	*	Funcion @validarArchivo
	* 	Invocado por @guardar
	*	Valida que exista al menos un archivo cargado
	*	Parametros :  No
	*	Con retorno
	*		True : Si se cargó algún archivo
	*		False: Si no se cargó algún archivo
	*/
	public function validarArchivo(){
		if(strlen($_FILES['fileAdjuntos']['tmp_name'][0])>0)
			return true;
		else
			return false;
	}


	/*
	*	Funcion @validarTipoArchivoIMG
	* 	Invocado por @guardar
	*	Valida que los archivos cargados cumplan la extensión JPG, JPEG, PNG Y GIF
	*	Parametros :  No
	*	Con retorno
	*		True : Si la extensión cumple con la condición
	*		False: La extensión no cumple
	*/
	public function validarTipoArchivo(){

		foreach ($_FILES['fileAdjuntos']['type'] as $key => $typeArchivo) {
			$ext=explode('/',$typeArchivo); 
			if($ext[1] == 'jpg' || $ext[1] == 'jpeg' || $ext[1] == 'png' || $ext[1] == 'gif')
				return true;
			else return false;
		}

		return true;

	}

	/*
	*	Funcion @mostrarImagen
	* 	Invocado por enlace "Mostrar fichero" (@generarHtmlFichero)
	*	Visor de la imagen
	*	Parametros :  Si
	*		file (String) ruta y nombre de archivo
	*	Sin retorno
	*/
	public function mostrarImagen($file){
		$file = base64_decode($file);
		$root_dir = str_replace ('index.php','',$_SERVER['SCRIPT_FILENAME'] );
		$data = array(
			'root_dir' => $root_dir,
			'file'		=> $root_dir.$file
		);
		
		header("Content-type:".mime_content_type($data['file']));
		echo file_get_contents($data['file']);
		
	}
	

}
