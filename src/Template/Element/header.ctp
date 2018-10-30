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
<header>
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="col-md d-flex">
            <a class="navbar-brand" href="/">
                <img src="/img/logo.png" height="23" alt="">
            </a>

            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="col-12 col-sm-9 collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav m-auto">
                <?php
                if (!isset($menu)) {
                    $menu = [];
                }
                
                echo $this->Dallin->headerLink(
                    __('Home'),
                    ['controller' => 'pages', 'action' => 'display'],
                    [
                        'class' => 'nav-item nav-link',
                        'title' => __('Home'),
                        'alias' => 'home',
                        'menu' => $menu
                    ]
                );
                echo $this->Dallin->headerLink(
                    __('About Me'),
                    ['controller' => 'pages', 'action' => 'about'],
                    [
                        'class' => 'nav-item nav-link',
                        'title' => __('About Me'),
                        'alias' => 'about',
                        'menu' => $menu
                    ]
                );
                echo $this->Dallin->headerLink(
                    __('Blog'),
                    ['controller' => 'posts', 'action' => 'index'],
                    [
                        'class' => 'nav-item nav-link',
                        'title' => __('Blog'),
                        'alias' => 'blog',
                        'menu' => $menu
                    ]
                );
                echo $this->Dallin->headerLink(
                    __('Projects'),
                    ['controller' => 'projects', 'action' => 'index'],
                    [
                        'class' => 'nav-item nav-link',
                        'title' => __('Projects'),
                        'alias' => 'projects',
                        'menu' => $menu
                    ]
                );
                echo $this->Dallin->headerLink(
                    __('Books'),
                    ['controller' => 'books', 'action' => 'index'],
                    [
                        'class' => 'nav-item nav-link',
                        'title' => __('Books'),
                        'alias' => 'books',
                        'menu' => $menu
                    ]
                );
                ?>
            </div>
        </div>

        <div class="col-md d-none d-md-flex navbar-text">

        </div>
    </nav>
</header>
