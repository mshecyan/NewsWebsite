<div class="container-fluid">
    <div class="container">
        <div class="alert alert-danger d-flex flex-column">
            <?php foreach ($errors as $error) { ?>
                 <span><?= $error ?></span>
            <?php } ?>
        </div>
    </div>
</div>