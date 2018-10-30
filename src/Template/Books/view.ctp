<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
$this->start('title');
echo h($book->title);
$this->end();

$this->start('header');
echo $this->element('header', ['menu' => 'books']);
$this->end();

$this->start('meta');
echo $this->element('meta', [
    'meta_keywords' => h($book->meta_keywords),
    'meta_description' => h($book->meta_description)
]);
$this->end();

$this->start('css');
echo $this->Html->css([
    '/vendor/zoom.js/css/zoom'
]);
$this->end();

$this->start('script');
echo $this->Html->script([
    '/vendor/zoom.js/js/zoom',
    '/vendor/jssocials-1.4.0/dist/jssocials'
]);
$this->end();
?>
<?php $this->start('script1'); ?>
<script>
$(".share-list").jsSocials({
    showLabel: false,
    shareIn: "popup",
    showCount: false,
    shares: ["email", "linkedin", "facebook", "vkontakte", "googleplus", "twitter", "telegram", "whatsapp"]
});
</script>
<?php $this->end(); ?>

<article>
    <div class="jumbotron jumbotron-fluid bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-11 col-lg-9">
                    <div class="back-link">
                        <i class="fas fa-caret-left"></i>
                        <?php echo $this->Html->link(__('To all books'), ['action' => 'index'], ['title' => __('To all books')]); ?>
                    </div>
                    <div class="row">
                        <div class="d-none d-sm-block col-sm-3">
                            <?php echo $this->Html->image(DS . h($book->cover), ['data-action' => 'zoom', 'class' => 'img-thumbnail']); ?>
                        </div>
                        <div class="col-sm-9">
                            <header>
                                <h1><?php echo h($book->title); ?></h1> 
                            </header>
                            <ul class="list-unstyled">
                                <?php if (!empty($book->author)): ?>
                                <li><strong><?php echo __('Author'); ?></strong>: <?php echo h($book->author); ?></li>
                                <?php endif; ?>
                                <li><strong><?php echo __('First publication'); ?></strong>: <?php echo $this->Time->format($book->date_publication, 'dd.MM.yyyy'); ?></li>
                                <li><hr/></li>
                                <li><strong><?php echo __('Readed'); ?></strong>: <?php echo $this->Time->format($book->date_readed, 'dd.MM.yyyy'); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container article">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <?php echo $book->body; ?>
                <?php echo $this->element('article_footer', ['tags' => $book->tags]); ?>
            </div>
        </div>
    </div>
</article>