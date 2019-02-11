<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\NotFoundException;
use Cake\Datasource\Exception\RecordNotFoundException;
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
        $this->Auth->allow(['display', 'view', 'about', 'sitemap', 'robots']);
    }
    
    public function display()
    {
        $projectsTables = TableRegistry::getTableLocator()->get('Projects');
        $project = $projectsTables->find('allPublished')->first();
        
        // Page ID 1 - Home page
        $page = $this->Pages->get(1);
        $this->set(compact('page', 'project'));
    }
    
    public function view($slug)
    {
        $page = $this->Pages->find('published', ['slug' => $slug])->first();
        if (empty($page)) {
            throw new RecordNotFoundException(__('No page'));
        }
        
        $this->set('page', $page);
    }

    public function about()
    {
        return $this->redirect(['action' => 'view', 'slug' => 'about'], 302);
    }
    
    public function sitemap()
    {
        if (!$this->request->is('xml')) {
            throw new NotFoundException(__('Not found page'));
        }
        
        $pages = $this->Pages->find('allPublished')->toArray();
        
        $postsTable = TableRegistry::getTableLocator()->get('Posts');
        $posts = $postsTable->find('allPublished');
        
        $projectsTable = TableRegistry::getTableLocator()->get('Projects');
        $projects = $projectsTable->find('allPublished');
        
        $this->set(compact('pages', 'posts', 'projects'));
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
