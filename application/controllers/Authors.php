<?php
class Authors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Authors_model'); 
    }

    public function index() {

        if (! file_exists(APPPATH.'views/article/authors.php')) {
            
            show_404();
        } 
       
        $query = $this->input->get('q');
        if (!$query){
            $query = false;
        }
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
           
            $title = $this->input->post('title');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $contact_num = $this->input->post('cnumber');

            $data = array(
                    'title' => $title,
                    'name' => $name,
                    'email' => $email,
                    'contact_num' => $contact_num
                );
           
            $authors_id = $this->Authors_model->create_author($data);

        }

    

       
        $data['title'] = "Articles"; 
        $data['articles'] = $this->Authors_model->get_authors(false ,$query);
        
        $this->load->view('templates/admin_header', $data);
        $this->load->view('article/authors.php', $data); 
        $this->load->view('templates/admin_footer', $data);
    }

    public function delete($ID){

        $this->Authors_model->delete_author($ID);
        redirect('articles');
        
    }

    public function update($ID){

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'title' => $this->input->post('title'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'contact_num' => $this->input->post('cnumber')
            );
            $this->Authors_model->update_author($ID, $data);
            redirect('authors');
        }
    }


}

?>