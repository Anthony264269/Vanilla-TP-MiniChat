<?php
// 1 er étape
require_once('./connect.php');
include_once('./partials/header.php');
include_once('./partials/footer.php')
?>


    
<body>
  

<main>
<section id="messages-block">
<?php
 $request = $database->query('SELECT * FROM user INNER JOIN message ON message.user_id = user.id');
 $messages = $request->fetchAll();


 foreach ($messages as $message) { 
?>
<b><?php echo $message['pseudo']?> : <?php echo $message['content']?><br/>
<?php
}
?>

</section>
<section id="write-message">
<form action="./bdd.php" method="POST">
  <div class="mb-3">
    <label for="pseudo" class="form-label">Pseudo</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo">
</div>
<div class="mb-3">
    <label for="text" class="form-label">Message</label>
    <input type="text" class="form-control" id="content" name="content">
</div>

  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

</section>
</main>
</body>
