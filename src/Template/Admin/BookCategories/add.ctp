<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $book
 */
$this->start('title');
echo __('Add Book Category');
$this->end();

$this->start('ribbon');
$breadcrumbs = [
    0 => [
        'title' => __('Book Categories'),
        'url' => ['controller' => 'book_categories', 'action' => 'index']
    ],
    1 => ['title' => __('Add Book Category')]
];
echo $this->element('ribbon', array('breadcrumbs' => $breadcrumbs));
$this->end();

$this->start('title-heading');
echo $this->element('title', array('title' => __('Add Book Category')));
$this->end();

$this->start('navigation');
$menu['books'] = [2 => [0 => true]];
echo $this->element('navigation', array('menu' => $menu));
$this->end();
?>

<section id="widget-grid">
    <div class="row">
        <article class="col-md-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false">
                <header></header>

                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body">
                        <?php
                        echo $this->Form->create($bookCategory, [
                            'autocomplete' => 'off',
                            'templates' => 'SmartAdmin.app_form'
                        ]);
                        ?>
                        <div clas="row">
                            <div class="col-md-12">
                                <?php
                                echo $this->Form->control('title', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control input-lg',
                                    'placeholder' => __('Title')
                                ]);
                                echo $this->Form->control('alias', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'placeholder' => __('Alias')
                                ]);
                                ?>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                echo $this->Form->submit(null, [
                                    'class' => 'btn btn-primary'
                                ]);
                                ?>
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