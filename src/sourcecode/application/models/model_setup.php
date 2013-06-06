<?php 
class Model_setup extends Model{

    function Model_setup()
    {
        parent::Model();
    }

    /**
    * The function setup_data() gets the user id, city, country and birth data
    * from function validate() (setup controller) and write it in the table
    * setup.
    */
    function setup_data ($userid, $city, $country, $birth_date)
    {

        $check_if_exist = $this->db->query("select count(*) as c from setup where u_id = '".$userid."'")->row()->c;

        if($check_if_exist == 0)
        {
            $query_str = ("INSERT INTO setup (u_id, city, country, birth_date) VALUES (?, ?, ?, ?)");
            $this->db->query($query_str, array($userid, $city, $country, $birth_date));            
          
        }else
        {
          
         // $this->db->query("update setup set city = '".$city."', country = '".$country."', birth_date = '".$birth_date."' where u_id = '".$userid."'");
         $query_str = "update setup set city = ?, country = ?, birth_date = ? where u_id = ?";
          $this->db->query($query_str, array( $city, $country, $birth_date, $userid));
        }

        $lastid = $this->db->query("select id from setup where u_id = '".$userid."' order by id desc limit 0,1")->row()->id;

        return $lastid;
    }

    function setup_new_pass($password)
    {
        
        $md5_password = md5($password);
        $query_str = "update register set password = ? WHERE userid = ?";
        $this->db->query($query_str, array($md5_password, $this->userid));
    }

    function setup_new_email($email)
    {

        $query_str = "update register set email = ? WHERE userid = ?";
        $this->db->query($query_str, array($email, $this->userid));
    }

    function get_userid($username)
    {
       $query = $this->db->query("SELECT userid FROM register WHERE username = '".$username."'");        
       if($query->row()) return $query->row()->userid;
    }

    function get_user_info($username)
    {
         $userid = $this->get_userid($username);
         $query = $this->db->query("select city, country, birth_date from setup where u_id = '".$userid."'");
         return $query->row();
    }

    function get_user_mail($username)
    {
        $userid = $this->get_userid($username);
        $get_mail = $this->db->query("select email from register where userid = '".$userid."'");
        return $get_mail->row()->email;
    }

    function user_exists($username)
    {
       $query = $this->db->query("SELECT count(*) AS cnt FROM register WHERE username = '".$username."'");
       return $query->row()->cnt;
    }
}

/* End of file model_setup.php */
/* Location: ./application/modells/model_setup.php */