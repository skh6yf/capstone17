<?php
class UserAccountModel extends CI_Model {
    
    function getUserAccounts(){
        
        $this->db = $this->load->database();
        $this->db->select("user_id, email, first_name, last_name, enabled");
        $this->db->from('UserAccount');
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>