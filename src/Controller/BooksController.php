<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 *
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
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
        $books = $this->paginate(
            $this->Books->find('all', [
                'condtions' => [
                    'Books.published' => true
                ],
                'order' => ['Books.date_readed' => 'DESC'],
                'contain' => ['BookCategories', 'Tags']
            ])
        );

        $pages = TableRegistry::get('Pages');
        $page = $pages->get(7);

        $this->set(compact('page', 'books'));
    }

    /**
     * View method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
        $book = $this->Books->find('all', [
            'conditions' => [
                'Books.alias' => $this->request->getParam('alias'),
                'Books.published' => true
            ],
            'contain' => ['Tags']
        ])->first();
        
        if (empty($book)) {
            throw new RecordNotFoundException(__('No book'));
        }

        $this->set('book', $book);
    }
}
