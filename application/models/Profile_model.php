<?php

class Profile_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }

    public function get_profile(){
        $this->db->where('id', $this->session->userdata('user')['id']);
        $query = $this->db->get('user');
        return $query->row_array();
    }
}