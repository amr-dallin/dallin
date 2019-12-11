<div class="row">
    <div class="col-md-12">
        <div id="panel_<?= str_replace('.', '_', (isset($prefix) ? $prefix : '')) ?>meta_tags" class="panel shadow-0">
            <div class="panel-hdr">
                <h2><?= __('Meta Tags && Open Graph') ?></h2>
            </div>
            <div class="panel-container">
                <div class="panel-content">
                    <?php
                    echo $this->MetaForm->render(
                        $metaTags,
                        (isset($prefix) ? $prefix : null)
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>