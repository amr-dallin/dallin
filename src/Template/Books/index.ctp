<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
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
echo $this->element('header', ['menu' => 'books']);
$this->end();
?>


<div class="books-page">
    <div class="jumbotron jumbotron-fluid bg-light">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7 text-center">
                    <header>
                        <h1>Отзывы о прочитанных книгах</h1>
                    </header>
                    <div class="lead">
                        Я люблю читать и говорить о прочитанном. В этом разделе, с августа 2018 года, публикую своё мнение о прочитанных книгах.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container books-list mb-5">
        <div class="row">
            <?php foreach($books as $book): ?>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 book-item text-center">
                <article>
                    <?php
                    echo $this->Html->image(DS . h($book->cover), [
                        "alt" => h($book->title),
                        'url' => ['action' => 'view', 'alias' => h($book->alias)]
                    ]);
                    ?>
                    <header>
                        <h2><?php echo h($book->title); ?></h2>
                    </header>
                </article>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>