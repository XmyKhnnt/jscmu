<?php
class Volume_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Volumes_model'); 
        $data['title'] = "Volumes";
        $this->load->helper('text');
    }
 
    public function update($ID){

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'vol_name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'published' => $this->input->post('pub-Q111')
            );

           
            $this->Volumes_model->update_volume($ID, $data);
            redirect('volumes');
        

    }
    }


   public function delete($ID){

    

        $this->Volumes_model->delete_volume($ID);
        redirect('volumes');
    
    

    
   }

   public function view_volume($ID){
    $this->load->model('Volumes_model'); 
    $this->load->model('Authors_model'); 
    $this->load->model('Article_model'); 
    $data['volume'] = $this->Volumes_model->get_volume($ID);
    $data['articles'] = $this->Article_model->get_art_by_vol_id($ID);



    // Load views
    $this->load->view('templates/admin_header', $data);
    $this->load->view('article/volume_details', $data); 
    $this->load->view('templates/admin_footer', $data);


}


}