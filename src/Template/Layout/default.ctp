<?php echo $this->Html->docType(); ?>
<html lang="ru_RU" prefix="http://ogp.me/ns#">
    <head>
        <?php
        echo $this->fetch('meta');
        echo $this->Html->css(['main', '/vendor/zoom.js/css/zoom']);
        echo $this->fetch('css');
        ?>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
    </head>
    <body>
        <?php echo $this->element('header'); ?>
        <main role="main">
            <?php
            echo $this->Flash->render();
            echo $this->fetch('content');
            ?>
        </main>

        <?php
        echo $this->element('footer');

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