<?php

//var_dump($_POST);

if (
    isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&

    isset($_POST['content']) && !empty($_POST['content'])


) {

    
    require_once('./connect.php');

    $requete = $database->prepare("INSERT INTO user (id, pseudo) 
                    VALUES (:id,:pseudo)");

    $result = $requete->execute([
        'id' => $_POST['id'],
        'pseudo' => $_POST['pseudo'],
       
    ]);
}

header("Location: index.php");
