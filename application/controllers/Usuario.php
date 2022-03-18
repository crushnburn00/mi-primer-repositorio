<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	/*
	*	Funcion @construct
	* 	Invocado por la clase Inicio
	*	Carga los helper del formulario
	*	Parametros :  No
	*	Sin retorno
	*/

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','security','utilitario_helper','cookie'));
		$this->load->library(array('paginacion'));
		$this->load->model(array('usuario_model','modulo_model'));

	}

	
	/*
	*	Funcion @index
	*	Invocado por defecto
	*	Invoca las vistas del login
	*	Parametros :  No
	*	Sin retorno
	*/
	public function inicio()
	{	
		if(!esLogeado()):

			#	scripts y estilos
			$scripts1 = array('script0'	=> 'login/jlogin.js');
			#	setear la cabecera
			$head    = array('scripts'	=> $scripts1);

			//echo do_hash( '12345' ,'sha256');
			$this->vistaLogin();

		else:
			redirect(base_url().'principal');
		endif;
	}





	/*
	*	Funcion @validarLogin
	*	Invocado por boton submit btnIngresar de formulario en inicio_view 
	*	Envía los campos de nombre y password al web service, la data obtenida verifica si son correctos o no
	*	Parametros :  No
	*	Sin retorno
	*/
	public function validarLogin()
	{	
		if($this->input->post('btnIngresar')):

		$this->form_validation->set_rules('txtnom', 'Usuario', 'required|trim|xss_clean');
		$this->form_validation->set_rules('txtpass', 'Contraseña', 'required|trim|xss_clean');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio.');

		if ($this->form_validation->run())
        {   
            $isValidLogin = true;
           
            if($this->validarUsuario( $this->input->post('txtnom',TRUE) , do_hash($this->input->post('txtpass',TRUE),'sha256'))==1):
            		//$data = $this->modulo_model->getModuloUsuario( $this->session->userdata('idusuario') );
            		$data = $this->modulo_model->getLinkModuloUsuario( $this->session->userdata('idusuario') , '' , 0 );   

            		redirect(base_url().$data[0]['LINK_MODULO']);
            	
            else:
            		$mensaje = array('mensaje' => 'Usuario y/o Contraseña Errado');
					$this->vistaLogin($mensaje);
            	
            endif;

        }else{

			$this->vistaLogin();
        }

    	endif;

	}


	/*
	*	Funcion @obtenerAccesoAdmin
	*	Invocado por @validarLogin
	*	Verifica si se ingresó con el usuario admin
	*	Parametros :  Si
	*		usuario (String) valor "admin"
	*		clave (String) valor "7893"
	*	Con retorno
	*		-1 (int) : si es correcta la clave y contraseña
	*		 1 (int) : si no es correcta la clave y contraseña
	*/

	private function validarUsuario( $usuario = '', $clave = '' ){

		$data = $this->usuario_model->getValidaUsuario( $usuario, $clave );

		$b = sizeof($data);

		if(sizeof($data) >= 1):

			$sesion = array('usuario'			=> $data[0]['NOMBRE'],
                            'idusuario' 		=> $data[0]['ID_USUARIO'],
                            'tipoaccesoti' 		=> $data[0]['TIPO_USUARIO'] );

			$this->session->set_userdata($sesion);
			return $b;
		else:
			return -1;
		endif;
		
	}	

	/*
	*	Funcion @salir
	*	Invocado por encabezado_view
	*	Detruye los datos de sesión y redireciona a la página principal
	*	Parametros :  No
	*	Sin retorno
	*/
	public function salir(){

		$this->session->sess_destroy();
		redirect(base_url());
	}


	/*
	*	Funcion @vistaLogin
	*	Invocado por @index , @validarLogin
	*	Carga las vistas del inicio de sesion
	*	Parametros :  Si
	*		body (Array) array con las variables que se enviarán al HTML BODY
	*		head (Array) array con las variables que se enviarán al HTML HEAD (JS Y CSS)
	*	Sin retorno
	*/
	private function vistaLogin( $body = array() ){
		#	scripts y estilos
		$scripts1 = array( 
			//'script0'		=> 'js/jquery-3.3.1.min.js' , 
			'script1'	=> 'js/login/jlogin.js'  
		);
		
		$styles = array( 	
				'style0'		=> 'css/estiloLogin.css',
				/*'style1'		=> 'icomoon/style.css',
				'style2'		=> 'css/bootstrap.css',
				'style3'		=> 'amarath/estiloAmaranth.css',*/

		);
		#	setear la cabecera
		$head    = array(	'scripts'	=> $scripts1 ,	'styles' => $styles	);

		$this->load->view('head_view' , $head );
		$this->load->view('inicio_view', $body );
		$this->load->view('foot_view');
	}


    public function index(){	
		if(esLogeado()):

            

		else:
			redirect(base_url());
		endif;
	}



}
