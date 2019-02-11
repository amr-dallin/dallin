<?php
$title = __('Posts');

$this->assign('title', $title);

$this->start('ribbon');
$breadcrumbs[0]['title'] = $title;
echo $this->element('ribbon', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('navigation');
$menu['posts'][1] = true;
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
		var breakpointDefinition = {
            tablet : 1024,
			phone : 480
		};
	
		$('#dt_basic').dataTable({
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
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
                responsiveHelper_dt_basic.respond();
			}
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

    <!-- row -->
    <div class="row">
        <!-- NEW WIDGET START -->
        <article class="col-md-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-1">
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
                                    <th data-class="expand"><?php echo __('Heading'); ?></th>
                                    <th data-hide="phone,tablet"><?php echo __('Meta Keywords'); ?></th>
                                    <th data-hide="phone,tablet"><?php echo __('Date Created'); ?></th>
                                    <th data-hide="phone"><?php echo __('Published'); ?></th>
                                    <th style="background: none; cursor: inherit; width: 5%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($posts as $key => $post): ?>
                                <tr>
                                    <td>
                                        <?php echo h($post->heading); ?><br/>
                                        <code>
                                            <?php
                                            echo $this->Url->build([
                                                'action' => 'view', 
                                                'slug' => h($post->slug),
                                                'prefix' => false
                                            ], true);
                                            ?>
                                        </code>
                                    </td>
                                    <td><?php echo h($post->meta_keywords); ?></td>
                                    <td><?php echo h($post->date_created); ?></td>
                                    <td class="text-center">
                                        <?php echo $this->Dallin->published(h($post->published)); ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        echo $this->Html->link(
                                            $this->Html->tag('i', '', ['class' => 'fa fa-pencil']), 
                                            ['action' => 'edit', $post->id],
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