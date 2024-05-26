<?php

class Article_model extends CI_Model {

    public function get_all_data($id = null) {

        $sql = "
        SELECT
            ppw_article.article_id,
            ppw_article.title,
            ppw_article.abstract,
            ppw_article.keywords,
            ppw_article.doi,
            ppw_volume.vol_name,
            GROUP_CONCAT(DISTINCT ppw_author.name SEPARATOR ', ') AS authors
        FROM
            ppw_article
        LEFT JOIN
            ppw_article_author
        ON 
            ppw_article.article_id = ppw_article_author.article_id
        LEFT JOIN
            ppw_author
        ON 
            ppw_article_author.auid = ppw_author.auid
        INNER JOIN
            ppw_volume
        ON 
            ppw_article.volumeid = ppw_volume.volumeid ";
    
            // Append the condition only if $id is provided
            if ($id != null) {
                $sql .= " WHERE ppw_article.article_id = $id";
            } else {
                $sql .= " WHERE ppw_volume.published = 1";
            }
            
            $sql .= " GROUP BY
                    ppw_article.article_id, ppw_article.title, ppw_article.abstract, ppw_volume.vol_name";
            
                
      

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

        public function create_article($data) {
            // Prepare the SQL statement
            $sql = "INSERT INTO ppw_article (title, doi, keywords, abstract, volumeid, filename) VALUES (?, ?, ?, ?, ?, ?)";
           
        
            // Execute the query with the data array, which automatically binds the parameters
            $this->db->query($sql, array($data['title'], $data['doi'], $data['keywords'], $data['abstract'], $data['volumeid'],  $data['filename']));
        
            // Check if the insertion was successful
            if ($this->db->affected_rows() > 0) {
                return $this->db->insert_id(); // Return the ID of the inserted record
            } else {
                return array(); // Insert failed
            }
        }
        

    public function get_art_by_id($volid) {
        $sql = "SELECT
        ppw_article.*, 
        ppw_volume.*, 
        ppw_author.`name`
    FROM
        ppw_article
        INNER JOIN
        ppw_article_author
        ON 
            ppw_article.article_id = ppw_article_author.article_id
        INNER JOIN
        ppw_author
        ON 
            ppw_article_author.auid = ppw_author.auid
        INNER JOIN
        ppw_volume
        ON 
            ppw_article.volumeid = ppw_volume.volumeid";
        
        if ($volid != null) {
            $sql .= " WHERE ppw_article.volumeid = $volid";
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

    public function get_pub_art_by_id($volid){
        $sql = "SELECT
        ppw_article.*, 
        ppw_volume.*, 
        ppw_author.`name`
    FROM
        ppw_article
        INNER JOIN
        ppw_article_author
        ON 
            ppw_article.article_id = ppw_article_author.article_id
        INNER JOIN
        ppw_author
        ON 
            ppw_article_author.auid = ppw_author.auid
        INNER JOIN
        ppw_volume
        ON 
            ppw_article.volumeid = ppw_volume.volumeid WHERE ppw_volume.published = 1 ";
        
        if ($volid != null) {
            $sql .= " AND ppw_article.volumeid = $volid";
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
    
    public function get_none_pub($id = null){
                // Base SQL query
                $sql = "SELECT
                ppw_article.article_id,
                ppw_article.title,
                ppw_article.abstract,
                ppw_article.keywords,
                ppw_article.doi,
                ppw_article.volumeid,

                ppw_volume.vol_name,
                GROUP_CONCAT(DISTINCT ppw_author.name SEPARATOR ', ') AS authors
                FROM
                ppw_article
                LEFT JOIN
                ppw_article_author
                ON 
                ppw_article.article_id = ppw_article_author.article_id
                LEFT JOIN
                ppw_author
                ON 
                ppw_article_author.auid = ppw_author.auid
                INNER JOIN
                ppw_volume
                ON 
                ppw_article.volumeid = ppw_volume.volumeid
               ";

                // If $id is provided, add condition to fetch a specific article
                if ($id != null) {
                $sql .= " WHERE ppw_article.article_id = $id";
                }

                // Group by article_id and title to ensure unique articles
                $sql .= " GROUP BY ppw_article.article_id, ppw_article.title";

                // Execute the query
                $query = $this->db->query($sql);

                // Check if query was successful
                if ($query) {
                // Return the result as an array of rows
                return $query->result_array();
                } else {
                // If query failed, return an empty array
                return array();
                }
                }

    public function get_art_by_vol_id($id = null) {
        $sql = "SELECT
                    ppw_article.article_id,
                    ppw_article.title,
                    ppw_article.abstract,
                    ppw_article.keywords,
                    ppw_article.doi,
                    ppw_article.volumeid,

                    ppw_volume.vol_name,
                    GROUP_CONCAT(DISTINCT ppw_author.name SEPARATOR ', ') AS authors
                FROM
                    ppw_article
                LEFT JOIN
                    ppw_article_author
                ON 
                    ppw_article.article_id = ppw_article_author.article_id
                LEFT JOIN
                    ppw_author
                ON 
                    ppw_article_author.auid = ppw_author.auid
                INNER JOIN
                    ppw_volume
                ON 
                    ppw_article.volumeid = ppw_volume.volumeid
                WHERE 
                    ppw_volume.published = 1";
    
        // If $id is provided, add condition to fetch a specific article
        if ($id != null) {
            $sql .= " AND ppw_volume.volumeid = $id";
        }
    
        // Group by article_id and title to ensure unique articles
        $sql .= " GROUP BY ppw_article.article_id, ppw_article.title";
        // Execute the query
        $query = $this->db->query($sql);
    
        // Check if query was successful
        if ($query) {
            // Return the result as an array of rows
            return $query->result_array();
        } else {
            // If query failed, return an empty array
            return array();
        }
        
        }

    public function get_articles($id = null) {
        // Base SQL query
        $sql = "SELECT
                    ppw_article.article_id,
                    ppw_article.title,
                    ppw_article.abstract,
                    ppw_article.keywords,
                    ppw_article.doi,
                    ppw_article.volumeid,

                    ppw_volume.vol_name,
                    GROUP_CONCAT(DISTINCT ppw_author.name SEPARATOR ', ') AS authors
                FROM
                    ppw_article
                LEFT JOIN
                    ppw_article_author
                ON 
                    ppw_article.article_id = ppw_article_author.article_id
                LEFT JOIN
                    ppw_author
                ON 
                    ppw_article_author.auid = ppw_author.auid
                INNER JOIN
                    ppw_volume
                ON 
                    ppw_article.volumeid = ppw_volume.volumeid
                WHERE 
                    ppw_volume.published = 1";
    
        // If $id is provided, add condition to fetch a specific article
        if ($id != null) {
            $sql .= " AND ppw_article.article_id = $id";
        }
    
        // Group by article_id and title to ensure unique articles
        $sql .= " GROUP BY ppw_article.article_id, ppw_article.title";
    
        // Execute the query
        $query = $this->db->query($sql);
    
        // Check if query was successful
        if ($query) {
            // Return the result as an array of rows
            return $query->result_array();
        } else {
            // If query failed, return an empty array
            return array();
        }
    }
    public function get_pub_articles($id = null, $searchTerm = null) {
        // Base SQL query
        $sql = "
        SELECT
            ppw_article.article_id,
            ppw_article.title,
            ppw_article.abstract,
            ppw_article.keywords,
            ppw_article.filename,
            ppw_article.doi,
            ppw_volume.vol_name,
            GROUP_CONCAT(DISTINCT ppw_author.name SEPARATOR ', ') AS authors
        FROM
            ppw_article
        LEFT JOIN
            ppw_article_author
        ON 
            ppw_article.article_id = ppw_article_author.article_id
        LEFT JOIN
            ppw_author
        ON 
            ppw_article_author.auid = ppw_author.auid
        INNER JOIN
            ppw_volume
        ON 
            ppw_article.volumeid = ppw_volume.volumeid";
        
        // Initialize parameters array
        $params = array();
        
        // Append conditions based on provided parameters
        if ($id != null) {
            $sql .= " WHERE ppw_article.article_id = ?";
            $params[] = $id;
        } else {
            $sql .= " WHERE ppw_volume.published = 1";
        }
        
        // If search term provided, add search conditions
        if ($searchTerm != null) {
            $searchCondition = " (ppw_article.title LIKE ? OR ppw_author.name LIKE ?)";
            $params[] = "%" . $searchTerm . "%";
            $params[] = "%" . $searchTerm . "%";
            
            if ($id != null) {
                $sql .= " AND" . $searchCondition;
            } else {
                $sql .= " AND" . $searchCondition; // Ensuring the AND is properly appended
            }
        }
        
        $sql .= " GROUP BY ppw_article.article_id, ppw_article.title, ppw_article.abstract, ppw_volume.vol_name";
        
        // Execute the query with parameters
        $query = $this->db->query($sql, $params);
        
        // Check if query was successful
        if ($query) {
            // Return the result as an array of rows
            return $query->result_array();
        } else {
            // If query failed, return an empty array
            return array();
        }
    }
    


    public function delete_article($ID){

        $sql = "DELETE FROM ppw_article WHERE article_id = ?";
        $this->db->query($sql, array($ID));
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return array();
        }

    }

    public function update_article($id, $data){
        
        if ($data['filename']){
            $sql = "UPDATE ppw_article SET title = ?, doi = ?, keywords = ?, abstract = ?, volumeid = ?, filename = ? WHERE article_id = ?";
            $this->db->query($sql, array($data['title'], $data['doi'], $data['keywords'], $data['abstract'], $data['volumeid'], $data['filename'], $id));
        } 
        $sql = "UPDATE ppw_article SET title = ?, doi = ?, keywords = ?, abstract = ?, volumeid = ? WHERE article_id = ?";
        $this->db->query($sql, array($data['title'], $data['doi'], $data['keywords'], $data['abstract'], $data['volumeid'], $id));

       
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return array();
        }

    }


}

?>
