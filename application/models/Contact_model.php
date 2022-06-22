<?php

class Contact_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }
    
	public function get_help($data){
		// Insert user into the contact DB
		$this->db->insert('contact', $data);
		return true;
	}

	// Check if email exists
	public function check_email_exists($email){
		$query = $this->db->get_where('contact', array('email' => $email));

		if(empty($query->row_array())){
			return true;
		}else{
			return false;
		}
	}
}