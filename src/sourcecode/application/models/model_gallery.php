<?php
class Model_gallery extends Model {

    var $gallery_path;
    var $gallery_path_url;

    function Model_gallery()
    {
        parent::Model();

        $this->gallery_path = realpath(APPPATH . '../images');
        $this->gallery_path_url = base_url().'images/';
        $this->load->model('Model_message');
    }

    /**
    * $userid - the user id of logged in user;
    * $image - the name of the image;
    * The function do_upload inserts the name of the image and user id in the
    * table images.
    */
    function do_upload($userid, $image)
    {
        $query = "INSERT INTO images (userid, image) VALUES (?, ?)";
        $this->db->query($query, array($userid, $image));
    }

    /**
    * $username - the name of the user profile (htpp://site.com/u/username)
    *
    * The function get_images search for images uploaded by user with user = $username
    */
    function get_images($username)
    {
        $userid = $this->Model_message->get_userid($username);

        $query = $this->db->query("SELECT image FROM images WHERE userid=?", array($userid));
        return $query->result();
    }

    function getimagepath($image, $sub = '')
    {
        if(empty($sub))
        {
            return base_url().'images/'.$image;
        }else
        {
            return base_url().'images/'.$sub.'/'.$image;
        }
    }
}

/* End of file model_gallery.php */
/* Location: ./application/modells/model_gallery.php */