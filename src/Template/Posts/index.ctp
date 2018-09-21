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
echo $this->element('header');
$this->end();
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 blog-main">
            <?php foreach($posts as $post): ?>
            <article class="blog-post">
                <header class="mb-2">
                    <h2 class="blog-post-title-heading mb-2">
                        <?php
                        echo $this->Html->link(
                            h($post->title), 
                            ['action' => 'view', 'alias' => h($post->alias)], 
                            [
                                'class' => 'blog-post-title-link',
                                'title' => h($post->title)
                            ]
                        );
                        ?>
                    </h2>
                    <div class="blog-post-date">
                        <i class="far fa-clock"></i> 
                        <time datetime="<?php echo $this->Time->format(h($post->date_created), 'YYYY-MM-dd'); ?>"><?php echo $this->Time->format(h($post->date_created), 'dd.MM.YYYY'); ?></time>
                    </div>
                </header>
                <p class="mb-3"><?php echo $post->lead; ?></p>
                <footer>
                    <p class="blog-post-tags">

                    </p>
                </footer>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</div>
