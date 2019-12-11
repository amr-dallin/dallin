<?php
$this->assign('meta', $this->MetaRender->init($page)->render());
$this->set('menu', h($page->slug));
?>

<article><?= $page->body ?></article>