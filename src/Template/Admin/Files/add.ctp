<?php
$this->start('title');
echo __('Add Files');
$this->end();

$this->start('ribbon');
$breadcrumbs = [
    [
        'title' => __('Gallery'),
        'url' => ['controller' => 'Files', 'action' => 'index']
    ],
    ['title' => __('Add Files')]
];
echo $this->element('ribbon', array('breadcrumbs' => $breadcrumbs));
$this->end();

$this->start('navigation');
$menu['gallery'] = true;
echo $this->element('navigation', array('menu' => $menu));
$this->end();
?>

<div class="row hidden-mobile">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <h1 class="page-title txt-color-blueDark"><?php echo __('Add Files'); ?></h1>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-align-right">
        <div class="page-title">
            <?php
            echo $this->Html->link(__('Library'),
                ['controller' => 'Files', 'action' => 'index'],
                ['class' => 'btn btn-default']
            );
            ?>
        </div>
    </div>
</div>

<div class="files form large-9 medium-8 columns content">
    <?php echo $this->Form->create($file, ['type' => 'file']); ?>
    <fieldset>
        <legend><?= __('Add File') ?></legend>
        <?php
        echo $this->Form->control('file.file', [
            'label' => ['class' => 'sr-only'],
            'type' => 'file',
            'class' => 'form-control',
            'placeholder' => __('Cover')
        ]);
        ?>
    </fieldset>
    <?php echo $this->Form->button(__('Submit')); ?>
    <?php echo $this->Form->end(); ?>
</div>