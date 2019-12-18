<?php
$this->assign('meta', $this->MetaRender->init($service)->render());
?>

<article class="article">
    <div class="jumbotron jumbotron-fluid bg-light">
        <div class="container py-0">
            <div class="row justify-content-center">
                <div class="col col-md-11 col-lg-10">
                    <header>
                        <h1 class="text-md-center"><?= h($service->title) ?></h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?= $service->body ?>
                <hr/>
            </div>
        </div>

        <?php if (!empty($posts)): ?>
        <div class="row justify-content-center mt-4">
            <div class="col col-md-9 col-lg-8 bg-light p-4">
                <h5 class="h4 mb-4 border-bottom pb-2"><?= __('Related Publications') ?></h5>
                <?php foreach($posts as $post): ?>
                <article class="article">
                    <header class="mb-2">
                        <h6 class="mb-1">
                            <?php
                            echo $this->Html->link(
                                h($post->title),
                                ['_name' => 'post_view', 'slug' => h($post->slug)],
                                ['class' => 'header-link', 'title' => h($post->title)]
                            );
                            ?>
                        </h6>
                        <div class="article-date">
                            <i class="far fa-calendar-alt"></i>
                            <time datetime="<?php echo $post->date_created->format('Y-m-d'); ?>">
                                <?php echo $this->Time->i18nFormat($post->date_created, 'd MMMM Y'); ?>
                            </time>
                        </div>
                    </header>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</article>