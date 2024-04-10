<div class="container-fluid bg-body-secondary py-3 mb-3">
    <div class="container d-flex flex-row">
        <a href="index.php" class="me-3">Новости</a>

        <?php if (check_auth()) { ?>
            <a href="/methods/logout.php">Выйти</a>
        <?php } else { ?>
            <a href="/login.php">Войти</a>
        <?php } ?>
    </div>
</div>