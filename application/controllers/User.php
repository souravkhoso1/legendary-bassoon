<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("users_model");
		$this->load->model("cards_model");
		$this->load->model("requests_model");
	}

	function _remap($param) {
		if(is_numeric($param) && $param != '0'){
			$this->index($param);
		} else {
			header("Location: ".base_url());
		}
    }

	public function index($id)
	{
		$this->load->view('template/head', array('title'=>'User'));
		$this->load->view('template/header', array(
			'login_details'=>$this->users_model->get_user_details($this->session->userdata('id'))
		));
		$this->load->view('user', array(
			'user_details'=>$this->users_model->get_user_details($id),
			'user_card_details'=>$this->cards_model->get_all_cards($id),
			'user_request_details'=>$this->requests_model->list_all_requests($this->session->userdata('id'))
		));
		$this->load->view('template/footer');
	}
}