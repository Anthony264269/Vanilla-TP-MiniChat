<?php


try {
    $dsn = 'mysql:hots=localhost;dbname=mini-chat';

    $username = 'root';

    $password = '';

    $database = new PDO($dsn, $username, $password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "ça fonctionne";
} catch (PDOException $message) {

    echo "il y a un problème <br>" . $message;
}
