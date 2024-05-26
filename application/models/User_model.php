<?php

class User_model extends CI_Model {

    public function get_users($id = FALSE, $searchTerm = FALSE) {
        // Base query
        $this->db->select('*');
        $this->db->from('ppw_user');
    
        // If $id is provided, fetch user by id
        if ($id !== FALSE) {
            $this->db->where('userid', $id);
            $query = $this->db->get();
            return $query->row_array();
        }
    
        // If $searchTerm is provided, add search conditions
        if ($searchTerm !== FALSE) {
            $this->db->like('complete_name', $searchTerm);
            $this->db->or_like('email', $searchTerm);
            // Add more fields to search as needed
        }
    
        // Execute the query
        $query = $this->db->get();
        
        // Check if query was successful
        if ($query) {
            // Return the result as an array of rows
            return $query->result_array();
        } else {
            // If query failed, return false or handle the error as needed
            return false;
        }
    }    

    public function create_user($data) {
        $this->db->insert('ppw_user', $data);
    }

    public function delete_user($id) {
        $this->db->delete('ppw_user', array('userid' => $id));
    }

    public function update_user($id, $data) {
        $this->db->where('userid', $id);
        $this->db->update('ppw_user', $data);
    }

}

?>
