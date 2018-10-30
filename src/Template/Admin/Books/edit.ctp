<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $book
 */



$this->start('title');
echo h($book->title);
$this->end();

$this->start('ribbon');
$breadcrumbs = [
    0 => [
        'title' => __('Books'),
        'url' => ['controller' => 'books', 'action' => 'index']
    ],
    1 => ['title' => h($book->title)]
];
echo $this->element('ribbon', array('breadcrumbs' => $breadcrumbs));
$this->end();

$this->start('title-heading');
echo $this->element('title', 
    [
        'title' => h($book->title), 
        'id' => h($book->id)
    ]
);
$this->end();

$this->start('navigation');
$menu['books'] = [1 => true];
echo $this->element('navigation', ['menu' => $menu]);
$this->end();

$this->start('script');
echo $this->Html->script([
    'plugin/summernote/summernote.min',
    'plugin/select2/select2.min',
    'plugin/bootstrap-tags/bootstrap-tagsinput.min'
]);
$this->end();
?>

<?php $this->start('script1'); ?>
<script>
    $(document).ready(function() {
		$('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']]
            ]
		});
    });
</script>
<?php $this->end(); ?>

<section id="widget-grid">
    <div class="row">
        <article class="col-md-12">

            <!-- Widget ID (each widget will need unique ID)-->
            <div class="jarviswidget" id="wid-id-4" 
                 data-widget-editbutton="false" 
                 data-widget-colorbutton="false" 
                 data-widget-deletebutton="false" 
                 data-widget-custombutton="false"
                 data-widget-fullscreenbutton="false"
                 data-widget-togglebutton="false"
                 data-widget-sortable="false"
            >
                <header></header>

                <!-- widget div-->
                <div>
                    <!-- widget content -->
                    <div class="widget-body">
                        <?php
                        echo $this->Form->create($book, [
                            'autocomplete' => 'off',
                            'templates' => 'SmartAdmin.app_form'
                        ]);
                        ?>
                        <div clas="row">
                            <div class="col-sm-12 col-md-7 col-lg-8">
                                <?php
                                echo $this->Form->control('title', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control input-lg',
                                    'placeholder' => __('Title')
                                ]);
                                echo $this->Form->control('alias', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'placeholder' => __('Alias')
                                ]) . '<hr/>';
                                
                                echo $this->Form->control('book_category_id', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'placeholder' => __('Book category')
                                ]);
                                echo $this->Form->control('body', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control summernote',
                                    'placeholder' => __('Body')
                                ]);
                                ?>
                            </div>
                            <div class="col-sm-12 col-md-5 col-lg-4">
                                <?php
                                echo $this->Form->control('cover', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'placeholder' => __('Cover URI')
                                ]);
                                echo $this->Form->control('author', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'placeholder' => __('Author')
                                ]);
                                echo $this->Form->control('date_publication', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control datepicker',
                                    'data-dateformat' => 'yy-mm-dd',
                                    'type' => 'text',
                                    'value' => $book->date_publication->i18nFormat('yyyy-MM-dd'),
                                    'placeholder' => __('Date publication')
                                ]);
                                echo $this->Form->control('isbn', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'placeholder' => __('ISBN')
                                ]) . '<hr/>';
                                
                                echo $this->Form->control('meta_keywords', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'type' => 'textarea',
                                    'placeholder' => __('Meta Keywords')
                                ]);
                                echo $this->Form->control('meta_description', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control',
                                    'type' => 'textarea',
                                    'placeholder' => __('Meta Description')
                                ]) . '<hr/>';
                                
                                echo $this->Tag->control([
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control tagsinput',
                                    'data-role' => 'tagsinput',
                                    'placeholder' => __('Tags')
                                ]) . '<hr/>';
                                
                                echo $this->Form->control('date_readed', [
                                    'label' => ['class' => 'sr-only'],
                                    'class' => 'form-control datepicker',
                                    'data-dateformat' => 'yy-mm-dd',
                                    'type' => 'text',
                                    'value' => $book->date_readed->i18nFormat('yyyy-MM-dd'),
                                    'placeholder' => __('Date readed')
                                ]);
                                echo $this->Form->control('published', [
                                    'class' => 'checkbox'
                                ]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                echo $this->Form->submit(null, [
                                    'class' => 'btn btn-primary'
                                ]);
                                ?>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <!-- end widget content -->

                </div>
                <!-- end widget div -->

            </div>
            <!-- end widget -->

        </article>
    </div>
</section>
