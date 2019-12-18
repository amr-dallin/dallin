<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\ORM\TableRegistry;

/**
 * Pages Controller
 *
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @property \App\Model\Table\PagesTable $Pages
 */
class PagesController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('view');
    }

    public function view($slug)
    {
        $page = $this->Pages
            ->find('published')
            ->find('slugged', compact('slug'))
            ->contain('MetaTags')
            ->first();

        if (empty($page)) {
            throw new RecordNotFoundException(__('Page not found'));
        }

        $this->set('page', $page);
    }
}
