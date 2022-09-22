<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function get_login()
	{
		return $this->db
					->where('nama_user',$this->input->post('nama_user'))
					->where('password', $this->input->post('password'))
					->get('user');
	}
}

?>