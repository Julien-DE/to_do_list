<?php require_once '_partials/header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Creation de votre compte</title>
</head>

<body>
    <header class="container d-grid gap-3 mt-5">
        <div class="mb-3 mx-auto">
            <h1> Creation de votre compte</h1>
        </div>
    </header>
    <form action="" method="post">
        <div class="container d-grid gap-3 mt-5">
            <div class="mb-3 mx-auto">
                <label for="name">Nom</label>
                <input type="name" class="form-control" name="name" id="name" required>
            </div>
            <div class="mb-3 mx-auto">
                <label for="email" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 mx-auto">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <input type="submit" class="btn btn-primary mb-3 mx-auto" name="register" Value="Créer votre compte">
            <?php

            if (isset($message)) {
                echo '<div class="text-danger mb-3 mx-auto">' . $message . '</div>';
            }
            ?>
        </div>
    </form>

    <? require_once '_partials/footer.php'; ?>