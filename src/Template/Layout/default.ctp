<?php echo $this->Html->docType(); ?>
<html lang="en" prefix="http://ogp.me/ns#">
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

        <!-- START WWW.UZ TOP-RATING -->
        <script language="javascript" type="text/javascript">
        <!--
        top_js="1.0";top_r="id=43401&r="+escape(document.referrer)+"&pg="+escape(window.location.href);document.cookie="smart_top=1; path=/"; top_r+="&c="+(document.cookie?"Y":"N")
        //-->
        </script>
        <script language="javascript1.1" type="text/javascript">
        <!--
        top_js="1.1";top_r+="&j="+(navigator.javaEnabled()?"Y":"N")
        //-->
        </script>
        <script language="javascript1.2" type="text/javascript">
        <!--
        top_js="1.2";top_r+="&wh="+screen.width+'x'+screen.height+"&px="+
        (((navigator.appName.substring(0,3)=="Mic"))?screen.colorDepth:screen.pixelDepth)
        //-->
        </script>
        <script language="javascript1.3" type="text/javascript">
        <!--
        top_js="1.3";
        //-->
        </script>
        <script language="JavaScript" type="text/javascript">
        <!--
        top_rat="&col=340F6E&t=ffffff&p=BD6F6F";top_r+="&js="+top_js+"";document.write('<img src="https://cnt0.www.uz/counter/collect?'+top_r+top_rat+'" class=d-none width=0 height=0 border=0 />')//-->
        </script>
        <noscript><img height=0 src="https://cnt0.www.uz/counter/collect?id=43401&pg=http%3A//uzinfocom.uz&col=340F6E&t=ffffff&p=BD6F6F" class="d-none" width=0 border=0 /></noscript>
        <!-- FINISH WWW.UZ TOP-RATING -->

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