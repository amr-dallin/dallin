<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
$this->start('title');
echo h($page->title);
$this->end();

$this->start('meta');
echo $this->element('meta', [
    'meta_keywords' => h($page->meta_keywords),
    'meta_description' => h($page->meta_description)
]);
$this->end();

$this->start('header');
echo $this->element('header', ['menu' => 'blog']);
$this->end();
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8 mt-5">
            <?php foreach($posts as $post): ?>
            <article class="article">
                <header class="mb-2">
                    <h2 class="mb-2">
                        <?php
                        echo $this->Html->link(
                            h($post->title), 
                            ['action' => 'view', 'alias' => h($post->alias)], 
                            [
                                'class' => 'header-link',
                                'title' => h($post->title)
                            ]
                        );
                        ?>
                    </h2>
                    <div class="article-date">
                        <i class="far fa-clock"></i> 
                        <time datetime="<?php echo $this->Time->format($post->date_created, 'yyyy-MM-dd'); ?>"><?php echo $this->Time->format($post->date_created, 'dd.MM.yyyy'); ?></time>
                    </div>
                </header>
                <p class="mb-3"><?php echo $post->lead; ?></p>
                <footer>
                    <?php echo $this->element('tags', ['tags' => $post->tags]); ?>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>
