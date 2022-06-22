<?php

class Posts_model extends CI_Model{

    // GET ALL POST
    public function get_posts(){
        $this->db->select('posts.*, user.name, user.profile_picture, categories.name AS catname');
        $this->db->join('user', 'user.id = posts.user_id');
        $this->db->order_by('created_at', 'DESC');

        $this->db->join('categories', 'categories.id = posts.cat_id');
        
        $query = $this->db->get('posts');
        
        return $query->result_array();
    }

    // GET SPECIFIC POST BY POST ID
    public function get_specific_post($id){
        $this->db->select('posts.*, user.name, user.profile_picture, categories.name AS catname');
        $this->db->where('posts.id', $id);
        $this->db->join('user', 'user.id = posts.user_id');
        $this->db->order_by('created_at', 'DESC');

        $this->db->join('categories', 'categories.id = posts.cat_id');
        
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

        $this->db->select('posts.*, user.name, categories.name AS catname');
        $this->db->join('user', 'user.id = posts.user_id');
        $this->db->order_by('created_at', 'DESC');

        $this->db->join('categories', 'categories.id = posts.cat_id');

        $query = $this->db->get_where('posts', array('user_id' => $id));
        
        return $query->result_array();
    }

    public function get_posts_by_cat($id){

        $this->db->select('posts.*, user.name, categories.name AS catname');
        $this->db->join('user', 'user.id = posts.user_id');
        $this->db->order_by('created_at', 'DESC');

        $this->db->join('categories', 'categories.id = posts.cat_id');
        
        $query = $this->db->get_where('posts', array('cat_id' => $id));

        
        
        return $query->result_array();
    }

    public function update_post($data){
        $data = array(
            'user_id' => $data['postedBy'],
            'title' => $data['title'],
            'content' => $data['body'],
            'cat_id' => $data['cat_id']
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }

    public function delete_post($id){
        $this->db->where('post_id', $id);
        $this->db->delete('replies');

        echo $this->db->last_query();

        $this->db->where('id', $id);
        $this->db->delete('posts');

        return true;
    }
}