<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function check_login($email, $password) {
        // Query the database to check login credentials
        $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));

        // If a user with given credentials exists, return user data
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false; // If no user found, return false
        }
    }
}

