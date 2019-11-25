<?php
$title = __('Settings {0}', $this->request->pass[0]);

$this->assign('title', $title);

$this->start('ribbon');
$breadcrumbs[0]['title'] = $title;
echo $this->element('ribbon', ['breadcrumbs' => $breadcrumbs]);
$this->end();

$this->start('title-heading');
echo $this->element('title', ['title' => $title]);
$this->end();

$this->start('navigation');
$menu['settings'][1][$this->request->pass[0]] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

$this->start('script');
echo $this->Html->script([
    'plugin/x-editable/moment.min',
    'plugin/x-editable/jquery.mockjax.min',
    'plugin/x-editable/x-editable.min'
]);
$this->end();
?>

<?php $this->start('script-code'); ?>
<script>
    $(document).ready(function () {
        $('.xeditable').editable({
            params: function (params) {
                params['_csrfToken'] = '<?php echo $this->request->getParam('_csrfToken'); ?>';
                return params;
            }
        });    
    });
</script>
<?php $this->end(); ?>

<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW COL START -->
        <article class="col-sm-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-0">
                <header></header>

                <!-- widget div-->
                <div>

                    <!-- widget edit box -->
                    <div class="jarviswidget-editbox">
                        <!-- This area used as dropdown edit box -->
                    </div>
                    <!-- end widget edit box -->

                    <!-- widget content -->
                    <div class="widget-body">

                        <table class="table table-bordered table-striped" style="clear: both">
                            <tbody>
                                <?php foreach($settings as $key => $setting): ?>
                                <tr>
                                    <td style="width:35%;">
                                        <?php echo h($setting->title); ?><br/>
                                        <code>Settings.<?php echo h($setting->field_key); ?></code>
                                    </td>
                                    <td style="width:65%">
                                        <?php
                                        echo $this->Html->link(
                                            h($setting->value), '#', [
                                                'data-type' => h($setting->field_type),
                                                'data-pk' => h($setting->id),
                                                'data-value' => h($setting->value),
                                                'class' => 'xeditable',
                                                'data-url' => $this->Url->build([
                                                    'action' => 'edit', 
                                                    '_ext' => 'json'
                                                ])
                                            ]
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
        <!-- END COL -->

    </div>
</section>
