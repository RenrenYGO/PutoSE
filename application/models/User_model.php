<?php
    class User_model extends CI_Model{

        // UPDATE USER INFO BY EMAIL
        public function update_info($email, $data) {
            $this->db->where('email', $email)
                    ->update("user", $data);  
        }

        // UPDATE USER PROFILE
        public function update_profile($data){  

            $this->db->where('id', $this->session->userdata('user')['id']);
            return $this->db->update('user', $data);
        }

        
        // UPDATE USER EMAIL
        public function update_email($data){
            $data2 = array(
                'email' => $data['email']
            );

            $this->db->where('id', $this->session->userdata('user')['id']);
            return $this->db->update('user', $data2);
        }

        // UPDATE USER PASSWORD
        public function update_password($email, $data){
            $query = $this->db->where('id', $email);
            return $this->db->update('user', $data);
        }

        // CHECK CODE IN DATABASE
        public function checkotp($code){
            $this->db->select('*');
            $this->db->where('code', $code);
            $query = $this->db->get('users');
            if ($query->num_rows() > 0) {
                return true;
            }
            return false; 
        }

    }
?>