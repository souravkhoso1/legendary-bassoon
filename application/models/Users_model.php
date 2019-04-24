<?php
class Users_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_user_id($user_email, $user_password){
    	$query = $this->db->get_where("users", array("user_email"=>$user_email, "user_password"=>$user_password));
    	if($query->num_rows()==0){
    		return 0;
    	} else {
    		$row = $query->row_array();
    		return $row['id'];
    	}
    }

    public function get_user_details($id){
    	if($id==null){
    		return array();
    	} else {
	    	$query = $this->db->get_where("users", array("id"=>$id));
	    	if($query->num_rows()==0){
	    		return array();
	    	} else {
	    		return $query->row_array();
	    	}
	    }
    }

}

?>