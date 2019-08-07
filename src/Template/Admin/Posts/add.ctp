<?php
$title = __('Add Post');

$this->assign('title', $title);

$this->start('ribbon');
$breadcrumbs = [
    ['title' => __('Posts'), 'url' => ['action' => 'index']],
    ['title' => $title]
];
echo $this->element('ribbon', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['posts'][0] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

$this->start('script');
echo $this->Html->script([
    'plugin/summernote/summernote.min',
    'plugin/bootstrap-tags/bootstrap-tagsinput.min',
    'https://cdn.jsdelivr.net/npm/transliteration@2.1.3/dist/browser/bundle.umd.min.js'
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

        $('#heading').on('input', function() {
            var text = $(this).val();
            var msg = slugify(text, { lowercase: true, separator: '_' });
            $("#title").val(text);
            $("#slug").val(msg);
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
                        echo $this->Form->create($post, [
                            'autocomplete' => 'off',
                            'templates' => 'SmartAdmin.app_form',
                            'type' => 'file'
                        ]);
                        ?>
                        <fieldset>
                            <div clas="row">
                                <div class="col-sm-12 col-md-7 col-lg-8">
                                    <?php
                                    echo $this->Form->control('heading', [
                                        'class' => 'form-control input-lg',
                                        'placeholder' => __('Heading')
                                    ]);

                                    echo $this->Form->control('lead', [
                                        'placeholder' => __('Lead')
                                    ]);
                                    echo $this->Form->control('body', [
                                        'class' => 'form-control summernote',
                                        'placeholder' => __('Body')
                                    ]) . '<hr/>';

                                    echo $this->Form->control('title', [
                                        'placeholder' => __('Title')
                                    ]);
                                    echo $this->Form->control('slug', [
                                        'placeholder' => __('Slug')
                                    ]) . '<hr/>';
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->control('meta_keywords', [
                                                'type' => 'textarea',
                                                'placeholder' => __('Meta Keywords')
                                            ]);
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            echo $this->Form->control('meta_description', [
                                                'type' => 'textarea',
                                                'placeholder' => __('Meta Description')
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-4">
                                    <?php
                                    echo '<legend>' . __('Open Graph Image') . '</legend>';
                                    echo $this->Form->control('image.file', [
                                        'type' => 'file'
                                    ]) . '<hr/>';

                                    echo $this->Form->control('project_id', [
                                        'class' => 'form-control select2',
                                        'empty' => __('Check which project the article belongs to')
                                    ]);
                                    echo $this->Tag->control([
                                        'class' => 'form-control tagsinput',
                                        'data-role' => 'tagsinput',
                                        'placeholder' => __('Tags')
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