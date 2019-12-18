<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 *
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    public function initialize() {
        parent::initialize();

        $this->loadComponent('Published.Published');
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $posts = $this->Posts
            ->find()
            ->contain('Published');

        $this->set(compact('posts'));
    }

    public function tagList()
    {
        $this->request->allowMethod('ajax');

        $tags = $this->Posts->tagList($this->request->getQuery('q'));

        $this->set('tags', $tags);
        $this->set('_serialize', 'tags');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity(
                $post,
                $this->request->getData(),
                ['associated' => ['MetaTags' , 'Published', 'Tags']]
            );

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }

        $projects = $this->Posts->Projects->find('list');
        $services = $this->Posts->Services->find('list');
        $this->set(compact('post', 'projects', 'services'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['MetaTags', 'Published', 'Tags']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity(
                $post,
                $this->request->getData(),
                ['associated' => ['MetaTags', 'Published', 'Tags']]
            );

            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }

        $projects = $this->Posts->Projects->find('list');
        $services = $this->Posts->Services->find('list');
        $this->set(compact('post', 'projects', 'services'));
    }

    /**
     * setPublished method
     *
     * @param int|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function setPublished($id = null)
    {
        $this->Published->setPublished($id);
    }


    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}