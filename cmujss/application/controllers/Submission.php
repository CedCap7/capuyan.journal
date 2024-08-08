<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Submission extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load the Article_model
        $this->load->model('Submission_model');
    }

    public function index() {
        $data['articles'] = $this->submission_model->get_article_submission();
        $data['title'] = 'Latest Articles';

        $this->load->view('template/evaluator/header');
        $this->load->view('evaluator/submissions/index', $data);
        $this->load->view('template/evaluator/footer');
    }
}