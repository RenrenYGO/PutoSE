<?php

class Category_model extends CI_Model{
    
    public function __construct(){
        $this->load->database();
    }

    public function get_cats_by_search($key){
		$this->db->like('name',$key);
        $query = $this->db->get('categories');
        return $query->result_array();
	}

    public function get_cats(){
        // $this->db->order_by('name');
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function get_cat($id){
        $query = $this->db->get_where('categories', array('id' => $id));
        return $query->row();
    }
}