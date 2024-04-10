<?php require_once VIEWS . '/header.tpl.php'; ?>
<?php require_once VIEWS . '/navbar.tpl.php'; ?>

<div class="container-fluid">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="container-fluid bg-body-secondary p-3">

            <form action="/methods/save.php" class="d-flex flex-column" method="post">
                <input type="text" value="-0" name="id" hidden>
                <label for="title">Заголовок</label>
                <input type="text" name="title" class="mb-2">
                <label for="announce">Анонс</label>
                <input type="text" name="announce" class="mb-2">
                <label for="text">Текст</label>
                <textarea name="text" class="mb-2"></textarea>
                <button type="submit">Сохранить</button>
            </form>
            <a href="index.php" class="d-flex mt-2">
                <button class="w-100">Отмена</button>
            </a>

        </div>
    </div>
</div>

<?php require_once VIEWS . '/footer.tpl.php'; ?>