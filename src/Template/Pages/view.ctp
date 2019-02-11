<?php
$this->assign('title', h($page->title));
$this->start('meta');
echo $this->element('meta', [
    'title' => h($page->title),
    'url' => $this->Url->build(['slug' => h($page->slug)], true),
    'og_image' => $this->Url->build('/assets/Files/dc/af/15/6a468e78e2924ef29f3d05652699b9b4/6a468e78e2924ef29f3d05652699b9b4.jpg', true),
    'meta_keywords' => h($page->meta_keywords),
    'meta_description' => h($page->meta_description)
]);
$this->end();

$this->set('menu', h($page->slug));
?>

<article>
    <?php echo $page->body; ?>
</article>