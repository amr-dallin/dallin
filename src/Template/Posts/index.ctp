<?php
$title = h($page->title);
$body = $page->body;
if (isset($tag)) {
    $title = __(h($page->title), h($tag->label));
    $body = __($page->body, h($tag->label));
} 

$this->assign('title', $title);

$this->start('meta');
echo $this->element('meta', [
    'title' => $title,
    'url' =>  $this->Url->build(['action' => 'index'], true),
    'meta_keywords' => h($page->meta_keywords),
    'meta_description' => h($page->meta_description)
]);
$this->end();

$this->set('menu', 'posts');
?>

<div class="jumbotron jumbotron-fluid bg-light border-bottom py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <?php echo $body; ?>
            </div>
        </div>
    </diV>
</div>

<div class="container">
    <?php if ($this->request['paging']['Posts']['count'] > 0): ?>
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">
            <?php foreach($posts as $post): ?>
            <article class="article">
                <header class="mb-2">
                    <h2 class="mb-1">
                        <?php
                        echo $this->Html->link(h($post->heading),
                            ['action' => 'view', 'slug' => h($post->slug)],
                            ['class' => 'header-link', 'title' => h($post->heading)]
                        );
                        ?>
                    </h2>
                    <div class="article-date">
                        <i class="far fa-calendar-alt"></i>
                        <time datetime="<?php echo $this->Time->format($post->date_created, 'yyyy-MM-dd'); ?>">
                            <?php echo $this->Time->format($post->date_created, 'dd.MM.yyyy'); ?>
                        </time>
                    </div>
                </header>
                <p class="mb-3"><?php echo $post->lead; ?></p>
                <?php
                echo $this->element('article_footer', [
                    'tags' => $post->tags, 'share' => false
                ]);
                ?>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
    <nav aria-label="<?php echo __('Page navigation'); ?>" class="mb-5">
        <h3 class="text-hide m-0"><?php echo __('Page navigation'); ?></h3>
        <ul class="pagination pagination-sm justify-content-center">
        <?php
        echo $this->Paginator->prev(' << ' . __('previous'));
        echo $this->Paginator->numbers();
        echo $this->Paginator->next(' >> ' . __('next'));
        ?>
        </ul>
    </nav>
    <?php else: ?>
    <div class="row my-5">
        <div class="col text-center lead"><?php echo __('No articles'); ?></div>
    </div>
    <?php endif; ?>
</div>
