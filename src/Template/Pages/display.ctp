<?php
$this->start('title');
echo h($page->title);
$this->end();

$this->start('meta');
echo $this->element('meta', [
    'meta_keywords' => h($page->meta_keywords),
    'meta_description' => h($page->meta_description)
]);
$this->end();

$this->start('header');
echo $this->element('header');
$this->end();
?>

<div class="container-fluid display-page">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8">
            <h1 class="heading">Марат Даллин: проектирование и разработка веб-приложений.</h1>
            <p class="description">Я проектирую и разрабатываю веб-приложения. Провожу консультации по CakePHP. Веду <a href="/posts">блог</a> по веб разработке.<br>Давайте сотрудничать.</p>
        </div>
    </div>
    <section class="section-contact">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8">
                <div class="row mt-5 mb-5">
                    <div class="col-12 col-xl-4">
                        <header>
                            <h1>Контакты</h1>
                        </header>
                    </div>
                    <div class="col-12 col-xl-8">
                        <span class="email">mail@dallin.uz</span>
                        <div class="social-link">
                            <a href="https://www.facebook.com/amr.dallin" target="_blank">https://www.facebook.com/amr.dallin</a><br/>
                            <a href="https://telegram.me/dallinpro" target="_blank">https://telegram.me/dallinpro</a><br/>
                            <a href="https://www.linkedin.com/in/dallinpro/" target="_blank">https://www.linkedin.com/in/dallinpro</a>
                        </div>
                    </div>
                </div>

            </div>
    </section>
    <hr/>
    <section class="section-posts mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8">
                <header class="mt-5">
                    <h2>Последние статьи</h2>
                </header>
                <?php foreach($posts as $post): ?>
                <article>
                    <div class="row">
                        <div class="col-12 col-xl-2 date">
                            <footer>
                                <time datetime="<?php echo $this->Time->format(h($post->date_created), 'YYYY-MM-dd'); ?>"><?php echo $this->Time->format(h($post->date_created), 'dd.MM.YYYY'); ?></time>
                            </footer>
                        </div>
                        <div class="col-12 col-xl-10">
                            <header>
                                <h3 class="h6 mb-3">
                                    <?php
                                    echo $this->Html->link(
                                        h($post->title), 
                                        ['controller' => 'posts', 'action' => 'view', 'alias' => h($post->alias)], 
                                        ['title' => h($post->title)]
                                    );
                                    ?>
                                </h3>
                            </header>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>


