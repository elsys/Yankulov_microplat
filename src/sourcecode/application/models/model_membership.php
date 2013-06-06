<?php 
class Model_membership extends Model{
    function Model_membership()
    {
        parent::Model();
    }

    function validate()
    {
        $query=$this->db->query("SELECT * FROM register WHERE username=? and password=?",
            array($this->input->post('username'),
            md5($this->input->post('password'))));
        return $query->row();
    }
}

/* End of file model_membership.php */
/* Location: ./application/modells/model_membership.php */

