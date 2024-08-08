<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function view($page = 'home') {
        // Fetch all volumes for sidebar
        $data['volumes'] = $this->volume_model->get_all_volumes();

        $data['articles'] = $this->article_model->get_articles_public();

        // Fetch articles and group by volume
        $data['grouped_articles'] = $this->article_model->get_articles_grouped_by_volume();

        // Set the page title
        $data['title'] = ucfirst($page); // Capitalize the first letter

        // Load the views
        $this->load->view('template/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('template/footer', $data);
    }

    public function archive($page = 'archive') {
         // Fetch articles and group by volume
        $data['grouped_articles'] = $this->article_model->get_archives_grouped_by_volume();
        $data['articles'] = $this->article_model->get_articles_archive();
        $data['volumes'] = $this->volume_model->get_all_volumes();
        $data['title'] = ucfirst($page); // Capitalize the first lette

        $this->load->view('template/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('template/footer', $data);
    }
    
    public function view_volume($volumeid) {

        $data['grouped_articles'] = $this->article_model->get_articles_grouped_by_volume();

        // Fetch volume details if needed
        $data['volume'] = $this->volume_model->get_volume_by_id($volumeid);

        // Fetch articles for this volume
        $data['articles'] = $this->article_model->get_articles_by_volume($volumeid);

        // Fetch all volumes for sidebar
        $data['volumes'] = $this->volume_model->get_all_volumes();

        // Load the view and pass the data
        $this->load->view('template/volume/header', $data);
        $this->load->view('pages/volume', $data); // Adjust the view path as needed
        $this->load->view('template/volume/footer', $data);
    }
    
    public function view_article($id) {

        // Get article data by article ID
        // $data['article'] = $this->Article_model->get_article_forda_id($id);
        
        $data['article'] = $this->Article_model->get_article_id($id);
        $data['volume'] = $this->Volume_model->get_volume_by_id($data['article']['volumeid']);

        // print_r($data['article']);

        // Load views
        $this->load->view('template/volume/header');
        $this->load->view('pages/article', $data);
        $this->load->view('template/volume/footer');
    }
    }
