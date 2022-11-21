<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}

require_once "connec.php";
if (
    isset($_POST['date']) && isset($_POST['name']) && !empty($_POST['name'])


) {

    $id_user = $_SESSION["user"]["id"];
    $stmt = $pdo->prepare("INSERT INTO `task` (`name`, `to_do_at`, `id_user`) VALUES (:name, :date,  $id_user) 
    ");
    $stmt->execute(
        array(

            'name' => $_POST['name'],
            'date' => $_POST['date']
        )
    );
    $name = $_POST['name'];
    $date = $_POST['date'];
    $message_empty = "<label>vous devez rentrer un nom de tâche</label>";
    $message = "<label>Votre tâche $name en date du $date a bien été ajoutée à la TO-DO-LIST.</label>";
}



unset($pdo);

require_once 'views/add.php';
