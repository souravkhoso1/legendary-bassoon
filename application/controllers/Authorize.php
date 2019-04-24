<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorize extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("users_model");
	}

	public function __remap($method, $args){
		if($method=='login') {
			$this->login();
		} elseif ($method=='register') {
			$this->register();
		} elseif ($method=='logout') {
			$this->logout();
		} 
	}


	public function login(){
		$submit = $this->input->post('submit');
		if($submit == 'Login'){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$id = $this->users_model->get_user_id($email, $password);
			if($id == 0){
				//
			} else {
				$this->session->set_userdata(array('id'=>$id));
				header("Location: ".base_url());
			}
		} else {
			$this->load->view('template/head', array('title'=>'Login'));
			$this->load->view('template/header', array(
				'login_details'=>$this->users_model->get_user_details($this->session->userdata('id'))
			));
			$this->load->view('login');
			$this->load->view('template/footer');
		}
	}

	public function register() {

	}

	public function logout() {
		$this->session->unset_userdata('id');
		header("Location: ".base_url());
	}
}

?>