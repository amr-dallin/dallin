<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Core\Configure;

/**
 * Dallin helper
 */
class DallinHelper extends Helper
{
    var $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    
    public function headerLink($title, $url, $options)
    {
        if ($options['slug'] == $options['menu']) {
            $options['class'] .= ' active';
        }
        
        return $this->Html->link($title, $url, $options);
    }
    
    public function published($status)
    {
        switch($status) {
            case true:
                $class = 'fa fa-check text-success';
                break;
            case false:
                $class = 'fa fa-ban text-danger';
                break;
        }
        
        return $this->Html->tag('i', '', ['class' => $class]);
    }
    
    public function projectDetailed($key, $paging = false)
    {        
        $quantity_detailed = Configure::read('Settings.Projects.quantity_detailed');
        $class_array = [
            'col-md-6 col-lg-4',
            'col-md-12',
            'col-md-6'
        ];
        
        if ($paging) {
            $page = $this->request->params['paging']['Projects']['page'];
            
            if ($page > 1) {
                return $class_array[0];
            }
        }
        
        if ($key >= $quantity_detailed) {
            return $class_array[0];
        }
        
        return $class_array[$quantity_detailed];
    }

}
