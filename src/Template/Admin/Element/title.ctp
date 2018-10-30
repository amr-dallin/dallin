<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>

<div class="row">
    <div class="col-xs-12 col-md-8">
        <h1 class="page-title txt-color-blueDark">
            <!-- PAGE HEADER --> 
            <?php echo $title; ?>
        </h1>
    </div>
    <?php if (isset($id)): ?>
    <div class="col-xs-12 col-md-4 text-align-right" style="margin: 10px 0 20px;">
        <?php
        echo $this->Form->postLink(
            $this->Html->tag('i', '', ['class' => 'fa fa-trash']) . ' ' . __('Delete'),
            ['action' => 'delete', $id],
            [
                'confirm' => __('Are you sure you want to delete # {0}?', $id),
                'class' => 'btn btn-danger',
                'escape' => false
            ]
        )
        ?>
    </div>
    <?php endif; ?>
</div>
