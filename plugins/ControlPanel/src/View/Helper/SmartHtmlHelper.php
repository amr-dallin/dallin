<?php
namespace ControlPanel\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * SmartHtml helper
 */
class SmartHtmlHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    public $helpers = ['Form', 'Html'];

    public function postLink($title, $url, $options)
    {
        $modalTitle = null;
        if (isset($options['data-title'])) {
            $modalTitle = $options['data-title'];
            unset($options['data-title']);
        }

        $modalMessage = null;
        if (isset($options['data-message'])) {
            $modalMessage = $options['data-message'];
            unset($options['data-message']);
        }

        $options['onclick'] = "postModal('{$url}', '{$modalTitle}', '{$modalMessage}')";
        $options['escape'] = false;

        return $this->Html->link($title, 'javascript:void(0);', $options);
    }
}
