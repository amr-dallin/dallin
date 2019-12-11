<?php
$this->layout = 'login';
$this->assign('title', __('Login'));
?>


<div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0">
    <img src="/img/logo.png" aria-roledescription="logo">
</div>
<div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
    <?php
    echo $this->Form->create('Users', [
        'autocomplete' => 'off',
        'templates' => 'ControlPanel.app_form'
    ]);
    echo $this->Form->control('username', [
        'placeholder' => __('Username')
    ]);
    echo $this->Form->control('password', [
        'placeholder' => __('Password')
    ]);
    echo $this->Form->submit(__('Log In'));
    echo $this->Form->end();
    ?>
</div>