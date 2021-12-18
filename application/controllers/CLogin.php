<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('MLogin');
    }

	function index()
	{
		$this->load->view('VLogin');

	}

    function prosesLogin(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where    = array(
            'username' => $username,
            // 'password' => md5($password)
            'password' => $password
        );
        $cek = $this->MLogin->cekLogin('tbl_user',$where)->num_rows();
        if($cek > 0){
            $dataSession = array(
                'nama'   => $username,
                'status' => "login"
            );
            $this->session->set_userdata($dataSession);
            redirect(base_url('dashboard'));
        }else{
            echo "Username atau password salah !";
        }
    }

    function prosesLogout(){
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}