<?php
class U extends MY_Controller{
    function U()
    {
	parent::MY_Controller();
        $this->load->model('Model_message');
        $this->load->model('Model_setup');
        $this->load->model('Model_gallery');
        $this->load->helper( 'gravatar' );        
        $this->load->library('pagination');
        $this->load->library('table');
    }

    function index($username)
    {
       $data ['username'] = $username;       
        $data['user_info'] = $this->Model_setup->get_user_info($username);

        if(!$this->Model_setup->user_exists($username)){           
        

            redirect("action/view_actions");
        
        }

        $email = $this->Model_setup->get_user_mail($username);
        $data['email']= get_gravatar($email);

         
        $this->load->view('view_head');
        $this->load->view('view_main');

        $data['images'] = $this->Model_gallery->get_images($username);
                
        $this->load->view('view_sidebar_user', $data);

        $page=intval($this->uri->segment(3));

        $config['base_url']     = base_url().'u/'.$username;
        $config['total_rows']   =  $this->Model_message->get_user_posts_count($username);
        $config['per_page']     = 10;
        $config['num_links']    = 5;
        $config['full_tag_open']= '<div id="pagination">';
        $config['full_tag_close']= '</div>';
        $config['uri_segment']  = 3;

        $this->pagination->initialize($config);

        $data['messages'] = $this->Model_message->get_user_posts($username,$page,10);
        $data['user_posts_count'] = $this->Model_message->get_user_posts_count($username);

        $this->load->view('view_messages', $data);

        $this->load->view('view_footer');
    }
}

/* End of file u.php */
/* Location: application/controllers/u.php */