<?php
require_once 'partials/_start_session.php';
require_once 'partials/_check_is_not_logged.php';
require_once 'models/Task.php';

require_once 'models/User.php';



$message = '<div> Veuillez ajouter une tache SVP.</div>';


// FONCTION DELETE 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete']) && isset($_POST['supp'])) {

    $delete = Task::deleteTask($id);

    foreach ($_POST['supp'] as $this->id) {
        $stmt2->execute(['id' => $this->id]);
    }
}

// FONCTION déjà fait 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['is_done']) && isset($_POST['supp'])) {


    $statement = $pdo->prepare("UPDATE TASK SET is_done = 1 WHERE id=:id");

    foreach ($_POST['supp'] as $id) {
        $statement->execute(['id' => $id]);
    }
}


// affichage des task

$tasks = Task::displayTask();








require_once 'views/index.php';
