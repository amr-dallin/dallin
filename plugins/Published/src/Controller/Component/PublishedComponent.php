<?php
namespace Published\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\ORM\TableRegistry;

/**
 * Published component
 */
class PublishedComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    protected $table;
    protected $controller;

    public $components = ['Flash'];

    public function initialize(array $config)
    {
        $this->controller = $this->_registry->getController();
        $this->table = TableRegistry::getTableLocator()->get($this->controller->modelClass);
    }

    /**
     * setPublished method
     *
     * @param int|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function setPublished($id = null)
    {
        $this->request->allowMethod(['post']);
        $item = $this->table->Published
            ->find('byForeignKey', ['foreign_key' => $id])
            ->first();

        if (empty($item)) {
            throw new RecordNotFoundException(__('Page not found'));
        }

        if ($this->table->Published->changePublished($item)) {
            $this->Flash->success(__('Publish mode replaced successfully!'));
        } else {
            $this->Flash->error(__('Failed to change publish mode. Please try again.'));
        }

        return $this->controller->redirect(
            $this->controller->referer(['_name' => 'dashboard'], true)
        );
    }
}

