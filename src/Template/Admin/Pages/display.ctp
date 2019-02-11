<?php
$title = __('Dashboard');

$this->assign('title', $title);

$this->start('ribbon');
echo $this->element('ribbon');
$this->end();

$this->start('navigation');
$menu['dashboard'] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();
?>

<div class="row">
    <div class="col-md-12">
        <h1 class="page-title txt-color-blueDark">
            <?php echo $title; ?>
        </h1>
    </div>
</div>