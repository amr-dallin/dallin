<?php
$this->assign('meta', $this->MetaRender->init($project)->render());
$this->set('menu', 'projects');

$breadcrumbs = [
    ['title' => __('Projects'), 'url' => ['_name' => 'projects']],
    ['title' => h($project->title)]
];
$this->set('breadcrumbs', $breadcrumbs);

echo $this->Html->css([
    '/vendor/highlight/styles/tomorrow-night-blue',
], ['block' => true]);

echo $this->Html->script([
    '/vendor/jssocials-1.4.0/dist/jssocials',
    '/vendor/highlight/highlight.pack'
], ['block' => true]);
?>

<?php $this->start('script-code'); ?>
<script>
$(".share-list").jsSocials({
    showLabel: false,
    shareIn: "popup",
    showCount: false,
    shares: ["email", "linkedin", "facebook", "vkontakte", "twitter", "telegram", "whatsapp"]
});
hljs.initHighlightingOnLoad();
</script>
<?php $this->end(); ?>

<article class="article">
    <div class="jumbotron jumbotron-fluid bg-light text-center">
        <div class="container inner-elements">
            <div class="row justify-content-center">
                <div class="col col-md-11 col-lg-10 p-3">
                    <header>
                        <?= $this->element('breadcrumbs') ?>
                        <h1 class="display-1"><?php echo h($project->title); ?></h1>
                    </header>
                    <p class="lead m-0"><?php echo h($project->lead); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                echo $project->body;
                echo $this->element('article_footer', [
                    'share' => true
                ]);
                ?>
            </div>
        </div>
    </div>
</article>