<?php
$this->assign('title', h($post->title));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __('Posts'), 'url' => ['controller' => 'Posts', 'action' => 'index']],
    ['title' => h($post->title)]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['posts'][1] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->css(
    ['formplugins/summernote/summernote', 'formplugins/select2/select2.bundle'],
    ['block' => true]
);
echo $this->Html->script(
    [
        'formplugins/summernote/summernote',
        'formplugins/select2/select2.bundle',
        '/vendor/bundle.umd.min'
    ],
    ['block' => true]
);
?>

<?php $this->start('script-code'); ?>
<script>
$(document).ready(function() {
    $('.summernote').summernote(
        {
            height: '200px',
            tabsize: 2,
            dialogsFade: true,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
            ]
        }
    );

    $('.select2').select2();
    $("#tag-list").select2({
        tags: true,
        tokenSeparators: [','],
        ajax: {
            url: '<?= $this->Url->build(['_name' => 'tag-list', '_ext' => 'json']) ?>',
            dataType: 'json',
            processResults: function(data) {
                return {
                    results: data
                };
            }
        }
    })

    $('#title').on('input', function() {
        var text = $(this).val();
        var msg = slugify(text);
        $("#slug").val(msg);
    });
});
</script>
<?php $this->end(); ?>

<?= $this->Form->create($post) ?>
<div class="row">
    <div class="col-md-9">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                        echo $this->Form->control('title', [
                            'class' => 'form-control input-lg form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0',
                            'placeholder' => __('Title')
                        ]);

                        echo $this->Form->control('slug', [
                            'placeholder' => __('Slug')
                        ]);

                        echo $this->Form->control('lead', [
                            'placeholder' => __('Lead'),
                            'rows' => 2
                        ]);

                        echo $this->Form->control('body', [
                            'class' => 'form-control summernote'
                        ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div id="panel-2" class="panel shadow-0">
            <div class="panel-hdr">
                <h2><?= __('Publish mode') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?= $this->Published->control($post->published) ?>
                    <div class="d-flex border-top pt-3">
                        <?php
                        echo $this->SmartHtml->postLink(
                            $this->Html->tag('i', '', ['class' => 'fal fa-trash']) . ' ' . __('Delete'),
                            $this->Url->build(['action' => 'delete', h($post->id)]),
                            [
                                'class' => 'color-danger-900 mt-2 pr-2 mr-auto',
                                'data-title' => __('Are you sure you want to delete the post?'),
                                'data-message' => __('Deletion eliminates the possibility of data recovery.')
                            ]
                        );
                        echo $this->Form->submit(__('Save'));
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="panel-3" class="panel shadow-0">
            <div class="panel-hdr">
                <h2><?= __('Tags') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?= $this->Tag->control() ?>
                </div>
            </div>
        </div>

        <div id="panel-4" class="panel shadow-0">
            <div class="panel-hdr">
                <h2><?= __('Service') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                    echo $this->Form->control('service_id', [
                        'class' => 'form-control select2 w-100',
                        'empty' => __('Select Service')
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <div id="panel-5" class="panel shadow-0">
            <div class="panel-hdr">
                <h2><?= __('Project') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                    echo $this->Form->control('project_id', [
                        'class' => 'form-control select2 w-100',
                        'empty' => __('Select Project')
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('meta_tags', ['metaTags' => $post->meta_tags]) ?>
<?= $this->Form->end() ?>