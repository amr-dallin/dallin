<?php
$title = __('Pages');

$this->assign('title', $title);

$this->start('ribbon');
$breadcrumbs[0]['title'] = $title;
echo $this->element('ribbon', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['pages'][1] = true;
echo $this->element('navigation', ['menu' => $menu]);
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
    $(document).ready(function () {
        var responsiveHelper_dt_basic = undefined;
        var responsiveHelper_dt_basic2 = undefined;
		var breakpointDefinition = {
            tablet : 1024,
			phone : 480
		};
        
        function dataTable(id, responsive_var)
        {
            $(id).dataTable({
                "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
                        "t"+
                        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                "autoWidth" : true,
                "bSort": false,
                "oLanguage": {
                    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                },
                "preDrawCallback" : function() {
                    if (!responsiveHelper_dt_basic) {
                        responsive_var = new ResponsiveDatatablesHelper($(id), breakpointDefinition);
                    }
                },
                "rowCallback" : function(nRow) {
                    responsive_var.createExpandIcon(nRow);
                },
                "drawCallback" : function(oSettings) {
                    responsive_var.respond();
                }
            });
        }
        
        dataTable('#dt_basic', responsiveHelper_dt_basic);
        dataTable('#dt_basic2', responsiveHelper_dt_basic2);
        
        
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

    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-1">
                <header>
                    <h2><?php echo __('Systemic'); ?></h2>
                </header>
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
                                    <th class="text-align-center"><?php echo __('ID'); ?></th>
                                    <th data-class="expand"><?php echo __('Title'); ?></th>
                                    <th data-hide="phone,tablet"><?php echo __('Meta Keywords'); ?></th>
                                    <th style="background: none; cursor: inherit; width: 5%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($systemic_pages as $key => $systemic_page): ?>
                                <tr>
                                    <td class="text-align-center">
                                        <?php echo h($systemic_page->id); ?>
                                    </td>
                                    <td>
                                        <?php echo h($systemic_page->title); ?>
                                        <br/>
                                        <code>
                                            <?php
                                            echo DS . h($systemic_page->slug);
                                            ?>
                                        </code>
                                    </td>
                                    <td><?php echo h($systemic_page->meta_keywords); ?></td>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                            $this->Html->tag('i', '', ['class' => 'fa fa-pencil']), 
                                            ['action' => 'edit', h($systemic_page->id)],
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
            
            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-2">
                <header>
                    <h2><?php echo __('Not Systemic'); ?></h2>
                </header>
                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body no-padding">
                        <table id="dt_basic2" class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th data-class="expand"><?php echo __('Title'); ?></th>
                                    <th data-hide="phone,tablet"><?php echo __('Meta Keywords'); ?></th>
                                    <th data-hide="phone,tablet"><?php echo __('Date Created'); ?></th>
                                    <th data-hide="phone" style="width: 5%;"><?php echo __('Published'); ?></th>
                                    <th style="background: none; cursor: inherit; width: 5%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($pages as $key => $page): ?>
                                <tr>
                                    <td>
                                        <?php echo h($page->title); ?><br/>
                                        <code>
                                            <?php
                                            echo $this->Url->build([
                                                'action' => 'view', 
                                                'slug' => h($page->slug),
                                                'prefix' => false
                                            ], true);
                                            ?>
                                        </code>
                                    </td>
                                    <td><?php echo h($page->meta_keywords); ?></td>
                                    <td><?php echo h($page->date_created); ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Dallin->published(h($page->published)); ?>
                                    </td>
                                    <td class="text-center">
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