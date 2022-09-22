<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'M_login'=> 'login',
        ));
    }

    public function index()
    {
        if ($this->session->userdata('login')==TRUE) {
            redirect('dashboard','refresh');
        }
        else{
            $this->load->view('login');
        }       
    }
    public function proses_login()
    {
        $nama_user = $this->input->post('nama_user');
        $password = $this->input->post('password');
        $where = array(
            'nama_user' => $nama_user,
            'password' => $password
            );
        $cek = $this->login->get_login("user",$where)->num_rows();
        if($cek > 0){
 
            $data_session = array(
                'nama' => $nama_user,
                'status' => "login"
                );
 
            $this->session->set_userdata($data_session);
            redirect('dashboard','refresh');
            
            // echo "login sukses";
        }else{
            redirect('login','refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login','refresh');
    }
    

}