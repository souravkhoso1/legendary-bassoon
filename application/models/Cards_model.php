<?php
class Cards_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_all_cards($user_id=null){
        if($user_id==null){
            $query = $this->db->get_where("cards", array("is_verified"=>"1"));
        } else {
            $query = $this->db->get_where("cards", array("is_verified"=>"1", "user_id"=>$user_id));
        }
        $row = $query->result_array();
        return $row;
    }

    public function get_user_id($card_id){
        $query = $this->db->get_where("cards", array("id"=>$card_id));
        $row = $query->row_array();
        return $row['user_id'];
    }

}

?>