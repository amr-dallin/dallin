<?php
$this->assign('meta', $this->MetaRender->init($service->service_posts_page)->render());
$this->set('menu', 'posts');
?>

<div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-11 col-lg-10 text-md-center">
                <h1><?= h($service->service_posts_page->title) ?></h1>
                <p class="lead mb-3 text-md-center"><?= strip_tags($service->service_posts_page->body) ?></p>
                <p class="text-md-center small">
                    <mark><?= h($service->slogan) ?></mark>
                    <?php
                    echo $this->Html->link(
                        __('More details'),
                        ['_name' => 'service_view', 'slug' => h($service->slug)],
                        ['class' => 'ml-1']
                    );
                    ?>
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-10 col-lg-8">
                <?php
                echo $this->element(
                    'post_categories_menu',
                    [
                        'services' => $services,
                        'slug' => h($service->slug)
                    ]
                );
                ?>
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
                    'share' => false
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