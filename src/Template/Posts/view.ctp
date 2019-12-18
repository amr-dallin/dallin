<?php
$this->assign('meta', $this->MetaRender->init($post)->render());
$this->set('menu', 'posts');

$breadcrumbs[] = ['title' => __('Publications'), 'url' => ['_name' => 'posts']];
if (!empty($post->service)) {
    $breadcrumbs[] = [
        'title' => h($post->service->service_posts_page->title),
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
$(document).ready(function () {
    $(".share-list").jsSocials({
        showLabel: false,
        shareIn: "popup",
        showCount: false,
        shares: ["email", "linkedin", "facebook", "twitter", "telegram", "whatsapp"]
    });
    hljs.initHighlightingOnLoad();
});
</script>
<?php $this->end(); ?>

<article class="article">
    <div class="jumbotron jumbotron-fluid bg-light border-bottom">
        <div class="container">
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
                    <p class="lead m-0"><?= $post->lead ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <?= $post->body ?>
                <div class="row justify-content-center">
                    <div class="col col-md-9 col-lg-8">
                        <?php if (!empty($post->service)): ?>
                        <div class="card bg-light border text-center mt-3 mb-4">
                            <div class="card-body p-4">
                                <?php
                                echo $this->Html->tag('p', h($post->service->slogan), ['class' => 'card-text mb-3']);
                                echo $this->Html->link(
                                    __('More details'),
                                    ['_name' => 'service_view', 'slug' => h($post->service->slug)],
                                    ['class' => 'btn btn-primary']
                                );
                                ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php
                        echo $this->element('article_footer', [
                            'share' => true
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>