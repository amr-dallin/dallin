<?php if (!empty($tags)): ?>
<div class="row article-tags">
    <div class="col">
        <?php
        foreach($tags as $tag) {
            echo $this->Html->link(
                h($tag->label), 
                [
                    'controller' => 'Pages', 
                    'action' => 'tags_view', 
                    h($tag->slug)
                ],
                ['class' => 'badge badge-light']
            ) . PHP_EOL;
        }
        ?>
    </div>
</div>
<?php endif; ?>
