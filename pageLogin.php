<?php
function checkIdentification($nom, $mdp) {

    $identifications = array(
        'admin' => 'f6889fc97e14b42dec11a8c183ea791c5465b658', // Super
    );

    if (isset($identifications[$nom])) {
        if ($identifications[$nom] == sha1($mdp)) {
            return true;
        }
    }
    return false;
}

session_start();

if (!isset($action)) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
}
$error = FALSE;
if ($action) {
    if (checkIdentification($nom, $mdp)) {
        $_SESSION['nom'] = $nom;
        $error = false;

        header('location: index.php');
        exit();
    } else {
        $_SESSION['user'] = "";
        $error = true;
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
    <body>
        <header>
            <img src="img/logo.png" alt="logo cfpt"/>
            <h1>Site News CFPT</h1>
        </header>
        <?php include 'nav.php' ?>
        <section>
            <?php if (empty($_SESSION['nom'])) { ?>
                <form method="POST" action="pageLogin.php">
                    <p>Nom d'utilisateur:</p>
                    <p><input type="text" name="nom"/></p>
                    <p>Mot de passe:</p>
                    <p><input type="password" name="mdp"/></p>
                    <p><input type="submit" name="action" value="Se connecter"/></p>
                </form>
                <?php
                if ($error == TRUE && empty($_SESSION['nom'])) {
                    echo "<p style='color:red; font-size: 20px;'>Nom d'utilisateur ou mot de passe incorrect.</p>";
                }
                } else {
                ?>
                <h2>Bonjour <?= $nom ?>, vous êtes bien connecté(e).</h2>
            <?php } ?>
        </section>
        <footer>
            <a href="pages/contact.html">Contact</a>
            <?= empty($_SESSION['nom']) ? '' : '<a href="formulaire.php">Modifier le contenu</a>' ?>
        </footer>
    </body>
</html>