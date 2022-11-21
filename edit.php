<?php

session_start();
if (!$_SESSION['user']) {
    header('Location: login.php');
}


require_once "connec.php";

$id_to_edit = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /*********Vérification*********** */

    try {
        $stmt = $pdo->prepare("UPDATE task SET `name` = :new_name, `to_do_at` = :new_date WHERE id = :id");
        $stmt->execute(array(
            'new_name' => $_POST['name'],
            'new_date' => $_POST['date'],
            'id' => $id_to_edit
        ));
        $message = '<div> Votre tâche a bien été modifiée.</div>';
    } catch (PDOException $error) {
        $message = $error->getMessage();
    };
}

$stmt = $pdo->prepare("SELECT * FROM task WHERE id = :id");
$stmt->execute([
    'id' => $id_to_edit
]);

$tasks = $stmt->fetch(PDO::FETCH_OBJ);

unset($pdo);


require_once 'views/edit.php';
