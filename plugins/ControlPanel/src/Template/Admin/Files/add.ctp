<?php
$this->assign('title', __('Add File(s)'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __('File Storage')],
    ['title' => __('Add File(s)')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['files'][0] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->css(
    ['formplugins/dropzone/dropzone'],
    ['block' => true]
);
echo $this->Html->script(
    ['formplugins/dropzone/dropzone'],
    ['block' => true]
);
?>

<?= $this->Form->create($file, ['type' => 'file', 'class' => 'dropzone needsclick']) ?>
<div class="dz-message needsclick">
    <i class="fal fa-cloud-upload text-muted mb-3"></i> <br>
    <span class="text-uppercase"><?= __('Drop files here or click to upload') ?></span>
</div>
<?= $this->Form->end() ?>