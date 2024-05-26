<?php

class Authors_model extends CI_Model {

    public function get_authors($id = FALSE, $searchTerm = FALSE) {

      // Base SQL query
    $sql = "SELECT * FROM ppw_author";

    // Add conditions based on provided parameters
    $params = [];
            if ($id !== false) {
                $sql .= " WHERE id = ?";
                $params[] = $id;
            }

            if ($searchTerm) {
                if ($id !== false) {
                    $sql .= " AND name LIKE ?";
                } else {
                    $sql .= " WHERE name LIKE ?";
                }
                $params[] = "%" . $searchTerm . "%";
            }

            // Execute the query with parameters
            $query = $this->db->query($sql, $params);

            // Check if query was successful
            if ($query) {
                // Return the result as an array of rows
                return $query->result_array();
            } else {
                // If query failed, return false or handle the error as needed
                return false;
            }
    }

    public function create_author($data) {
        // Prepare the SQL statement
        $sql = "INSERT INTO ppw_author (name, title, email, contact_num) VALUES (?, ?, ?, ?)";
    
        // Execute the query with the data array, which automatically binds the parameters
        $this->db->query($sql, array(
            $data['name'],
            $data['title'],
            $data['email'],
            $data['contact_num']
        ));
    
        // Check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id(); // Return the ID of the inserted record
        } else {
            return FALSE; // Insert failed
        }
    }

    public function delete_author($id){

        $sql = "DELETE FROM ppw_author WHERE auid = ?";

        $this->db->query($sql, array($id));

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }

    }
    
    public function update_author($id, $data) {
        $sql = "UPDATE ppw_author SET title = ?, name = ?, email = ?, contact_num = ? WHERE auid = ?";
        $this->db->query($sql, array(
            $data['title'],
            $data['name'],
            $data['email'],
            $data['contact_num'],
            $id
        ));
    
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
 
}

?>


