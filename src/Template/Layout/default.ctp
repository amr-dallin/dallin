<?php echo $this->Html->docType(); ?>
<html lang="ru_RU" prefix="http://ogp.me/ns#">
    <head>
        <?= $this->Html->charset() ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?= $this->fetch('meta') ?>
        <link rel="icon" href="/img/favicon-16x16.png" type="image/png" sizes="16x16">
        <link rel="shortcut icon" href="/img/favicon-16x16.png" type="image/png" sizes="16x16">
        <link rel="icon" href="/img/favicon-32x32.png" type="image/png" sizes="32x32">
        <link rel="shortcut icon" href="/img/favicon-32x32.png" type="image/png" sizes="32x32">
        <link rel="apple-touch-icon" href="/img/touch-icon-iphone.png" type="image/png">
        <link rel="apple-touch-icon" href="/img/touch-icon-ipad.png" type="image/png" sizes="76x76">
        <link rel="apple-touch-icon" href="/img/touch-icon-iphone-retina.png" type="image/png" sizes="120x120">
        <link rel="apple-touch-icon" href="/img/touch-icon-ipad-retina.png" type="image/png" sizes="152x152">
        <?= $this->Html->meta('icon') ?>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
        <?= $this->Html->css(['main', '/vendor/zoom.js/css/zoom']) ?>
        <?= $this->fetch('css') ?>
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
            'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js',
            '/vendor/popper.min',
            '/vendor/bootstrap-4.1.2/dist/js/bootstrap.min',
            '/vendor/zoom.js/js/zoom',
            'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js',
            'https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels'
        ]);

        echo $this->fetch('script');
        ?>

        <script type="text/javascript">
            $(document).ready(function () {
                moment.locale('ru');

                Chart.defaults.global.defaultFontFamily = "'Open Sans', 'Helvetica', 'Arial', sans-serif";
                Chart.defaults.global.defaultFontSize = 13;

                Chart.defaults.global.title.fontSize = 18;
                Chart.defaults.global.title.fontStyle = 'normal';
                Chart.defaults.global.title.padding = 20;
            });
        </script>

        <?= $this->fetch('script-code') ?>
    </body>
</html>