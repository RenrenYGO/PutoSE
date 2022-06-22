<?php

class Replies_model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function create_replies($post_id){
		$data = array(
			'post_id' => $post_id,
			'user_id' => $this->session->userdata('user')['id'],
			'content' => $this->input->post('content')
		);
		
		// $this->db->set('reply_count', 'reply_count+1', FALSE);
		// $this->db->where('id', $post_id);
		// $this->db->update('posts');

		return $this->db->insert('replies', $data);
	}

	public function get_replies($id){
		$this->db->select('replies.*, user.name, user.profile_picture');
        $this->db->join('user', 'user.id = replies.user_id');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get_where('replies', array('post_id' => $id));
        
        return $query->result_array();
	}
}