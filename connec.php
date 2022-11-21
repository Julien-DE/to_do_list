<?php

try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=to_do_list_db",
        "root",
        "",
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
} catch (PDOException $error) {
    $message = $error->getMessage();
};
