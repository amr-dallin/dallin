<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'loginAction' => [
                '_name' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Pages',
                'action' => 'index',
                'prefix' => 'admin'
            ]
        ]);

        //$this->loadComponent('Security');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }

    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
        $this->__setSettings();

        if (
            !empty($this->request->getParam('prefix')) &&
            $this->request->getParam('prefix') === 'admin' &&
            !$this->getRequest()->is('ajax') &&
            !$this->getRequest()->is('json') &&
            !$this->getRequest()->is('xml')
        ) {
            $this->viewBuilder()->setClassName('ControlPanel.App');
            $this->viewBuilder()->setTheme('ControlPanel');
        }
    }

    public function isAuthorized($user = null)
    {
        $sessionAuth = $this->getRequest()->getSession()->read('Auth');
        if ((time() - date('U', strtotime($user['date_visited']))) > 60) {
            $usersTable = TableRegistry::getTableLocator()->get('Users');
            $user = $usersTable->get($user['id']);

            $user->date_visited = $usersTable->timestamp();
            if ($usersTable->save($user)) {
                $this->getRequest()->getSession()->write('Auth.User.date_visited', $user->date_visited);
            }
        }

        return true;
    }

    private function __setSettings()
    {
        $settings = [];
        $settingsTable = TableRegistry::getTableLocator()->get('Settings');
        foreach($settingsTable->find() as $setting) {
            Configure::write('Settings.' . $setting->field_key, $setting->value);
        }
    }
}