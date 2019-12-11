<nav id="js-primary-nav" class="primary-nav" role="navigation">
    <div class="nav-filter">
        <div class="position-relative">
            <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
            <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                <i class="fal fa-chevron-up"></i>
            </a>
        </div>
    </div>

    <div class="info-card">
        <?= $this->Html->image('card-backgrounds/cover-5-lg.png', ['class' => 'cover']) ?>
        <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
            <i class="fal fa-angle-down"></i>
        </a>
    </div>

    <ul id="js-nav-menu" class="nav-menu">
        <!-- Dashboard menu -->
        <li class="<?php if (isset($menu['dashboard'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-home']).
                ' '.
                $this->Html->tag('span', __('Dashboard'),
                    ['class' => 'nav-link-text']
                ),
                ['_name' => 'dashboard'],
                ['escape' => false, 'title' => __('Dashboard'), 'data-filter-tags' => '']
            );
            ?>
        </li>

        <li class="nav-title"><?= __('Content') ?></li>
        <li class="<?php if (isset($menu['posts'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-file-word']) .
                $this->Html->tag(
                    'span',
                    __('Posts'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __('Posts'), 'data-filter-tags' => '']
            );
            ?>
            <ul>
                <li <?php if (isset($menu['posts'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                        $this->Html->tag(
                            'span',
                            __('New Post'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Posts', 'action' => 'add'],
                        ['escape' => false, 'title' => __('Create new post'), 'data-filter-tags' => '']
                    );
                    ?>
                </li>
                <li <?php if (isset($menu['posts'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                        $this->Html->tag(
                            'span',
                            __('List Posts'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Posts', 'action' => 'index'],
                        ['escape' => false, 'title' => __('List Posts'), 'data-filter-tags' => '']
                    );
                    ?>
                </li>
            </ul>
        </li>
        <li class="<?php if (isset($menu['projects'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-file']) .
                $this->Html->tag(
                    'span',
                    __('Projects'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __('Projects'), 'data-filter-tags' => '']
            );
            ?>
            <ul>
                <li <?php if (isset($menu['projects'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                        $this->Html->tag(
                            'span',
                            __('New Project'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Projects', 'action' => 'add'],
                        ['escape' => false, 'title' => __('Create new project'), 'data-filter-tags' => '']
                    );
                    ?>
                </li>
                <li <?php if (isset($menu['projects'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                        $this->Html->tag(
                            'span',
                            __('List Projects'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Projects', 'action' => 'index'],
                        ['escape' => false, 'title' => __('List Projects'), 'data-filter-tags' => '']
                    );
                    ?>
                </li>
            </ul>
        </li>
        <li class="<?php if (isset($menu['services'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-atlas']) .
                $this->Html->tag(
                    'span',
                    __('Services'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __('Services'), 'data-filter-tags' => '']
            );
            ?>
            <ul>
                <li <?php if (isset($menu['services'][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                        $this->Html->tag(
                            'span',
                            __('New Service'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Services', 'action' => 'add'],
                        ['escape' => false, 'title' => __('Create new service'), 'data-filter-tags' => '']
                    );
                    ?>
                </li>
                <li <?php if (isset($menu['services'][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                        $this->Html->tag(
                            'span',
                            __('List Services'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Services', 'action' => 'index'],
                        ['escape' => false, 'title' => __('List Services'), 'data-filter-tags' => '']
                    );
                    ?>
                </li>
            </ul>
        </li>
        <li class="<?php if (isset($menu['pages'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-file']) .
                $this->Html->tag(
                    'span',
                    __('Pages'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __('Pages'), 'data-filter-tags' => '']
            );
            ?>
            <ul>
                <li class="<?php if (isset($menu['pages'])) echo 'active open'; ?>">
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-file']) .
                        $this->Html->tag(
                            'span',
                            __('Dynamic Pages'),
                            ['class' => 'nav-link-text']
                        ),
                        '#',
                        ['escape' => false, 'title' => __('Dynamic Pages'), 'data-filter-tags' => '']
                    );
                    ?>
                    <ul>
                        <li <?php if (isset($menu['pages'][0])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                                $this->Html->tag(
                                    'span',
                                    __('New Page'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'Pages', 'action' => 'add'],
                                ['escape' => false, 'title' => __('Create New Dynamic Page'), 'data-filter-tags' => '']
                            );
                            ?>
                        </li>
                        <li <?php if (isset($menu['pages'][1])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                                $this->Html->tag(
                                    'span',
                                    __('List Pages'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'Pages', 'action' => 'index'],
                                ['escape' => false, 'title' => __('List Dynamic Pages'), 'data-filter-tags' => '']
                            );
                            ?>
                        </li>
                    </ul>
                </li>
                <li class="<?php if (isset($menu['systemic_pages'])) echo 'active open'; ?>">
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-paperclip']) .
                        $this->Html->tag(
                            'span',
                            __('Systemic Pages'),
                            ['class' => 'nav-link-text']
                        ),
                        '#',
                        ['escape' => false, 'title' => __('Systemic Pages'), 'data-filter-tags' => '']
                    );
                    ?>
                    <ul>
                        <li <?php if (isset($menu['systemic_pages'][0])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                                $this->Html->tag(
                                    'span',
                                    __('New Page'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'SystemicPages', 'action' => 'add'],
                                ['escape' => false, 'title' => __('Create New Systemic Page'), 'data-filter-tags' => '']
                            );
                            ?>
                        </li>
                        <li <?php if (isset($menu['systemic_pages'][1])) echo 'class="active"'; ?>>
                            <?php
                            echo $this->Html->link(
                                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                                $this->Html->tag(
                                    'span',
                                    __('List Pages'),
                                    ['class' => 'nav-link-text']
                                ),
                                ['controller' => 'SystemicPages', 'action' => 'index'],
                                ['escape' => false, 'title' => __('List Systemic Pages'), 'data-filter-tags' => '']
                            );
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="nav-title"><?= __('File Storage') ?></li>
        <li <?php if (isset($menu['files'][0])) echo 'class="active"'; ?>>
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                $this->Html->tag(
                    'span',
                    __('Add File(s)'),
                    ['class' => 'nav-link-text']
                ),
                ['controller' => 'Files', 'action' => 'add'],
                ['escape' => false, 'title' => __('Add File(s)'), 'data-filter-tags' => '']
            );
            ?>
        </li>
        <li <?php if (isset($menu['files'][1])) echo 'class="active"'; ?>>
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-table']) .
                $this->Html->tag(
                    'span',
                    __('Files'),
                    ['class' => 'nav-link-text']
                ),
                ['controller' => 'Files', 'action' => 'index'],
                ['escape' => false, 'title' => __('Files'), 'data-filter-tags' => '']
            );
            ?>
        </li>
        <li class="<?php if (isset($menu['files'][2])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-file-word']) .
                $this->Html->tag(
                    'span',
                    __('By Type Files'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __('By Type Files'), 'data-filter-tags' => '']
            );
            ?>
            <ul>
                <li <?php if (isset($menu['files'][2][0])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag(
                            'span',
                            __('Documents'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Files', 'action' => 'documents'],
                        ['escape' => false, 'title' => __('Documents'), 'data-filter-tags' => '']
                    );
                    ?>
                </li>
                <li <?php if (isset($menu['files'][2][1])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $this->Html->tag(
                            'span',
                            __('Images'),
                            ['class' => 'nav-link-text']
                        ),
                        ['controller' => 'Files', 'action' => 'images'],
                        ['escape' => false, 'title' => __('Images'), 'data-filter-tags' => '']
                    );
                    ?>
                </li>
            </ul>
        </li>

        <li class="nav-title"><?= __('Settings') ?></li>
        <!-- Settings menu -->
        <li <?php if (isset($menu['setting_add'])) echo 'class="active"'; ?>>
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-plus-circle']) .
                $this->Html->tag(
                    'span',
                    __('New Setting'),
                    ['class' => 'nav-link-text']
                ),
                ['controller' => 'Settings', 'action' => 'add'],
                ['escape' => false, 'title' => __('New Setting'), 'data-filter-tags' => 'new setting add']
            );
            ?>
        </li>
        <li class="<?php if (isset($menu['settings'])) echo 'active open'; ?>">
            <?php
            echo $this->Html->link(
                $this->Html->tag('i', '', ['class' => 'fal fa-lg fa-fw fa-list-ul']) .
                $this->Html->tag(
                    'span',
                    __('All Settings'),
                    ['class' => 'nav-link-text']
                ),
                '#',
                ['escape' => false, 'title' => __('All Settings'), 'data-filter-tags' => '']
            );
            ?>
            <ul>
                <?php foreach($configure['Settings'] as $key => $setting_group): ?>
                <li <?php if (isset($menu['settings'][1][$key])) echo 'class="active"'; ?>>
                    <?php
                    echo $this->Html->link(
                        $key,
                        ['_name' => 'settings', 'key' => $key]
                    );
                    ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </li>

    </ul>
</nav>