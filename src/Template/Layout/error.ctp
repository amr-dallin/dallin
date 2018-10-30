<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
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