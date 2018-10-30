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
        $posts = $this->paginate(
            $this->Posts->find('all', [
                'condtions' => [
                    'Posts.published' => true
                ],
                'order' => ['Posts.id' => 'DESC'],
                'contain' => ['Tags']
            ])
        );
        $pages = TableRegistry::get('Pages');
        $page = $pages->get(3);

        $this->set(compact('page', 'posts'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $post = $this->Posts->find('all', [
            'conditions' => [
                'Posts.alias' => $this->request->getParam('alias'),
                'Posts.published' => true
            ],
            'contain' => ['Tags']
        ])->first();

        if (empty($post)) {
            throw new RecordNotFoundException(__('No post'));
        }

        $this->set('post', $post);
    }
}
