<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_Profile extends CI_Controller{

    private $user = null;

    public function __construct(){
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function index(){
        $data['user'] = $this->profile_model->get_profile();

        $this->load->view('templates/header');
        $this->load->view('pages/edit_profile',$data);
        $this->load->view('templates/footer');
    }

    public function profile_edit(){
        $data = $this->input->post();

        $this->user_model->update_profile($data);
        redirect('profile');
    }
}