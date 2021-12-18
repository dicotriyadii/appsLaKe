<?php

    class CPage extends CI_Controller{
        function __construct(){
            parent::__construct();

            $this->load->model('MData');
            if($this->session->userdata('status') != "login"){
                redirect(base_url("login"));
            }
        }

        function index(){
            $data['data'] = $this->MData->tampilData()->result();
            $this->load->view('VDashboard',$data);
            
        }

        function formInput(){
            $this->load->view('VForminput');
        }

    }

?>