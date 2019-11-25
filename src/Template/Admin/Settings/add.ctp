<?php
$title = __('Add Setting');

$this->assign('title', $title);

$this->start('ribbon');
$breadcrumbs = [['title' => $title]];
echo $this->element('ribbon', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('title-heading');
echo $this->element('title', ['title' => $title]);
$this->end();

$this->start('navigation');
$menu['settings'][0] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();
?>

<section id="widget-grid">
    <div class="row">
        <article class="col-md-6">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-1">
                <header></header>

                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body">
                        <?php
                        echo $this->Form->create($setting, [
                            'autocomplete' => 'off',
                            'templates' => 'SmartAdmin.app_form'
                        ]);
                        ?>
                        <fieldset>
                            <?php
                            echo $this->Form->control('field_key', [
                                'placeholder' => __('Key')
                            ]) . '<hr/>';
                            echo $this->Form->control('field_type', [
                                'class' => 'form-control',
                                'type' => 'select',
                                'options' => [
                                    'text' => 'Text', 
                                    'checkbox' => 'Checkbox', 
                                    'textarea' => 'Textarea'
                                ]
                            ]) . '<hr/>';
                            echo $this->Form->control('title', [
                                'placeholder' => __('Title')
                            ]);
                            echo $this->Form->control('value', [
                                'placeholder' => __('Value')
                            ]);
                            ?>
                        </fieldset>
                        
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $this->Form->submit(); ?>
                                </div>
                            </div>
                        </div>

                        <?php echo $this->Form->end(); ?>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
    </div>
</section>