<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("users_model");
		$this->load->model("cards_model");
	}

	public function index()
	{
		$this->load->view('template/head', array('title'=>'Home'));
		$this->load->view('template/header', array(
			'login_details'=>$this->users_model->get_user_details($this->session->userdata('id'))
		));
		$this->load->view('home', array(
			'card_details'=>$this->all_cards()
		));
		$this->load->view('template/footer');
	}

	public function all_cards(){
		//$userdata = $this->users_model->get_user_details($this->session->userdata('id'));
		$all_cards = $this->cards_model->get_all_cards();
		foreach($all_cards as $card_key=>$card_value){
			$all_cards[$card_key]['user_details'] = $this->users_model->get_user_details($card_value['user_id']);
		}
		return $all_cards;
	}
}

?>