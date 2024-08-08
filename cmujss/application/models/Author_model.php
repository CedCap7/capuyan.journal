<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author_model extends CI_Model {

    public function __construct(){
        $this->load->model('User_model');
        $this->load->model('Author_model');
        $this->load->database();
    }

    public function search_authors($keyword) {
        $this->db->like('author_name', $keyword);
        $this->db->or_like('title', $keyword);
        $query = $this->db->get('authors');
        return $query->result_array();
    }
    public function get_authors() {
        $query = $this->db->get('authors');
        return $query->result_array();
    }

    public function get_author_by_id($auid) {
        $query = $this->db->get_where('authors', array('auid' => $auid));
        return $query->row_array();
    }
    public function insert_author($data) {
        return $this->db->insert('authors', $data);
    }

    public function register($enc_password){
        // User data array
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $enc_password,
        );

        // Insert user
        return $this->db->insert('authors', $data);
    }
    public function update_author($auid, $data) {
        $this->db->where('auid', $auid);
        return $this->db->update('authors', $data);
    }

    public function add_author($data){
		$this->db->insert('authors', $data);
	}
    
    public function login($email, $password){
        // Validate
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        $result = $this->db->get('authors');

        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
    }
    public function delete_author($auid) {
       
        $this->db->where('auid', $auid);
        $this->db->delete('authors');

        // Check if the deletion was successful
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    // New method to get user data with profile picture
    public function get_authors_with_image($auid) {
        // Adjust 'profile_pic' based on your actual column name for the image
        $this->db->select('auid, author_name, email, images');
        $query = $this->db->get_where('authors', array('auid' => $auid));

        return $query->row_array();
    }

    public function fetch_author($query = NULL) {
        if (!is_null($query)) {
                $this->db->order_by('author_name', 'ASC');
            $this->db->like('author_name', $query);
            $this->db->or_like('email', $query);
        }
    
            $this->db->order_by('author_name', 'ASC');
        $query = $this->db->get('authors');
        $authors = $query->result_array();
    
        return $authors;
    }
}