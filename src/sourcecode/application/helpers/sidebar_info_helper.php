<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function sidebar_info($username) {

    $data ['username'] = $username;
    $data['user_info'] = $this->Model_setup->get_user_info($username);

    $email = $this->Model_setup->get_user_mail($username);
    $data['email']= get_gravatar($email);

    $data['images'] = $this->Model_gallery->get_images($username);
    return $data;

}
?>
