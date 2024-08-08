<?php
    class Volumes extends CI_Controller{

        public function __construct() {
            parent::__construct();
            $this->load->model('Volume_model');
            $this->load->model('article_model'); // Load the article model as well

        }

        public function search() {
            $keyword = $this->input->get('vol_name');
            $data['volumes'] = $this->Article_model->search_volumes($keyword);
    
            $this->load->view('admin/volumes/search_results', $data);
        }


        public function index()
    {
        // Fetch volume data
        $data['volumes'] = $this->volume_model->get_all_volumes();

        // Load the view and pass the volume data
        $this->load->view('template/admin/header');
        $this->load->view('admin/volumes/index', $data);
        $this->load->view('template/admin/footer');
    }

    public function view($id)
    {
        // Fetch a single volume by ID
        $data['volumes'] = $this->volume_model->get_volume_by_id($id);

        // Check if volume exists
        if (empty($data['volume'])) {
            show_404();
        }

        // Load the view and pass the volume data
        $this->load->view('template/admin/header');
        $this->load->view('admin/volumes/view', $data);
        $this->load->view('template/admin/footer');
    }

    public function views($id)
    {
        // Fetch a single volume by ID
        $data['volumes'] = $this->volume_model->get_volume_by_id($id);

        // Check if volume exists
        if (empty($data['volume'])) {
            show_404();
        }

        // Load the view and pass the volume data
        $this->load->view('template/admin/header');
        $this->load->view('admin/volumes/view', $data);
        $this->load->view('template/admin/footer');
    }
    //     public function index()
    // {
    //     // Fetch volume data
    //     $data['volumes'] = $this->volume_model->get_all_volumes();

    //     // Load the view and pass the volume data
    //     $this->load->view('template/header'); // Adjust the template path as needed
    //     $this->load->view('volumes/index', $data);
    //     $this->load->view('template/footer'); // Adjust the template path as needed
    // }

        // public function index(){
        //     $data['title'] = 'Volume Lists';

        //     $data['volumes'] = $this->volume_model->get_all_volumes();
        //     // print_r($data['volumes']);

        //     usort($data['volumes'], function($a, $b) {
        //         return strcmp($a['vol_name'], $b['vol_name']);
        //     });

        //     $this->load->view('template/admin/header');
		// 	$this->load->view('admin/volumes/index', $data);
		// 	$this->load->view('template/admin/footer');
        // }

        public function update($volumeid) {
            // Retrieve volume data using volume ID
            $data['volumes'] = $this->volume_model->get_volume_by_id($volumeid);
            
            // Initialize volume data array
            $volumeData = array (
                'vol_name' => $this->input->post('vol_name'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status') ? 1 : 0
            );
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $UpdateResult = $this->volume_model->update_volume($volumeid, $volumeData);
        
                if ($UpdateResult) {
                    $this->session->set_flashdata('success', 'Volume updated successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Failed to update Volume.');
                };

                redirect('volumes');
            }

            // Load the view with volume data
            $this->load->view('template/admin/header');
            $this->load->view('admin/volumes/edit', $data);
            $this->load->view('template/admin/footer');
        }
        
        public function add() {
            if ($this->input->post()) {
                $volume_name = $this->input->post('vol_name');
                $description = $this->input->post('description');
                $status = $this->input->post('status') ? 1 : 0;
    
                $data = array(
                    'vol_name' => $volume_name,
                    'description' => $description,
                    'status' => $status
                );
                $inserted = $this->Volume_model->add_volume($data);
    
                if ($inserted) {
                    $this->session->set_flashdata('success_message', 'Volume added successfully');
                } else {
                    $this->session->set_flashdata('error_message', 'Failed to add Volume');
                }
                redirect('volumes'); 
                return;
            }
    
            // Load the add volume view
            $this->load->view('template/admin/header');
            $this->load->view('admin/volumes/add');
            $this->load->view('template/admin/footer');
        }
        public function delete($volumeid) {
       
            $this->Volume_model->delete_volume($volumeid);
            redirect('volumes');
        }

        public function set_status($volumeid)
    {
        // Update the volume's status to 2
        $volumeData = ['status' => 2];
        $volumeUpdateResult = $this->volume_model->update_volume($volumeid, $volumeData);

        // Update the articles' published field to 2 where volumeid matches
        $articleData = ['published' => 2];
        $articleUpdateResult = $this->article_model->update_articles_by_volume($volumeid, $articleData);

        // Handle success and failure cases
        if ($volumeUpdateResult && $articleUpdateResult) {
            $this->session->set_flashdata('success', 'Volume status and article published status updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update volume status or article published status.');
        }

        // Redirect to a relevant page
        redirect('volumes');
    }

    public function set_statuss($volumeid)
    {
        // Update the volume's status to 2
        $volumeData = ['status' => 0];
        $volumeUpdateResult = $this->volume_model->update_volume($volumeid, $volumeData);

        // Update the articles' published field to 2 where volumeid matches
        $articleData = ['published' => 0];
        $articleUpdateResult = $this->article_model->update_articles_by_volume($volumeid, $articleData);

        // Handle success and failure cases
        if ($volumeUpdateResult && $articleUpdateResult) {
            $this->session->set_flashdata('success', 'Volume status and article published status updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update volume status or article published status.');
        }

        // Redirect to a relevant page
        redirect('archives');
    }

    public function viewss($volumeid)
    {
        // Fetch volume details
        $data['volume'] = $this->volume_model->get_volume_by_id($volumeid);
    
        // Fetch articles for this volume
        $data['articles'] = $this->article_model->get_articles_by_volume($volumeid);
    
        // Fetch all volumes for sidebar
        $data['volumes'] = $this->volume_model->get_all_volumes();
    
        // Load the view and pass the data
        $this->load->view('template/header'); // Adjust the template path as needed
        $this->load->view('pages/volume', $data); // Load the view with articles
        $this->load->view('template/footer'); // Adjust the template path as needed
    }

    public function view_volume($volumeid) {

        // Get article data by article ID
        // $data['article'] = $this->Article_model->get_article_forda_id($id);
        // $data['article'] = $this->Article_model->get_article_id($id);
        $data['volume'] = $this->volume_model->get_volume_by_id($volumeid);

        // print_r($data['article']);

        // Load views
        $this->load->view('template/admin/header');
        $this->load->view('admin/volumes/view_volume', $data);
        $this->load->view('template/admin/footer');
    }
    
    }