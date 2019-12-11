<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 *
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServicesController extends AppController
{
    /**
     * View method
     *
     * @param string|null $slug Service slug.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $service = $this->Services
            ->find('slugged', compact('slug'))
            ->find('published')
            ->contain('MetaTags')
            ->contain('Posts', function ($q) {
                return $q->find('published');
            })
            ->first();

        if (empty($service)) {
            throw new RecordNotFoundException(__('Service not found'));
        }

        $this->set('service', $service);
    }
}
