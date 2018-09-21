<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $post
 */
$this->start('title');
echo __('Login');
$this->end();
?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
        <div class="well no-padding">
            <?php echo $this->Form->create('Users', ['class' => 'smart-form client-form']); ?>
                <header>
                    Sign In
                </header>

                <fieldset>

                    <section>
                        <label class="label">Username</label>
                        <label class="input"> <i class="icon-append fa fa-user"></i>
                            <input type="text" name="username">
                            <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter username</b></label>
                    </section>

                    <section>
                        <label class="label">Password</label>
                        <label class="input"> <i class="icon-append fa fa-lock"></i>
                            <input type="password" name="password">
                            <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b>
                        </label>
                    </section>
                </fieldset>
                <footer>
                    <button type="submit" class="btn btn-primary">
                        Sign in
                    </button>
                </footer>
            <?php echo $this->Form->end(); ?>

        </div>

    </div>
</div>