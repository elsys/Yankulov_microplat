<div id="content">
	<div id="info" >                
        <?php
            //$phone = htmlspecialchars($phone);
            echo form_open('setup/validate');
            
            
            $city = array(
                'name'	=> 'city',
                'id'	=> 'city',
                'value' => ''
            );

            $country = array(
                'name'	=>  'country',
                'id'	=>  'country',
                'value' => ''
            );

            $birth_date = array(
                'name'	=>  'birth_date',
                'id'	=>  'birth_date',
                'value' =>  ''
            );
        ?>
        <ul>
            <li>
                <label>Град:</label>
                <?php echo form_input($city); ?> <br />
            </li>
            <li>
                <label>Държава:</label>
                <?php echo form_input($country); ?> <br />
            </li>
            <li>

                <label>Рожденна дата:</label>
                <?php echo form_input($birth_date); ?> <br />
            </li>
         </ul>
        <div>
        <div><input type="submit" value="Запиши" /></div>
        </div>
        <?php 
        	echo form_close();
        ?>       

	<div id="gallery">
            			<div id="blank_gallery">Качи снимки*:</div>
        <div id="upload">
			<?php
            echo form_open_multipart('gallery/upload_photos');
            echo form_upload('userfile');
            echo form_submit('upload', 'Upload');
            echo form_close();
            ?>
            <p>*Проверете качените снимки в Моят профил -> Снимки</p>
	</div>		
	</div>
           <?php
        echo form_open('setup/new_pass');

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

        ?>
            <h2>Смяна на парола:</h2>
        <ul>
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
         </ul>
         <div>
        <div><input type="submit" value="Запиши" /></div>
        </div>
        <?php
        	echo form_close();
        ?>
           <?php
        echo form_open('setup/new_mail');

        $email = array(
            'name'  =>  'email',
            'id'    =>	'email',
            'value' =>  $setup->email
        );

        ?>
            <h2>Смяна на мейл:</h2>
        <ul>
            <li>
                <div class="regbox">
                    <label>Нов мейл:</label>
                    <?php echo form_input($email); ?>
                </div>
            </li>
         </ul>
         <div>
        <div><input type="submit" value="Запиши" /></div>
        </div>
        <?php
        	echo form_close();
        ?>
</div>