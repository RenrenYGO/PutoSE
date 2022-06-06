<?php
    class User_model extends CI_Model{

        // UPDATE USER INFO BY EMAIL
        public function update_info($email, $data) {
            $this->db->where('email', $email)
                    ->update("user", $data);  
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