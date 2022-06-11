<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_Account extends CI_Controller{

    private $user = null;

    public function __construct(){
        parent::__construct();
        $this->user = $this->session->userdata('user');
    }

    public function index(){
        $data['user'] = $this->profile_model->get_profile();

        $this->load->view('templates/header');
        $this->load->view('pages/edit_account',$data);
        $this->load->view('templates/footer');
    }

    public function account_edit(){
        
        $this->form_validation->set_rules('newpass', 'Password', 'required|min_length[3]|max_length[25]');
        $this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[newpass]');
        if($this->form_validation->run()===false){
            $data["error"] = validation_errors();
            redirect("pages/dashboard/edit_account");
        } else {
            $data = $this->input->post();
            if($this->change_pass($data)){
                $this->user_model->update_email($data);
                $this->session->sess_destroy();
                redirect('login');
            }
        }
    }

    public function change_pass($changepass){
        $email = $this->session->userdata('user')['id'];
            
        $hashed_pass = password_hash($changepass['newpass'], PASSWORD_DEFAULT);
        $data = array(
            'password' => $hashed_pass,
        );
        $query = $this->user_model->update_password($email,$data);
        if($query){
            return true;
        }
        return false;
    }
}