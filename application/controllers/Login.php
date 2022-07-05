<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $user = $this->session->userdata('user');
        
        if(isset($user) && $user!=null){
            redirect('/dashboard');
        }
	}
	


    public function index()
    {
        $this->form_validation->set_rules('name','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        // para mawala yung tag sa validation_error()
        $this->form_validation->set_error_delimiters('','');
        if($this->form_validation->run()===false) {
            $data["error"] =  validation_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/login');
            $this->load->view('templates/footer');         

        }else {
            // Get user login input
            $username = $this->input->post('name');
            $password = $this->input->post('password');
           
            $data["error"] = $this->login_model->login_user($username,$password); 
            
            // Login validation 
            if($data["error"] == "Login Success"){
                redirect("dashboard");
            }
            
            $this->load->view('templates/header', $data);
            $this->load->view('pages/login');
            $this->load->view('templates/footer');      
        }
    }

}