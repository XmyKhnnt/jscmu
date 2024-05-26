<?php
class Assigned_article_submission_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load the database library if not already loaded
        $this->load->database();
    }

    public function get_assigned_submissions() {
        // SQL query
        $sql = "SELECT
                    ppw_user.complete_name, 
                    ppw_article_submission.submission_id,
                    ppw_article_submission.title
                FROM
                    ppw_article_submission
                INNER JOIN
                    ppw_article_assigned
                ON 
                    ppw_article_submission.submission_id = ppw_article_assigned.submission_id
                INNER JOIN
                    ppw_user
                ON 
                    ppw_article_assigned.userid = ppw_user.userid";

        // Execute the query
        $query = $this->db->query($sql);

        // Check if query was successful
        if ($query) {
            // Return the result as an array of rows
            return $query->result_array();
        } else {
            // If query failed, return false or handle the error as needed
            return false;
        }
    }
}
?>
