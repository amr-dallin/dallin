<?php
if (!empty($services)) {
    echo '<ul>';
    echo $this->Html->tag('li',
        $this->Html->link(__('All'), ['_name' => 'posts'])
    );
    foreach($services as $service) {
        echo $this->Html->tag('li',
            $this->Html->link(
                h($service->title),
                ['_name' => 'posts_service', 'service_slug' => h($service->slug)]
            )
        );
    }
    echo '</ul>';
}
?>