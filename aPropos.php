<?php
session_start();

$mod = filter_input(INPUT_GET, 'mod', FILTER_SANITIZE_STRING);

if (empty($_SESSION['black'])) {
    $_SESSION['black'] = "white";
}

if ($mod == "yes") {
    if ($_SESSION['black'] == "white") {
        $_SESSION['black'] = "black";
    }else{
        $_SESSION['black'] = "white";
    }
}
?>
<html>
    <head>
        <title>Site News CFPT</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
        <?php include_once 'blackmod.php'; ?>
    <body>
        <header>
            <img src="img/logo.png" alt="logo cfpt"/>
            <h1>Site News CFPT</h1>
        </header>
        <?php include 'nav.php' ?>
        <section>
            <h2>A propos du site...de nous...</h2>
            <p>Ce site a été créé par un groupe d'informaticien qui est en deuxième année. Le but de ce site est de pouvoir connaitre les nouvelles actualités dans le monde de la nouvelle technologie. Il a été créé pour pouvoir partagé des informations sur l'école d'informatique comme des événements particuliers et aussi sur des dates importantes à retenir. </p>
            <p>Sur chaque article, nous indiquons les sources de ce dernier. Les auteurs d'articles sont vérifiés pour ne pas avoir des articles avec des fautes. </p>
            <p>Les créateurs du site sont : Elian Cruz, Luca Wolhers, Steven Favre et Samuel Domingues.</p>
        </section>
        <footer>
            <a href="pages/contact.html">Contact</a>
            <?= empty($_SESSION['nom']) ? '' : '<a href="formulaire.php">Modifier le contenu</a>' ?>
        </footer>
    </body>
</html>