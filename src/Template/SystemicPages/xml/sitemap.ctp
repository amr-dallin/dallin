<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= $this->Url->build(['_name' => 'home'], true) ?></loc>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= $this->Url->build(['_name' => 'posts'], true) ?></loc>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= $this->Url->build(['_name' => 'projects'], true) ?></loc>
        <priority>0.8</priority>
    </url>

    <?php foreach($pages as $page): ?>
    <url>
        <loc><?= $this->Url->build(['_name' => 'page_view', 'slug' => h($page->slug)], true) ?></loc>
    </url>
    <?php endforeach; ?>

    <?php foreach($posts as $post): ?>
    <url>
        <loc><?= $this->Url->build(['_name' => 'post_view', 'slug' => h($post->slug)], true) ?></loc>
    </url>
    <?php endforeach; ?>

    <?php foreach($services as $service): ?>
    <url>
        <loc><?= $this->Url->build(['_name' => 'posts_service', 'service_slug' => h($service->slug)], true) ?></loc>
    </url>
    <url>
        <loc><?= $this->Url->build(['_name' => 'service_view', 'slug' => h($service->slug)], true) ?></loc>
    </url>
    <?php endforeach; ?>

    <?php foreach($projects as $project): ?>
    <url>
        <loc><?= $this->Url->build(['_name' => 'project_view', 'slug' => h($project->slug)], true) ?></loc>
    </url>
    <?php endforeach; ?>
</urlset>