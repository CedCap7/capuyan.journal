<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submission_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_article_submission() {
        // Joining articles with authors based on the 'title' foreign key
        $this->db->select('articles.*, authors.author_name, volume.vol_name');
        $this->db->from('articles');
        $this->db->join('authors', 'articles.title = authors.title', 'left');
        $this->db->join('volume', 'articles.volumeid = volume.volumeid', 'left');

        // Perform the query
        $query = $this->db->get();

        // Return the result as an array
        return $query->result_array();
    }
}