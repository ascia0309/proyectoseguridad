<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Login extends CI_Model 
{
	function __construct() 
	{
    	parent::__construct();
    	$this->load->database();
  	}

  	public function existeUsuario($email,$contrasenia)
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
	}

  	public function isLoggedIn()
 	{
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		$is_logged_in = $this->session->userdata('logged_in');
		if (!isset($is_logged_in) || $is_logged_in !== true)
		{
			redirect('/');
			exit;
		} 
		else 
		{
            if(!$this->uriAccess()){
                redirect('inicio/access_denied');
                exit;
            }
		}
	}

    public function uriAccess(){
        $controller = $this->uri->segment(1);
        $listMenu = array();
        foreach ($this->accessMenPro() as $value) {
            $listMenu[] = $value->mencontrolador;
        }
        if(in_array($controller, $listMenu)){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function accessMenPro($con){
        $perid = $this->session->userdata('perid');
        $query = $this->db->query("SELECT M.menid, M.mencontrolador, M.menaccion, P.perid,P.pernombre
                            FROM menu M
                            INNER JOIN mep MP ON M.menid = MP.menid
                            INNER JOIN perfil P ON P.perid = MP.perid
                            WHERE P.perid = '$perid';
                            WHERE M.mencontrolador = '$controller' AND P.pro_id = '$pro_id';");
        return $query->result();
	}

	public function login_user($email, $contrasenia)
	{
		$query = $this->db->query("SELECT perfil.pernombre as admin, menu.mennombre as menu
									FROM menu inner join mep on menu.menid=mep.menid 
									INNER JOIN perfil on perfil.perid=mep.perid 
									inner join usuario on usuario.perid=perfil.perid 
									WHERE usuemail='$email' and usucontrasenia='$contrasenia'");
		return $query->result();
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			$this->session->set_flashdata('usuario_incorrecto', 'Los datos introducidos son incorrectos');
			redirect(base_url() . 'login', 'refresh');
		}
	}
}
