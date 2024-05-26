<?php

class Volumes_model extends CI_Model {

    public function get_volumes($id = null, $searchTerm = null) {

        // Base SQL query
            $sql = "SELECT * FROM ppw_volume";
            $params = [];

            // Add conditions based on provided parameters
            if ($id !== null) {
                $sql .= " WHERE volumeid = ?";
                $params[] = $id;
            }

            if ($searchTerm) {
                if ($id !== null) {
                    $sql .= " AND name LIKE ?";
                } else {
                    $sql .= " WHERE vol_name LIKE ?";
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
                    return array();
                }
    }

    public function get_published_volumes($id = null){
        $sql = "SELECT
        ppw_volume.*
            FROM
                ppw_volume WHERE ppw_volume.published = 1";

            if ($id != null) {
            $sql .= " AND ppw_volume.volumeid = $id";
            }
                // Execute the query
                $query = $this->db->query($sql);

                // Check if query was successful
                if ($query) {
                    // Return the result as an array of rows
                    return $query->result_array();
                } else {
                    // If query failed, return false or handle the error as needed
                    return array();
                }
    }

    public function create_volume($data) {
        // Prepare the SQL statement
        $sql = "INSERT INTO ppw_volume (vol_name, description, archive, published) VALUES (?, ?, ?, ?)";
    
        // Execute the query with the data array, which automatically binds the parameters
        $this->db->query($sql, array(
            $data['vol_name'],
            $data['description'],
            $data['archive'],
            $data['published']
        ));
    
        // Check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id(); // Return the ID of the inserted record
        } else {
            return FALSE; // Insert failed
        }
    }

    
    public function get_volume($id){
        $sql = "SELECT * FROM ppw_volume WHERE volumeid = ?";
        $query = $this->db->query($sql, array($id));
        if ($query) {
            return $query->row_array();
        } else {
            return array();
        }
    }

    public function delete_volume($id) {
        // Prepare the SQL statement
        $sql = "DELETE FROM ppw_volume WHERE volumeid = ?";
    
        // Execute the query with the ID as a parameter
        $this->db->query($sql, array($id));
    
        // Check if the deletion was successful
        if ($this->db->affected_rows() > 0) {
            return TRUE; // Deletion successful
        } else {
            return FALSE; // Deletion failed
        }
    }

    public function update_volume($id, $data) {
        // Prepare the SQL statement
        $sql = "UPDATE ppw_volume SET vol_name = ?, description = ?, published = ?,  date_at = ?   WHERE volumeid = ?";
    
        // Execute the query with the data array and ID as parameters
        $date_at = "";    
        if ( $data['published'] == 1 || $data['published'] == "1") {
           $date_at = date('Y-m-d H:i:s');
        }
        $this->db->query($sql, array(
            $data['vol_name'],
            $data['description'],
            $data['published'],
            $date_at,
            $id
        ));
    
        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return TRUE; // Update successful
        } else {
            return FALSE; // Update failed
        }
    }

}

?>
