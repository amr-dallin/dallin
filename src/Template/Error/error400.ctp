<?php
$this->layout = 'error';

$this->start('title');
echo __('Page not found');
$this->end();
?>

<h1 class="text-center"><?php echo __('Page not found'); ?></h1>
<p class="text-center">
    <?php echo __('The link you clicked may be damaged or the page deleted.'); ?><br/>
    <?php echo __('Go {0} or visit {1}.', [$this->Html->link(__('back'), 'javascript:history.back()'), $this->Html->link(__('home page'), ['controller' => 'pages', 'action' => 'display'])]); ?>
</p>
