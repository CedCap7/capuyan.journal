<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index() {
        // Load login view
        $this->load->view('register/admin');
    }

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Check login credentials using the login model
        // For demonstration, let's use default credentials here
        $default_email = 'admin@example.com';
        $default_password = 'admin123';

        if ($email === $default_email && $password === $default_password) {
            // Set session data
            $session_data = array(
                'user_id' => 1,
                'username' => 'Admin',
                'email' => $email,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            redirect('users'); // Redirect to dashboard after successful login
        } else {
            // If login fails, set error message and reload login page
            $data['error_message'] = 'Invalid email or password';
            $this->load->view('admin', $data);
        }
    }

    public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('admin');
    }
}
