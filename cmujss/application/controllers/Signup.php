<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('register/signup');
		$this->load->view('templates/footer');
	}
}
