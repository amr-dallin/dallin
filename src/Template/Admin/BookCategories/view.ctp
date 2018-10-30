<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookCategory $bookCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Book Category'), ['action' => 'edit', $bookCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Book Category'), ['action' => 'delete', $bookCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Book Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookCategories view large-9 medium-8 columns content">
    <h3><?= h($bookCategory->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Alias') ?></th>
            <td><?= h($bookCategory->alias) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($bookCategory->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bookCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Created') ?></th>
            <td><?= h($bookCategory->date_created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Modified') ?></th>
            <td><?= h($bookCategory->date_modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Books') ?></h4>
        <?php if (!empty($bookCategory->books)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Book Category Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Alias') ?></th>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Isbn') ?></th>
                <th scope="col"><?= __('Body') ?></th>
                <th scope="col"><?= __('Readed') ?></th>
                <th scope="col"><?= __('Date Readed') ?></th>
                <th scope="col"><?= __('Meta Keywords') ?></th>
                <th scope="col"><?= __('Meta Description') ?></th>
                <th scope="col"><?= __('Date Created') ?></th>
                <th scope="col"><?= __('Date Modified') ?></th>
                <th scope="col"><?= __('Published') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bookCategory->books as $books): ?>
            <tr>
                <td><?= h($books->id) ?></td>
                <td><?= h($books->book_category_id) ?></td>
                <td><?= h($books->title) ?></td>
                <td><?= h($books->alias) ?></td>
                <td><?= h($books->author) ?></td>
                <td><?= h($books->year) ?></td>
                <td><?= h($books->isbn) ?></td>
                <td><?= h($books->body) ?></td>
                <td><?= h($books->readed) ?></td>
                <td><?= h($books->date_readed) ?></td>
                <td><?= h($books->meta_keywords) ?></td>
                <td><?= h($books->meta_description) ?></td>
                <td><?= h($books->date_created) ?></td>
                <td><?= h($books->date_modified) ?></td>
                <td><?= h($books->published) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Books', 'action' => 'view', $books->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Books', 'action' => 'edit', $books->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Books', 'action' => 'delete', $books->id], ['confirm' => __('Are you sure you want to delete # {0}?', $books->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
