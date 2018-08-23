<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Menu extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function menusubPerfil() //dropdown_menu
	{
		$this->db->select('*, 
							menu.menid as menu_id, 
							perfil.pernombre as perfil_nombre', 'left');
		$this->db->from('mep');
		$this->db->join('menu', 'menu.menid=mep.menid');
		$this->db->join('perfil', 'mep.perid=perfil.perid');
		$this->db->join('usuario', 'usuario.perid=perfil.perid');
		$this->db->where('usuario.usuemail', "sasuke@hotmail.com");//
		$this->db->where('usuario.usucontrasenia', "sasuke");
		$query = $this->db->get();
		return $query->result();
	}
	/*public function menusubPerfil($email,$contrasenia) //dropdown_menu
	{
		$this->db->select('*, 
							menu.menid as menu_id, 
							perfil.pernombre as perfil_nombre', 'left');
		$this->db->from('mep');
		$this->db->join('menu', 'menu.menid=mep.menid');
		$this->db->join('perfil', 'mep.perid=perfil.perid');
		$this->db->join('usuario', 'usuario.perid=perfil.perid');
		$this->db->where('usuario.usuemail', $email);//
		$this->db->where('usuario.usucontrasenia', $contrasenia);
		$query = $this->db->get();
		return $query->result();
	}*/
	public function submenu() //sub_menu
	{
		$this->db->select('*');
		$this->db->from('menu');
		$query = $this->db->get();
		return $query->result();
	}


///////////////////////////////NO ES NADA //////////////////////////////////////////////////////
	public function accessMenPro($con)
	{
		$perid = $this->session->userdata('perid');
		$query = $this->db->query("SELECT M.menid, M.mencontrolador, M.menaccion, P.perid,P.pernombre
                            FROM menu M
                            INNER JOIN mep MP ON M.menid = MP.menid
                            INNER JOIN perfil P ON P.perid = MP.perid
                            WHERE P.perid = '$perid';
                            WHERE M.mencontrolador = '$controller' AND P.pro_id = '$pro_id';");
		return $query->result();
	}
}
