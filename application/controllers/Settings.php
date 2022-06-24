<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{

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

    public function edit_account(){
        
        $this->form_validation->set_rules('password','Current Password','required|callback_checkPassword');
        $this->form_validation->set_rules('newpass', 'New Password', 'required');
        $this->form_validation->set_rules('confpass', 'Confirm Password', 'callback_checkNewPassword');

        $data['user'] = $this->profile_model->get_profile();
        if($this->form_validation->run()===false){
            $data["error"] = validation_errors();
            
            $this->load->view('templates/header', $data);
            $this->load->view('pages/edit_account');
            $this->load->view('templates/footer');
        } else {
            $data = $this->input->post();

            if($this->change_pass($data)){
                $this->session->sess_destroy();
                redirect("login");
            }
        }
    }

    public function checkPassword($pass){
        $this->form_validation->set_message('checkPassword', 'Incorrect Current Password');
        $data = $this->profile_model->get_profile()['password'];

        if (password_verify($pass, $data)) {
            return true;
        }
        return false;
    }

    public function checkNewPassword($password2){
        $this->form_validation->set_message('checkNewPassword', 'New password and confirm password does not match');
        $oldPass = $this->profile_model->get_profile()['password'];
        $newPass = $this->input->post('newpass');
        $confirmPass = $password2;

        // Conditions for making it an optional field
        if ($newPass) { // If new pass field has a value
            if ($newPass == $confirmPass) { // check if matches with confirm password
                if (!password_verify($newPass, $oldPass)) { // then check if it is the same with old password
                    return true;
                }else {
                    $this->form_validation->set_message('checkNewPassword', 'Cannot input old password');
                    return false;
                }  
            }else{ 
                return false;
            }
        }elseif(empty($newPass) && !empty($confirmPass)) { // If only confirm password has a value
            return false;
        }else {   // If both field has no value
            return true;    // Return true since it is optional
        }
    }

    public function change_pass($changepass){
   
            
        $hashed_pass = password_hash($changepass['newpass'], PASSWORD_DEFAULT);
        $data = array(
            'password' => $hashed_pass,
        );
        $query =  $this->profile_model->update_info($data);;
        if($query){
            return true;
        }
        return false;
    }
}