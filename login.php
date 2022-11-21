<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

$message = "Le mail ou le mot de passe est incorrecte";

if (!empty($_POST)) {
    if (
        isset($_POST['email'], $_POST['password'])
        && !empty($_POST['email']) && !empty($_POST['password'])
    ) {
        $_SESSION["error"] = [];
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"][] = $message;
        }

        $pass = password_hash($_POST["password"], PASSWORD_ARGON2ID);


        require_once "connec.php";
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare("SELECT * FROM `user` WHERE `email` = :email");
        $stmt->execute([
            'email' => $_POST['email'],
        ]);
        $user = $stmt->fetch();
        if (!$user) {
            $_SESSION["error"][] = $message;
            $user["password"] = "";
        }
        //Si le mail est existant, on verifie le mot de passe
        if (!password_verify($_POST["password"], $user["password"])) {
            $_SESSION["error"][] = "";
        }
        //Si il y a une erreur enregistrée dans la session, on arrête
        if ($_SESSION["error"] === []) {

            //on ouvre la session pour la connection au gestionnaire de tâche
            session_start();
            $_SESSION["user"] = [
                "id" => $user["id"],
                "name" => $user["name"],
                "email" => $user["email"]
            ];
            header('Location: index.php');
        }
        unset($pdo);
    }
}
require_once 'views/login.php';
