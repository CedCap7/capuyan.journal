<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Author_model');
        $this->load->library('upload');
    }

    public function search() {
        $keyword = $this->input->get('author_name');
        $authors = $this->Author_model->search_authors($keyword);
    
        if ($this->input->is_ajax_request()) {
            echo json_encode($authors);
        } else {
            $data['authors'] = $authors;
            $this->load->view('admin/authors/search_results', $data);
        }
    }
    
    
    public function index() {
        // Get authors from the model
        $data['authors'] = $this->author_model->get_authors();

        // Sort authors by their complete names alphabetically (A-Z)
        usort($data['authors'], function($a, $b) {
            return strcmp($a['author_name'], $b['author_name']);
        });

        // Set the title
        $data['title'] = 'Author Management';

        // Load views
        $this->load->view('template/admin/header', $data);
        $this->load->view('admin/authors/index', $data);
        $this->load->view('template/admin/footer', $data);
    }

    // VIEW PROFILE
    public function view_details($auid) {
        // Retrieve authorid from the URL
        $auid = $this->uri->segment(3); // Assuming it's the third segment in the URL

        // Load author data based on authorid
        $data['author'] = $this->author_model->get_author_by_id($auid);
        $data['title'] = 'View Profile'; // Change the title as needed

        // Load views
        $this->load->view('template/admin/header');
        $this->load->view('admin/authors/view_details', $data);
        $this->load->view('template/admin/footer');
    }

    public function edit_author($id){
		$data['author'] = $this->author_model->get_author_by_id($id);
		$this->load->view('template/admin/header');
		$this->load->view('admin/authors/edit', $data);
		$this->load->view('templateadmin//footer');
	}

	public function update_author($id){
        $this->form_validation->set_rules('author_name','Author Name','required');
		$this->form_validation->set_rules('title','Author Title','required');
		$this->form_validation->set_rules('email','Author Email','required');
		$this->form_validation->set_rules('contact_num','Author Contact','required');

		if($this->form_validation->run() == FALSE){
			$data['author'] = $this->author_model->get_author_by_id($id);
			$this->load->view('templates/header');
			$this->load->view('admin/authors/edit_author', $data);
			$this->load->view('templates/footer');
		}else{
			if (!empty($_FILES['image']['name'])) {
				$config['upload_path'] = './assets/images/authors/';
				$config['allowed_types'] = 'jpeg|png|jpg'; 
				$config['max_size'] = 4096; 
				$config['file_name'] = uniqid(); 
	
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image')) {
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];	
				} else {
						$error = $this->upload->display_errors();
						echo $error;
				}
				$data = array(
					'author_name' => $this->input->post('author_name'),
					'title' => $this->input->post('title'),
					'email' => $this->input->post('email'),
					'contact_num' => $this->input->post('contact_num'),
					'images' => $file_name,
                    'status' => $this->input->post('status') ? 1 : 0
				);
			} else {
				$data = array(
					'author_name' => $this->input->post('author_name'),
				    'title' => $this->input->post('title'),
					'email' => $this->input->post('email'),
					'contact_num' => $this->input->post('contact_num'),
                    'status' => $this->input->post('status') ? 1 : 0
				);
			}

			$this->author_model->update_author($id, $data);
			redirect('admin/authors');
		}
	}

    
    // UPDATE
    public function update_profile($auid) {
        $data['author'] = $this->Author_model->get_author_by_id($auid);

        $authorData = [
            'author_name' => $this->input->post('author_name'),
            'title' => $this->input->post('author_title'),
            'email' => $this->input->post('email'),
            'contact_num' => $this->input->post('contact_num'),
            'images' => $data['author']['images'],
            'status' => $this->input->post('status') ? 1 : 0
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle file upload
            if (!empty($_FILES['images']['name'])) {
                $config['upload_path'] = './assets/images/authors/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '2048';
                $config['file_name'] = uniqid(); // Use a unique file name

                $this->upload->initialize($config);

                if ($this->upload->do_upload('images')) {
                    // Get file data
                    $fileData = $this->upload->data();
                    $filename = $fileData['file_name'];

                    // Remove the existing file if new file is uploaded
                    if (file_exists('./assets/images/users/' . $data['author']['images']) && $data['author']['images'] != 'noimages.jpg') {
                        unlink('./assets/images/users/' . $data['author']['images']);
                    }

                    // Update the author data with the filename
                    $authorData['images'] = $filename;
                } else {
                    // If there was an error during file upload, set a flash error message
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('authors/edit/' . $auid);
                    return;
                }
            }

            // Update author data in the database
            $authorUpdateResult = $this->Author_model->update_author($auid, $authorData);

            // Handle success and failure cases
            if ($authorUpdateResult) {
                $this->session->set_flashdata('success', 'author profile updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update author profile.');
            }

            // Redirect to a relevant page
            redirect('authors');
        }


        $this->load->view('template/admin/header');
        $this->load->view('admin/authors/edit', $data);
        $this->load->view('template/admin/footer');
    }

    // ADD
    public function add() {
        if ($this->input->post()) {
            $author_name = $this->input->post('author_name');
            $title = $this->input->post('author_title');
            $email = $this->input->post('email');
            $contact_num = $this->input->post('contact_num');
            $status = $this->input->post('status') ? 1 : 0;

            if (!empty($_FILES['images']['name'])) {
                // Handle file upload for profile picture
                $config['upload_path'] = './assets/images/authors/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 4096; // 2MB max size
                $config['file_name'] = uniqid(); // Set unique filename

                $this->upload->initialize($config);

                if ($this->upload->do_upload('images')) {
                    $fileData = $this->upload->data();
                    $images = $fileData['file_name']; // Store the unique filename
                } else {
                    // If file upload fails, set a default profile picture or handle the error accordingly
                    $images = 'noimages.jpg'; // Set default profile picture
                }
            } else {
                // If no profile picture is uploaded, set a default profile picture
                $images = 'noimages.jpg'; // Set default profile picture
            }

            $data = array(
                'author_name' => $author_name,
                'title' => $title,
                'email' => $email,
                'contact_num' => $contact_num,
                'images' => $images,
                'status' => $status
            );

            $inserted = $this->Author_model->insert_author($data);

            if ($inserted) {
                // Redirect to authors page upon success
                $this->session->set_flashdata('success', 'Author added successfully.');
                redirect('authors');
            } else {
                // Return error response
                $this->session->set_flashdata('error', 'Failed to add Author.');
                redirect('authors/add');
            }
        }

        $this->load->view('template/admin/header');
        $this->load->view('admin/authors/add');
        $this->load->view('template/admin/footer');
    }

    // DELETE
    public function delete($auid) {
        $this->author_model->delete_author($auid);
        redirect('authors');
    }
}
