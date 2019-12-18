<?php
use Cake\Core\Configure;
?>
<footer class="mt-5 mb-4 small">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                © 2008 - <?= date('Y') ?>. <?= __('Marat Dallin') ?><br/>
                <?php
                echo __(
                    '{0}, {1} and other {2}.',
                    $this->Html->link(
                        Configure::read('Settings.Contacts.mail'),
                        'mailto:' . Configure::read('Settings.Contacts.email'),
                        ['target' => '_blank']
                    ),
                    $this->Html->link(
                        __('telegram'),
                        'https://t.me/' . Configure::read('Settings.Contacts.telegram'),
                        ['target' => '_blank']
                    ),
                    $this->Html->link(
                        __('contacts'),
                        ['_name' => 'page_view', 'slug' => 'contacts']
                    )
                );
                ?>
            </div>
        </div>
    </div>
</footer>