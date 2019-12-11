<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * SystemicPages Controller
 *
 * @property \App\Model\Table\SystemicPagesTable $SystemicPages
 *
 * @method \App\Model\Entity\SystemicPage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SystemicPagesController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['display', 'sitemap', 'robots']);
    }

    public function display()
    {
        $page = $this->SystemicPages->get(1, ['contain' => ['MetaTags']]);
        $this->set(compact('page'));
    }

    public function sitemap()
    {
        if (!$this->request->is('xml')) {
            throw new RecordNotFoundException(__('Page not found'));
        }

        $pagesTable = TableRegistry::getTableLocator()->get('Pages');
        $pages = $pagesTable->find('published');

        $postsTable = TableRegistry::getTableLocator()->get('Posts');
        $posts = $postsTable->find('published');

        $projectsTable = TableRegistry::getTableLocator()->get('Projects');
        $projects = $projectsTable->find('published');

        $servicesTable = TableRegistry::getTableLocator()->get('Services');
        $services = $servicesTable->find('published');

        $this->set(compact('pages', 'posts', 'projects', 'services'));
    }

    public function robots()
    {
        $this->request->addDetector('extTxt',
            function ($request) {
                return $request->getParam('_ext') === 'txt';
            }
        );

        if (!$this->request->is('extTxt')) {
            throw new RecordNotFoundException(__('Page not found'));
        }
    }
}
