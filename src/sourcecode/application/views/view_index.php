<div id="main-index">
    <div id="video">
        <h1>Какво е Пилешко?</h1>
        <object width="410" height="248" style="padding: 0px 0 0 10px;">
            <param name="movie" value="http://www.youtube.com/v/rIpD7hfffQo?fs=1&amp;hl=en_US"></param>
            <param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param>
            <embed src="http://www.youtube.com/v/rIpD7hfffQo?fs=1&amp;hl=en_US" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="410" height="248"></embed>
        </object>

    </div>
    <div id="regbox">
        <?php
        echo form_open('user/register');

        $username = array(
            'name'  =>  'username',
            'id'    =>  'username',
            'value' =>  set_value('username')
        );

        $password = array(
            'name'  =>  'password',
            'id'    =>	'password',
            'value' =>  ''
        );

        $password_conf = array(
            'name'  =>  'password_conf',
            'id'    =>  'password_conf',
            'value' =>  ''
        );

        $email = array(
            'name'  =>  'email',
            'id'    =>	'email',
            'value' =>  set_value('email')
        );
        ?>
        
        <h1>Регистрация: </h1>        
        <ul>
            <li>
                <div class="regbox">
                    <label>Потребител:</label>
                    <?php echo form_input($username); ?>
                </div>
            </li>
            <li>
                <div class="regbox">
                    <label>Парола:</label>
                    <?php echo form_password($password); ?>
                </div>
            </li>
            <li>
                <div class="regbox">
                    <label>Парола2:</label>
                    <?php echo form_password($password_conf); ?>
                </div>
            </li>
            <li>
                <div class="regbox">
                    <label>e-mail:</label>
                    <?php echo form_input($email); ?>
                </div>
            </li>
            <li>
                <?php echo form_submit(array('name' => 'register'), 'Register') ?>
            </li>
        </ul>
        <?php
        echo form_close();
        ?>
    </div> <!-- end of register out view -->
    
    <div id="whod">
        <h1>Вход:</h1>
        <?php echo form_open('user/login'); ?>
        <ul>
            <li>
                <div class="regbox">
                <label>Потребител:</label>
                <?php echo form_input('username', 'Username'); ?>
                </div>
            </li>
            <li>
                <div class="regbox">
                    <label>Парола:</label>
                    <?php	echo form_password('password', 'Password'); ?>
                </div>
            </li>
            <li>
                <?php echo form_submit('submit', 'Влез');	?>
            </li>
        </ul>
        <?php
        echo form_close();
        ?>
    </div> <!-- end of login out view -->
    
</div><!-- end of main --->