<?php
class Model_search extends Model
{
    function Model_search()
    {
        parent::Model();
        $this->load->database();
    }

    function search($terms)
    {
        $terms=$this->db->escape_like_str($terms);
        $sql = "SELECT username from register WHERE username LIKE '%$terms%'";
        $query = $this->db->query($sql);
        return $query->result();
    }
}

/* End of file model_search.php */
/* Location: ./application/modells/model_search.php */