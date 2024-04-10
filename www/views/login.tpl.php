<?php require_once VIEWS . '/header.tpl.php' ?>
<?php require_once VIEWS . '/navbar.tpl.php' ?>
<?php get_errors() ?>

<div class="container-fluid">
    <div class="container d-flex justify-content-center">
        <form action="methods/auth.php" method="post" class="d-flex flex-column">
            <label for="username">Имя пользователя</label>
            <input type="text" name="username">
            <label for="password">Пароль</label>
            <input type="password" name="password">
            <button type="submit" class="mt-2">Войти</button>
        </form>
    </div>
</div>

<?php require_once VIEWS . '/footer.tpl.php' ?>