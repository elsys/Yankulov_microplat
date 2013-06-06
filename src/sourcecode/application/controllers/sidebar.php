<?php 
class Sidebar extends MY_Controller{
    function Sidebar()
    {
        parent::MY_Controller();
    }
    function view_sidebar()
    {
        
        $this->load->view('view_head');
        $this->load->view('view_main');
        $this->load->view('view_setup');
        $this->load->view('view_footer');
        if(1) redirect("action/view_actions");
    }
}

/* End of file sidebar.php */
/* Location: ./application/controllers/sidebar.php */