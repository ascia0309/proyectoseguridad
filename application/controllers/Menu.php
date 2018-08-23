<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Menu');
		//load multi level menu
		$this->load->library('multi_menu');
	}
	
	public function index()
	{
		$data['title'] = "Menu"; //ingresando titulo
		//$datos = $this->input->post();
		//$email = $datos['txtEmail'];
		//$contrasenia = $datos['txtPassword'];
		$data['menues'] = $this->Model_Menu->menusubPerfil();
		//$data['menues'] = $this->Model_Menu->menusubPerfil($email, $contrasenia);
		$data['submenubo'] = $this->Model_Menu->submenu();
		$data['contenido'] = "menu/home"; //enviar a plantilla la vista index
		$this->load->view("plantilla", $data);

		
	}
	
	
	
}
