<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $post
 */
$this->start('title');
echo __('Add Post');
$this->end();

$this->start('ribbon');
$breadcrumbs = [
    0 => [
        'title' => __('Posts'),
        'url' => ['controller' => 'posts', 'action' => 'index']
    ],
    1 => ['title' => __('Add Post')]
];
echo $this->element('ribbon', array('breadcrumbs' => $breadcrumbs));
$this->end();

$this->start('title-heading');
echo $this->element('title', array('title' => __('Add Post')));
$this->end();

$this->start('navigation');
$menu['posts'] = [0 => true];
echo $this->element('navigation', array('menu' => $menu));
$this->end();

$this->start('script');
echo $this->Html->script([
    'plugin/summernote/summernote.min',
    'plugin/select2/select2.min'
]);
$this->end();
?>

<?php $this->start('script1'); ?>
<script>
    $(document).ready(function() {
		$('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']]
            ]
		});
    });
</script>
<?php $this->end(); ?>

<section id="widget-grid">
    <div class="row">
        <article class="col-md-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-4" 
                 data-widget-editbutton="false" 
                 data-widget-colorbutton="false" 
                 data-widget-deletebutton="false" 
                 data-widget-custombutton="false"
                 data-widget-fullscreenbutton="false"
                 data-widget-togglebutton="false"
                 data-widget-sortable="false"
            >
                <header></header>

                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    
                    <div class="widget-body">
                        <?php
                        echo $this->Form->create($post, [
                            'autocomplete' => 'off',
                            'templates' => 'SmartAdmin.app_form'
                        ]);
                        ?>
                        <div clas="row">
                            <div class="col-sm-12 col-md-7 col-lg-8">
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
                                echo $this->Form->control('lead', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'placeholder' => __('Lead')
                                ]);
                                echo $this->Form->control('body', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control summernote',
                                    'placeholder' => __('Body')
                                ]);
                                ?>
                            </div>
                            <div class="col-sm-12 col-md-5 col-lg-4">
                                <?php
                                echo $this->Form->control('cover', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'placeholder' => __('Cover')
                                ]);
                                echo $this->Form->control('meta_keywords', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'type' => 'textarea',
                                    'placeholder' => __('Meta Keywords')
                                ]);
                                echo $this->Form->control('meta_description', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'type' => 'textarea',
                                    'placeholder' => __('Meta Description')
                                ]);
                                echo $this->Form->control('tag', [
                                    'class' => 'select2',
                                    'style' => 'width: 100%',
                                    'empty' => true,
                                    'multiple' => true
                                ]);
                                echo $this->Form->control('published', [
                                    'class' => 'checkbox'
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