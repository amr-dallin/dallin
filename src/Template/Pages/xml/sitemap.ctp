<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php
            echo $this->Url->build([
                'controller' => 'Pages', 'action' => 'display'
            ], true);
            ?></loc>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php 
            echo $this->Url->build([
                'controller' => 'Posts', 'action' => 'index'
            ], true);
            ?></loc>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php
            echo $this->Url->build([
                'controller' => 'Projects', 'action' => 'index'
            ], true);
            ?></loc>
        <priority>0.8</priority>
    </url>
    
    <?php foreach ($pages as $page): ?>
    <url>
        <loc><?php
            echo $this->Url->build([
                'controller' => 'Pages', 
                'action' => 'view', 
                'slug' => h($page->slug)
            ], true);
            ?></loc>
    </url>
    <?php endforeach; ?>
  
    <?php foreach ($posts as $post): ?>
    <url>
        <loc><?php
            echo $this->Url->build([
                'controller' => 'Posts', 
                'action' => 'view', 
                'slug' => h($post->slug)
            ], true);
            ?></loc>
    </url>
    <?php endforeach; ?>
    
    <?php foreach ($projects as $project): ?>
    <url>
        <loc><?php
            echo $this->Url->build([
                'controller' => 'Projects', 
                'action' => 'view', 
                'slug' => h($project->slug)
            ], true);
            ?></loc>
    </url>
    <?php endforeach; ?>
</urlset>

