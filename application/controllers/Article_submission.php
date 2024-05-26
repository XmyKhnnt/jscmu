<?php
class Article_submission extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
    }

    public function index() {

        if (! file_exists(APPPATH.'views/article/submission.php')) {
            
            show_404();
        } 
        $this->load->model('Article_submission_model'); 
        $data['title'] = "Submission"; 
        $data['articles'] = $this->Article_submission_model->get_submissions();
        
        $this->load->view('templates/header', $data);
        $this->load->view('article/submission', $data); 
        $this->load->view('templates/footer', $data);
    }

    public function assigned_article($id = NULL) {

        $this->load->model('Assigned_article_submission_model'); 
        $data['title'] = "Assigned Article";
        $data['articles'] = $this->Assigned_article_submission_model->get_assigned_submissions();  

        $this->load->view('templates/header', $data);
        $this->load->view('article/assigned_article', $data);
        $this->load->view('templates/footer', $data);

    }

    public function comments($id = NULL) { 

        $this->load->model('Comments_model'); 
        $data['title'] = "Comments";
        $data['comments'] = $this->Comments_model->get_comments($id);  

        $this->load->view('templates/header', $data);
        $this->load->view('article/comments', $data);
        $this->load->view('templates/footer', $data);

    }

}

?>