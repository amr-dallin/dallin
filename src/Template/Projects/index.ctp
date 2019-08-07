<?php
$title = h($page->title);

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
            'url' => $page->image
        ],
        'url' => $this->Url->build(['action' => 'index'], true)
    ],
    'twitter' => [
        'card' => 'summary_large_image'
    ],
    'canonical' => $this->Url->build(['action' => 'index'], true)
]);
$this->end();

$this->set('menu', 'projects');
?>

<div class="jumbotron jumbotron-fluid bg-light border-bottom py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <?php echo $page->body; ?>
            </div>
        </div>
    </diV>
</div>

<div class="container">
    <?php if ($this->request['paging']['Projects']['count'] > 0): ?>
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8 p-2">
            <?php foreach($projects as $key => $project): ?>
            <article class="article">
                <div class="d-flex align-items-stretch">
                    <div class="flex-grow-1 order-2 ml-2">
                        <header class="mb-2">
                            <h2 class="mb-1">
                                <?php
                                echo $this->Html->link(h($project->heading),
                                    ['action' => 'view', 'slug' => h($project->slug)],
                                    [
                                        'class' => 'header-link',
                                        'title' => h($project->heading)
                                    ]
                                );
                                ?>
                            </h2>
                        </header>
                        <footer class="p-0">
                            <?php if (!empty($project->url)): ?>
                            <div class="article-date">
                                <i class="fas fa-external-link-alt fa-sm text-primary"></i>
                                <a href="<?php h($project->url); ?>" target="_blank"><?php h($project->url); ?></a>
                            </div>
                            <?php endif; ?>
                        </footer>
                        <p class="mb-3"><?php echo h($project->description); ?></p>
                    </div>
                    <?php if (!empty($project->image)): ?>
                    <div class="w-30 order-1 d-none d-lg-block mt-2 mr-2">
                        <img src="<?php echo h($project->image); ?>" class="img-fluid" />
                    </div>
                    <?php endif; ?>
                </div>
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
        <div class="col text-center lead"><?php echo __('No projects'); ?></div>
    </div>
    <?php endif; ?>
</div>