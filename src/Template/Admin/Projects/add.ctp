<?php
$title = __('Add Project');

$this->assign('title', $title);

$this->start('ribbon');
$breadcrumbs = [
    ['title' => __('Projects'), 'url' => ['action' => 'index']],
    ['title' => $title]
];
echo $this->element('ribbon', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['projects'][0] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

$this->start('script');
echo $this->Html->script([
    'plugin/summernote/summernote.min',
    'plugin/bootstrap-tags/bootstrap-tagsinput.min'
]);
$this->end();
?>

<?php $this->start('script-code'); ?>
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

<div class="row">
    <div class="col-md-12">
        <h1 class="page-title txt-color-blueDark">
            <?php echo $title; ?>
        </h1>
    </div>
</div>

<section id="widget-grid">
    <div class="row">
        <article class="col-md-12">
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-1">
                <header></header>

                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body">
                        <?php
                        echo $this->Form->create($project, [
                            'autocomplete' => 'off',
                            'templates' => 'SmartAdmin.app_form'
                        ]);
                        ?>
                        <fieldset>
                            <div clas="row">
                                <div class="col-sm-12 col-md-7 col-lg-8">
                                    <?php
                                    echo $this->Form->control('title', [
                                        'class' => 'form-control input-lg',
                                        'placeholder' => __('Title')
                                    ]);
                                    echo $this->Form->control('heading', [
                                        'placeholder' => __('Heading')
                                    ]);
                                    echo $this->Form->control('slug', [
                                        'class' => 'form-control input-sm',
                                        'placeholder' => __('Slug')
                                    ]) . '<hr/>';
                                    
                                    echo $this->Form->control('description', [
                                        'type' => 'textarea',
                                        'placeholder' => __('Description')
                                    ]);
                                    echo $this->Form->control('body', [
                                        'class' => 'form-control summernote',
                                        'placeholder' => __('Body')
                                    ]);
                                    ?>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-4">
                                    <?php
                                    echo $this->Form->control('image', [
                                        'placeholder' => __('Image')
                                    ]) . '<hr/>';
                                    
                                    echo $this->Form->control('url', [
                                        'placeholder' => __('URL')
                                    ]) . '<hr/>';
                                    
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
                                    ]) . '<hr/>';

                                    echo $this->Tag->control([
                                        'label' => ['class' => 'sr-only'],
                                        'class' => 'form-control tagsinput',
                                        'data-role' => 'tagsinput',
                                        'placeholder' => __('Tags')
                                    ]) . '<hr/>';

                                    echo $this->Form->control('published', [
                                        'class' => 'checkbox'
                                    ]);
                                    ?>
                                </div>
                            </div>
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