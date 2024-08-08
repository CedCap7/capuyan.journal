<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Archives extends CI_Controller{

    public function __construct() {
        parent::__construct();

        // Load the Article_model
        $this->load->model('Article_model');
        $this->load->model('Volume_model'); // Ensure the model is loaded
        $this->load->model('Author_model');
        }

    public function index() {
        $data['volumes'] = $this->Volume_model->get_archived_volumes_with_articles();

        $this->load->view('template/admin/header');
        $this->load->view('admin/archives/index', $data);
        $this->load->view('template/admin/footer');
    }

    public function get_archived_volumes_with_articles()
{
    $this->db->where('published', 2); // Only get volumes with published = 2
    $volumes_query = $this->db->get('volume'); // Ensure 'volume' matches your table name
    $volumes = $volumes_query->result_array();

    foreach ($volumes as &$volume) {
        $this->db->where('volumeid', $volume['volumeid']);
        $this->db->where('published', 2); // Only get articles with published = 2
        $articles_query = $this->db->get('articles'); // Ensure 'articles' matches your table name
        $volume['articles'] = $articles_query->result_array();
    }

    return $volumes;
}

public function archives()
{
    $data['volumes'] = $this->get_archived_volumes_with_articles();
    $this->load->view('admin/archives/index', $data); // Ensure 'archives' matches your view name
}
}