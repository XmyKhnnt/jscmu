<?php

class Article_submission_model extends CI_Model {

    public function get_submissions($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('ppw_article_submission');
            return $query->result_array();
        }

        $query = $this->db->get_where('article', array('article_id' => $id));
        return $query->row_array(); 
    }
}

?>
