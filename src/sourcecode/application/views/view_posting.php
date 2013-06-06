<?php if($this->logged != TRUE ){?>
<div id="content">
<?php $this->load->view('messages_list') ?>
</div>
<?php } else {?>
<div id="form">
	<div id="publish">
        <form action="" method="post">
            <textarea id="message" class="publishbox" name="message"></textarea>					
            <input type="image" id="submit" name="submit" class="publishbox_submit" value="" />
        </form>			
        <div id="chars">You have <span  id="charsLeft"></span> chars left.</div>
	</div> <!--- edn publish --->
</div>
<div id="content">
<?php $this->load->view('messages_list') ?>
</div>
<?php } ?>