<?php 
class Action extends MY_Controller{
    
    function Action()
    {
        parent::MY_Controller();
        $this->load->model('Model_setup');
        $this->load->model('Model_message');
        $this->load->helper( 'gravatar' );
    }

    function view_actions()
    {
        $data['messages'] = $this->Model_message->get();
                
        $this->load->view('view_head',$data);
        $this->load->view('view_main');        
        $this->load->view('view_posting');
        $this->load->view('view_footer');
    }
}

/* End of file action.php */
/* Location: ./application/controllers/action.php */