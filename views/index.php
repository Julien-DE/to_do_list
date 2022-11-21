<?php require_once '_partials/header.php'; ?>

<body>
    <header class="container d-grid gap-3 mt-5">
        <div class="mb-3 mx-auto">
            <h1> TO-DO-LIST</h1>
        </div>
        <h2 class="mb-4 text-center">Bonjour <?= strtoupper($_SESSION["user"]["name"]) ?></h2>
    </header>

    <table class="table">
        <div class=" container d-grid mb-3 mx-auto">
            <a class=" btn btn-primary mb-3 mx-auto" role="button" href="add.php">Ajouter une tâche</a>
        </div>

        <?php
        if (!isset($tasks) || empty($tasks)) : ?>
            <div class="container alert alert-info">
                Veuillez ajouter une tache SVP!
            </div>

        <?php else : ?>
            <div class="container mt-5">
                <form method="GET" id="orderForm">
                    <select name="order" id="order" class=" form-select-sm mb-3 mx-auto">
                        <option value="">Trier par</option>
                        <option value="ASC"> Echéance la plus proche </option>
                        <option value="DESC">Echéance la plus lointaine</option>
                    </select>
                </form>
            </div>

            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Tâche</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <form action="" method="POST">

                    <?php
                    foreach ($tasks as $task) : ?>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type='checkbox' name='supp[]' value='<?= $task->id; ?>' />
                                </div>
                            </td>
                            <td><?= $task->name ?></td>
                            <td><?= $task->to_do_at ?></td>

                            <td>
                                <a href="edit.php?id=<?= $task->id ?>" class="btn btn-warning">Modifier</a>
                            </td>
                            <td>
                                <?php
                                if ($task->is_done == 1) : ?>
                                    <div class="text-success mb-3 mx-auto">DEJA FAIT</div>
                                <?php elseif ($task->to_do_at <= date('Y-m-d')) : ?>
                                    <div class="text-danger mb-3 mx-auto">RETARD</div>
                                <?php else : ?>
                                    <div class=" mb-3 mx-auto"></div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <div class="container d-flex mt-5">
                        <input type='submit' value='supprimer' name="delete" class="btn btn-danger mb-3 mx-auto">
                        <button type="submit" class="btn btn-success mb-3 mx-auto" name="is_done"> Déjà fait</button>
                    </div>
                </form>
            </tbody>
        <?php endif; ?>
    </table>
    <div class="container d-flex mt-5">
        <a href="logout.php" class="btn btn-primary mb-3 mx-auto">Se déconnecter</a>
    </div>
    <script>
        const orderOption = document.getElementById('order');
        orderOption.addEventListener('change', () => {

            let url = new URL(window.location.href);
            url.searchParams.set('order', orderOption.value);
            window.location.href = url.href;
        })
    </script>
    <?php require_once '_partials/footer.php'; ?>