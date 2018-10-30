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
<aside id="left-panel">

    <!-- User info -->
    <div class="login-info">
        <span> <!-- User image size is adjusted inside CSS, it should stay as is --> 

            <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                <?php echo $this->Html->image('avatars/sunny.png', ['class' => 'online']); ?>
                <span>
                    john.doe 
                </span>
                <i class="fa fa-angle-down"></i>
            </a> 

        </span>
    </div>
    <!-- end user info -->

    <!-- NAVIGATION : This navigation is also responsive

    To make this navigation dynamic please make sure to link the node
    (the reference to the nav > ul) after page load. Or the navigation
    will not initialize.
    -->
    <nav>
        <!-- 
        NOTE: Notice the gaps after each icon usage <i></i>..
        Please note that these links work a bit different than
        traditional href="" links. See documentation for details.
        -->

        <ul>
            <!-- Dashboard menu -->
            <li class="<?php if (isset($menu['dashboard'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fa fa-lg fa-fw fa-home']).
                ' '.
                $this->Html->tag(
                    'span', 
                    __('Dashboard'), 
                    ['class' => 'menu-item-parent']
                ),
                ['controller' => 'pages', 'action' => 'display'], 
                ['escape' => false]
            );
            ?>
            </li>
            
            <!-- Pages menu -->
            <li class="<?php if (isset($menu['pages'])) echo 'active open'; ?>">
            <?php 
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fa fa-lg fa-fw fa-file']).
                ' '.
                $this->Html->tag(
                    'span', 
                    __('Pages'), 
                    ['class' => 'menu-item-parent']
                ),
                '#', 
                ['escape' => false]
            );
            ?>
                <ul>
                    <li <?php if (isset($menu['pages'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        __('Add'),
                        ['controller' => 'pages', 'action' => 'add']
                    );
                    ?>
                    </li>
                    <li <?php if (isset($menu['pages'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(__('List'), 
                        ['controller' => 'pages', 'action' => 'index']
                    );
                    ?>
                    </li>
                </ul>
            </li>
            
            <!-- Posts menu -->
            <li class="<?php if (isset($menu['posts'])) echo 'active open'; ?>">
            <?php 
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fa fa-lg fa-fw fa-feed']).
                ' '.
                $this->Html->tag(
                    'span', 
                    __('Posts'), 
                    ['class' => 'menu-item-parent']
                ),
                '#', 
                ['escape' => false]
            );
            ?>
                <ul>
                    <li <?php if (isset($menu['posts'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        __('Add'),
                        ['controller' => 'posts', 'action' => 'add']
                    );
                    ?>
                    </li>
                    <li <?php if (isset($menu['posts'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(__('List'), 
                        ['controller' => 'posts', 'action' => 'index']
                    );
                    ?>
                    </li>
                </ul>
            </li>
            
            <!-- Projects menu -->
            <li class="<?php if (isset($menu['projects'])) echo 'active open'; ?>">
            <?php 
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fa fa-lg fa-fw fa-globe']).
                ' '.
                $this->Html->tag(
                    'span', 
                    __('Projects'), 
                    ['class' => 'menu-item-parent']
                ),
                '#', 
                ['escape' => false]
            );
            ?>
                <ul>
                    <li <?php if (isset($menu['projects'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        __('Add'),
                        ['controller' => 'projects', 'action' => 'add']
                    );
                    ?>
                    </li>
                    <li <?php if (isset($menu['projects'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(__('List'), 
                        ['controller' => 'projects', 'action' => 'index']
                    );
                    ?>
                    </li>
                </ul>
            </li>
            
            <!-- Books menu -->
            <li class="<?php if (isset($menu['books'])) echo 'active open'; ?>">
            <?php 
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fa fa-lg fa-fw fa-book']).
                ' '.
                $this->Html->tag(
                    'span', 
                    __('Books'), 
                    ['class' => 'menu-item-parent']
                ),
                '#', 
                ['escape' => false]
            );
            ?>
                <ul>
                    <li <?php if (isset($menu['books'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        __('Add'),
                        ['controller' => 'books', 'action' => 'add']
                    );
                    ?>
                    </li>
                    <li <?php if (isset($menu['books'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(__('List'), 
                        ['controller' => 'books', 'action' => 'index']
                    );
                    ?>
                    </li>
                    <li <?php if (isset($menu['books'][2])) echo 'class="active"'; ?>>
                    <?php 
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fa fa-lg fa-fw fa-folder-open']).
                        ' '.
                        $this->Html->tag(
                            'span', 
                            __('Categories'), 
                            ['class' => 'menu-item-parent']
                        ),
                        '#', 
                        ['escape' => false]
                    );
                    ?>
                        <ul>
                            <li <?php if (isset($menu['books'][2][0])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                __('Add'),
                                ['controller' => 'book_categories', 'action' => 'add']
                            );
                            ?>
                            </li>
                            <li <?php if (isset($menu['books'][2][1])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(__('List'), 
                                ['controller' => 'book_categories', 'action' => 'index']
                            );
                            ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

</aside>
