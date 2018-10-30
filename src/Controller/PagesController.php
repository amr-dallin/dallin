<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
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
        $this->Auth->allow(['display', 'about', 'sitemap', 'robots']);
    }
    
    public function display()
    {
        $postsTables = TableRegistry::getTableLocator()->get('Posts');
        $posts = $this->paginate(
            $postsTables->find('all', [
                'conditions' => ['Posts.published' => true],
                'order' => ['Posts.date_created' => 'DESC'],
                'limit' => 3
            ])
        );
        
        // Page ID 2 - Home page
        $page = $this->Pages->get(2);
        $this->set(compact('page', 'posts'));
    }

    public function about()
    {
        // Page ID 2 - Home page
        $page = $this->Pages->get(1);
        $this->set('page', $page);
    }
    
    public function sitemap()
    {
        if (!$this->request->is('xml')) {
            throw new NotFoundException(__('Not found page'));
        }
        
        $postsTable = TableRegistry::getTableLocator()->get('Posts');
        $posts = $postsTable->find('all', [
            'conditions' => ['Posts.published' => true],
            'order' => ['Posts.date_created' => 'DESC'],
            'contain' => false
        ]);
        
        $booksTable = TableRegistry::getTableLocator()->get('Books');
        $books = $booksTable->find('all', [
            'conditions' => ['Books.published' => true],
            'order' => ['Books.date_created' => 'DESC'],
            'contain' => false
        ]);
        
        $this->set(compact('posts', 'books'));
    }
    
    public function robots()
    {
        $this->request->addDetector('extTxt',
            function ($request) {
                return $request->getParam('_ext') === 'txt';
            }
        );
        
        if (!$this->request->is('extTxt')) {
            throw new NotFoundException(__('Not found page'));
        }
    }
}
