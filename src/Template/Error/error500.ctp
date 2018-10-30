<?php
$this->layout = 'error';

$this->start('title');
echo __('An internal error has occurred');
$this->end();
?>

<h1 class="text-center"><?php echo __('An internal error has occurred'); ?></h1>