<?php
use Cake\Core\Configure;
?>
<header>
    <nav aria-label="<?php echo __('Main navigation'); ?>" class="navbar navbar-expand-md navbar-dark">
        <h2 class="text-hide m-0"><?php echo __('Main navigation'); ?></h2>
        <div class="col-md d-flex">
            <?php
            echo $this->Html->link(
                $this->Html->image('logo.png', [
                    'height' => 23,
                    'alt' => Configure::read('Settings.Site.title'),
                    'title' => Configure::read('Settings.Site.title')
                ]),
                ['_name' => 'display'],
                ['escape' => false, 'class' => 'navbar-brand']
            );
            ?>
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
                
                echo $this->Dallin->headerLink(__('Home'),
                    ['_name' => 'display'],
                    [
                        'class' => 'nav-item nav-link',
                        'title' => __('Home'),
                        'slug' => 'home',
                        'menu' => $menu
                    ]
                );
                echo $this->Dallin->headerLink(__('About Me'),
                    [
                        'controller' => 'Pages', 
                        'action' => 'view', 
                        'slug' => 'about'
                    ],
                    [
                        'class' => 'nav-item nav-link',
                        'title' => __('About Me'),
                        'slug' => 'about',
                        'menu' => $menu
                    ]
                );
                echo $this->Dallin->headerLink(__('Blog'),
                    ['controller' => 'Posts', 'action' => 'index'],
                    [
                        'class' => 'nav-item nav-link',
                        'title' => __('Blog'),
                        'slug' => 'posts',
                        'menu' => $menu
                    ]
                );
                echo $this->Dallin->headerLink(__('Projects'),
                    ['controller' => 'projects', 'action' => 'index'],
                    [
                        'class' => 'nav-item nav-link',
                        'title' => __('Projects'),
                        'slug' => 'projects',
                        'menu' => $menu
                    ]
                );
                ?>
            </div>
        </div>

        <div class="col-md d-none d-md-flex">
        </div>
    </nav>
</header>
