<?php
require_once 'partials/Connexion.php';

class Task

{

    private int $id;
    private string $name;
    private string $to_do_at;
    private bool $is_done;
    private int $id_user;

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
        return $this->id_user;
    }
}
