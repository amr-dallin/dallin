<?php echo $this->Html->docType(); ?>
<html lang="ru_RU" prefix="http://ogp.me/ns#">
    <head>
        <?php
        echo $this->fetch('meta');
        echo $this->Html->css(['main', '/vendor/zoom.js/css/zoom']);
        echo $this->fetch('css');
        ?>
        <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">-->
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

        <?php echo $this->fetch('script-code'); ?>
    </body>
</html>