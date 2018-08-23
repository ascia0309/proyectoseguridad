<?php
class Menu_lib{
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	public function menu_navegador()
	{
		$menunav = array(
			array('text' =>'Home' ,url =>''),
			array('text' => 'Page 1', url => 'usuario/index'),
			array('text' => 'Page 2', url => 'usuario/edit'),
			array('text' => 'Page 3', url => '')
		);
		$html = '<ul>';
		foreach ($menunav as $data) {
			$html .= '<li class="active">';
			$html .= anchor('', $data['text']);
			$html .= '</li>';

		}
		$html .= '</ul>';
	}

}
