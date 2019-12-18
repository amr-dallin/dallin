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
        <?= $this->fetch('css') ?>

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
        <!--<link rel="stylesheet" media="screen, print" href="css/your_styles.css">-->
    </head>
    <body class="mod-bg-1 ">
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <aside class="page-sidebar">
                    <div class="page-logo">
                        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                            <span class="page-logo-text mr-1"><?= __('Control Panel') ?></span>
                            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                        </a>
                    </div>
                    <!-- BEGIN PRIMARY NAVIGATION -->
                    <?= $this->fetch('navigation') ?>
                    <!-- END PRIMARY NAVIGATION -->
                </aside>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <header class="page-header" role="banner">
                        <!-- we need this logo when user switches to nav-function-top -->
                        <div class="page-logo">
                            <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
                                <img src="/smart_admin/img/logo.png" alt="<?= __('Control Panel') ?>" aria-roledescription="logo">
                                <span class="page-logo-text mr-1"><?= __('Control Panel') ?></span>
                                <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
                                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
                            </a>
                        </div>
                        <!-- DOC: nav menu layout change shortcut -->
                        <div class="hidden-md-down dropdown-icon-menu position-relative">
                            <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
                                <i class="ni ni-menu"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
                                        <i class="ni ni-minify-nav"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
                                        <i class="ni ni-lock-nav"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- DOC: mobile button appears during mobile width -->
                        <div class="hidden-lg-up">
                            <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
                                <i class="ni ni-menu"></i>
                            </a>
                        </div>
                        <div class="search">
                            <form class="app-forms hidden-xs-down" role="search" action="page_search.html" autocomplete="off">
                                <input type="text" id="search-field" placeholder="Search for anything" class="form-control" tabindex="1">
                                <a href="#" onclick="return false;" class="btn-danger btn-search-close js-waves-off d-none" data-action="toggle" data-class="mobile-search-on">
                                    <i class="fal fa-times"></i>
                                </a>
                            </form>
                        </div>
                        <div class="ml-auto d-flex">
                            <!-- activate app search icon (mobile) -->
                            <div class="hidden-sm-up">
                                <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
                                    <i class="fal fa-search"></i>
                                </a>
                            </div>

                            <!-- app user menu -->
                            <div>
                                <a href="#" data-toggle="dropdown" class="header-icon d-flex align-items-center justify-content-center ml-2">
                                    <?= $this->Html->image('avatar.jpg', ['class' => 'profile-image rounded-circle']) ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'settings']) ?>" class="dropdown-item">
                                        <span data-i18n="drpdwn.settings"><?= __('Settings') ?></span>
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a href="#" class="dropdown-item" data-action="app-fullscreen">
                                        <span data-i18n="drpdwn.fullscreen"><?= __('Fullscreen') ?></span>
                                        <i class="float-right text-muted fw-n">F11</i>
                                    </a>
                                    <a href="#" class="dropdown-item" data-action="app-print">
                                        <span data-i18n="drpdwn.print"><?= __('Print') ?></span>
                                        <i class="float-right text-muted fw-n">Ctrl + P</i>
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item fw-500 pt-3 pb-3" href="<?= $this->Url->build(['_name' => 'logout']) ?>">
                                        <span data-i18n="drpdwn.page-logout"><?= __('Logout') ?></span>
                                        <span class="float-right fw-n">&commat;<?= $this->getRequest()->getSession()->read('Auth.User.username') ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                        <?= $this->fetch('breadcrumbs') ?>
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </main>
                    <!-- this overlay is activated only when mobile menu is triggered -->
                    <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
                    <!-- BEGIN Page Footer -->
                    <?= $this->element('footer') ?>
                    <!-- END Page Footer -->
                    <!-- BEGIN Shortcuts -->
                    <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <ul class="app-list w-auto h-auto p-0 text-left">
                                        <li>
                                            <a href="<?= $this->Url->build(['_name' => 'home']) ?>" class="app-list-item text-white border-0 m-0">
                                                <div class="icon-stack">
                                                    <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                                    <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                                    <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                                                </div>
                                                <span class="app-list-name"><?= __('Home') ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Shortcuts -->
                </div>
            </div>
        </div>
        <!-- END Page Wrapper -->
        <!-- BEGIN Quick Menu -->
        <nav class="shortcut-menu d-none d-sm-block">
            <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
            <label for="menu_open" class="menu-open-button ">
                <span class="app-shortcut-icon d-block"></span>
            </label>
            <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
                <i class="fal fa-arrow-up"></i>
            </a>
            <a href="<?= $this->Url->build(['_name' => 'logout']) ?>" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
                <i class="fal fa-sign-out"></i>
            </a>
            <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
                <i class="fal fa-expand"></i>
            </a>
        </nav>
        <!-- END Quick Menu -->

        <?= $this->Html->script('vendors.bundle') ?>
        <?= $this->Html->script('app.bundle') ?>
        <?= $this->fetch('script') ?>
        <?= $this->fetch('script-code') ?>

        <script>
            function postModal(url, title = null, message = null)
            {
                let modalTitle = '<?php __('Are you sure?') ?>';
                if (title) {
                    modalTitle = title;
                }

                let modalMessage = '';
                if (message) {
                    modalMessage = '<br/>' + message;
                }
                bootbox.confirm({
                    title: '<?= __('Critical action') ?>',
                    message: '<div class="alert alert-warning text-secondary mb-0">' +
                                '<div class="d-flex align-items-center">' +
                                    '<div class="alert-icon">' +
                                        '<span class="icon-stack icon-stack-md">' +
                                            '<i class="fal fa-exclamation-triangle icon-stack-3x color-warning-900"></i>' +
                                        '</span>' +
                                    '</div>' +
                                '<div class="flex-1 ml-2">' +
                                    '<span class="h5 color-warning-900">' + modalTitle + '</span>' +
                                    modalMessage +
                                '</div>' +
                            '</div>',
                    callback: function (result) {
                        if (result) {
                            let form = document.createElement('form');
                            form.action = url;
                            form.method = 'POST';
                            form.innerHTML = '<input type="hidden" name="_method" value="POST"/>' +
                                '<input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken') ?>"/>';
                            document.body.append(form);
                            form.submit();
                        }
                    }
                });
            }
        </script>
    </body>
</html>
