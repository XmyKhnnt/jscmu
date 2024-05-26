<?php


class Comments_model extends CI_Model {

    public function get_comments($id = FALSE) {

        $sql = "SELECT
                    ppw_comment.comments, 
                    ppw_article_submission.title, 
                    ppw_user.complete_name, 
                    ppw_comment.comment_id
                FROM
                    ppw_article_assigned
                    INNER JOIN
                    ppw_comment
                    ON 
                        ppw_article_assigned.assigned_id = ppw_comment.assigned_id
                    INNER JOIN
                    ppw_article_submission
                    ON 
                        ppw_article_assigned.submission_id = ppw_article_submission.submission_id
                    INNER JOIN
                    ppw_user
                    ON 
                        ppw_article_assigned.userid = ppw_user.userid
                WHERE
                    ppw_article_assigned.assigned_id = " . $id  .  ";";

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