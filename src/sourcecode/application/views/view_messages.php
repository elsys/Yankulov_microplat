<?php if($user_posts_count == 0 ){?>
    <div class="a1">
        <div class="post-2">
            <h1>Сподели какво правиш. <a href="<?= base_url(); ?>action/view_actions">Go! Go!</a></h1>
        </div>
    </div>
<?php } else {?>
<div id="actions">
    <?php foreach ($messages as $message): ?>
    <div class="a1">
        <div class="post-1">
            <div class="user-says">
                <h4><a href="<?= base_url().'u/'.$username ?>"><?php echo $username ?></a> каза:</h4>
                <a><img src="<?= $email?>" alt="" /></a>
            </div>
            
            <ul style="list-style: none;">                 
                <li><?= htmlspecialchars ($message->message); ?></li>
                <? if($username==$this->username):?>
                <a href="message/delete/<?=$message->id;?>">Изтрии</a>
                <? endif;?>
            </ul>
        </div>
    </div>
    <?php endforeach; ?>
     <div id="pag">
    <?php echo $this->pagination->create_links(); ?>
 </div>
</div>
<?php } ?>
