<?php require_once '_partials/header.php'; ?>

<body>
    <header class="container d-grid gap-3 mt-5">
        <div class="mb-3 mx-auto">
            <h1> Ajout d'une tâche</h1>
        </div>
    </header>
    <form action="" method="POST">
        <div class="container d-grid gap-3 mt-5 ">
            <div class="mb-3 mx-auto">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" value="<?= date('Y-m-d'); ?>">
            </div>
            <div class=" mb-3 mx-auto">
                <label for="name" class="form-label">Tâche</label>
                <input type="text" class="form-control" name="name">
                <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['name'])) : ?>
                    <div class="text-danger mb-3 mx-auto">Vous devez rentrer un nom de tâche</div>
                <?php else : ?>
                    <div></div>
                <?php endif; ?>
                <div class="container d-grid mt-5">
                    <?php
                    if (isset($message)) : ?>
                        <div class="text-success mb-3 mx-auto"> <?= $message; ?> </div>
                    <?php endif; ?>
                </div>
                <div class="container d-grid mt-5">
                    <button type="submit" class="btn btn-primary mb-3 mx-auto" name="add_task">Ajouter la tâche</button>
                    <a href="index.php" class="btn btn-primary mb-3 mx-auto">Retourner au menu</a>
                </div>
            </div>
    </form>

    <?php require_once '_partials/footer.php'; ?>