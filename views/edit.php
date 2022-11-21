<?php require_once '_partials/header.php'; ?>

<body>

    <header class="container d-grid gap-3 mt-5">
        <div class="mb-3 mx-auto">
            <h1> Modification d'une tâche</h1>
        </div>
    </header>
    <form action="" method="post">
        <div class="container d-grid gap-3 mt-5 ">
            <div class="mb-3 mx-auto">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?= $tasks->to_do_at ?>">
            </div>
            <div class="mb-3 mx-auto">
                <label for="task" class="form-label">Tâche</label>
                <input type="text" class="form-control" id="task" name="name" value="<?= $tasks->name ?>">
            </div>
            <?php
            if (isset($message)) : ?>
                <div class="text-success mb-3 mx-auto"> <?= $message; ?> </div>';
            <?php endif; ?>
            <button type="submit" class="btn btn-primary mb-3 mx-auto">Modifier</button>
            <a href="index.php" class="btn btn-primary mb-3 mx-auto">Retourner au menu</a>
        </div>
    </form>
    <?php require_once '_partials/footer.php';
