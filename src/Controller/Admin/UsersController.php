<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function login()
    {
        if ($this->request->is('post')) {
            
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect([
                    'controller' => 'posts', 
                    'action' => 'index', 
                    'prefix' => 'admin'
                ]);
            } else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
        }
    }
    
    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }
}
