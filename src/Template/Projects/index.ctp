<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
$this->start('title');
echo h($page->title);
$this->end();

$this->start('meta');
echo $this->element('meta', [
    'meta_keywords' => h($page->meta_keywords),
    'meta_description' => h($page->meta_description)
]);
$this->end();

$this->start('header');
echo $this->element('header', ['menu' => 'projects']);
$this->end();

echo $page->body;
?>




