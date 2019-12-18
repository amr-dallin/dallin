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
        'limit' => 1
    ];

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
        $pagesTable = TableRegistry::getTableLocator()->get('SystemicPages');
        $page = $pagesTable->get(3, ['contain' => ['MetaTags']]);

        $projects = $this->paginate($this->Projects->find('published'));

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
        $project = $this->Projects
            ->find('published')
            ->find('slugged', compact('slug'))
            ->contain('MetaTags')
            ->first();

        if (empty($project)) {
            throw new RecordNotFoundException(__('Project not found'));
        }

        $this->set('project', $project);
    }
}