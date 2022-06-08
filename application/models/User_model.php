<?php
    class User_model extends CI_Model{

        // UPDATE USER INFO BY EMAIL
        public function update_info($email, $data) {
            $this->db->where('email', $email)
                    ->update("user", $data);  
        }

        // UPDATE USER PROFILE
        public function update_profile($data, $profile_picture){  
            $data2 = array(
                'bio' => $data['bio'],
                'name' => $data['name'],
                'profile_picture' => $profile_picture
            );

            $this->db->where('id', $this->session->userdata('user')['id']);
            return $this->db->update('user', $data2);
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