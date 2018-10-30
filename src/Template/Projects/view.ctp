<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['controller' => 'Posts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['controller' => 'Posts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($project->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($project->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cover') ?></th>
            <td><?= h($project->cover) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Keywords') ?></th>
            <td><?= h($project->meta_keywords) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Description') ?></th>
            <td><?= h($project->meta_description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($project->date_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Modified') ?></th>
            <td><?= h($project->date_modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Published') ?></th>
            <td><?= h($project->date_published) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published') ?></th>
            <td><?= $project->published ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($project->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Posts') ?></h4>
        <?php if (!empty($project->posts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Alias') ?></th>
                <th scope="col"><?= __('Lead') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Cover') ?></th>
                <th scope="col"><?= __('Meta Keywords') ?></th>
                <th scope="col"><?= __('Meta Description') ?></th>
                <th scope="col"><?= __('Date Created') ?></th>
                <th scope="col"><?= __('Date Modified') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->posts as $posts): ?>
            <tr>
                <td><?= h($posts->id) ?></td>
                <td><?= h($posts->title) ?></td>
                <td><?= h($posts->alias) ?></td>
                <td><?= h($posts->lead) ?></td>
                <td><?= h($posts->body) ?></td>
                <td><?= h($posts->cover) ?></td>
                <td><?= h($posts->meta_keywords) ?></td>
                <td><?= h($posts->meta_description) ?></td>
                <td><?= h($posts->date_created) ?></td>
                <td><?= h($posts->date_modified) ?></td>
                <td><?= h($posts->published) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $posts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Posts', 'action' => 'edit', $posts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Posts', 'action' => 'delete', $posts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $posts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($project->tags)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Date Created') ?></th>
                <th scope="col"><?= __('Date Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->tags as $tags): ?>
            <tr>
                <td><?= h($tags->id) ?></td>
                <td><?= h($tags->title) ?></td>
                <td><?= h($tags->date_created) ?></td>
                <td><?= h($tags->date_modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
