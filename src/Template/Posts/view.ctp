<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->assign('title', h($post->title));

$this->start('header');
echo $this->element('header', ['menu' => 'blog']);
$this->end();

echo $this->element('meta', [
    'meta_keywords' => h($post->meta_keywords),
    'meta_description' => h($post->meta_description)
], ['block' => true]);

echo $this->Html->css([
    '/vendor/highlight/styles/tomorrow-night-blue',
    '/vendor/zoom.js/css/zoom'
], ['block' => true]);

echo $this->Html->script([
    '/vendor/zoom.js/js/zoom',
    '/vendor/jssocials-1.4.0/dist/jssocials',
    '/vendor/highlight/highlight.pack'
], ['block' => true]);
?>
<?php $this->start('script1'); ?>
<script>
$(".share-list").jsSocials({
    showLabel: false,
    shareIn: "popup",
    showCount: false,
    shares: ["email", "linkedin", "facebook", "vkontakte", "googleplus", "twitter", "telegram", "whatsapp"]
});
hljs.initHighlightingOnLoad();
</script>
<?php $this->end(); ?>

<article class="article">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <header class="mt-5">
                    <div class="back-link">
                        <i class="fas fa-caret-left"></i>
                        <?php echo $this->Html->link(__('To all articles'), ['action' => 'index'], ['title' => __('To all articles')]); ?>
                    </div>
                    <h1><?php echo h($post->title); ?></h1>
                    <div class="article-date">
                        <i class="far fa-clock"></i> 
                        <time datetime="<?php echo $this->Time->format($post->date_created, 'yyyy-MM-dd'); ?>"><?php echo $this->Time->format($post->date_created, 'dd.MM.yyyy'); ?></time>
                    </div>
                </header>
                <p class="lead"><?php echo $post->lead; ?></p>
                <?php echo $post->body; ?>
                <?php echo $this->element('article_footer', ['tags' => $post->tags]); ?>
            </div>
        </div>
    </div>
</article>