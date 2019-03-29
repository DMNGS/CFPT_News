<?php
session_start();
$mod = filter_input(INPUT_GET, 'mod', FILTER_SANITIZE_STRING);

if (empty($_SESSION['black'])) {
    $_SESSION['black'] = "white";
}

if ($mod == "yes") {
    if ($_SESSION['black'] == "white") {
        $_SESSION['black'] = "black";
    } else {
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
            <img class="imageCFPT" src="img/logo.png" alt="logo cfpt"/>
            <h1>Site News CFPT</h1>
        </header>
        <?php include 'nav.php' ?>
        <section>
            <h2>Voici la page avec les articles sur les nouvelles technologies!</h2>

            <?php
            echo "<p>" . file_get_contents("./tmp/Article Technologie 1.txt") . "</p>"; // get the contents, and echo it out.
            echo "<p>" . file_get_contents("./tmp/Article Technologie 2.txt") . "</p>"; // get the contents, and echo it out.
            echo "<p>" . file_get_contents("./tmp/Article Technologie 3.txt"). "</p>";
            ?></section>
        <?php include 'footer.php' ?>
    </body>
</html>
