<?php 
class Model_user extends Model{

    function Model_user()
    {
        parent::Model();
    }

    /**
    * The function add() gets the username, password and email from function
    * register() (message controller) and write them in the table register.    *
    */
    function register_user ($username, $password, $email)
    {
        $md5_password = md5($password);
        $query_str = "INSERT INTO register (username, password, email) VALUES (?, ?, ?)";
        $this->db->query($query_str, array($username, $md5_password, $email));
        
        return $this->db->insert_id();
    }

    function check_exists_username($username)
    {
        $query_str = "SELECT username FROM register WHERE username = ?";
        $result = $this->db->query($query_str, $username);

        if($result->num_rows() > 0)
        {
            return TRUE;
        }else
        {
            return FALSE;
        }
    }

    function get_setup($userid)
    {
        return $this->db->query("SELECT * FROM setup WHERE u_id = '".$userid."'")->row();
    }
}


/* End of file model_user.php */
/* Location: ./application/modells/model_user.php */