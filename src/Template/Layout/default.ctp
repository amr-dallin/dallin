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
<?php echo $this->Html->docType(); ?>
<html lang="en">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php echo $this->Html->meta('icon'); ?>
        <?php echo $this->Html->meta('author', 'Марат Даллин'); ?>
        <?php echo $this->Html->meta('copyright', 'Все права принадлежат Марату Даллину.'); ?>
        <?php echo $this->fetch('meta'); ?>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
        <?php echo $this->Html->css('main'); ?>
        <?php echo $this->fetch('css') ?>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125957272-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-125957272-1');
        </script>

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter50391937 = new Ya.Metrika2({
                            id: 50391937,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true,
                            webvisor: true
                        });
                    } catch (e) {
                    }
                });

                var n = d.getElementsByTagName("script")[0],
                        s = d.createElement("script"),
                        f = function () {
                            n.parentNode.insertBefore(s, n);
                        };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/tag.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks2");
        </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/50391937" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <title><?php echo $this->fetch('title'); ?></title>
</head>
<body>
        <?php echo $this->fetch('header'); ?>

    <main role="main">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
    </main>
        <?php echo $this->element('footer'); ?>

        <?php echo $this->Html->script('/vendor/jquery-slim.min'); ?>
        <?php echo $this->Html->script('/vendor/popper.min'); ?>
        <?php echo $this->Html->script('/vendor/bootstrap-4.1.2/dist/js/bootstrap.min'); ?>
        <?php echo $this->fetch('script'); ?>
        <?php echo $this->fetch('script1'); ?>    
</body>
</html>