<?php
class MY_Controller extends Controller
{
    var $username;
	var $userid;
	var $logged;
    //
    function MY_Controller()
    {
		parent::Controller();

		$this->username =$this->session->userdata("username");
		$this->userid   =$this->session->userdata("userid");
		$this->logged   =$this->session->userdata("user_logged");
    }
}
?>
