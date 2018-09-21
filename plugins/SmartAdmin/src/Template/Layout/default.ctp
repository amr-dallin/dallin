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
<!DOCTYPE html>
<html lang="en-us">
    <head>
        <?php echo $this->Html->charset() ?>
        <title><?php echo $this->fetch('title') ?></title>
        <meta name="robots" content="noindex">
        <?php echo $this->fetch('meta') ?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- #CSS Links -->
        <!-- Basic Styles -->
        <?php echo $this->Html->css(['bootstrap.min', 'font-awesome.min']) ?>

        <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
        <?php echo $this->Html->css(['smartadmin-production.min', 'smartadmin-production-plugins.min', 'smartadmin-skins.min']) ?>
        
        <?php echo $this->fetch('css') ?>

        <!-- We recommend you use "your_style.css" to override SmartAdmin
             specific styles this will also ensure you retrain your customization with each SmartAdmin update.
        <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

        <!-- #FAVICONS -->
        <?php echo $this->Html->meta('icon') ?>

        <!-- #GOOGLE FONT -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

        <!-- #APP SCREEN / ICONS -->
        <!-- Specifying a Webpage Icon for Web Clip 
                 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
        <link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

        <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <!-- Startup image for web apps -->
        <link rel="apple-touch-startup-image" href="img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
        <link rel="apple-touch-startup-image" href="img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
        <link rel="apple-touch-startup-image" href="img/splash/iphone.png" media="screen and (max-device-width: 320px)">

    </head>

    <!--

    TABLE OF CONTENTS.
    
    Use search to find needed section.
    
    ===================================================================
    
    |  01. #CSS Links                |  all CSS links and file paths  |
    |  02. #FAVICONS                 |  Favicon links and file paths  |
    |  03. #GOOGLE FONT              |  Google font link              |
    |  04. #APP SCREEN / ICONS       |  app icons, screen backdrops   |
    |  05. #BODY                     |  body tag                      |
    |  06. #HEADER                   |  header tag                    |
    |  07. #PROJECTS                 |  project lists                 |
    |  08. #TOGGLE LAYOUT BUTTONS    |  layout buttons and actions    |
    |  09. #MOBILE                   |  mobile view dropdown          |
    |  10. #SEARCH                   |  search field                  |
    |  11. #NAVIGATION               |  left panel & navigation       |
    |  12. #MAIN PANEL               |  main panel                    |
    |  13. #MAIN CONTENT             |  content holder                |
    |  14. #PAGE FOOTER              |  page footer                   |
    |  15. #SHORTCUT AREA            |  dropdown shortcuts area       |
    |  16. #PLUGINS                  |  all scripts and plugins       |
    
    ===================================================================
    
    -->

    <!-- #BODY -->
    <!-- Possible Classes

            * 'smart-style-{SKIN#}'
            * 'smart-rtl'         - Switch theme mode to RTL
            * 'menu-on-top'       - Switch to top navigation (no DOM change required)
            * 'no-menu'			  - Hides the menu completely
            * 'hidden-menu'       - Hides the main menu but still accessable by hovering over left edge
            * 'fixed-header'      - Fixes the header
            * 'fixed-navigation'  - Fixes the main menu
            * 'fixed-ribbon'      - Fixes breadcrumb
            * 'fixed-page-footer' - Fixes footer
            * 'container'         - boxed layout mode (non-responsive: will not work with fixed-navigation & fixed-ribbon)
    -->
    <body class="">

        <!-- #HEADER -->
        <?php echo $this->element('header'); ?>
        <!-- END HEADER -->

        <!-- #NAVIGATION -->
        <!-- Left panel : Navigation area -->
        <!-- Note: This width of the aside area can be adjusted through LESS/SASS variables -->
        <?php echo $this->fetch('navigation'); ?>
        <!-- END NAVIGATION -->

        <!-- #MAIN PANEL -->
        <div id="main" role="main">

            <!-- RIBBON -->
            <?php echo $this->fetch('ribbon'); ?>
            <!-- END RIBBON -->
            
            

            <!-- #MAIN CONTENT -->
            <div id="content">
                <?php echo $this->Flash->render() ?>
                <?php echo $this->fetch('title-heading') ?>
                <?php echo $this->fetch('content') ?>
            </div>
            
            <!-- END #MAIN CONTENT -->

        </div>
        <!-- END #MAIN PANEL -->

        <!-- #PAGE FOOTER -->
        <?php echo $this->element('footer'); ?>
        <!-- END FOOTER -->

        <!-- #SHORTCUT AREA : With large tiles (activated via clicking user name tag)
                 Note: These tiles are completely responsive, you can add as many as you like -->
        <?php echo $this->element('footer'); ?>
        <!-- END SHORTCUT AREA -->

        <!--================================================== -->

        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
        <script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->


        <!-- #PLUGINS -->
        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            if (!window.jQuery) {
                document.write('<script src="js/libs/jquery-3.2.1.min.js"><\/script>');
            }
        </script>

        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script>
            if (!window.jQuery.ui) {
                document.write('<script src="js/libs/jquery-ui.min.js"><\/script>');
            }
        </script>

           <!-- IMPORTANT: APP CONFIG -->
    <?php echo $this->Html->script('app.config'); ?>

        <!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
    <?php echo $this->Html->script('plugin/jquery-touch/jquery.ui.touch-punch.min'); ?>

        <!-- BOOTSTRAP JS -->
    <?php echo $this->Html->script('bootstrap/bootstrap.min'); ?>

        <!-- CUSTOM NOTIFICATION -->
    <?php echo $this->Html->script('notification/SmartNotification.min'); ?>

        <!-- JARVIS WIDGETS -->
    <?php echo $this->Html->script('smartwidgets/jarvis.widget.min'); ?>

        <!-- EASY PIE CHARTS -->
    <?php echo $this->Html->script('plugin/easy-pie-chart/jquery.easy-pie-chart.min'); ?>

        <!-- SPARKLINES -->
    <?php echo $this->Html->script('plugin/sparkline/jquery.sparkline.min'); ?>

        <!-- JQUERY VALIDATE -->
    <?php echo $this->Html->script('plugin/jquery-validate/jquery.validate.min'); ?>

        <!-- JQUERY MASKED INPUT -->
    <?php echo $this->Html->script('plugin/masked-input/jquery.maskedinput.min'); ?>

        <!-- JQUERY SELECT2 INPUT -->
    <?php echo $this->Html->script('plugin/select2/select2.min'); ?>

        <!-- JQUERY UI + Bootstrap Slider -->
    <?php echo $this->Html->script('plugin/bootstrap-slider/bootstrap-slider.min'); ?>

        <!-- browser msie issue fix -->
    <?php echo $this->Html->script('plugin/msie-fix/jquery.mb.browser.min'); ?>

        <!-- FastClick: For mobile devices -->
    <?php echo $this->Html->script('plugin/fastclick/fastclick.min'); ?>

        <!--[if IE 8]>

        <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

        <![endif]-->

        <!-- MAIN APP JS FILE -->
    <?php echo $this->Html->script('app.min'); ?>

        <!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
        <!-- Voice command : plugin -->
    <?php echo $this->Html->script('speech/voicecommand.min'); ?>

        <!-- PAGE RELATED PLUGIN(S) -->


    <?php echo $this->fetch('script'); ?>
        <script type="text/javascript">
            $(document).ready(function () {
                pageSetUp();
            });
        </script>
    <?php echo $this->fetch('script1'); ?>
    </body>

</html>
