<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
	  	$this->load->model('Model_Login');		
	}

	public function index() //login como principal
	{
		$data['title'] = "Login Session"; //ingresando titulo
		$this->load->view('login',$data);
	}
	public function validar() //signin-----------------------
	{
		$datos = $this->input->post();
		$email = $datos['txtEmail'];
		$contrasenia = $datos['txtPassword'];
		$datosusuario = $this->Model_Login->existeUsuario($email,$contrasenia);
		//$datosusuario1 = $this->Model_Login->menusubPerfil($email, $contrasenia);
		foreach ($datosusuario as $value) 
		{
			$nombre = $value->usunombres;
			$estado = $value->usuestado;

			$menu= $value->mennombre;
			$submenu= $value->mencontrolador;
		}

		if(count($datosusuario)>0 && $estado == 1)
		{
			$datosComp = array('usunombres'=>$nombre,'usuemail'=>$email,
				'menu_nombre' => $menu,
				'submenu_controlador' => $submenu,
			'logged_in' => TRUE);
			$this->session->set_userdata($datosComp);		
		}
		else
		{
			$messageCorrecto = "<div id='success' class=\"alert alert-danger alert-dismissible\" 
			role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
			<span aria-hidden=\"true\">&times;</span></button>
      <strong>Hola $email !</strong> Error en usuario y/o contraseña.</div>";
      echo $messageCorrecto;
		}
	}

	public function loggout() //agregando a config/router
	{
    //session_start();
		session_destroy();
		redirect('login/index');
	}

}

