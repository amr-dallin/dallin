<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $pages
 */

$this->start('title');
echo __('Pages');
$this->end();

$this->start('ribbon');
$breadcrumbs = [0 => ['title' => __('Pages')]];
echo $this->element('ribbon', array('breadcrumbs' => $breadcrumbs));
$this->end();

$this->start('title-heading');
echo $this->element('title', array('title' => __('Pages')));
$this->end();

$this->start('navigation');
$menu['pages'] = [1 => true];
echo $this->element('navigation', array('menu' => $menu));
$this->end();

$this->start('script');
echo $this->Html->script([
    'plugin/datatables/jquery.dataTables.min',
    'plugin/datatables/dataTables.colVis.min',
    'plugin/datatables/dataTables.tableTools.min',
    'plugin/datatables/dataTables.bootstrap.min',
    'plugin/datatable-responsive/datatables.responsive.min'
]);
$this->end();
?>

<?php $this->start('script1'); ?>
<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function () {



        /* // DOM Position key index //
         
         l - Length changing (dropdown)
         f - Filtering input (search)
         t - The Table! (datatable)
         i - Information (records)
         p - Pagination (paging)
         r - pRocessing
         < and > - div elements
         <"#id" and > - div with an id
         <"class" and > - div with a class
         <"#id.class" and > - div with an id and class
         
         Also see: http://legacy.datatables.net/usage/features
         */

        /* BASIC ;*/
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_datatable_fixed_column = undefined;
        var responsiveHelper_datatable_col_reorder = undefined;
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        var otable = $('#dt_basic').DataTable({
            "sDom": "<'dt-toolbar'<'col-sm-6 col-xs-6 hidden-xs text-left'><'col-lg-12 col-sm-6'f>r>" +
                    "t" +
                    "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 pull-left'p><'col-sm-6 hidden-xs'l>>",
            "autoWidth": true,
            "bSort": false,
            "iDisplayLength": 30,
            "preDrawCallback": function () {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                }
            },
            "rowCallback": function (nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback": function (oSettings) {
                responsiveHelper_dt_basic.respond();
            }
        });

        $("#dt_basic thead th input[type=text]").on('keyup change', function () {

            otable
                    .column($(this).parent().index() + ':visible')
                    .search(this.value)
                    .draw();

        });

        /* END BASIC */

    });

</script>
<?php $this->end(); ?>

<section class="">

    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-custombutton="false">
                <header></header>
                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th><?php echo __('Title'); ?></th>
                                    <th><?php echo __('Meta Keywords'); ?></th>
                                    <th style="background: none; cursor: inherit; width: 3%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($pages as $key => $page): ?>
                                <tr>
                                    <td><?php echo h($page->title); ?></td>
                                    <td><?php echo h($page->meta_keywords); ?></td>
                                    <td>
                                        <?php
                                        echo $this->Html->link(
                                            $this->Html->tag('i', '', ['class' => 'fa fa-pencil']), 
                                            ['action' => 'edit', $page->id],
                                            ['escape' => false]
                                        );
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end widget content -->
                </div>
                <!-- end widget div -->
            </div>
            <!-- end widget -->
        </article>
        <!-- WIDGET END -->
    </div>
    <!-- end row -->
</section>