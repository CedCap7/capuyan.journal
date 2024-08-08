<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->load->model('User_model');
        $this->load->library('upload');
    }

	public function search() {
        $keyword = $this->input->get('complete_name');
        $data['users'] = $this->user_model->search_users($keyword);

        $this->load->view('admin/users/search_results', $data);
    }
	
    // List users
    public function index() {
        // Get users from the model
		$data['users'] = $this->User_model->get_users_with_authors();
		$data['users'] = $this->User_model->get_users();

        // Sort users by their complete names alphabetically (A-Z)
        usort($data['users'], function($a, $b) {
            return strcmp($a['complete_name'], $b['complete_name']);
        });

        // Set the title
        $data['title'] = 'User Management';

        // Load views
        $this->load->view('template/admin/header');
        $this->load->view('admin/users/index', $data);
        $this->load->view('template/admin/footer');
    }

    // View user details
    public function view_details($userid) {
        // Get user data by user$userid
        $data['user'] = $this->User_model->get_user_by_id($userid);
        if (!$data['user']) {
            show_404(); // Return 404 error if the user is not found
        }
        
        // Set the title
        $data['title'] = 'User Profile';

        // Load views
        $this->load->view('template/admin/header');
        $this->load->view('admin/users/view_details', $data);
        $this->load->view('template/admin/footer');
    }

		// EDIT
		public function update_profile($userid) {
			// Retrieve user data using user ID
			$data['user'] = $this->User_model->get_user_by_id($userid);
	
			// Initialize user data array
			$userData = [
				'complete_name' => $this->input->post('complete_name'),
				'email' => $this->input->post('email'),
				'profile_pic' => $data['user']['profile_pic'], // Default to existing profile_pic
				'role' => $this->input->post('role'),
				'status' => $this->input->post('status') ? 1 : 0
			];
	
			// Handle form submission
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				// Handle file upload
				if (!empty($_FILES['profile_pic']['name'])) {
					$config['upload_path'] = './assets/images/users/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '2048';
					$config['file_name'] = uniqid(); // Use a unique file name
	
					$this->upload->initialize($config);
	
					if ($this->upload->do_upload('profile_pic')) {
						// Get file data
						$fileData = $this->upload->data();
						$filename = $fileData['file_name'];
	
						// Remove the existing file if new file is uploaded
						if (file_exists('./assets/images/users/' . $data['user']['profile_pic']) && $data['user']['profile_pic'] != 'noimages.jpg') {
							unlink('./assets/images/users/' . $data['user']['profile_pic']);
						}
	
						// Update the user data with the filename
						$userData['profile_pic'] = $filename;
					} else {
						// If there was an error during file upload, set a flash error message
						$this->session->set_flashdata('error', $this->upload->display_errors());
						redirect('users/edit/' . $userid);
						return;
					}
				}
	
				// Update user data in the database
				$userUpdateResult = $this->User_model->update_user($userid, $userData);
	
				// Handle success and failure cases
				if ($userUpdateResult) {
					$this->session->set_flashdata('success', 'User profile updated successfully.');
				} else {
					$this->session->set_flashdata('error', 'Failed to update user profile.');
				}
	
				// Redirect to a relevant page
				redirect('users');
			}
	
			// Load the view with user data
			$this->load->view('template/admin/header');
			$this->load->view('admin/users/edit', $data);
			$this->load->view('template/admin/footer');
		}
	
		public function add() {
			// Check if the form is submitted
			if ($this->input->post()) {
				// Retrieve form data
				$complete_name = $this->input->post('complete_name');
				$email = $this->input->post('email');
				$pword = $this->input->post('password');
				$role = $this->input->post('role');
				$status = $this->input->post('status') ? 1 : 0;
	
				// Check if a profile picture is uploaded
				if (!empty($_FILES['profile_pic']['name'])) {
					// Handle file upload for profile picture
					$config['upload_path'] = './assets/images/users/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = 2048; // 2MB max size
					$config['file_name'] = uniqid(); // Set unique filename
	
					$this->upload->initialize($config);
	
					if ($this->upload->do_upload('profile_pic')) {
						$fileData = $this->upload->data();
						$profile_pic = $fileData['file_name']; // Store the unique filename
					} else {
						// If file upload fails, set a default profile picture or handle the error accordingly
						$profile_pic = 'noimages.jpg'; // Set default profile picture
					}
				} else {
					// If no profile picture is uploaded, set a default profile picture
					$profile_pic = 'noimages.jpg'; // Set default profile picture
				}
	
				// Prepare data to be inserted into the database
				$data = [
					'complete_name' => $complete_name,
					'email' => $email,
					'pword' => $pword,
					'profile_pic' => $profile_pic, // Assign the unique filename here
					'role' => $role,
					'status' => $status // Set status to 1 (active) by default
				];
	
				// Insert the data into the database
				$inserted = $this->User_model->insert_user($data); // Assuming you have a model method for inserting user
	
				// Check if insertion was successful
				if ($inserted) {
					// Redirect to users page upon success
					$this->session->set_flashdata('success', 'User added successfully.');
					redirect('users');
				} else {
					// Return error response
					$this->session->set_flashdata('error', 'Failed to add user.');
					redirect('users/add');
				}
			}
	
			// Load the add users view
			$this->load->view('template/admin/header');
			$this->load->view('admin/users/add');
			$this->load->view('template/admin/footer');
		}
	
		
		
		public function delete($userid) {
			// Get the user ID from the POST data
			// $userid = $this->input->post('userid');
			
			$this->user_model->delete_user($userid);
			redirect('users');

			// // Check if the user ID is provided
			// if (!$userid) {
			// 	// Return an error response if the user ID is missing
			// 	$response = array('status' => 'error', 'message' => 'User ID not provided');
			// 	echo json_encode($response);
			// 	return;
			// }
	
			// // Call the delete_user method of the User_model
			// $deleteResult = $this->User_model->delete_user($userid);
	
			// // Check the result of the deletion operation
			// if ($deleteResult) {
			// 	// Return a success response if the deletion was successful
			// 	$response = array('status' => 'success', 'message' => 'User deleted successfully');
			// 	echo json_encode($response);
			// } else {
			// 	// Return an error response if the deletion failed
			// 	$response = array('status' => 'error', 'message' => 'User not found');
			// 	echo json_encode($response);
			// }
		}
			
		// Log in user
		public function login(){
			$data['title'] = 'Sign In';
		
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
		
			if($this->form_validation->run() === FALSE){
				$this->load->view('template/admin/header');
				$this->load->view('register/login', $data);
				$this->load->view('templates/admin/footer');
			} else {
				// Get email and encrypt the password
				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));
		
				// Login user
				$user = $this->user_model->login($email, $password);
		
				if($user){
					// Create session
					$user_data = array(
						'userid' => $user['userid'],
						'email' => $email,
						'complete_name' => $user['complete_name'],
						'logged_in' => true
					);
		
					$this->session->set_userdata($user_data);
		
					// Set message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');
		
					redirect('posts');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');
		
					redirect('register/login');
				}
			}
		}
	}
		


		// public function register(){
			//     $data['title'] = 'Sign Up';

			//     $this->form_validation->set_rules('name', 'Name', 'required');
			//     $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			//     $this->form_validation->set_rules('password', 'Password', 'required');

			//     if($this->form_validation->run() === FALSE){
				//         $this->load->view('templates/header');
				//         $this->load->view('register/registration', $data);
				//         $this->load->view('templates/footer');
				//     } else {
					//         // Encrypt password
					//         $enc_password = md5($this->input->post('password'));

					//         $this->user_model->register($enc_password);

					//         // Set message
					//         $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

					//         redirect('posts');
					//     }
					// }

					// // Log in user
					// public function login(){
						//     $data['title'] = 'Sign In';

						//     $this->form_validation->set_rules('email', 'email', 'required');
						//     $this->form_validation->set_rules('password', 'Password', 'required');

						//     if($this->form_validation->run() === FALSE){
							//         $this->load->view('templates/header');
							//         $this->load->view('users/login', $data);
							//         $this->load->view('templates/footer');
							//     } else {
								
								//         // Get username
								//         $username = $this->input->post('email');
								//         // Get and encrypt the password
								//         $password = md5($this->input->post('password'));

								//         // Login user
								//         $userid = $this->user_model->login($email, $password);

								//         if($userid){
									//             // Create session
									//             $user_data = array(
									//                 'user$userid' => $userid,
									//                 'username' => $email,
									//                 'logged_in' => true
									//             );

									//             $this->session->set_userdata($user_data);

									//             // Set message
									//             $this->session->set_flashdata('user_loggedin', 'You are now logged in');

									//             redirect('posts');
									//         } else {
										//             // Set message
										//             $this->session->set_flashdata('login_failed', 'Login is invalid');

										//             redirect('users/login');
										//         }		
										//     }
										// }

										// // Log user out
										// public function logout(){
											//     // Unset user data
											//     $this->session->unset_userdata('logged_in');
											//     $this->session->unset_userdata('userid');
											//     $this->session->unset_userdata('email');

											//     // Set message
											//     $this->session->set_flashdata('user_loggedout', 'You are now logged out');

											//     redirect('users/login');
											// }

											// // Check if username exists
											// public function check_email_exists($email){
												//     $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
												//     if($this->user_model->check_email_exists($email)){
													//         return true;
													//     } else {
														//         return false;
														//     }
														// }

														// // Check if email exists
														// public function check_email_exists($email){
															//     $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
															//     if($this->user_model->check_email_exists($email)){
																//         return true;
																//     } else {
																	//         return false;
																	//     }
																	// }
																// }





																// <?php
																	// defined('BASEPATH') OR exit('No direct script access allowed');

																	// class Users extends CI_Controller {

																		//     public function __construct() {
																			//         parent::__construct();
																			//         $this->load->model('User_model');
																			//     }

																			//     public function index() {
																				//         $data['users'] = $this->user_model->get_users();

																				//         $this->load->view('template/admin/header');
																				//         $this->load->view('users/index', $data);
																				//         $this->load->view('template/admin/footer');
																				
																				//     }

																				//     public function view($id) {
																					//         $data['user'] = $this->user_model->get_users($id);
																					//         $this->load->view('template/admin/header');
																					//         $this->load->view('users/index', $data);
																					//         $this->load->view('template/admin/footer');
																					//     }
																					// }

