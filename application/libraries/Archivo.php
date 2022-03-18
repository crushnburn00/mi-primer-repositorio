<?php

class Archivo{

	protected $root_dir;
	protected $path;
	protected $type;
	protected $size;
	protected $resize;
	protected $namearchivo;
	protected $config = array();
	protected $func_images;
	protected $CI;


	public function __construct(){
		$this->type = '';
		$this->root_dir = str_replace ('index.php','',$_SERVER['SCRIPT_FILENAME'] );
		$this->resize = array(900, 900);
		$this->func_images = array(
			    'jpeg' => array('imagecreatefromjpeg', 'imagejpeg'),
			    'jpg' => array('imagecreatefromjpeg', 'imagejpeg')
		);

		$this->CI =& get_instance();
		$this->CI->load->library('upload');
	}


	public function descargarArchivo( $file , $nombrefile = "img_xx.jpg" ){

		if (!isset($file) || empty($file)) { 
			exit();
		} 

		$this->path = $this->root_dir.$file; 

		if (is_file($this->path)) { 
			$this->size = filesize($this->path); 
			if (function_exists('mime_content_type')) { 
				$this->type = mime_content_type($this->path); 
			} else if (function_exists('finfo_file')) { 
					$info = finfo_open(FILEINFO_MIME); 
					$this->type = finfo_file($info, $this->path); 
					finfo_close($info); 
				} 
			if ($this->type == '') { 
				$this->type = "application/force-download"; 
			}

			//echo $this->type;
			//header("Content-Type: application/force-download"); 
			header("Content-Disposition: attachment; filename=\"$nombrefile\""); 
			header("Content-Transfer-Encoding: binary"); 
			header("Content-Length: " . $this->size); 
			// descargar achivo 
			readfile($this->path); 
		} else { 
			die("File not exist !!"); 
		} 

	}

	private function getfuncImages( $tipo ){
		return $this->func_images[$tipo];
	}

	public function issetFuncImages($tipo){
		if(isset($this->func_images[$tipo]))
			return true;
		else
			return false;
	}

	private function resizeArchivo($tipo , $archivo){
   		
	    	//obtener las dimensiones de la imagen a cargar
	    	$img_size = $this->getImageSize();

	    	//obtener funcion segun tipo
	    	$func = $this->getfuncImages($tipo);
	    	//obtener la escala de la imagen
			$ratio = $img_size[0]/$img_size[1];

			//cambiar las medidas segun escala de imagen
			if ($this->resize[0]/$this->resize[1] > $ratio)
			   $this->resize[0] = $this->resize[1] * $ratio;
			else
				$this->resize[1] = $this->resize[0]/$ratio;

			//Crear una nueva imagen de color verdadero
			$new_img = imagecreatetruecolor($this->resize[0], $this->resize[1]);

			//Crea una nueva imagen a partir de un fichero según tipo ej: imagecreatefromjpeg ( string $filename )
			$img = call_user_func($func[0], $_FILES[$this->namearchivo]['tmp_name']);

			//Copia y cambia el tamaño de parte de una imagen redimensionándola
			imagecopyresampled($new_img, $img, 0, 0, 0, 0, $this->resize[0], $this->resize[1], $img_size[0], $img_size[1]);
			//Copia y cambia el tamaño de parte de una imagen redimensionándola
			//imagecopyresized($new_img, $img, 0, 0, 0, 0, $this->resize[0], $this->resize[1], $img_size[0], $img_size[1]);
			//Imprimir la imagen
			call_user_func($func[1], $new_img, $archivo);
			
			// Liberar memoria
			imagedestroy($new_img);
	}

	public function isResizeArchivo(){
		$max_size = 500;
		$size = $this->getImageSize();
		if(($_FILES[$this->namearchivo]['size']/1024) > $max_size || $size[0]>$this->resize[0])
			return true;
		else 
			return false;
	}

	public function getImageSize(){
		return getimagesize( $_FILES[$this->namearchivo]['tmp_name'] );
	}

	public function setNameArchivo( $namearchivo ){
		$this->namearchivo = $namearchivo;
	}

	public function setConfigArchivo( $config ){
		$this->config = $config;
	}


	/*
	*	Funcion @cargarArchivo
	* 	Invocado por @guardarAdjuntos
	*	Verifica que el archivo cumpla con la extensión y tamañan solicitado antes de ser cargado, sino procederá a dimensionarlo
	*	Parametros :  Si
	*		config : detalles de configuración (array)
	*		nameArchivo : nombre de la variable $_FILE
	*	Con retorno
	*		(Array) : retorna un array['success'] con la dirección del archivo cargado si es o ['error'] si no se pudo subir el archivo
	*/
	/*
	    $adj = new Archivo();
		$adj->setNameArchivo($nameArchivo);
		$adj->setMaxSizeArchivo($config['max_size']);
	*/
    public function subirArchivo(){

    	//declarar variables iniciales
    	$resultado = array( 'success' => '' , 'error' => '' , 'tmpname' => '' ,'realname' => '');
    	
    	//verificar la extensión del archivo en mime y el archivo enviado
    	$ext=explode('/',mime_content_type($_FILES[$this->namearchivo]['tmp_name']));
    	$sep=explode('/',$_FILES[$this->namearchivo]['type']); 
    	$tipo=$sep[1];
    	
		//Enviar error si existe probemas con la extensión y de no ser una imagen

	    if(!$this->issetFuncImages($tipo) && $_FILES[$this->namearchivo]['type'] !== "application/pdf"): 
	    	$resultado['error'] = 'Debe ser una imagen jpeg|jpg o pdf.';
	    	return $resultado;
	    elseif($sep[1]!=$ext[1]):
	    	$resultado['error'] = 'La extensión fue corrompida. El archivo no fue cargado.';
	    	return $resultado;
    	endif;
    	
    	$ext = explode('.',addslashes($_FILES[$this->namearchivo]['name']));
    	
    	//declarar la ruta, nombre de archivo y extension en una sola variable
		$archivo = $this->config['upload_path'].'/'.$this->config['file_name'].'.'.$ext[count($ext)-1];

		//verificar si el archivo cumple con el peso maximo o con la dimensión de la imagen
	    if( $this->issetFuncImages($tipo) ){
	    	if($this->isResizeArchivo())
	    		$this->resizeArchivo( $tipo , $archivo );
	    	else
	    		$this->uploadArchivo( 0, $this->config , $this->namearchivo );
	    }else{
	    	$this->uploadArchivo( 0, $this->config , $this->namearchivo );

    	}
	    //$archivo = str_replace ('index.php','',$_SERVER['SCRIPT_FILENAME'] ).$archivo;
	    //verifica si el archivo existe en ruta
	    if(file_exists($archivo)) {
	    	$resultado['success'] = $archivo; 
	    	$resultado['tmpname'] = addslashes($_FILES[$this->namearchivo]['name']);
	    	$resultado['realname'] = $this->config['file_name'].'.'.$ext[count($ext)-1];
	    }  	
    	
    	return $resultado;
    }

