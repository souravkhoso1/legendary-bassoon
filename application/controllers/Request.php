<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("requests_model");
		$this->load->model("cards_model");
	}

	public function add($card_id){
		$request_id = $this->requests_model->add($card_id);
		$dest_user_id = $this->cards_model->get_user_id($card_id);
		$this->session->set_userdata(array("alert_message"=>"request #".$request_id." is submitted"));
		header("Location: ".base_url("user/".$dest_user_id));
	}

}

?>