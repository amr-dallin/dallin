<footer>
    <?php if (!empty($tags)): ?>
    <div class="row article-tags">
        <div class="col">
            <?php
            foreach($tags as $tag) {
                echo $this->Html->link(h($tag->label), [
                        'action' => 'index',
                        '?' => ['tag' => h($tag->slug)]
                    ],
                    ['class' => 'badge badge-light']
                ) . PHP_EOL;
            }
            ?>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($share): ?>
    <div class="row article-share">
        <div class="col">
            <div class="share-list-label"><?php echo __('Liked? Share with others.'); ?></div>
            <div class="share-list"></div>
        </div>
    </div>
    <?php endif; ?>
</footer>
