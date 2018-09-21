<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->start('title');
echo h($post->title);
$this->end();

$this->start('header');
echo $this->element('header');
$this->end();

$this->start('meta');
echo $this->element('meta', [
    'meta_keywords' => h($post->meta_keywords),
    'meta_description' => h($post->meta_description)
]);
$this->end();

$this->start('css');
echo $this->Html->css('/vendor/highlight/styles/tomorrow-night-blue');
$this->end();

$this->start('script');
echo $this->Html->script(['/vendor/jssocials-1.4.0/dist/jssocials', '/vendor/highlight/highlight.pack']);
$this->end();
?>
<?php $this->start('script1'); ?>
<script>
$(".share_list").jsSocials({
    showLabel: false,
    shareIn: "popup",
    showCount: false,
    shares: ["email", "linkedin", "facebook", "vkontakte", "googleplus", "twitter", "telegram", "whatsapp"]
});
hljs.initHighlightingOnLoad();
</script>
<?php $this->end(); ?>

<article class="blog-post-view">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">
                <header>
                    <h1><?php echo h($post->title); ?></h1>
                    <div class="blog_post_date">
                        <i class="far fa-clock"></i> 
                        <time datetime="<?php echo $this->Time->format(h($post->date_created), 'YYYY-MM-dd'); ?>"><?php echo $this->Time->format(h($post->date_created), 'dd.MM.YYYY'); ?></time>
                    </div>
                </header>
                <p class="lead"><?php echo $post->lead; ?></p>
                <?php echo $post->body; ?>
                <footer>
                    <div class="row blog_post_share">
                        <div class="col">
                            <div class="share_list_label">Понравилось? Поделитесь с другими.</div>
                            <div class="share_list"></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</article>