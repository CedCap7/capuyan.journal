<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function index() {
        // $this->load->view('template/nav');
        $this->load->view('register/registration');
        // $this->load->view('template/footer');
    }

    public function registration() {
        // Check if the form is submitted
        if ($this->input->post()) {
            // Retrieve form data
            $complete_name = $this->input->post('complete_name');
            $email = $this->input->post('email');
            $pword = $this->input->post('password');
            $status = $this->input->post('status') ? 1 : 0;

            // Prepare data to be inserted into the database
            $data = [
                'complete_name' => $complete_name,
                'email' => $email,
                'pword' => $pword,
                'status' => $status // Set status to 1 (active) by default
            ];

            // Insert the data into the database
            $inserted = $this->User_model->insert_user($data); // Assuming you have a model method for inserting user

            // Check if insertion was successful
            if ($inserted) {
                // Redirect to login page upon success
                $this->session->set_flashdata('success', 'User added successfully.');
                redirect('login');
            } else {
                // Return error response
                $this->session->set_flashdata('error', 'Failed to add user.');
                redirect('users/registration');
            }
        }

        // Load the add users view
        $this->load->view('template/admin/header');
        $this->load->view('register/login');
        $this->load->view('template/admin/footer');
    }
}
?>
