<?php
$this->assign('title', h($page->title));

$this->start('meta');
echo $this->element('meta', [
    'title' => h($page->title),
    'url' =>  $this->Url->build(['controller' => 'Pages', 'action' => 'display'], true),
    'meta_keywords' => h($page->meta_keywords),
    'meta_description' => h($page->meta_description)
]);
$this->end();

$this->set('menu', 'home');
?>

<div class="display-page jumbotron jumbotron-fluid bg-light mb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <?php echo $page->body; ?>
            </div>
        </div>
    </diV>
</div>

<?php if (!empty($project)): ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 px-0">
            <div class="bg-light text-center p-5 <?php if (!empty($project->cover)) echo 'overlay-element'; ?>">
                <?php if (!empty($project->cover)): ?>
                <div class="overlay-element-cover" style="background: url('<?php echo h($project->cover); ?>') no-repeat;"></div>
                <?php endif; ?>
                <article class="inner-elements">
                    <header>
                        <h3><?php echo h($project->heading); ?></h3>
                    </header>
                    <p><?php echo h($project->description); ?></p>
                    <footer>
                        <?php
                        echo $this->Html->link(__('Read more'),
                            ['controller' => 'projects', 'action' => 'view', 'slug' => h($project->slug)],
                            ['class' => 'btn btn-outline-secondary btn-sm']
                        );
                        ?>
                    </footer>
                </article>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
