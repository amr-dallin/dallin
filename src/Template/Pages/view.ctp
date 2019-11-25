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
        'url' => $this->Url->build(['slug' => h($page->slug)], true)
    ],
    'canonical' => $this->Url->build(['slug' => h($page->slug)], true)
]);
$this->end();

$this->set('menu', h($page->slug));
?>

<article>
    <?php echo $page->body; ?>
</article>