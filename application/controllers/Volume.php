<?php

class Volume extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Volumes_model'); 
        $this->load->model('Article_model');
        $this->load->helper('text');
        $data['volumes'] = $this->Volumes_model->get_volumes();
    }

    public function index($id = NULL) {
        if (! file_exists(APPPATH.'views/volume/index.php')) {
            show_404();
        } else if ($id == NULL) {
            $data['title'] = "Volumes"; 
            
        } else {
                
       

            $data['title'] = "Volumes"; 
            $data['volume'] = $this->Volumes_model->get_published_volumes($id);
            $data['volumes'] = $this->Volumes_model->get_published_volumes();
            $data['articles'] = $this->Article_model->get_art_by_vol_id($id);

        }

        $data['title'] = "Volumes"; 
        
        
        $this->load->view('templates/header', $data);
        $this->load->view('volume/index', $data); 
        $this->load->view('templates/footer', $data);
    }

   

}







?>