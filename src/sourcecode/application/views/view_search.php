<div>
<?php $this->load->helper('form'); ?>
<?php echo form_open($this->uri->uri_string); ?>
<?php echo form_label('Търси потребител:', 'search-box'); ?>
<?php echo form_input(array('name' => 'q', 'id' => 'search-box', 'value' => $search_terms)); ?>
<?php echo form_submit('search', 'Търси'); ?>
<?php echo form_close(); ?>

<?php if ( ! is_null($results)): ?>
    <?php if (count($results)): ?>
        <ul>
        <?php foreach ($results as $result): ?>
            <li><a href="u/<?php echo $result->username; ?>"><?php echo $result->username; ?></a></li>
        <?php endforeach ?>
        </ul>
    <?php else: ?>
        <p><em>Няма такъв потребител. </em></p>
    <?php endif ?>
<?php endif ?>
</div>