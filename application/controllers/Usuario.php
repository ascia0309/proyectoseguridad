<?php
class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        //comunicación con el modelo
        $this->load->model('Model_Usuario');
		$this->load->model('Model_Login');
		//$this->load->model('Model_Menu');
	}
	/*
    public function index(){
        $this->Model_Login->isLoggedIn();
        $data['contenido'] = "usuario/index";
        $data['listaUsuario'] = $this->Model_Usuario->listaUsuario();
        //$data['listaMenus'] = $this->Model_Menu->listaMenu();
        $this->load->view("plantilla", $data);
	}*/
	public function index()
	{
		//$this->Model_Login->isLoggedIn();
		//$data['contenido'] = "usuario/index"; //para visulizar de la carpeta view/index/index.php
		$data['title'] = "Lista"; //ingresando titulo
		
		$data['contenido'] = "Usuario/index"; //enviar a plantilla la vista index
		$data['selPerfil'] = $this->Model_Usuario->selPerfil();
		$data['listaUsario'] = $this->Model_Usuario->listUsario();
		$this->load->view("plantilla", $data);
	}


	public function insert()
	{
    //$this->verificarSesion();
    $datos=$this->input->post();
		if (isset($datos)) {
			$txtIdper = $datos['txtIdper'];
			$txtDni = $datos['txtDni'];
			$txtEmail = $datos['txtCorreo'];
			$txtContrasenia = $datos['txtContrasenia'];
			$txtNombres = $datos['txtNombres'];
			$txtApellidos = $datos['txtApellidos'];
			$txtCelular = $datos['txtCelular'];
			$txtEstado = $datos['txtEstado'];
			$this->Model_Usuario->insertUsuario($txtIdper, $txtDni, $txtEmail, $txtContrasenia, $txtNombres, $txtApellidos, $txtCelular, $txtEstado);
			redirect('usuario');
		}
	}

	public function delete($id = null)
	{
    //$this->verificarSesion();
		if ($id != null) {
			$this->Model_Usuario->deleteUsuario($id);
			redirect('usuario');
		}
	}

	public function edit($id = null)
	{
    //$this->verificarSesion();
		if ($id != null) {
      //mostrar $datos
			$data['contenido'] = 'usuario/edit';
			$data['selPerfil'] = $this->Model_Usuario->selPerfil();
			$data['datosUsuario'] = $this->Model_Usuario->editUsuario($id);
			$this->load->view('plantilla', $data);
		} else {
      //regresar a index enviar parametro
			redirect('usuario');
		}
	}

	public function update()
	{
    //$this->verificarSesion();
		$datos = $this->input->post();
		if (isset($datos)) {
			$txtUsuid = $datos['txtUsuid'];
			$txtPerid = $datos['txtPerid'];
			$txtDni = $datos['txtDni'];
			$txtEmail = $datos['txtCorreo'];
			$txtContrasenia = $datos['txtContrasenia'];
			$txtNombres = $datos['txtNombres'];
			$txtApellidos = $datos['txtApellidos'];
			$txtCelular = $datos['txtCelular'];
			$txtEstado = $datos['txtEstado'];
			$this->Model_Usuario->updateUsuario($txtUsuid, $txtPerid, $txtDni, $txtEmail, $txtContrasenia, $txtNombres, $txtApellidos, $txtCelular, $txtEstado);
			redirect('usuario');
		}
	}
}

