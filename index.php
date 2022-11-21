<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}


require_once "connec.php";



$message = '<div> Veuillez ajouter une tache SVP.</div>';


// FONCTION DELETE 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete']) && isset($_POST['supp'])) {

    $sql = "DELETE FROM task WHERE id=:id";
    $statement = $pdo->prepare($sql);

    foreach ($_POST['supp'] as $id) {
        $statement->execute(['id' => $id]);
    }
}

// FONCTION déjà fait 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['is_done']) && isset($_POST['supp'])) {

    $sql = "UPDATE TASK SET is_done = 1 WHERE id=:id";
    $statement = $pdo->prepare($sql);

    foreach ($_POST['supp'] as $id) {
        $statement->execute(['id' => $id]);
    }
}


// affichage des task

$id_user = $_SESSION["user"]["id"];
$sql = "SELECT * FROM task WHERE id_user=$id_user";
$statement = $pdo->prepare($sql);
$statement->execute();
$tasks = $statement->fetchAll(PDO::FETCH_OBJ);

require_once 'views/index.php';
