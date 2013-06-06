<?php
class Atmessage extends MY_Controller{
    
    function Atmessage()
    {
        parent::MY_Controller();
        $this->load->model('Model_setup');
        $this->load->model('Model_message');
        if(!$this->logged) redirect("action/view_actions");
    }

    function index()
    {
        
   
        $this->load->view('view_head');
        $this->load->view('view_main');
               
        $user = $this->username;
                
        $data['messages'] = $this->Model_message->get_atmessage($user);
                                
        $this->load->view('view_atmessage', $data);
        $this->load->view('view_footer');        
    }
}

/* End of file atmessage.php */
/* Location: ./application/controllers/atmessage.php */