<?php
$this->assign('title', __('Dashboard'));
$this->assign('breadcrumbs', $this->element('breadcrumbs'));

$this->start('navigation');
$menu['dashboard'] = true;
echo $this->element('navigation', ['menu' => $menu]);
$this->end();