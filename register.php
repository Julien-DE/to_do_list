<?php

session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}

// require_once '_partials/header.php';

if (!empty($_POST)) {
    if (
        isset($_POST['name'], $_POST['email'], $_POST['password'])
        && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])
    ) {
        //Récupération des données sécurisées
        $userName = strip_tags($_POST["name"]);
        $_SESSION["error"] = [];
        if (strlen($userName) < 3) {
            $_SESSION["error"][] = "Le nom est trop court";
        }
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"][] = "L'adresse email est incorrecte";
        }
        //Si il y a une erreur enregistrée dans la session, on arrête
        if ($_SESSION["error"] === []) {
            //On va hasher le mot de passe    
            $pass = password_hash($_POST["password"], PASSWORD_ARGON2ID);
            // On enregistre dans la BDD
            require_once "connec.php";
            //Vérifier si le mail est déjà dans la BD 
            $stmt = $pdo->prepare("SELECT * FROM `user` WHERE `email` = :email");
            $stmt->execute(array(
                'email' => $_POST["email"]
            ));
            $count = $stmt->rowCount();
            if ($count > 0) {
                $_SESSION["error"][] = "Ce mail est déjà enregistré";
                $user = $stmt->fetch();
            } else {
                $stmt = $pdo->prepare("INSERT INTO `user` (`name`, `email`, `password`) VALUES (:name, :email, :password)");
                $stmt->execute([
                    'name' => $userName,
                    'email' => $_POST['email'],
                    'password' => $pass
                ]);
                unset($pdo);
                header('Location: login.php');
            }
        }
    } else {
        $_SESSION["error"] = "Le formulaire est incomplet";
    }
}

?>



<!DOCTYPE html>
<html lang="fr">



<?php require_once 'views/register.php'; ?>