<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {

        $data['title'] = 'Latest Articles'; // Capitalize the first letter

        $this->load->view('template/admin/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('template/admin/footer');
    }
}
