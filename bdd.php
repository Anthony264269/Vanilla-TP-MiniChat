<?php

//var_dump($_POST);

if (
    isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&
    isset($_POST['content']) && !empty($_POST['content'])

) {
    require_once('./connect.php');
    // Select un utilisateur par rapport à son pseudo
    // Si l'utilisateur existe , récupérer son id
    // S'il n'existe pas  Insert le nouveau utilisateur (deja fait)
    $requete = $database->prepare("INSERT INTO user (pseudo) 
                    VALUES (:pseudo)");

    $result = $requete->execute([
        'pseudo' => $_POST['pseudo'],


    ]);
    //comment retrouver l' id aprés un insert en my sql pdo

    $requete = $database->prepare("INSERT INTO `message` (content, created_at, ip_adress, user_id) 
    VALUES (:content, :created_at, :ip_adress, :user_id)");
    $date = date('Y-m-d h:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $user = $database->lastInsertId();
    var_dump($database->lastInsertId());
    $result = $requete->execute([
    
        'content' => $_POST['content'],
        'created_at' => $date,
        'ip_adress' => $ip,
        'user_id' => $user
    ]);
  
}

$verificationDoublon = $database->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
$verificationDoublon->execute([
    'pseudo' => $_POST['pseudo']
]);





header("Location: index.php");
