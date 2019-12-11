<?php
$this->assign('meta', $this->MetaRender->init($post)->render());
$this->set('menu', 'posts');

$breadcrumbs[] = ['title' => __('Blog'), 'url' => ['_name' => 'posts']];
if (!empty($post->service)) {
    $breadcrumbs[] = [
        'title' => h($post->service->title),
        'url' => [
            '_name' => 'posts_service',
            'service_slug' => h($post->service->slug)
        ]
    ];
}
$breadcrumbs[] = ['title' => h($post->title)];
$this->set('breadcrumbs', $breadcrumbs);

echo $this->Html->css(
    ['/vendor/highlight/styles/tomorrow-night-blue'],
    ['block' => true]
);

echo $this->Html->script(
    [
        '/vendor/jssocials-1.4.0/dist/jssocials',
        '/vendor/highlight/highlight.pack'
    ],
    ['block' => true]
);
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
    <div class="jumbotron jumbotron-fluid bg-light mb-5">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col col-md-11 col-lg-10">
                    <header>
                        <?= $this->element('breadcrumbs') ?>
                        <h1><?= h($post->title) ?></h1>
                        <div class="article-date">
                            <i class="far fa-calendar-alt"></i>
                            <time datetime="<?= $post->date_created->format('Y-m-d') ?>">
                                <?= $this->Time->i18nFormat($post->date_created, 'd MMMM Y') ?>
                            </time>
                        </div>
                    </header>
                    <p class="lead m-0"><?= h($post->lead) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?= $post->body ?>
                <?php
                if (!empty($post->service)) {
                    echo $this->Html->link(
                        h($post->service->title),
                        ['_name' => 'service_view', 'slug' => h($post->service->slug)]
                    );
                }
                ?>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-11 col-lg-10">
                <?php
                echo $this->element('article_footer', [
                    'tags' => $post->tags, 'share' => true
                ]);
                ?>
            </div>
        </div>
    </div>
</article>