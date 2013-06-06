<?php
class Gallery extends MY_Controller{

    function Gallery()
    {
        parent::MY_Controller();
        $this->load->model('Model_gallery');
    }

    var $gallery_path;
    var $gallery_path_url;
    
    function view_gallery()
    {
        $this->gallery_path = realpath(APPPATH . '../images');
        $this->gallery_path_url = base_url().'images/';
        
        $this->load->view('view_head');
        $this->load->view('view_main');
        $this->load->view('view_sidebar');
        $this->load->view('view_footer');
    }

    function upload_photos()
    {
        $userid = $this->userid;
        
        if ($this->input->post('upload'))
        {
            $config['allowed_types']= 'jpg|jpeg|gif|png';
            $config['upload_path']  = $this->gallery_path;
            $config['max_size']     = 2000;

            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
                $image_data = $this->upload->data();

                $config['source_image']     = $image_data['full_path'];
                $config['new_image']        = $this->gallery_path . '/thumbs';
                $config['maintain_ration']  = TRUE;
                $config['width']            = 50;
                $config['height']           = 50;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $file   = $this->upload->data();
                $image  = $file['file_name'];
                $this->Model_gallery->do_upload($userid, $image);
            }
        }
        redirect('setup/view_setup');
    }
}

/* End of file gallery.php */
/* Location: ./application/controllers/gallery.php */