<!DOCTYPE html>
<?php
$libelle = filter_input(INPUT_GET, 'libelle', FILTER_SANITIZE_STRING);
?>
<html>
    <head>
        <link href="main.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8">
        <title>Menu Interactif</title>
    </head>
    <body>
        <form action="index.php" method="GET">
            <!-- Commande pour afficher la date lors du chargement de la page -->
            <?php echo '<a id="date">' . date("l jS \of F Y h:i:s A") . "</a>" . "<br>"; ?>
            <div class="navbar">
                <!-- Pour ajouter un item sans déroulant -->
                <a href="#home">Page d'accueil</a>
                <div class="subnav">
                    <!-- Pour ajouter un bouton avec lequel se déroule des options -->
                    <button class="subnavbtn">Libellé <i class="fa fa-caret-down"></i></button>
                    <!-- Pour ajouter des options au menu déroulant -->
                    <div class="subnav-content">
                        <a><input type="submit" name="libelle" value="newtech">Nouvelle Technologie</a>
                        <a><input type="submit" name="libelle" value="concours">Concours</a>
                        <a><input type="submit" name="libelle" value="school">Ecole</a>
                    </div>
                </div> 
                <div class="subnav">
                    <button class="subnavbtn">A propos<i class="fa fa-caret-down"></i></button>
                </div> 
                <a href="#contact">Contact</a>
            </div>
            <?php
            if ($libelle == "newtech") {
                echo "<p>Nouvelle Technologie";
            }if ($libelle == "concours") {
                echo "<p>Concours</p>";
            }if ($libelle == "school") {
                echo "<p>Ecole</p>";
            }
           
            ?>
            
            
        </form>
    </body>
</html>
