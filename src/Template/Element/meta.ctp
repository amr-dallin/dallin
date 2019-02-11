<?php
use Cake\Core\Configure;

echo $this->Html->charset() . PHP_EOL;
echo $this->Html->meta('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no') . PHP_EOL;
echo $this->Html->meta('Resource-type', 'Document') . PHP_EOL;
echo $this->Html->meta('author', Configure::read('Settings.Site.author')) . PHP_EOL;
echo $this->Html->meta('copyright', Configure::read('Settings.Site.copyright')) . PHP_EOL;

if (isset($meta_keywords) && !empty($meta_keywords)) {
    echo $this->Html->meta('keywords', $meta_keywords) . PHP_EOL;
}
echo $this->Html->meta('description', $meta_description) . PHP_EOL;

$type = 'website';
if (isset($og_type) && !empty($og_type)) {
    $type = $og_type;
}
echo $this->Html->meta(['property' => 'og:type', 'content' => $type]) . PHP_EOL;
echo $this->Html->meta(['property' => 'og:title', 'content' => $title]) . PHP_EOL;
echo $this->Html->meta(['property' => 'og:url', 'content' => $url]) . PHP_EOL;

if (!isset($og_image) || empty($og_image)) {
    $og_image = $this->Url->build('/img/thumbnail.png', true);
}
echo $this->Html->meta(['property' => 'og:image', 'content' => $og_image]) . PHP_EOL;

if (!isset($og_description) || empty($og_description)) {
    $og_description = $meta_description;
}
echo $this->Html->meta(['property' => 'og:description', 'content' => $og_description]) . PHP_EOL;


$card = 'summary';
if (isset($twitter_card) && !empty($twitter_card)) {
    $card = $twitter_card;
}
echo $this->Html->meta(['name' => 'twitter:card', 'content' => $card]) . PHP_EOL;
echo $this->Html->meta([
    'name' => 'twitter:site', 
    'content' => '@' . Configure::read('Settings.Contacts.twitter')
]) . PHP_EOL;

echo $this->Html->meta([
    'name' => 'twitter:creator', 
    'content' => '@' . Configure::read('Settings.Contacts.twitter')
]) . PHP_EOL;


echo $this->Html->meta([
    'property' => 'fb:app_id', 
    'content' => Configure::read('Settings.App.facebook')
]) . PHP_EOL;

echo $this->Html->meta('canonical', $url) . PHP_EOL;