<?php
use Cake\Core\Configure;

$title = h($page->title);
$body = $page->body;

if (isset($tag)) {
    $label = '#' . h($tag->label);

    $title = $label . ' | ' . Configure::read('Settings.Site.author');
    $body = $this->Html->tag('h1', $label) .
        $this->Html->tag('p', h($tag->description), ['class' => 'lead mb-0']);

    $breadcrumbs = [
        ['title' => __('Blog'), 'url' => ['action' => 'index']],
        ['title' => $label]
    ];
    $this->set('breadcrumbs', $breadcrumbs);
}

$this->start('meta');
echo $this->element('meta', [
    'title' => $title,
    'meta' => [
        'keywords' => h($page->meta_keywords),
        'description' => h($page->meta_description)
    ],
    'og' => [
        'title' => $title,
        'description' => h($page->meta_description),
        'image' => [
            //'url' => $this->Url->build($this->Image->imageUrl($page->image), true)
        ],
        'url' => $this->Url->build(['action' => 'index'], true)
    ],
    'twitter' => [
        'card' => 'summary_large_image'
    ],
    'canonical' => $this->Url->build(['action' => 'index'], true)
]);
$this->end();

$this->set('menu', 'posts');
?>

<div class="jumbotron jumbotron-fluid bg-light border-bottom py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <?php echo $this->element('breadcrumbs'); ?>
                <?php echo $body; ?>
            </div>
        </div>
    </diV>
</div>

<div class="container">
    <?php if ($this->request->getParam('paging.Posts.count') > 0): ?>
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