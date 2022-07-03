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

        if(!$id){
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

        $this->db->select('posts.*, user.name, categories.name AS catname, user.profile_picture');
        $this->db->join('user', 'user.id = posts.user_id');
        $this->db->order_by('created_at', 'DESC');

        $this->db->join('categories', 'categories.id = posts.cat_id');
        
        $query = $this->db->get_where('posts', array('cat_id' => $id));
        return $query->result_array();
    }

    public function get_posts_by_search($key){
		$this->db->like('title',$key);
        $this->db->or_like('content',$key);
		$this->db->select('posts.*, user.name, user.profile_picture, categories.name AS catname');
        $this->db->join('user', 'user.id = posts.user_id');
        $this->db->order_by('created_at', 'DESC');

        $this->db->join('categories', 'categories.id = posts.cat_id');
        
        $query = $this->db->get('posts');
        
        return $query->result_array();
	}

    public function get_posts_by_popularity(){
        
		$this->db->order_by('upvote', 'DESC');
		$query = $this->db->get('posts');
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

    public function upvote_post($id){
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

			$this->db->update('posts',$json2);
		}else{
			array_push($json['react_ids'],$this->session->userdata('user')['id']);
		
			$json2 = array(
				'react_ids' => json_encode($json)
			);

			$this->db->set('upvote', 'upvote+1', FALSE);
			$this->db->where('id', $id);
			$this->db->update('posts',$json2);
		}
	}

	public function downvote_post($id){
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

			$this->db->update('posts',$json2);
		}else{
			array_push($json['react2_ids'],$this->session->userdata('user')['id']);
		
			$json2 = array(
				'react2_ids' => json_encode($json)
			);

			$this->db->set('downvote', 'downvote+1', FALSE);
			$this->db->where('id', $id);
			$this->db->update('posts',$json2);
		}
	}

    public function get_reacts($id){
		$this->db->where('id',$id);
		$query = $this->db->get('posts');
		
		if($query->num_rows()>0){
			return $query->row_array();
		}else{
			return false;
		}
	}

}