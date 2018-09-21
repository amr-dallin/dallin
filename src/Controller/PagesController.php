<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 *
 * @method \App\Model\Entity\Page[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['display', 'sitemap']);
    }
    
    public function display()
    {
        $postsTables = TableRegistry::get('Posts');
        $posts = $this->paginate(
            $postsTables->find('all', [
                'order' => ['Posts.id' => 'DESC'],
                'limit' => 3
            ])
        );
        
        // Page ID 2 - Home page
        $page = $this->Pages->get(2);
        $this->set(compact('page', 'posts'));
    }
    
    public function sitemap()
    {
        $programsTable = TableRegistry::get('Programs');
        $programs = $programsTable->find('all', [
            'conditions' => ['Programs.published' => true],
            'order' => ['Programs.date_upload_youtube' => 'DESC'],
            'contain' => false
        ]);

        
        $this->set(compact('programs', 'accounts'));
    }

    public function about()
    {
        // Page ID 2 - Home page
        $page = $this->Pages->get(1);
        $this->set('page', $page);
    }
    
    public function contacts()
    {
        // Page ID 2 - Home page
        $page = $this->Pages->get(4);
        $this->set('page', $page);
    }
}
