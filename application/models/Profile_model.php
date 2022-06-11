<?php

class Profile_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }

    public function get_profile($id){
        if($id === FALSE){
            $id = $this->session->userdata('user')['id'];
        }
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        return $query->row_array();
    }
}