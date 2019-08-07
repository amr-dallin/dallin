<?php echo $this->Html->docType(); ?>
<html lang="ru_RU" prefix="http://ogp.me/ns#">
    <head>
        <?php
        echo $this->fetch('meta');
        echo $this->Html->css(['main', '/vendor/zoom.js/css/zoom']);
        echo $this->fetch('css');
        ?>
		<!-- Icons -->
		<link href="/img/thumbnail.png" type="image/png" rel="image_src">
		<link rel="apple-touch-icon" href="/img/touch-icon-iphone.png" type="image/png">
		<link rel="apple-touch-icon" href="/img/touch-icon-ipad.png" type="image/png" sizes="76x76">
		<link rel="apple-touch-icon" href="/img/touch-icon-iphone-retina.png" type="image/png" sizes="120x120">
		<link rel="apple-touch-icon" href="/img/touch-icon-ipad-retina.png" type="image/png" sizes="152x152">
		<link rel="icon" href="/img/favicon-16x16.png" type="image/png" sizes="16x16">
		<link rel="icon" href="/img/favicon-32x32.png" type="image/png" sizes="32x32">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">

        <title><?php echo $this->fetch('title'); ?></title>
    </head>
    <body>
        <?php echo $this->element('header'); ?>
        <main role="main">
            <?php
            echo $this->Flash->render();
            echo $this->fetch('content');
            ?>
        </main>
        <?php echo $this->element('footer'); ?>

        <?php
        echo $this->Html->script([
            '/vendor/jquery-slim.min',
            '/vendor/popper.min',
            '/vendor/bootstrap-4.1.2/dist/js/bootstrap.min',
            '/vendor/zoom.js/js/zoom'
        ]);

        echo $this->fetch('script');
        echo $this->fetch('script-code');
        ?>
    </body>
</html>