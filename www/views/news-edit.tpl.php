<?php require_once VIEWS . '/header.tpl.php'; ?>
<?php require_once VIEWS . '/navbar.tpl.php'; ?>
<?php get_errors(); ?>

<div class="container-fluid">
    <div class="container d-flex justify-content-center align-items-center">
        <?php if ($news) { ?>
            <div class="container-fluid bg-body-secondary p-3">

                <form action="/methods/save.php" class="d-flex flex-column" method="post">
                    <input type="text" value="<?= ($news->id === 0) ? '-' . $news->id : $news->id ?>" name="id" hidden>
                    <label for="title">Заголовок</label>
                    <input type="text" value="<?= $news->title ?>" name="title" class="mb-2">
                    <label for="announce">Анонс</label>
                    <input type="text" value="<?= $news->announce ?>" name="announce" class="mb-2">
                    <label for="text">Текст</label>
                    <textarea name="text" class="mb-2"><?= $news->text ?></textarea>
                    <button type="submit">Сохранить</button>
                </form>
                <a href="index.php?page=<?= $current_page ?>" class="d-flex mt-2">
                    <button class="w-100">Отмена</button>
                </a>
            </div>
        <?php } else { ?>
            <span>Новость не найдена</span>
        <?php } ?>
    </div>
</div>

<?php require_once VIEWS . '/footer.tpl.php'; ?>