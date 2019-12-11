<?php foreach($banks as $id => $title): ?>
<li class="<?php if (isset($menu['banks'][h($id)])) echo 'active open'; ?>">
    <?php
    echo $this->Html->link(
        $this->Html->tag(
            'span',
            h($title),
            ['class' => 'nav-link-text']
        ),
        '#',
        ['escape' => false, 'title' => h($title), 'data-filter-tags' => mb_strtolower(h($title))]
    );
    ?>
    <ul>
        <li <?php if (isset($menu['banks'][h($id)]['edit'])) echo 'class="active"'; ?>>
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'span',
                    __('Edit'),
                    ['class' => 'nav-link-text']
                ),
                ['controller' => 'Banks', 'action' => 'edit', h($id)],
                ['escape' => false, 'title' => __('Edit Bank'), 'data-filter-tags' => '']
            );
            ?>
        </li>
        <li <?php if (isset($menu['banks'][h($id)]['bank_posts'])) echo 'class="active"'; ?>>
            <?php
            echo $this->Html->link(
                $this->Html->tag(
                    'span',
                    __('Posts'),
                    ['class' => 'nav-link-text']
                ),
                ['controller' => 'BankPosts', 'action' => 'index', '?' => ['bank_id' => h($id)]],
                ['escape' => false, 'title' => __('Bank Posts'), 'data-filter-tags' => '']
            );
            ?>
        </li>
    </ul>
</li>
<?php endforeach; ?>