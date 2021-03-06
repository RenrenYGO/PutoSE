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

	public function upvote_reply($id){
		$json=$this->get_reacts($id);

		if($json==false){
			$json = file_get_contents(FCPATH."schema/react.json");
		}
		
		$json = json_decode($json['react_ids'],TRUE);

		if(in_array($this->session->userdata('user')['id'],$json['react_ids'])){
			$index = array_search($this->session->userdata('user')['id'],$json['react_ids']);

			unset($json['react_ids'][$index]);
			$this->db->set('upvote', 'upvote-1', FALSE);
			$this->db->where('id', $id);
		
			$json2 = array(
				'react_ids' => json_encode($json)
			);

			$this->db->update('replies',$json2);
		}else{
			array_push($json['react_ids'],$this->session->userdata('user')['id']);
		
			$json2 = array(
				'react_ids' => json_encode($json)
			);

			$this->db->set('upvote', 'upvote+1', FALSE);
			$this->db->where('id', $id);
			$this->db->update('replies',$json2);
		}
	}

	public function downvote_reply($id){
		$json=$this->get_reacts($id);

		if($json==false){
			$json = file_get_contents(FCPATH."schema/react2.json");
		}
		
		$json = json_decode($json['react2_ids'],TRUE);
		
		if(in_array($this->session->userdata('user')['id'],$json['react2_ids'])){
			$index = array_search($this->session->userdata('user')['id'],$json['react2_ids']);

			unset($json['react2_ids'][$index]);
			$this->db->set('downvote', 'downvote-1', FALSE);
			$this->db->where('id', $id);
		
			$json2 = array(
				'react2_ids' => json_encode($json)
			);

			$this->db->update('replies',$json2);
		}else{
			array_push($json['react2_ids'],$this->session->userdata('user')['id']);
		
			$json2 = array(
				'react2_ids' => json_encode($json)
			);

			$this->db->set('downvote', 'downvote+1', FALSE);
			$this->db->where('id', $id);
			$this->db->update('replies',$json2);
		}
	}

	public function row_reply($data){
		$this->db->select('replies.*, id, post_id, content');
		$query = $this->db->where('id', $data);
		$query = $this->db->get('replies');
		
		return $query->row_array();
	}

	public function edit_reply($data){
		$reply = array(
			'content' => $data['body']
		);
        $this->db->where('id', $data['id']);
        return $this->db->update('replies', $reply);
	}


	public function get_reacts($id){
		$this->db->where('id',$id);
		$query = $this->db->get('replies');
		
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return false;
		}
	}

	public function reply_delete($id){
		$this->db->where('id', $id);
		$this->db->delete('replies');
		
		return true;
	}
}