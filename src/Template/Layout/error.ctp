<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">-->
        <?php echo $this->Html->css('error'); ?>

        <title><?php echo $this->fetch('title'); ?></title>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="mt-5 mb-5 text-center">
                    <?php
                    echo $this->Html->image('logo.png', [
                        'url' => ['controller' => 'Pages', 'action' => 'display'],
                        'class' => 'img-fluid'
                    ]);
                    ?>
                </div>
                <div class="col-md-12 mt-5">
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </body>
</html>