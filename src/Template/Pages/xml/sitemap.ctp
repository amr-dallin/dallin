<?php
?>
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo $this->Url->build(['controller' => 'Pages', 'action' => 'display'], true); ?></loc>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo $this->Url->build(['controller' => 'Pages', 'action' => 'about'], true); ?></loc>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo $this->Url->build(['controller' => 'Posts', 'action' => 'index'], true); ?></loc>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo $this->Url->build(['controller' => 'Books', 'action' => 'index'], true); ?></loc>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo $this->Url->build(['controller' => 'Projects', 'action' => 'index'], true); ?></loc>
        <priority>0.8</priority>
    </url>
  
    <?php foreach ($posts as $post): ?>
    <url>
        <loc><?php echo $this->Url->build(['controller' => 'Posts', 'action' => 'view', 'alias' => h($post->alias)], true); ?></loc>
    </url>
    <?php endforeach; ?>
    
    <?php foreach ($books as $book): ?>
    <url>
        <loc><?php echo $this->Url->build(['controller' => 'Books', 'action' => 'view', 'alias' => h($book->alias)], true); ?></loc>
    </url>
    <?php endforeach; ?>
</urlset>

