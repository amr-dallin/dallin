<?php
$this->assign('title', __('Create New Service'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __('Services'), 'url' => ['controller' => 'Services', 'action' => 'index']],
    ['title' => __('Create New')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['services'][0] = true;
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

<?= $this->Form->create($service) ?>
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
                    <?= $this->Published->control($service->published) ?>
                    <div class="border-top pt-3 text-right">
                        <?= $this->Form->submit(__('Save')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->element('meta_tags', ['metaTags' => $service->meta_tags]) ?>

<div class="row">
    <div class="col-md-12">
        <div id="panel-4" class="panel shadow-0">
            <div class="panel-hdr">
                <h2><?= __('Posts System Page') ?></h2>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <?php
                        echo $this->Form->control('service_posts_page.title', [
                            'placeholder' => __('Title')
                        ]);

                        echo $this->Form->control('service_posts_page.body', [
                            'class' => 'form-control summernote'
                        ]);

                        echo $this->element(
                            'meta_tags',
                            [
                                'metaTags' => (isset($service->service_posts_page->meta_tags) ? $service->service_posts_page->meta_tags : null),
                                'prefix' => 'service_posts_page.'
                            ]
                        );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>