<nav aria-label="<?= __('Page navigation') ?>" class="mb-5">
    <h3 class="text-hide m-0"><?= __('Page navigation') ?></h3>
    <ul class="pagination pagination-sm justify-content-center">
        <?php
        echo $this->Paginator->prev(' << ' . __('previous'));
        echo $this->Paginator->numbers();
        echo $this->Paginator->next(' >> ' . __('next'));
        ?>
    </ul>
</nav>