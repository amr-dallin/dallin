<?php
$this->assign('title', h($page->title));

$this->start('ribbon');
$breadcrumbs = [
    ['title' => __('Pages'), 'url' => ['action' => 'index']],
    ['title' => h($page->title)]
];
echo $this->element('ribbon', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['pages'][1] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->script('plugin/summernote/summernote.min', ['block' => true]);
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
            <?php echo h($page->title); ?>
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
                        <div class="widget-body-toolbar">
                            <div class="row">
                                <div class="col-sm-12 text-align-right">
                                    <?php
                                    echo $this->Form->postLink(
                                        $this->Html->tag('i', '', ['class' => 'fa fa-trash']) . ' ' .
                                        __('Delete'),
                                        ['action' => 'delete', h($page->id)],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?', h($page->id)),
                                            'class' => 'btn btn-danger',
                                            'escape' => false
                                        ]
                                    )
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        echo $this->Form->create($page, [
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
                                    echo $this->Form->control('slug', [
                                        'class' => 'form-control input-sm',
                                        'placeholder' => __('Slug')
                                    ]) . '<hr/>';

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

                                    echo $this->Form->control('meta_keywords', [
                                        'type' => 'textarea',
                                        'placeholder' => __('Meta Keywords')
                                    ]);
                                    echo $this->Form->control('meta_description', [
                                        'type' => 'textarea',
                                        'placeholder' => __('Meta Description')
                                    ]) . '<hr/>';

                                    echo $this->Form->control('published');
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