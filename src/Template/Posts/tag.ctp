<?php
$this->assign(
    'meta',
    $this->MetaRender
        ->setTitle(h($tag->label))
        ->render()
);
$this->set('menu', 'posts');
?>

<div class="jumbotron jumbotron-fluid bg-light border-bottom py-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <h1><?= h($tag->label) ?></h1>
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
                        echo $this->Html->link(h($post->title),
                            ['action' => 'view', 'slug' => h($post->slug)],
                            ['class' => 'header-link', 'title' => h($post->title)]
                        );
                        ?>
                    </h2>
                    <div class="article-date">
                        <i class="far fa-calendar-alt"></i>
                        <time datetime="<?= $post->date_created->format('Y-m-d') ?>">
                            <?= $this->Time->i18nFormat($post->date_created, 'd MMMM Y') ?>
                        </time>
                    </div>
                </header>
                <p class="mb-3"><?= $post->lead ?></p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
    <?= $this->element('pagination') ?>
    <?php else: ?>
    <div class="row my-5">
        <div class="col text-center lead"><?= __('No articles') ?></div>
    </div>
    <?php endif; ?>
</div>