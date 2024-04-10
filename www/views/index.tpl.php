<?php require_once VIEWS . '/header.tpl.php'; ?>
<?php require_once VIEWS . '/navbar.tpl.php'; ?>

<div class="container-fluid">
    <div class="container d-flex justify-content-center align-items-center flex-column">
        <?php if (!$news_arr) { ?>
            <span>Нет новостей</span>
        <?php } ?>

        <?php if (check_auth() && $current_page == 1) { ?>
            <a href="add.php" class="d-flex w-100 mb-3">
                <button class="w-100">Добавить</button>
            </a>
        <?php } ?>

        <?php foreach ($news_arr as $news) {
            require VIEWS . '/news-short.tpl.php';
        } ?>
    </div>
    <div class="container-fluid">
        <div class="container d-flex flex-row justify-content-center">
            <?php if ($page_count > 1) { ?>
                <?php for ($i = 0; $i < $page_count; $i++) { ?>
                    <?php if ($current_page == ($i + 1)) { ?>
                        <a href="?page=<?= $i + 1 ?>" class="p-2 px-3 bg-primary text-white"><?= $i + 1 ?></a>
                    <?php } else { ?>
                        <a href="?page=<?= $i + 1 ?>" class="p-2 px-3"><?= $i + 1 ?></a>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php require_once VIEWS . '/footer.tpl.php'; ?>