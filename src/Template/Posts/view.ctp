<?php
$title = h($post->title);

$this->set('menu', 'posts');

$this->start('meta');
echo $this->element('meta', [
    'title' => $title,
    'meta' => [
        'keywords' => h($post->meta_keywords),
        'description' => h($post->meta_description)
    ],
    'og' => [
        'title' => h($post->heading),
        'description' => h($post->meta_description),
        'image' => [
            'url' => $post->image
        ],
        'url' => $this->Url->build(['slug' => h($post->slug)], true)
    ],
    'twitter' => [
        'card' => 'summary_large_image'
    ],
    'canonical' => $this->Url->build(['slug' => h($post->slug)], true)
]);
$this->end();

$breadcrumbs = [
    ['title' => __('Blog'), 'url' => ['action' => 'index']],
    ['title' => h($post->heading)]
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
    <div class="jumbotron jumbotron-fluid bg-light mb-5">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col col-md-11 col-lg-10">
                    <header>
                        <?php echo $this->element('breadcrumbs'); ?>
                        <h1><?php echo h($post->heading); ?></h1>
                        <div class="article-date">
                            <i class="far fa-calendar-alt"></i>
                            <time datetime="<?php echo $post->date_created->format('Y-m-d'); ?>">
                                <?php echo $this->Time->i18nFormat($post->date_created, 'd MMMM Y'); ?>
                            </time>
                        </div>
                    </header>
                    <p class="lead m-0"><?php echo $post->lead; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo $post->body; ?>
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