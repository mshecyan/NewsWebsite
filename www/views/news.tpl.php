<?php require_once VIEWS . '/header.tpl.php'; ?>
<?php require_once VIEWS . '/navbar.tpl.php'; ?>

<div class="container-fluid">
    <div class="container">
        <div class="container-fluid bg-body-secondary p-3">
            <h2><?= $news->title ?></h2>
            <h4><?= $news->announce ?></h4>
            <p><?= $news->text ?></p>
            <span><?= $news->date ?></span>
        </div>
    </div>
</div>

<?php require_once VIEWS . '/footer.tpl.php'; ?>