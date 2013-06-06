<div id="menu">
    <ul>
        <li>
            <?php if($this->logged != TRUE ){?>            
            <a class="hide" href="<?= base_url();?>" title="Начало">Начало</a>
            <?php }else { ?>
              <a class="hide" href="<?= base_url();?>/u/<?php echo $this->username ?>" title="Моят профил">Моят профил</a>
        <!--[if lte IE 6]>
        <a href="#">Моят профил
        <table><tr><td>
        <![endif]-->
            <ul>               
               <li><a class="hide" href="<?php echo base_url();?>setup/view_setup" title="Настройки">Настройки</a></li>
                
        </ul>
        <?php }?>
        <!--[if lte IE 6]>
        </td></tr></table>
        </a>
        <![endif]-->
         <?php if($this->logged != TRUE ){?>
            <li><a href="<?= base_url(); ?>action/view_actions">Последни</a></li>
            <li><a href="<?= base_url(); ?>action/view_actions">За Пилешко</a></li>
         <?php }else { ?>
            <li><a href="<?= base_url(); ?>action/view_actions">Последни</a></li>            
            <li><a href="<?= base_url(); ?>atmessage">@<?php echo $this->username ?></a></li>
            <li><a href="<?= base_url();?>search/view_search">Търси</a></li>
          <?php }?>
    </ul>    
</div>