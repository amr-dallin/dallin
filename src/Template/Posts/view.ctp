<?php
$this->assign('title', h($post->title));

$this->set('menu', 'posts');

$this->start('meta');
echo $this->element('meta', [
    'title' => h($post->title),
    'url' =>  $this->Url->build(['action' => 'view', 'slug' => h($post->slug)], true),
    'meta_keywords' => h($post->meta_keywords),
    'meta_description' => h($post->meta_description)
]);
$this->end();

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
    <div class="jumbotron jumbotron-fluid bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col col-md-11 col-lg-10">
                    <header>
                        <div class="back-link">
                            <i class="fas fa-caret-left"></i> 
                            <?php
                            echo $this->Html->link(__('To all articles'),
                                ['action' => 'index'],
                                ['title' => __('To all articles')]
                            );
                            ?>
                        </div>
                        <h1><?php echo h($post->title); ?></h1>
                        <div class="article-date">
                            <i class="far fa-clock"></i> 
                            <time datetime="<?php echo $this->Time->format($post->date_created, 'yyyy-MM-dd'); ?>">
                                <?php echo $this->Time->format($post->date_created, 'dd.MM.yyyy'); ?>
                            </time>
                        </div>
                    </header>
                    <p class="lead m-0"><?php echo $post->lead; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <?php
                echo $post->body;
                echo $this->element('article_footer', [
                    'tags' => $post->tags, 'share' => true
                ]);
                ?>
            </div>
        </div>
    </div>
</article>