<a href="/news.php?id=<?= $news->id ?>" class="w-100">
    <div class="container-fluid bg-body-secondary p-3 mb-3 d-flex flex-row">
        <div class="container-fluid">
            <h2><?= $news->title ?></h2>
            <h4><?= $news->announce ?></h4>
            <span><?= $news->date ?></span>
        </div>

        <?php if (check_auth()) { ?>
            <div>
                <a href="/methods/delete.php?page=<?= $current_page ?>&id=<?= $news->id ?>">Удалить</a>
                <a href="/admin/edit.php?page=<?= $current_page ?>&id=<?= $news->id ?>">Изменить</a>
            </div>
        <?php } ?>
    </div>
</a>