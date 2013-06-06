<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Пилешко</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    
    <script>
    !window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
    </script>
    <script language="javascript" 	src="<?php echo base_url() ?>js/jquery.js"></script>
    <script type='text/javascript'	src='<?php echo base_url(); ?>js/jquery.limit-1.2.js'></script>
    <script type='text/javascript'	src='<?php echo base_url(); ?>js/pop-up.js'></script>
    <script type="text/javascript" 	src="<?php echo base_url(); ?>css/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" 	src="<?php echo base_url(); ?>css/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

    <script language="javascript">
        jQuery(document).ready(function() {
            jQuery('#submit').click(function() {

                var msg = jQuery('#message').val();

                jQuery.post("<?php echo site_url('message/add') ?>", {message: msg}, function(data) {
                  
                    $('#content').html(data);
                    
                    jQuery('#message').val('');
                });
            });

            $("a[rel=images_group]").fancybox({
                'transitionIn'		: 'none',
                'transitionOut'		: 'none',
                'titlePosition' 	: 'over',
                'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
                    return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
                }
            });
        });
    </script>
	
     <base href="<?php echo base_url();?>"></base>

</head>
<body>

<div id="wrapper">
    <div id="header">
        <div class="menu-header">
            <ul>
                <li><a href="#contacts" name="modal">Контакти</a></li>
                <?php if($this->logged != TRUE ){?>
                <li><a href="#register" name="modal">Регистрация</a></li>
                <li><a href="#login" name="modal">Вход</a></li>
                <?php } else{ ?>
                <li><a href="<?php echo base_url();?>user/logout" style="color: #da1636;">Изход</a></li>
                <?php } ?>
            </ul>
        </div>
        <a href="<?php echo base_url();?>"><img src="css/img/logo.png" alt="" /></a>
    </div>
    

<div id="boxes">

    <div id="register" class="window">
        <?php
            echo form_open('user/register');

            $username = array(
                'name'	=> 'username',
                'id'	=> 'username',
                'value' => set_value('username')
            );

            $password = array(
                'name'	=>  'password',
                'id'	=>  'password',
                'value' =>  ''
            );

            $password_conf = array(
                'name'	=>  'password_conf',
                'id'	=>  'password_conf',
                'value' =>  ''
            );

            $email = array(
                'name'	=>  'email',
                'id'	=>  'email',
                'value' =>  set_value('email')
            );
        ?>

            <ul>
                <li>
                    <label>Потребителско име</label>
                    <div>
                        <?php echo form_input($username); ?>
                    </div>
                </li>
                <li>
                    <label>Парола</label>
                    <div>
                        <?php echo form_password($password); ?>
                    </div>
                </li>
                <li>
                    <label>Потвърди паролата</label>
                    <div>
                        <?php echo form_password($password_conf); ?>
                    </div>
                </li>
                <li>
                    <label>e-mail</label>
                    <div>
                        <?php echo form_input($email); ?>
                    </div>
                </li>

                <li>
                <?php echo validation_errors(); ?>
                </li>
                <li>
                    <div>
                        <?php echo form_submit(array('name' => 'register'), 'Register') ?>
                    </div>
                </li>
          </ul>

        <?php
            echo form_close();
        ?>
        <a href="#" class="close" style="float: right;">Затвори</a>
    </div>

    <div id="login" class="window">
        <h1>LOGIN</h1>
        <?php
            echo form_open('user/login');
            echo form_input('username', 'Username');
            echo form_password('password', 'Password');
            echo form_submit('submit', 'Влез');
        ?>

        <?php
            echo form_close();
        ?>
        <a href="#"class="close" style="float: right;">Затвори</a>
    </div>

    <div id="mask"></div>
</div>