<?php

class Posts_model extends CI_Model{

    // GET ALL POST
    public function get_posts(){
        $this->db->select('posts.*, user.name');
        $this->db->join('user', 'user.id = posts.user_id');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('posts');
        
        return $query->result_array();
    }

    // GET SPECIFIC POST BY POST ID
    public function get_specific_post($id){
        $this->db->select('posts.*, user.name');
        $this->db->where('posts.id', $id);
        $this->db->join('user', 'user.id = posts.user_id');
        $query = $this->db->get('posts');

        return $query->row_array();
    }

    // INSERT NEW POST
    public function create_post($data){
        $this->db->select('*')
                ->insert('posts', $data);
    }

    public function get_posts_by_user($id){

        if($id === FALSE){
            $id = $this->session->userdata('user')['id'];
        }

        $this->db->select('posts.*, user.name');
        $this->db->join('user', 'user.id = posts.user_id');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get_where('posts', array('user_id' => $id));
        
        return $query->result_array();
    }
}