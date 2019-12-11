<?php
$this->assign('meta', $this->MetaRender->init($service)->render());
?>

<article class="article">
    <div class="jumbotron jumbotron-fluid bg-light mb-5">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col col-md-11 col-lg-10">
                    <header>
                        <h1><?= h($service->title) ?></h1>
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?= $service->body ?>
            </div>
        </div>
    </div>
</article>