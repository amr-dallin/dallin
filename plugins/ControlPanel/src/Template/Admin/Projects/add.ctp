<?php
$this->assign('title', __('Create New Project'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __('Projects'), 'url' => ['controller' => 'Projects', 'action' => 'index']],
    ['title' => __('Create New')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['projects'][0] = true;
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

    $('#title').on('input', function() {
        var text = $(this).val();
        var msg = slugify(text);
        $("#slug").val(msg);
    });
});
</script>
<?php $this->end(); ?>

<?= $this->Form->create($project) ?>
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
                    <?= $this->Published->control($project->published) ?>
                    <div class="d-flex border-top pt-3">
                        <?= $this->Form->submit(__('Save')) ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="panel-3" class="panel shadow-0">
            <div class="panel-hdr">
                <h2><?= __('Other') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                    echo $this->Form->control('url', [
                        'placeholder' => __('URL')
                    ]);

                    echo $this->Form->control('weight', [
                        'placeholder' => __('Weight')
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('meta_tags', ['metaTags' => $project->meta_tags]) ?>
<?= $this->Form->end() ?>