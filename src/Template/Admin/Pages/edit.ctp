<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $post
 */
$this->start('title');
echo __('Edit ') . $page->title;
$this->end();

$this->start('ribbon');
$breadcrumbs = [
    0 => [
        'title' => __('Pages'),
        'url' => ['controller' => 'pages', 'action' => 'index']
    ],
    1 => ['title' => __('Edit ') . $page->title]
];
echo $this->element('ribbon', array('breadcrumbs' => $breadcrumbs));
$this->end();

$this->start('title-heading');
echo $this->element('title', array('title' => __('Edit ') . $page->title));
$this->end();

$this->start('navigation');
$menu['pages'] = [0 => true];
echo $this->element('navigation', array('menu' => $menu));
$this->end();

$this->start('script');
echo $this->Html->script('plugin/summernote/summernote.min');
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
                        echo $this->Form->create($page, [
                            'autocomplete' => 'off',
                            'templates' => 'SmartAdmin.app_form'
                        ]);
                        echo $this->Form->control('title', [
                            'label' => ['class' => 'sr-only'],
                            'class' => 'form-control input-lg',
                            'placeholder' => __('Title')
                        ]);
                        echo $this->Form->control('body', [
                            'label' => ['class' => 'sr-only'],
                            'class' => 'form-control summernote',
                            'placeholder' => __('Body')
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
                        echo $this->Form->submit(null, [
                            'class' => 'btn btn-primary'
                        ]);
                        echo $this->Form->end();
                        ?>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
    </div>
</section>