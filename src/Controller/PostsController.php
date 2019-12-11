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

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('index', 'view');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $pagesTable = TableRegistry::getTableLocator()->get('SystemicPages');
        $page = $pagesTable->get(2, ['contain' => ['MetaTags']]);

        $posts = $this->paginate(
            $this->Posts
                ->find('published')
                ->contain('Tags')
        );
        $services = $this->Posts->Services
            ->find('published')
            ->toArray();

        $this->set(compact('page', 'posts', 'services'));
    }

    /**
     * Service method
     *
     * @param string|null $service_slug Service slug.
     * @return \Cake\Http\Response|null|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function service($service_slug = null)
    {
        $service = $this->Posts->Services
            ->find('slugged', ['slug' => $service_slug])
            ->find('published')
            ->contain('MetaTags')
            ->first();

        if (empty($service)) {
            throw new RecordNotFoundException(__('Service not found'));
        }

        $posts = $this->paginate(
            $this->Posts
                ->find('byService', ['service_id' => $service->id])
                ->find('published')
        );
        $services = $this->Posts->Services
            ->find('published')
            ->toArray();

        $this->set(compact('posts', 'service', 'services'));
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
            ->find('slugged', compact('slug'))
            ->find('published')
            ->contain('MetaTags')
            ->contain('Services')
            ->contain('Projects')
            ->contain('Tags')
            ->first();

        if (empty($post)) {
            throw new RecordNotFoundException(__('Post not found'));
        }

        $this->set('post', $post);
    }
}