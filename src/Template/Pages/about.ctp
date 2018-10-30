<?php
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
echo $this->element('header', ['menu' => 'about']);
$this->end();

$this->start('css');
echo $this->Html->css([
    '/vendor/zoom.js/css/zoom'
]);
$this->end();

$this->start('script');
echo $this->Html->script([
    '/vendor/zoom.js/js/zoom',
]);
$this->end();

echo $page->body;
?>