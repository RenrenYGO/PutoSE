<?php

class Posts_model extends CI_Model{

    public function get_posts()
    {
        $this->db->select('posts.*, user.name');
        $this->db->join('user', 'user.id = posts.user_id');
        $query = $this->db->get('posts');
        
        return $query->result_array();
    }
}