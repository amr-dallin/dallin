<?php
$title = __('Gallery');

$this->assign('title', $title);

$this->start('ribbon');
$breadcrumbs[0] = ['title' => $title];
echo $this->element('ribbon', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['gallery'] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->script(['superbox', 'clipboard.min'], ['block' => true]);
?>

<?php $this->start('script-code'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.superbox').SuperBox();
        new ClipboardJS('.fa-clipboard');
    });
</script>
<?php $this->end(); ?>

<div class="row hidden-mobile">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <h1 class="page-title txt-color-blueDark"><?php echo $title; ?></h1>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-align-right">
        <div class="page-title">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fa fa-upload']) . ' ' . __('Upload'),
                [
                    'controller' => 'files',
                    'action' => 'add'
                ],
                ['class' => 'btn btn-success', 'escape' => false]
            );
            ?>
        </div>
    </div>
</div>

<!-- row -->
<div class="row">
    <!-- SuperBox -->
    <div class="superbox col-sm-12">
        <?php foreach ($files as $file): ?>
        <div class="superbox-list">
            <?php
            echo $this->Image->display($file['file'], 'crop160', [
                'class' => 'superbox-img',
                'data-img' => ASSETS . $file['file']['path'],
                'data-delete-link' => $this->Form->postLink(
                    $this->Html->tag('i', '', ['class' => 'fa fa-trash']) . ' ' . __('Delete'),
                    ['action' => 'delete', $file->id],
                    [
                        'confirm' => __('Are you sure you want to delete # {0}?', $file->id),
                        'class' => 'btn btn-danger btn-sm',
                        'escape' => false
                    ]
                )
            ]);
            ?>
        </div>
        <?php endforeach; ?>

        <div class="superbox-float"></div>
    </div>
    <!-- /SuperBox -->

    <div class="superbox-show" style="height:300px; display: none"></div>
</div>
<!-- end row -->