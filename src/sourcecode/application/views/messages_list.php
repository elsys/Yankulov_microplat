<div id="actions">
    <?php foreach ($messages as $message): ?>
    <div class="a1">
        <div class="post-1">
            <ul style="list-style: none;">
                <li><b><a href="<?=base_url()?>u/<?= $message->username;?>" title="Профила на <?php echo $message->username; ?>" style="text-decoration: none; color: #008923;">@<?php echo $message->username; ?></a> каза:</b> <?php echo htmlspecialchars($message->message); ?></li>
            </ul>
        </div>
    </div>
    <?php endforeach; ?>
</div>
