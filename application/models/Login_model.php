<?php

class Login_model extends CI_Model{

  public function __construct(){
    parent::__construct();
  }

  public function login($username, $password){
    $this->db->where('name', $username);
    $query = $this->db->get('user');
    $result = $query->row_array();

    if(!empty($result) && password_verify($password, $result['password'])){
      // if this username exists, and the input password is verified using password_verify
        return $result;
    }else{
        return false;
    }
  }

  // LOGIN USER
  public function login_user($username,$password) {

    // Check the database
    $this->db->select('*');
    $this->db->where('name', $username); 

    $query = $this->db->get('user');  
    if ($query->num_rows() > 0){ // Check if username is in users
    
      $q = $query->row_array();
        // Store values from query
        $result1 = $q['name'];
        $result2 = $q['password'];
       
      
        if (password_verify($password, $result2)) { // Check if password matched

          // Set the session
          $session['user'] = $q;
          $this->session->set_userdata($session);
      
          return "Login Success";
          
        }else{ // Incorrect password
          return "Incorrect Password ";
        } 
      }else {  // Incorrect username
        return "Incorrect username and password";
      }
  }

  
}