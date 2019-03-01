<!DOCTYPE html>
<!--
Auteur  : DOMINGUES PEDROSA Samuel
Date    : 15.02.2019
Version : 1.0
-->
<?php
session_start();

if (isset($contenu)) {
    $contenu = $_POST['texte'];
}
$contenu = $_POST['texte'];
echo $contenu;
?>
<html>
    <head>
        <title>Site News CFPT</title>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <img src="img/logo.png" alt="logo cfpt"/>
            <h1>Site News CFPT</h1>
        </header>
        <nav>
            <ul>
                <li><a href="formulaire.php">Ecrire un article</a></li>
                <li><a href="#">Jeux Vidéo</a></li>
                <li><a href="#">Technologie</a></li>
                <li><a href="#">Internet</a></li>
            </ul>
        </nav>
        <section>
            <p><?= $contenu ?></p>
        </section>
        <footer>
            <a href="pages/contact.html">Contact</a>
        </footer>
    </body>
</html>
