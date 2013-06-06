<?php
class User extends MY_Controller{

    function User()
    {
        parent::MY_Controller();
        
    }

    function index()
    {
        $this->load->model('Model_message');
        $data['messages'] = $this->Model_message->get();
        $this->load->view('view_head',$data);
        $this->load->view('view_main');
        $this->load->view('view_index');
        $this->load->view('view_footer');
        if($this->logged) redirect("action/view_actions");
    }

    /**
     * The function register () validate the input data from registration and pass
     * it to the model Model_user.
     */
    function register()
    {
        $this->load->model('Model_user');
	$this->load->library ('form_validation');

	$this->form_validation->set_rules('username', 'Username',  'trim|required|alpha_numeric|min_length[4]|xss_clean|callback_username_not_exist');

	$this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric|min_length[5]|xss_clean');

	$this->form_validation->set_rules('password_conf', 'Password Confirm', 'trim|required|alpha_numeric|min_length[5]|matches[password]|xss_clean');

	$this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[5]|xss_clean|valid_email');

	if($this->form_validation->run() == FALSE)
        {
            redirect('');
	}else
        {
            $username   = $this->input->post('username');
            $password   = $this->input->post('password');
            $email      = $this->input->post('email');

            $userid=$this->Model_user->register_user ($username, $password, $email);
            $this->session->set_userdata("userid",$userid);
            $this->session->set_userdata('username', $this->input->post('username'));
            $this->session->set_userdata("user_logged",TRUE);

            redirect("u/$username");
	}
    }

    function username_not_exist($username)
    {
        $this->form_validation->set_message('username_not_exist', 'Потребителското име е заето. Моля изберете друго.');
       
            if($this->Model_user->check_exists_username($username))
            {
                return false;
            }else
            {
                return true;
            }
    }

    /**
    * The function login () validate the input data from login form
    * and it create session and redirect to action/view_actions.
    */
    function login()
    {
        $this->load->library ('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run())        
        {
            $this->load->model('Model_membership');
            $user = $this->Model_membership->validate();
            if($user)
            {
                $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => true
                );

                $this->session->set_userdata('username', $this->input->post('username'));
                $this->session->set_userdata("user_logged",TRUE);
                $this->session->set_userdata("userid",$user->userid);

                redirect('action/view_actions');
            }else{
                redirect ('');
            }
        }
    }

    function logout()
    {        
        $this->session->sess_destroy();
        redirect('');
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */