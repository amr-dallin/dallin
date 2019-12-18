<!DOCTYPE html>
<html lang="en">
    <head>
        <?= $this->Html->charset() ?>
        <title><?= $this->fetch('title') ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <!-- Call App Mode on ios devices -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Remove Tap Highlight on Windows Phone IE -->
        <meta name="msapplication-tap-highlight" content="no">
        <!-- base css -->
        <?= $this->Html->css('vendors.bundle') ?>
        <?= $this->Html->css('app.bundle') ?>
        <!-- Place favicon.ico in the root directory -->
        <?= $this->Html->meta('icon') ?>
        <link rel="icon" href="/img/favicon-16x16.png" type="image/png" sizes="16x16">
        <link rel="shortcut icon" href="/img/favicon-16x16.png" type="image/png" sizes="16x16">
        <link rel="icon" href="/img/favicon-32x32.png" type="image/png" sizes="32x32">
        <link rel="shortcut icon" href="/img/favicon-32x32.png" type="image/png" sizes="32x32">
        <link rel="apple-touch-icon" href="/img/touch-icon-iphone.png" type="image/png">
        <link rel="apple-touch-icon" href="/img/touch-icon-ipad.png" type="image/png" sizes="76x76">
        <link rel="apple-touch-icon" href="/img/touch-icon-iphone-retina.png" type="image/png" sizes="120x120">
        <link rel="apple-touch-icon" href="/img/touch-icon-ipad-retina.png" type="image/png" sizes="152x152">
        <!-- Optional: page related CSS-->
        <?= $this->Html->css('page-login') ?>
    </head>
    <body>
        <div class="blankpage-form-field">
            <div class="login-footer">
                <?= $this->Flash->render() ?>
            </div>
            <?= $this->fetch('content') ?>
        </div>
        <?= $this->Html->script('vendors.bundle') ?>
        <?= $this->Html->script('app.bundle') ?>
        <!-- Page related scripts -->
    </body>
</html>
