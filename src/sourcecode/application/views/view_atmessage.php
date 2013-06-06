<?php if($messages->num_rows() == 0 ){?>
    <div class="a1">
        <div class="post-2">
            <h1>Никой не ти е писал :/</h1>
        </div>
    </div>
<?php } else {?>
<div id="actions">
    <?php foreach ($messages->result() as $message): ?>
    <div class="a1">
        <div class="post-1">
            <!--<div class="user-says">
                <h4><a href="<?= base_url().'u/'.$username ?>"><?php echo $username ?></a> каза:</h4>                
            </div>-->
            <ul style="list-style: none;">
                <li><b><a href="<?=base_url()?>u/<?= $message->username;?>" title="Профила на <?php echo $message->username; ?>" style="text-decoration: none; color: #008923;">@<?php echo $message->username; ?></a> каза:</b> <?php echo htmlspecialchars($message->message); ?></li>
            </ul>          
           
            
        </div>
    </div>
    <?php endforeach; ?>  
</div>
<?php } ?>