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
    <?php include_once 'blackmod.php'; ?>
    <body>
        <header>
            <img src="img/logo.png" alt="logo cfpt"/>
            <h1>Site News CFPT</h1>
        </header>
        <?php include 'nav.php' ?>
        <section style="text-align: center">
            <?php if (empty($_SESSION['nom'])) { ?>
                <form method="POST" action="pageLogin.php">
                    Nom d'utilisateur<br>
                    <input type="text" name="nom"/><br><br>
                    Mot de passe:<br>
                    <input type="password" name="mdp"/><br>
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
        <?php include 'footer.php' ?>
    </body>
</html>