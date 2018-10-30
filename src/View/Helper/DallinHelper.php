<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

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
        if ($options['alias'] == $options['menu']) {
            $options['class'] .= ' active';
        }
        
        return $this->Html->link($title, $url, $options);
    }
}
