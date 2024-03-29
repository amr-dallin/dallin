<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;
use Cake\Core\Configure;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadHelper('Tags.Tag');
        $this->loadHelper('Burzum/FileStorage.Image', [
            'pathPrefix' => DS . 'assets' . DS
        ]);
        $this->loadHelper('Paginator', ['templates' => 'paginator-templates']);
        $this->loadHelper('Meta.MetaRender', [
            'fb.app_id' => Configure::read('Settings.App.facebook'),
            'og.site_name' => Configure::read('Settings.Site.title'),
            'twitter' => [
                'site' => '@' . Configure::read('Settings.Contacts.twitter'),
                'creator' => '@' . Configure::read('Settings.Contacts.twitter')
            ]
        ]);
    }
}
