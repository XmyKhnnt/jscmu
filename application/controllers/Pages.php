<?php
class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model'); // Load the User_model\
        $this->load->helper('text');
    }
    public function view($page = 'home') {
        // Check if the view file exists
        if (! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
           
            show_404();
        } 


        if ($page == 'home') {
            $this->load->model('Article_model');
            $this->load->model('Volumes_model'); 

            $query = $this->input->get('q');
            if (!$query){
                $query = null;
            }

            $data['title'] = "Home"; 
            $data['articles'] = $this->Article_model->get_pub_articles(null, $query);
        
            $data['volumes'] = $this->Volumes_model->get_published_volumes(); 

        } else {
            $data['title'] = ucfirst($page); 
        }

        
        $data['title'] = ucfirst($page); 
        $data['users'] = $this->User_model->get_users();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);

    }


    public function download($filename)
{
    $this->load->helper('download');
    $filePath =  './application/uploads/' . $filename;

   
    return force_download($filePath, NULL);
  
}

}

