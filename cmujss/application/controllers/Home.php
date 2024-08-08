<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Article_model');
        $this->load->model('Volume_model');
    }

    public function index() {
        // Fetch data from the models
        // $data['articles'] = $this->Article_model->get_articless();
        $data['volume'] = $this->Volume_model->get_volumes();

        // Load views with data
        $this->load->view('template/header');
        $this->load->view('pages/home', $data);
        $this->load->view('template/footer');
    }
}
?>
