<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();

$file = "file.txt";
$action = filter_input(INPUT_POST, 'action');
$contenu = filter_input(INPUT_POST, 'texte', FILTER_SANITIZE_STRING);
$retour = filter_input(INPUT_POST, 'retour');
$_SESSION['texte'] = $contenu;
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="POST" action="formulaire.php">
            <p><label>Entrer le texte</label><input type="text" name="texte" value=<?= $contenu ?>></p>
            <p><input type="submit" name="action"></p>
            
        </form>
        <form action="index.php" method="POST">
            <input type="submit" name="retour" value="retour">
        </form>
        <article>
        <div><object data="<?php echo $file ?>"></object></div>
        </article>
        </body> 
            <?php
            echo $_SESSION['texte'];
             $contenu = $_SESSION['texte'];
             if (isset($action)) {
            
              $file = "file.txt";
            $content = serialize($contenu);
            file_put_contents($file, $content);
            $content = unserialize(file_get_contents($file));
            
             }
             if (isset($retour)) {
    
            $contenu = $_SESSION['texte'];
}

             ?>
</html>
