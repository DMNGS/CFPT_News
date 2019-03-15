<nav>
    <form action="index.php" method="GET">
        <!-- Commande pour afficher la date lors du chargement de la page -->
        <?php echo '<a id="date">' . date("l jS \of F Y h:i:s A") . "</a>" . "<br>"; ?>
        
        <div class="navbar">
            <!-- Pour ajouter un item sans déroulant -->
            <a href="index.php">Page d'accueil</a>
            <div class="subnav">
                <!-- Pour ajouter un bouton avec lequel se déroule des options -->
                <button class="subnavbtn">Libellé</button>
                <!-- Pour ajouter des options au menu déroulant -->
                <div class="subnav-content">
                    <a href="technologie.php"><!--<input type="submit" name="libelle" value="newtech">-->Nouvelle Technologie</a>
                    <a href="ecole.php"><!--<input type="submit" name="libelle" value="school">-->Ecole</a>
                </div>
            </div> 
            <div class="subnav">
                <a href="aPropos.php">A propos</a>
            </div> 
            <div class="subnav">
                <button class="subnavbtn" name="mod" value="yes">Change Mod</button>
            </div> 
            <?= empty($_SESSION['nom']) ? '<a href="pageLogin.php">Connexion</a>' : '<a href="logout.php">Déconnexion</a>' ?>
        </div>
    </form>
</nav>
