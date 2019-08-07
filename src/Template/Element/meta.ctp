<?php
use Cake\Core\Configure;

echo $this->Html->charset() . PHP_EOL;
echo $this->Html->meta('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no') . PHP_EOL;
echo $this->Html->meta('Resource-type', 'Document') . PHP_EOL;
echo $this->Html->meta('author', Configure::read('Settings.Site.author')) . PHP_EOL;
echo $this->Html->meta('copyright', Configure::read('Settings.Site.copyright')) . PHP_EOL;
echo $this->Html->meta('icon') . PHP_EOL;
echo $this->Html->tag('title', $title) . PHP_EOL;
?>

<link rel="icon" href="/img/favicon-16x16.png" type="image/png" sizes="16x16">
<link rel="shortcut icon" href="/img/favicon-16x16.png" type="image/png" sizes="16x16">
<link rel="icon" href="/img/favicon-32x32.png" type="image/png" sizes="32x32">
<link rel="shortcut icon" href="/img/favicon-32x32.png" type="image/png" sizes="32x32">
<link rel="apple-touch-icon" href="/img/touch-icon-iphone.png" type="image/png">
<link rel="apple-touch-icon" href="/img/touch-icon-ipad.png" type="image/png" sizes="76x76">
<link rel="apple-touch-icon" href="/img/touch-icon-iphone-retina.png" type="image/png" sizes="120x120">
<link rel="apple-touch-icon" href="/img/touch-icon-ipad-retina.png" type="image/png" sizes="152x152">

<?php
// Begin meta keywords and description -----------------------------
if (isset($meta['keywords'])) {
    echo $this->Html->meta('keywords', $meta['keywords']) . PHP_EOL;
}
if (isset($meta['description'])) {
    echo $this->Html->meta('description', $meta['description']) . PHP_EOL;
}
// End meta keywords and description -----------------------------

// Begin Open Graph -----------------------------
$type = 'website';
if (isset($og_type) && !empty($og_type)) {
    $type = $og_type;
}
echo $this->Html->meta(['property' => 'og:type', 'content' => $type]) . PHP_EOL;

echo $this->Html->meta(['property' => 'og:title', 'content' => $og['title']]) . PHP_EOL;
echo $this->Html->meta(['property' => 'og:description', 'content' => $og['description']]) . PHP_EOL;
echo $this->Html->meta(['property' => 'og:url', 'content' => $og['url']]) . PHP_EOL;

$og_image = $this->Url->build('/img/thumbnail.png', true);
if (isset($og['image']['url'])) {
    $og_image = $og['image']['url'];
}

echo $this->Html->meta(['property' => 'og:image', 'content' => $og_image]) . PHP_EOL;
echo $this->Html->meta(['property' => 'og:image:secure_url', 'content' => $og_image]) . PHP_EOL;
echo $this->Html->meta(['property' => 'og:image:width', 'content' => 1200]) . PHP_EOL;
echo $this->Html->meta(['property' => 'og:image:width', 'content' => 630]) . PHP_EOL;

echo $this->Html->meta(['propery' => 'og:site_name', 'content' => Configure::read('Settings.Site.title')]) . PHP_EOL;
echo $this->Html->meta(['propery' => 'og:locale', 'content' => Configure::read('App.defaultLocale')]) . PHP_EOL;
// End Open Graph -----------------------------

// Begin twitter cards -----------------------------
$twitter_card = 'summary';
if (isset($twitter['card']) && !empty($twitter['card'])) {
    $twitter_card = $twitter['card'];
}
echo $this->Html->meta(['name' => 'twitter:card', 'content' => $twitter_card]) . PHP_EOL;

echo $this->Html->meta([
    'name' => 'twitter:site',
    'content' => '@' . Configure::read('Settings.Contacts.twitter')
]) . PHP_EOL;

echo $this->Html->meta([
    'name' => 'twitter:creator',
    'content' => '@' . Configure::read('Settings.Contacts.twitter')
]) . PHP_EOL;
// End twitter cards -----------------------------


echo $this->Html->meta([
    'property' => 'fb:app_id',
    'content' => Configure::read('Settings.App.facebook')
]) . PHP_EOL;

echo $this->Html->meta('canonical', $canonical) . PHP_EOL;