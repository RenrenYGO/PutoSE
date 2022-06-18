<?php

class Profile_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }

    public function get_profiles(){
        // $this->db->order_by('name');
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function get_profile($id=NULL){
        if(!$id){
            $id = $this->session->userdata('user')['id'];
        }
        $this->db->where('id', $id);
        $query = $this->db->get('user');
       
        return $query->row_array();
    }

    public function update_info($data){
        $id = $this->session->userdata('user')['id'];
        $this->db->where('id', $id);
        
        return $query = $this->db->update('user', $data);
    }
}