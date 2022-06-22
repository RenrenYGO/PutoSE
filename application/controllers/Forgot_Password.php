<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_Password extends CI_Controller{

    public function index(){
        $this->load->view('templates/header');
        $this->load->view('pages/forgot_password');
        $this->load->view('templates/footer');
    }

    public function verify(){
        // Rules for forms
        $this->form_validation->set_rules('new_password','New Password');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'callback_checkNewPassword');
        $this->form_validation->set_error_delimiters('','');
        
        if($this->form_validation->run()===false) {
            $this->load->view('templates/header');
            $this->load->view('pages/forgot_password');
            $this->load->view('templates/footer');
        }
        else {
            $email = $this->input->post("email");
            $newPass = $this->input->post('new_password');
            if ($newPass) {
                $userData['password'] = password_hash($newPass,PASSWORD_DEFAULT);
            }
            $this->user_model->update_info($email, $userData); // Update database

            redirect("login");
        }
    }

    public function checkNewPassword($password2)
    {
        $this->form_validation->set_message('checkNewPassword', 'New password and confirm password does not match');
        $newPass = $this->input->post('new_password');
        $confirmPass = $password2;
        
        if ($newPass != $confirmPass) { // check if matches with confirm password
            return false;
        }
        return true;
        
    }

    public function sendOTP(){
        $email = $this->input->post("email");
        // Code Generation
        $code = random_int(0,999999);  // Generate hash value
        $code = str_pad($code, 6, 0, STR_PAD_LEFT);
        $userCode = array(
            'code' => $code,
            );
        $this->user_model->update_info($email,$userCode); // Update passcode

        // send code to current email
        $emailData = array(
            'header' => 'Account Change Email:',
            'passcode' => $code,
            'body' => 'Please Enter the 6 digit pin given above to proceed on changing Email.'
        );
        $this->send($email, 'templates/ChangePass_Email.php', $emailData); // Call email setup function
    }

     // EMAIL MESSAGE SETUP
     public function send($email,$template,$emailData)
     {
         $to =  $email;
         $subject = 'Change Password';
         $from = 'putomicroblog@gmail.com';
         $password = env('PASSWORD'); //get password from env file

         // Config setup
         $config = array(
             'protocol' => 'smtp',
             'smtp_host' => 'ssl://smtp.gmail.com',
             'smtp_port' => '465',
             'smtp_timeout' => '60',
             'smtp_user' => $from,
             'smtp_pass' => $password,
             'charset' => 'utf-8',
             'newline' => "\r\n",
             'mailtype' => 'html'
         );

         // Setup email from autoload['helper']
         $this->email->initialize($config);
         $this->email->set_mailtype("html");
         $this->email->from($from);
         $this->email->to($to);
         $this->email->subject($subject);

         // Load the format and content of email
         $message=$this->email->message($this->load->view($template, $emailData, true));

         $status=$this->email->send(); // Send the email  
     }
}