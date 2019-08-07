<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    public $paginate = [
        'limit' => 10
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if (null !== $this->request->getQuery('tag')) {
            $slug = $this->request->getQuery('tag');
            $tag = $this->Posts->Tags->findBySlug($slug)->first();
            if (empty($tag)) {
                throw new RecordNotFoundException(__('No post'));
            }
            $this->set('tag', $tag);

            $query = $this->Posts->find('taggedAllPublished', ['slug' => $slug]);
        } else {
            $page_id = 2;
            $query = $this->Posts->find('allPublished');
        }

        $posts = $this->paginate($query);
        $this->set('posts', $posts);

        if (isset($page_id)) {
            $pagesTable = TableRegistry::getTableLocator()->get('Pages');
            $page = $pagesTable->get($page_id);
            $this->set('page', $page);
        }
    }

    /**
     * View method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug)
    {
        $post = $this->Posts
            ->find('published', ['slug' => $slug])
            ->contain('Image')
            ->first();
        if (empty($post)) {
            throw new RecordNotFoundException(__('No post'));
        }

        $this->set('post', $post);
    }
}