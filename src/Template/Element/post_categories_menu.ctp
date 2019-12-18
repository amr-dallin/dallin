<?php if (!empty($services)): ?>
<nav class="nav justify-content-md-center menu-services">
    <?php
    if (!isset($slug)) {
        echo $this->Html->tag(
            'span',
            __('All'),
            ['class' => 'pl-0 pb-0 pb-md-1 pl-md-3 text-md-center nav-link active']
        );
    } else {
        echo $this->Html->link(
            __('All'),
            ['_name' => 'posts'],
            [
                'class' => 'pl-0 pb-0 pb-md-1 pl-md-3 text-md-center nav-link',
                'title' => __('All publications')
            ]
        );
    }
    foreach($services as $service) {
        if (isset($slug) && $slug === h($service->slug)) {
            echo $this->Html->tag(
                'span',
                h($service->service_posts_page->title),
                ['class' => 'pl-0 pb-0 pb-md-1 pl-md-3 text-md-center nav-link active']
            );
        } else {
            echo $this->Html->link(
                h($service->service_posts_page->title),
                ['_name' => 'posts_service', 'service_slug' => h($service->slug)],
                [
                    'class' => 'pl-0 pb-0 pb-md-1 pl-md-3 text-md-center nav-link',
                    'title' => h($service->service_posts_page->title)
                ]
            );
        }
    }
    ?>
</nav>
<?php endif; ?>