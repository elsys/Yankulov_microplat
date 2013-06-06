<?php
class Model_message extends Model{
    function Model_message()
    {
        parent::Model();
    }
    
    /**
    * The function add() gets the data from function add() (message controller)
    * and write it in the table messages.
    */
    function add($data)
    {
        $this->db->query("INSERT INTO messages VALUES(NULL,?,?,now())",
        array($this->userid,$this->input->post("message")));
    }

    /**
    * The function get() gets last ten posts from all messages in the table messages.
    */
    function get()
    {        
        $query = $this->db->query("SELECT messages.message, messages.userid, register.username 
        FROM (messages left outer join register on register.userid = messages.userid) ORDER BY messages.id DESC LIMIT 10");
//FROM (messages left outer join register on register.userid = messages.userid) ORDER BY messages.id DESC LIMIT ?,?",array($limit, $offset));
      
        return $query->result();
    }
        
    function get_userid($username)
    {
        $query = $this->db->query("SELECT userid FROM register WHERE username = '".$username."'");
        if($query->row()) return $query->row()->userid;
    }

    function delete($id)
    {
        $this->db->query("DELETE FROM messages WHERE id=? AND userid=?",
                array($id,$this->userid));
    }

    /**
     * $username - the name of the user profile (htpp://site.com/u/username);
     * The function get_user_posts search only for posts created by user with
     * userid = $username.
     */
    function get_user_posts($username,$from,$to)
    {
       $userid = $this->get_userid($username);
       $query=$this->db->query("select * from messages where userid = '".$userid."' order by data desc LIMIT $from,$to");
       return $query->result();
    }


    /**
     * $user - the username of logged in user;
     * The function get_atmessage search for messages with username of
     * logged in user.
     */
    /*function get_atmessage($user)
    {
        $query = $this->db->query("SELECT * FROM messages WHERE message LIKE '%@$user%' ");
        return $query->result();
    }*/

    function get_atmessage($user)
    {
        $query = $this->db->query("SELECT messages.message, messages.userid, register.username
        FROM (messages left outer join register on register.userid = messages.userid) WHERE messages.message LIKE '%@".$user."%' ORDER BY messages.id DESC LIMIT 10");
        
        return $query;
    }

    function get_user_posts_count($username)
    {
        $userid = $this->get_userid($username);
        $query=$this->db->query("select count(*) AS cnt from messages where userid = '".$userid."' order by data desc");
     
        return $query->row()->cnt;
    }

    function get_latest()
    {
        $this->db->orderby('id', 'DESC');
        $this->db->limit(1, 0);
        return $this->db->get('messages')->result();
    }   
}

/* End of file model_message.php */
/* Location: ./application/modells/model_message.php */