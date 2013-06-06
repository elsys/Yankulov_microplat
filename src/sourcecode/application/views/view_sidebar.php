
<div id="sidebar">
                <?php if($this->logged != TRUE ){?>
                    <h2><a href="<?= base_url();?>u/<?php echo $this->username ?>"><?php echo $this->username ?></a></h2>
                    <a><img src="<?= $email?>" alt="" width="150" height="150"/></a>
                <?php } ?>
        </div><!--- End of sidebar --->