    public function uploadArchivo( $max_size, $config ,$namearchivo ){

    	$this->config['max_size'] = 0;
	    //se inicializar las variables de carga de archivos
	    $this->CI->upload->initialize($config);

    	//se realiza la carga y se verifica si existe un error
		if (!$this->CI->upload->do_upload($namearchivo)) 
           	return $this->CI->upload->display_errors();

        return array();
    }




	public function guardarAdjuntos( $nameFiles, $id = '0' , $tabla = '' , $descripcion = '') {
		
		$resultArchivo = array('success' => array() , 'error' => array());

		//se declararn variables de configuración de archivos
		$this->config['upload_path'] 	= "assets/archivos_adjuntos/".date("Y/M"); 
		$this->config['allowed_types'] 	= "jpeg|jpg|pdf";
        /*$this->config['max_size'] 		= 500;*/
        $this->namearchivo 				= 'fileAdj';
        //recorrer cada archivo
		foreach ($_FILES[$nameFiles]['name'] as $key => $arch) {

			//enviar los datos a una nueva varible de archivo
			$_FILES[$this->namearchivo]['name'] 		= $_FILES[$nameFiles]['name'][$key];
			$_FILES[$this->namearchivo]['type'] 		= $_FILES[$nameFiles]['type'][$key];
			$_FILES[$this->namearchivo]['tmp_name'] 	= $_FILES[$nameFiles]['tmp_name'][$key];
			$_FILES[$this->namearchivo]['error'] 		= $_FILES[$nameFiles]['error'][$key];
			$_FILES[$this->namearchivo]['size'] 		= $_FILES[$nameFiles]['size'][$key];


        	//declarar el nombre del archivo
        	$this->config['file_name'] = $id.'_'.$this->obtenerDiaHora();
        	
        	//verificar si la ruta existe caso contrario crear la carpeta
			if (!file_exists($this->config['upload_path'])) 
	    		if(!mkdir($this->config['upload_path'], 0777, true)) die('Fallo al crear las carpetas...');
			
			//cargar el archivo al rservidor y guardar a la BD
			$resArchivo = $this->subirArchivo();

			//Cargar a la base de datos
			if(!empty($resArchivo['success'])){
				$this->CI->load->model('adjunto_model');
				
				$aAdjunto = array(
					'p_descripcion' 	=> $descripcion,
					'p_nombrereal' 		=> $resArchivo['realname'],
					'p_nombre' 			=> $resArchivo['tmpname'],
					'p_ruta' 			=> $resArchivo['success'],
					'p_tabla' 			=> $tabla,
					'p_id_tabla' 		=> $id,
					'usureg'			=> 1
				);

				$result = $this->CI->adjunto_model->insert($aAdjunto);

				if(isset($result[0])){
					$aAdjunto['fecregadjunto'] = $result[0]['fecha_registro'];
				}

				array_push($resultArchivo['success'],  $aAdjunto);

				//Cargar el $archivo a la BD
			}else{
				array_push($resultArchivo['error'], 'Error! Archivo: '.addslashes($_FILES['fileAdj']['name']).'. '.$resArchivo['error'].'<br>' );
				//return;
			}
			//libera la variable
			unset($_FILES['fileAdj']);
        }

        return $resultArchivo;
        
    }


    	/*
	*	Funcion @obtenerDiaHora
	* 	Invocado por @guardarAdjuntos
	*	Obtener el día y la hora concatenado en una cadena
	*	Parametros :  No
	*	Con retorno
	*		(String) : retorna la cadena del Dia , hora, minuto, segundo y microsegundo
	*/
	public function obtenerDiaHora(){
		
		$hoy = date("d"); 
		$micro_date = microtime();
		$date_array = explode(" ",$micro_date);
		$date = date("His",$date_array[1]);
		$date_array[0] = str_replace("0.","",$date_array[0]);
		$date = $hoy."".$date . '' . $date_array[0];

		return $date;
	}


	public function mostrarArchivo($archivo){
		$archivo = base64_decode($file);
		$file = $this->root_dir.$archivo;
		
		header("Content-type:".mime_content_type($file));
		echo file_get_contents($file);
		
	}
	
}

?>