<?php
Class Membership_model extends CI_Model{
  
  function validate(){
    
    $this->db->where('username', $this->input->post('username'));
    $this->db->where('password', md5($this->input->post('password')));
    $q = $this->db->get('users');
    
    if( $q->num_rows == 1 ){
      return true;
    }
  }
  
}
?>