<?php require_once '_partials/header.php'; ?>

<body>
    <header class="container d-grid gap-3 mt-5">
        <div class="mb-3 mx-auto">
            <h1> Veuillez vous connecter pour accèder à To-Do List</h1>
        </div>
    </header>

    <form action="" method="POST">
        <div class="container d-grid gap-3 mt-5 ">
            <div class="mb-3 mx-auto">
                <label for="email" class="form-label">Adresse email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mb-3 mx-auto">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password">
            </div>
            <?php if (isset($_SESSION["error"])) {
                foreach ($_SESSION["error"] as $message) { ?>
                    <div class="text-danger mb-3 mx-auto"> <?= $message ?> </div>
            <?php
                }
                unset($_SESSION["error"]);
            } ?>
            <input type="submit" class="btn btn-primary mb-3 mx-auto" name="login" value="Se connecter">
        </div>
    </form>

    <div class="container d-grid gap-3 mt-5">
        <p class="mb-3 mx-auto"> Si vous n'avez pas encore de compte, vous pouvez en créer un maintenant.</p>
        <a class="btn btn-primary mb-3 mx-auto" role="button" aria-disabled="true" href="register.php">Créer un compte</a>
    </div>

    <?php require_once '_partials/footer.php'; ?>