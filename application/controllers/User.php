<?php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model'); // Load the User_model
    }
    
    public function view($page = 'index') {
       
        if (file_exists(APPPATH.'views/user/'.$page.'.php')) {

            $query = $this->input->get('q');
            if (!$query){
                $query = false;
            }


            $data['title'] = ucfirst($page); 
            $data['users'] = $this->User_model->get_users(false, $query);
            $this->load->view('templates/admin_header', $data);
            $this->load->view('user/'.$page, $data); 
            $this->load->view('templates/admin_footer', $data);

        } else {
           
            show_404();
        }
    }

    public function create() {

        if ($this->input->server('REQUEST_METHOD') === 'POST') { 

            $data = array(
                'complete_name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $this->User_model->create_user($data);
            
        }

        
        redirect('user');
    }

    public function delete($id){

        $this->User_model->delete_user($id);
        redirect('user');

    }

    public function update($id){

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'complete_name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            $this->User_model->update_user($id, $data);
            redirect('user');
        }

    }


}


