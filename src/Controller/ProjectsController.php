<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
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
        $query = $this->Projects->find('allPublished');
        $projects = $this->paginate($query);
        
        $pagesTable = TableRegistry::getTableLocator()->get('Pages');
        $page = $pagesTable->get(4);

        $this->set(compact('page', 'projects'));
    }
    
    /**
     * View method
     *
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug)
    {        
        $project = $this->Projects->find('published', ['slug' => $slug])->first();
        if (empty($project)) {
            throw new RecordNotFoundException(__('No project'));
        }

        $this->set('project', $project);
    }
}
