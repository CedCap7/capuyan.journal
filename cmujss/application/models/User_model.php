<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function search_users($keyword) {
        $this->db->like('complete_name', $keyword);
        $this->db->or_like('email', $keyword);
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_users() {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function get_user_id($userid) {
        $query = $this->db->get_where('users', array('userid' => $userid));
        return $query->row_array();
    }
    // Get a list of users with authors' contact information
    public function get_users_with_authors() {
        // Fetching users data with authors' information
        $this->db->select('*');
        $this->db->from('users');
        // $this->db->join('authors', 'authors.auid = users.auid', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_users_by_articles($id){
		$article_authors = $this->db->get_where('article_author', array('articleid' => $id))->result_array();
		foreach ($article_authors as &$article_author) { 
			$article_author['author'] = $this->volume_model->get_authors_by_id($article_author['auid']);
		}
		return $article_authors;
	}
    
    // Get user data by userid
    public function get_user_by_id($userid) {
        $query = $this->db->get_where('users', array('userid' => $userid));
        return $query->row_array();
    }

    public function update_user($userid, $data) {
        $this->db->where('userid', $userid);
        return $this->db->update('users', $data);
    }

    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }
    // public function get_user_by_id($userid) {
    //     $query = $this->db->get_where('users', array('userid' => $userid));
    //     return $query->row_array();
    // }
    
    public function delete_user($userid) {
        // Perform the deletion operation in the database
        // Replace 'users' with your actual table name and 'user_id' with the appropriate column name
        $this->db->where('userid', $userid);
        $this->db->delete('users');

        // Check if the deletion was successful
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function register($enc_password){
        // User data array
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $enc_password,
        );

        // Insert user
        return $this->db->insert('users', $data);
    }

    public function login($email, $password){
        // Validate
        $this->db->where('email', $email);
        $this->db->where('password', $password);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    // New method to get user data with profile picture
    public function get_user_with_image($userid) {
        // Adjust 'profile_pic' based on your actual column name for the image
        $this->db->select('userid, name, email, profile_pic');
        $query = $this->db->get_where('users', array('userid' => $userid));

        return $query->row_array();
    }
}




// <?php
// defined('BASEPATH') OR exit('No direct script access allowed');

// class User_model extends CI_Model {

//     public function __construct() {
//         $this->load->database();
//     }

//     public function get_users($id = null) {
//         if ($id !== null) {
//             $query = $this->db->get_where('users', array('id' => $id));
//             return $query->row_array();  // Use row_array() to get a single row as an associative array
//         } else {
//             $query = $this->db->get('users');
//             return $query->result_array();  // Use result_array() to get multiple rows as an array of associative arrays
//         }
//     }
// }