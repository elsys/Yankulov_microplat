<?php 
class Setup extends MY_Controller{
    function Setup()
    {
        parent::MY_Controller();
    }

    function view_setup()
    {        
        $this->load->model('Model_user');        
        $userid = $this->userid;
        $data['setup'] = $this->Model_user->get_setup($userid);
        $this->load->view('view_head');
        $this->load->view('view_main');
        $this->load->view('view_sidebar');
        $this->load->view('view_setup', $data);
        $this->load->view('view_footer');        
        if(!$this->logged) redirect("action/view_actions");
    }

    /**
     * The function validate () validate the input data from setup page and pass
     * it to the model Model_setup.
     */

    function validate()
    {
        $this->load->library ('form_validation');
         $this->load->model('Model_setup');

        $this->form_validation->set_rules('city', 'City', 'trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('country', 'Country', 'trim|required|min_length[3]|xss_clean');
        $this->form_validation->set_rules('birth_date', 'BirthDate', 'trim|required|min_length[3]|xss_clean');
        $username = $this->username;
        if($this->form_validation->run() == FALSE)
        {
            redirect('setup/view_setup');            
        }else
        {
            $userid = $this->userid;
            $city = $this->input->post('city');
            
            $country = $this->input->post('country');
            $birth_date = $this->input->post('birth_date');

            $this->Model_setup->setup_data ($userid, $city, $country, $birth_date);
            redirect("u/$username");
        }
    }

    function new_pass()
    {
        
        $userid = $this->userid;
       $this->load->library ('form_validation');
         $this->load->model('Model_setup');
        
        $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric|min_length[5]|xss_clean');
	$this->form_validation->set_rules('password_conf', 'Password Confirm', 'trim|required|alpha_numeric|min_length[5]|matches[password]|xss_clean');

        if($this->form_validation->run() == FALSE)
        {
            redirect('setup/view_setup');
	}else
        {
            
            $password   = $this->input->post('password');
            
            $userid=$this->Model_setup->setup_new_pass($password);
            
            redirect("u/$username");
	}
    }

    function new_mail(){
        $username = $this->username;
        $this->load->library ('form_validation');
        $this->load->model('Model_setup');

        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[5]|xss_clean|valid_email');

        if($this->form_validation->run() == FALSE)
        {
            redirect('setup/view_setup');
	}else
        {

            $email      = $this->input->post('email');

            $userid=$this->Model_setup->setup_new_email($email);

            redirect("u/$username");
	}
    }
}

/* End of file setup.php */
/* Location: ./application/controllers/setup.php */