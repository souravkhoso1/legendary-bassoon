<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("users_model");
	}


	public function index(){
		$this->load->view('template/head', array('title'=>'Login'));
		$this->load->view('template/header', array(
			'login_details'=>$this->users_model->get_user_details($this->session->userdata('id'))
		));
		$this->load->view('login');
		$this->load->view('template/footer');
	}

	public function authorize(){
		$submit = $this->input->post('submit');
		if($submit == 'Login'){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$id = $this->users_model->get_user_id($email, $password);
			echo $email."~".$password."~";
			if($id == 0){
				echo "1";
			} else {
				$this->session->set_userdata(array('id'=>$id));
				header("Location: ".base_url());
			}
		} else {
			echo "2";
		}
	}
}

?>