<?php
$title = __('Add Page');

$this->assign('title', $title);

$this->start('ribbon');
$breadcrumbs = [
    ['title' => __('Pages'), 'url' => ['action' => 'index']],
    ['title' => $title]
];
echo $this->element('ribbon', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('title-heading');
echo $this->element('title', ['title' => $title]);
$this->end();

$this->start('navigation');
$menu['pages'][0] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->script([
    'plugin/summernote/summernote.min',
    'https://cdn.jsdelivr.net/npm/transliteration@2.1.3/dist/browser/bundle.umd.min.js'
], ['block' => true]);
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

        $('#title').on('input', function() {
            var text = $(this).val();
            var msg = slugify(text, { lowercase: true, separator: '_' });
            $("#slug").val(msg);
        });
    });
</script>
<?php $this->end(); ?>

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
                        echo $this->Form->create($page, [
                            'autocomplete' => 'off',
                            'templates' => 'SmartAdmin.app_form',
                            'type' => 'file'
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

                                    echo $this->Form->control('body', [
                                        'class' => 'form-control summernote',
                                        'placeholder' => __('Body')
                                    ]) . '<hr/>';

                                    echo $this->Form->control('slug', [
                                        'placeholder' => __('Slug')
                                    ]);
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