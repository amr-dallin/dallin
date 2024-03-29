<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
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
        $pages = $this->Pages
            ->find()
            ->contain('Published');

        $this->set('pages', $pages);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $page = $this->Pages->newEntity();

        if ($this->request->is('post')) {
            $page = $this->Pages->patchEntity(
                $page,
                $this->request->getData(),
                ['associated' => ['MetaTags' , 'Published']]
            );

            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The page could not be saved. Please, try again.'));
        }

        $this->set('page', $page);
    }

    /**
     * Edit method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $page = $this->Pages->get($id, [
            'contain' => ['MetaTags', 'Published']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $this->Pages->patchEntity(
                $page,
                $this->request->getData(),
                ['associated' => ['MetaTags', 'Published']]
            );

            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The page has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The page could not be saved. Please, try again.'));
        }

        $this->set('page', $page);
    }

    /**
     * setPublished method
     *
     * @param int|null $id Page id.
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
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->Pages->get($id);
        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('The page has been deleted.'));
        } else {
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}