<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['title'] = 'Enter your Query';
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->load->view('templates/header');
        $this->load->view('pages/contact',$data);
        $this->load->view('templates/footer');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
        }else{
            $data = array(
				'email' => $this->input->post('email'),
                'message'=>$this->input->post('editor1'),
			);

            $this->contact_model->get_help($data);
            // Set message
            $this->session->set_flashdata('user_registered', 'Your message was sent!');
            redirect('dashboard');
        }
	}
    
    // Check if email exists
    public function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists', 'That email is already subscribed.');
        if($this->contact_model->check_email_exists($email)){
            return true;
        }else{
            return false;
        }
    }
}
