<?php
$this->assign('title', __('Systemic pages'));

$this->start('breadcrumbs');
$breadcrumbs = [
    ['title' => __('Systemic Pages')]
];
echo $this->element('breadcrumbs', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['systemic_pages'][1] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

echo $this->Html->css('datagrid/datatables/datatables.bundle', ['block' => true]);
echo $this->Html->script('datagrid/datatables/datatables.bundle', ['block' => true]);
?>

<?php $this->start('script-code'); ?>
<script>
$(document).ready(function() {
    $('.datatable').dataTable({
        responsive: {
            details: {
                type: 'column', target: 'tr'
            }
        },
        columnDefs: [{
            targets: [0, 3],
            orderable: false
        }],
        order: 1
    });
});
</script>
<?php $this->end(); ?>


<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <table class="table table-bordered table-hover table-striped w-100 datatable">
                        <thead>
                            <tr>
                                <th class="text-center all"><?= __('ID') ?></th>
                                <th class="all" style="width: 72%"><?= __('Title') ?></th>
                                <th class="min-desktop"><?= __('Date Modified') ?></th>
                                <th class="all"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($systemicPages as $page): ?>
                            <tr>
                                <td class="text-center"><?= h($page->id) ?></td>
                                <td><?= h($page->title) ?></td>
                                <td><?= $this->Time->i18nFormat($page->date_modified, 'dd MMMM Y h:mm:ss') ?></td>
                                <td class="text-center">
                                    <?php
                                    echo $this->Html->link(
                                        $this->Html->tag('i', '', ['class' => 'fal fa-pencil']),
                                        ['action' => 'edit', h($page->id)],
                                        ['escape' => false]
                                    );
                                    ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>