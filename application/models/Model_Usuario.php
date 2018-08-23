<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Usuario extends CI_Model {

	function __construct() 
	{
    parent::__construct();
    $this->load->database();
  }

	public function selPerfil()
	{
		$query = $this->db->query("select * from perfil");
		return $query->result();
	}
  //para insertar usaurio
	public function insertUsuario($Idper, $Dni, $Email, $Contrasenia, $Nombres, $Apellidos, $Celular, $Estado)
	{
		$arrayDatos = array('perid' => $Idper, 'usudni' => $Dni, 'usuemail' => $Email,
		 'usucontrasenia' => $Contrasenia, 'usunombres' => $Nombres, 'usuapellidos' => $Apellidos, 
		 'usucelular' => $Celular, 'usuestado' => $Estado);
		$this->db->insert('usuario', $arrayDatos);
	}

  //funcion para listar usuarios
	public function listUsario()
	{
		$query = $this->db->query("select * from usuario u inner join perfil p on u.perid=p.perid");
		return $query->result();
	}

	public function deleteUsuario($id)
	{
		$this->db->where('usuid', $id);
		$this->db->delete('usuario');
	}

	public function editUsuario($id)
	{
		$consulta = $this->db->query("select*from usuario u inner join perfil p on u.perid=p.perid where u.usuid=$id");
		return $consulta->result();
	}

	public function updateUsuario($txtUsuid, $txtIdper, $txtDni, $txtEmail, $txtContrasenia, $txtNombres, $txtApellidos, $txtCelular, $txtEstado)
	{
		$array = array('perid' => $txtIdper, 'usudni' => $txtDni, 'usuemail' => $txtEmail, 'usucontrasenia' => $txtContrasenia, 'usunombres' => $txtNombres, 'usuapellidos' => $txtApellidos, 'usucelular' => $txtCelular, 'usuestado' => $txtEstado);
		$this->db->where('usuid', $txtUsuid);
		$this->db->update('usuario', $array);
	}

	/*
  public function listaUsuario()
  {
    $query = $this->db->query("SELECT * FROM usuario");
    return $query->result();
  }
	*/
}
