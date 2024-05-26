<?php

class Article_author_model extends CI_Model {

    public function create($data) {
        $sql = "INSERT INTO ppw_article_author (article_id, auid) VALUES (?, ?)";
        
        // Execute the query with the data array
        $this->db->query($sql, array($data['article_id'], $data['auid']));
        
        // Check if the insertion was successful
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id(); // Return the ID of the inserted record, if you have an auto-increment ID
        } else {
            return FALSE; // Insert failed
        }
    }

    public function update($data){

        $sql  = "UPDATE ppw_article_author  auid ";

    }

    public function get($id){


        $sql = "SELECT
                ppw_author.`name`, 
                ppw_author.auid, 
                ppw_article_author.article_id
            FROM
                ppw_author
                INNER JOIN
                ppw_article_author
                ON 
                    ppw_author.auid = ppw_article_author.auid WHERE ppw_article_author.article_id= " . $id;

       
            $query = $this->db->query($sql);
        if ($this->db->affected_rows() > 0) {
                   return $query->result_array(); // Return the ID of the inserted record, if you have an auto-increment ID
                } else {
                    return array(); // Insert failed
                }



    }
    public function delete_by_article_id($article_id) {
        $sql = "DELETE FROM ppw_article_author WHERE article_id = ?";
        $this->db->query($sql, array($article_id));
        
        if ($this->db->affected_rows() > 0) {
            return TRUE; // Deletion successful
        } else {
            return FALSE; // Deletion failed
        }
    }

}



?>