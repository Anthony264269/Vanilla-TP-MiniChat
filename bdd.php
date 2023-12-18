<?php

//var_dump($_POST);

if (
    isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&

    isset($_POST['content']) && !empty($_POST['content'])


) {

    
    require_once('./connect.php');
}
    $requete = $database->prepare("INSERT INTO message (pseudo, content) 
                    VALUES (:pseudo, :content)");

    $result = $requete->execute([
        'pseudo' => $_POST['pseudo'],
        'content' => $_POST['content'],
       
    ]);


header("Location: index.php");
