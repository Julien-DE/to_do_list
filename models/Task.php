<?php
require_once 'partials/Connexion.php';
require_once 'models/User.php';

class Task

{

    public int $id;
    public string $name;
    public string $to_do_at;
    public bool $is_done;
    public int $id_user;

    public function getId(): int
    {
        return $this->id;
    }

    public function getname(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDate(): string

    {
        return $this->to_do_at;
    }

    public function setDate(string $to_do_at): void
    {
        $this->to_do_at;
    }

    public function getDone(): bool

    {
        return $this->is_done;
    }
    public function setDone(bool $is_done): void

    {
        $this->is_done;
    }

    public function getIduser(): int

    {

        return $this->id_user = $this->id;
    }

    public static function displayTask()

    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();
        $stmt = $pdo->prepare("SELECT * FROM task WHERE id_user= :id_user");
        $stmt->bindParam(':id_user', $id_user);

        $stmt->execute();
        var_dump($id_user);
        $stmt->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        var_dump($stmt);
        $tasks = $stmt->fetchAll();
        var_dump($tasks);
        return $tasks;
    }

    public static function deleteTask()
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();
        $stmt2 = $pdo->prepare("DELETE FROM task WHERE id=:id");
    }
    public static function updateTask()
    {
        $cnx = new Connexion();
        $pdo = $cnx->getPdo();
        $stmt3 = $pdo->prepare("UPDATE TASK SET is_done = 1 WHERE id=:id");
    }
}
