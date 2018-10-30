<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * BookCategories Controller
 *
 * @property \App\Model\Table\BookCategoriesTable $BookCategories
 *
 * @method \App\Model\Entity\BookCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $bookCategories = $this->paginate($this->BookCategories);

        $this->set(compact('bookCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Book Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookCategory = $this->BookCategories->get($id, [
            'contain' => ['Books']
        ]);

        $this->set('bookCategory', $bookCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookCategory = $this->BookCategories->newEntity();
        if ($this->request->is('post')) {
            $bookCategory = $this->BookCategories->patchEntity($bookCategory, $this->request->getData());
            if ($this->BookCategories->save($bookCategory)) {
                $this->Flash->success(__('The book category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book category could not be saved. Please, try again.'));
        }
        $this->set(compact('bookCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookCategory = $this->BookCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookCategory = $this->BookCategories->patchEntity($bookCategory, $this->request->getData());
            if ($this->BookCategories->save($bookCategory)) {
                $this->Flash->success(__('The book category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book category could not be saved. Please, try again.'));
        }
        $this->set(compact('bookCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookCategory = $this->BookCategories->get($id);
        if ($this->BookCategories->delete($bookCategory)) {
            $this->Flash->success(__('The book category has been deleted.'));
        } else {
            $this->Flash->error(__('The book category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
