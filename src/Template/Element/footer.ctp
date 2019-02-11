<?php
use Cake\Core\Configure;
?>
<footer class="footer bg-dark mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-center text-md-left">
                <?php
                echo $this->Html->image('logo.png', [
                    'width' => 20,
                    'alt' => Configure::read('Settings.Site.title'),
                    'title' => Configure::read('Settings.Site.title')
                ]);
                ?>
                <br/><br/>
                <p class="text-white-50">
                    © 2008 - 2019. <?php echo Configure::read('Settings.Site.title'); ?><br/>
                    <?php echo __('Mail: {0}', Configure::read('Settings.Contacts.mail')); ?>
                </p>
            </div>
            <div class="col-6 col-md-3">
                <div class="h6">
                    <?php
                    echo $this->Html->link(__('About Me'),
                        [
                            'controller' => 'Pages', 
                            'action' => 'view', 
                            'slug' => 'about'
                        ],
                        [
                            'class' => 'text-muted',
                            'title' => __('About Me')
                        ]
                    );
                    ?>
                </div>
                <ul class="list-unstyled text-small">
                    <li>
                        <a href="https://medium.com/@amr.dallin/%D0%BA%D0%B0%D0%BA-%D1%8F-%D0%BF%D0%BE%D1%81%D1%82%D1%83%D0%BF%D0%B8%D0%BB-%D0%B2-%D1%82%D1%83%D1%81%D1%83%D1%80-757c582c2584" target="_blank" class="text-white-50">Как я поступил в университет</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md-3">
                <div class="h6">
                    <?php
                    echo $this->Html->link(__('Projects'),
                        ['controller' => 'Projects', 'action' => 'index'],
                        [
                            'class' => 'text-muted',
                            'title' => __('Projects')
                        ]
                    );
                    ?>
                </div>
            </div>
            <div class="col-6 col-md">
                <div class="h6 text-muted"><?php echo __('Social'); ?></div>
                <ul class="list-unstyled text-small">
                    <li><a class="text-white-50" href="https://medium.com/@<?php echo Configure::read('Settings.Contacts.medium'); ?>" target="_blank">Medium</a></li>
                    <li><a class="text-white-50" href="https://www.linkedin.com/in/<?php echo Configure::read('Settings.Contacts.linkedin'); ?>/" target="_blank">LinkedIn</a></li>
                    <li><a class="text-white-50" href="https://github.com/<?php echo Configure::read('Settings.Contacts.github'); ?>" target="_blank">Github</a></li>
                    <li><a class="text-white-50" href="https://www.facebook.com/<?php echo Configure::read('Settings.Contacts.facebook'); ?>" target="_blank">Facebook</a></li>
                    <li><a class="text-white-50" href="https://vk.com/<?php echo Configure::read('Settings.Contacts.vk'); ?>" target="_blank">ВКонтакте</a></li>
                    <li><a class="text-white-50" href="https://twitter.com/<?php echo Configure::read('Settings.Contacts.twitter'); ?>" target="_blank">Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>   
</footer>
