<?php
class Requests_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function add($card_id){
        $source_user_id = $this->session->userdata('id');
        $this->db->insert("requests", array("card_id"=>$card_id, "user_id"=>$source_user_id, "request_status"=>"submitted"));

        $query = $this->db->get_where("requests", array("card_id"=>$card_id, "user_id"=>$source_user_id));
        if($query->num_rows() == 0){
            return "";
        } else {
            $row = $query->row_array();
            return $row["id"];
        }   
    }

    public function list_all_requests($source_user_id){
        $query = $this->db->get_where("requests", array("user_id"=>$source_user_id));
        if($query->num_rows() == 0){
            return array();
        } else {
            return $query->result_array();
        }
    }

}

?>