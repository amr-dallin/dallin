<?php
$this->assign('title', __('Create New Setting'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __('Create New')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['setting_add'] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();
?>

<?= $this->Form->create($setting) ?>
<div class="row">
    <div class="col-md-6">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                        echo $this->Form->controls(
                            [
                                'field_key'  => [
                                    'placeholder' => __('Key')
                                ],
                                'field_type'  => [
                                    'type' => 'select',
                                    'options' => [
                                        'text' => __('Text'),
                                        'checkbox' => __('Checkbox'),
                                        'textarea' => __('Textarea')
                                    ]
                                ],
                                'title'  => [
                                    'placeholder' => __('Title')
                                ],
                                'value'  => [
                                    'placeholder' => __('Value')
                                ]
                            ],
                            ['fieldset' => false, 'legend' => false]
                        );
                    ?>

                    <div class="text-right"><?= $this->Form->submit() ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>