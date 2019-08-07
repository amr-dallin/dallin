<?php
$title = h($project->title);

$this->set('menu', 'projects');

$this->start('meta');
echo $this->element('meta', [
    'title' => $title,
    'meta' => [
        'keywords' => h($project->meta_keywords),
        'description' => h($project->meta_description)
    ],
    'og' => [
        'title' => h($project->heading),
        'description' => h($project->meta_description),
        'image' => [
            'url' => $project->image
        ],
        'url' => $this->Url->build(['slug' => h($project->slug)], true)
    ],
    'twitter' => [
        'card' => 'summary_large_image'
    ],
    'canonical' => $this->Url->build(['slug' => h($project->slug)], true)
]);
$this->end();

echo $this->Html->css([
    '/vendor/highlight/styles/tomorrow-night-blue',
], ['block' => true]);

echo $this->Html->script([
    '/vendor/jssocials-1.4.0/dist/jssocials',
    '/vendor/highlight/highlight.pack'
], ['block' => true]);
?>

<?php $this->start('script-code'); ?>
<script>
$(".share-list").jsSocials({
    showLabel: false,
    shareIn: "popup",
    showCount: false,
    shares: ["email", "linkedin", "facebook", "vkontakte", "twitter", "telegram", "whatsapp"]
});
hljs.initHighlightingOnLoad();
</script>
<?php $this->end(); ?>

<article class="article">
    <div class="jumbotron jumbotron-fluid bg-light text-center <?php if (!empty($project->cover)) echo 'overlay-element'; ?>">
    <?php if (!empty($project->cover)): ?>
        <div class="overlay-element-cover" style="background: url('<?php echo h($project->cover); ?>') no-repeat;"></div>
    <?php endif; ?>
        <div class="container inner-elements">
            <div class="row justify-content-center">
                <div class="col col-md-11 col-lg-10 p-3">
                    <header>
                        <h1 class="display-1"><?php echo h($project->heading); ?></h1>
                    </header>
                    <p class="lead m-0"><?php echo h($project->description); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                echo $project->body;
                echo $this->element('article_footer', [
                    'tags' => $project->tags, 'share' => true
                ]);
                ?>
            </div>
        </div>
    </div>
</article>