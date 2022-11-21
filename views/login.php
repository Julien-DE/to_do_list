<?php ob_start() ?>
<header class="container d-grid gap-3 mt-5">
    <div class="mb-3 mx-auto">
        <h1> Veuillez vous connecter pour accèder à To-Do List</h1>
    </div>
</header>

<div class="container">
    <?php require_once 'partials/_errors.php' ?>
    <!-- register form with email and password repeat -->
    <form action="" method="post" id="register">
        <!-- input for email -->
        <div class="form-group">
            <label for="email">Votre adresse email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <!-- input for password -->
        <div class="form-group">
            <label for="password">Votre mot de passe</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <!-- input for Submit -->
        <div class="form-group">
            <input type="submit" name="submit" value="Se connecter" class="btn btn-primary">
        </div>
    </form>
</div>

<div class="container d-grid gap-3 mt-5">
    <p class="mb-3 mx-auto"> Si vous n'avez pas encore de compte, vous pouvez en créer un maintenant.</p>
    <a class="btn btn-primary mb-3 mx-auto" role="button" aria-disabled="true" href="register.php">Créer un compte</a>
</div>

<?php

$content = ob_get_clean();
include 'layout.php'

?>