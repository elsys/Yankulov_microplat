
<div id="sidebar">
                <h2><a href="#"><?= $username ?></a></h2>                
                <a><img src="<?= $email?>" alt="" width="150" height="150"/></a>

                <h3>Снимки:</h3>
                <div id="friends-sidebar">.                  
                    <?php foreach($images as $image):?>                    
                        <a href="<?php echo $this->Model_gallery->getimagepath($image->image); ?>" rel="images_group"><img src="<?php echo $this->Model_gallery->getimagepath($image->image,'thumbs'); ?>" /></a>
                    <?php endforeach; ?>
                </div>
                
                <h3>Инфо:</h3>
                <div class="user-info">
                    <ul>
                        <li><b>Град:</b><?= htmlspecialchars ($user_info->city);?></li><br />
                        <li><b>Държава:</b><?= htmlspecialchars ($user_info->country); ?></li><br />
                        <li><b>Дата на раждане:</b><?= htmlspecialchars ($user_info->birth_date); ?></li><br />
                    </ul>
                </div>
        </div><!--- End of sidebar --->