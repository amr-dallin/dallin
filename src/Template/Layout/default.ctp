<?php
echo $this->Html->docType();
?>
<html lang="en">
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

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <!--
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125957272-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-125957272-1');
        </script>
        -->

        <!-- Yandex.Metrika counter -->
        <!--
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