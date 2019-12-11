<?php
$this->assign('meta', $this->MetaRender->init($page)->render());
$this->set('menu', 'posts');
?>

<div class="jumbotron jumbotron-fluid bg-light border-bottom py-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <h1 class="mt-4 text-center"><?= h($page->title) ?></h1>
                <div><?= $page->body ?></div>
                <?= $this->element('post_categories_menu', ['services' => $services]); ?>
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
                        <time datetime="<?php echo $post->date_created->format('Y-m-d'); ?>">
                            <?php echo $this->Time->i18nFormat($post->date_created, 'd MMMM Y'); ?>
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
    <?= $this->element('pagination') ?>
    <?php else: ?>
    <div class="row my-5">
        <div class="col text-center lead"><?php echo __('No articles'); ?></div>
    </div>
    <?php endif; ?>
</div>