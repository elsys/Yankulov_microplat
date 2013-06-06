<?php
class Message extends MY_Controller{

    function Message()
    {
        parent::MY_Controller();
        $this->load->model('Model_message');
    }

    function index()
    {
        redirect('message/view');
    }

    /**
    * $this->userid - the userid of the logged in user;
    *
    * The function add() takes the message, the userid and the date and send
    * this information to Model_message
    */
    function add()
    {
        if($_POST['message'] != NULL)
        {
            $message['message'] = $this->input->xss_clean($_POST['message']);
            $message['userid']	= $this->userid;
            $message['date']	= "now()";
            $this->Model_message->add($message);
           // $data['messages'] = $this->Model_message->get();
           //$data['userid'] = $this->Model_message->get();
            //$this->load->view('messages_list', $data);
           // redirect('action/view_actions');
        } else
        {
            redirect('message/view');
        }
    }

    function view()
    {
        //$type = NULL;
        $data['messages'] = $this->Model_message->get();
        //$data['userid'] = $this->Model_message->get();
        $this->load->view('messages_list', $data);
    }

    function delete($id){
            $this->Model_message->delete($id);
            redirect ('u/'.$this->username);
        
    }
}

/* End of file message.php */
/* Location: ./application/controllers/message.php */