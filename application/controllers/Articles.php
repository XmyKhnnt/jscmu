<?php
class Articles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Article_model'); 
        $this->load->model('Volumes_model'); 
        $this->load->model('Authors_model'); 
        $this->load->model('Article_author_model'); 
    }

    public function index() {
        // Load the File Upload Library
        $this->load->library('upload');
        $config['upload_path'] = './application/uploads';  // Specifies the directory where uploaded files will be saved
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Set validation rules for the file upload
           
            $config['allowed_types'] = 'pdf|doc|docx';  // Specifies the allowed file types
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload('file')) { 
                // File upload successful
                $upload_data = $this->upload->data();  // Retrieve upload data
                $file_name = $upload_data['file_name'];  // Extract the uploaded file name
                
                // Continue with saving the article data to the database, including the file name if needed
                $title = $this->input->post('title');
                $doi = $this->input->post('doi');
                $keywords = $this->input->post('keywords');
                $abstract = $this->input->post('abstract');
                $volume = $this->input->post('volume');
                $author = $this->input->post('authorsss');
                $authorList = explode(',', $author);
                $authorList = array_map('trim', $authorList);
                $data = array(
                    'title' => $title,
                    'doi' => $doi,
                    'author' => $author,
                    'keywords' => $keywords,
                    'abstract' => $abstract,
                    'volumeid' => $volume,
                    'filename' => $file_name,  // Include the file name in the article data
                );
                

                

                // Save article data to the database
                $article_id = $this->Article_model->create_article($data);

                foreach ($authorList as $author_id) {
                    $author_data = array(
                        'article_id' => $article_id,
                        'auid' => $author_id
                    );
                
                    $this->Article_author_model->create($author_data);
                }
             
            
    
                // Optionally, display a success message or redirect to another page
            } else {
                // File upload failed, handle the error (e.g., display error messages)
                $error = array('error' => $this->upload->display_errors());
                print_r($error); // Example: Display the error messages
            }
        }
        
        
        $query = $this->input->get('q');
        if (!$query){
            $query = null;
        }

        // Load other necessary data for the view
        $data['title'] = "Articles"; 
        $data['articles'] = $this->Article_model->get_pub_articles(null, $query);
        $data['volumes'] = $this->Volumes_model->get_volumes();
        $data['authors'] = $this->Authors_model->get_authors();
        
        // Load views
        $this->load->view('templates/admin_header', $data);
        $this->load->view('article/index', $data); 
        $this->load->view('templates/admin_footer', $data);
    }
    


    public function public_articles() {
        if (! file_exists(APPPATH.'views/article/public_articles.php')) {
            
            show_404();
        } 

        $data['title'] = "Articles"; 
        $data['articles'] = $this->Article_model->get_articles();
        
        $this->load->view('templates/header', $data);
        $this->load->view('article/public_articles', $data); 
        $this->load->view('templates/footer', $data);
    }

    public function view($id = NULL) {

        $this->load->model('Article_model'); 
        $data['title'] = "Article";
        $data['article'] = $this->Article_model->get_all_data($id); 
        $data['article'] = $data['article'][0]; 
        


        $this->load->view('templates/header', $data);
        $this->load->view('article/details', $data);
        $this->load->view('templates/footer', $data);

    }
    
  
  

    public function volumes($id = NULL) {

        $this->load->model('Volumes_model'); 
        $data['title'] = "Volumes";
        $query = $this->input->get('q');
        if (!$query){
            $query = false;
        }
        
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
        
            $title = $this->input->post('name');
            $description = $this->input->post('description');
            $published = $this->input->post('pub');
            $archive = $this->input->post('arc');
            
            
            $data_form = array(
                    'vol_name' => $title,
                    'description' => $description,
                    'published' => $published,
                    'archive' => $archive
                );
                
            $this->Volumes_model->create_volume($data_form);

    

        }
        $data['volumes'] = $this->Volumes_model->get_volumes(null, $query);  
        $this->load->view('templates/admin_header', $data);
        $this->load->view('article/volumes', $data);
        $this->load->view('templates/admin_footer', $data);

    }


    public function delete($ID){

        $this->Article_model->delete_article($ID);
        redirect('articles');
    }


    public function update($id) {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Update the article data
            $title = $this->input->post('title');
            $doi = $this->input->post('doi');
            $keywords = $this->input->post('keywords');
            $abstract = $this->input->post('abstract');
            $volume = $this->input->post('volume');
            $author = $this->input->post('authorsss');
            $authorList = explode(',', $author);
            $authorList = array_map('trim', $authorList);
    
            $data = array(
                'title' => $title,
                'doi' => $doi,
                'keywords' => $keywords,
                'abstract' => $abstract,
                'volumeid' => $volume,
                // Initialize the filename with an empty string, will update if a file is uploaded
                'filename' => ''
            );
    
            // Check if a new file is uploaded
            if (isset($_FILES['file']) && $_FILES['file']['name'] != '') {
                // Load the File Upload Library
                $this->load->library('upload');
                $config['upload_path'] = './application/uploads';  // Specifies the directory where uploaded files will be saved
                $config['allowed_types'] = 'pdf|doc|docx';  // Specifies the allowed file types
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('file')) {
                    // File upload successful
                    $upload_data = $this->upload->data();  // Retrieve upload data
                    $file_name = $upload_data['file_name'];  // Extract the uploaded file name
                    $data['filename'] = $file_name;  // Include the file name in the article data
                } else {
                    // Handle the upload error if needed
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error); // Example: Display the error messages
                }
            }
    
            // Update the article in the database
            $this->Article_model->update_article($id, $data);
            
            if ( $author != null) {
                // Delete all existing authors associated with the article
                $this->Article_author_model->delete_by_article_id($id);
    
                // Insert the new authors
                foreach ($authorList as $author_id) {
                    $author_data = array(
                        'article_id' => $id,
                        'auid' => $author_id
                    );
                    $this->Article_author_model->create($author_data);
                }
            }
    
            // Optionally, display a success message or redirect to another page
            redirect('articles');
        }
    }

    public function add_art(){


    $data['title'] = "Articles"; 
    $data['articles'] = $this->Article_model->get_articles();
    $data['volumes'] = $this->Volumes_model->get_volumes();
    $data['authors'] = $this->Authors_model->get_authors();
    
    // Load views
    $this->load->view('templates/admin_header', $data);
    $this->load->view('article/add_art', $data); 
    $this->load->view('templates/admin_footer', $data);


    }

    

    public function edit_art($id) {
        $data['title'] = "Articles"; 
        $data['articles'] = $this->Article_model->get_none_pub($id);
        $data['volumes'] = $this->Volumes_model->get_volumes();
        $data['aut'] = $this->Authors_model->get_authors();  // Correct assignment
        $data['art_authors'] = $this->Article_author_model->get($id);
        
        // Load views
        $this->load->view('templates/admin_header', $data);
        $this->load->view('article/edit_art', $data); 
        $this->load->view('templates/admin_footer', $data);
    }
    
public function art_details($id){
    $data['title'] = "Articles"; 
    $data['articles'] = $this->Article_model->get_none_pub($id);
    $data['volumes'] = $this->Volumes_model->get_volumes();
    $data['aut'] = $this->Authors_model->get_authors();  // Correct assignment
    $data['art_authors'] = $this->Article_author_model->get($id);
    
    // Load views
    $this->load->view('templates/admin_header', $data);
    $this->load->view('article/art_auth_d', $data); 
    $this->load->view('templates/admin_footer', $data);
}


}

?>