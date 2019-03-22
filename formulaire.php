<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$ajouter = filter_input(INPUT_POST, 'ajouter');
$modifier = filter_input(INPUT_POST, 'modifier');
$unlink = filter_input(INPUT_POST, 'unlink');
$retour = filter_input(INPUT_POST, 'retour');

if (!isset($_SESSION['nomArticleChoisi'])) {
$nomArticle = filter_input(INPUT_POST, 'nomArticle', FILTER_SANITIZE_STRING);
$article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING);
$choisirArticle = array();
$articleAChoisir = filter_input(INPUT_POST, 'articleAChoisir');
$texteModifie = filter_input(INPUT_POST, 'texteModifie', FILTER_SANITIZE_STRING);
$nomArticleChoisi = "";
$_SESSION['nomArticleChoisi'] = "";
}
else{
    $nomArticleChoisi = $_SESSION['nomArticleChoisi'];
$nomArticle = filter_input(INPUT_POST, 'nomArticle', FILTER_SANITIZE_STRING);
$article = filter_input(INPUT_POST, 'article', FILTER_SANITIZE_STRING);
$choisirArticle = array();
$articleAChoisir = filter_input(INPUT_POST, 'articleAChoisir');
$texteModifie = filter_input(INPUT_POST, 'texteModifie', FILTER_SANITIZE_STRING);
}
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

        <?php
        if ($ajouter) {
            $fp = fopen('tmp/' . $nomArticle . '.txt', 'w');
            fwrite($fp, $article);
            fclose($fp);
        }
        ?>

        <form action="formulaire.php" method="POST">

            <p><label>Créer un nom pour un nouvel article</label><input type="text" name="nomArticle"></p>
            <p> <label>Ecrire le texte à publier</label>
                <input type="text" name="article"></p>    
            <p><input type="submit" name="ajouter" value="ajouter un nouveau article"></p>

            <p><label>Choisir l'article à modifier</label>
                <!-- Afficher tout les fichiers dans le dossier tmp-->
                <?php
                foreach (glob("tmp/*")as $filename) {
                    array_push($choisirArticle, $filename);
                }
                foreach ($choisirArticle as $value) {
                    
                    $value = substr($value, 4);
                    echo "<input type='submit' name='articleAChoisir' value='$value'>";
                }
                if ($articleAChoisir) {
                    $_SESSION['nomArticleChoisi'] = "";
                    $nomArticleChoisi = $articleAChoisir;
                    if ($_SESSION['nomArticleChoisi'] == "") {
                        $_SESSION['nomArticleChoisi'] = $nomArticleChoisi;
                    }
                    ?>
                <p><label>Voici le texte à modifier</label></p>
                <textarea name="texteModifie"><?php echo file_get_contents("./tmp/$articleAChoisir"); ?></textarea>;
            <?php } 
            if ($modifier) {
                $nomArticleChoisi = $_SESSION['nomArticleChoisi'];
                $fp = fopen("./tmp/". $nomArticleChoisi, 'w');
                fwrite($fp, $texteModifie);
                fclose($fp);
            }
            ?>
            <p><input type="submit" name="modifier" value="submit"></p>
            <!-- <p><label>Supprimer un article : </label></p>-->
            <?php
           /* foreach ($choisirArticle as $value) {
                    $value = substr($value, 4);
                    echo "<input type='submit' name='unlink' value='$value'>";
                }
        if ($unlink) {
            $myFileUnlink = "./tmp/".$unlink;
            if (!unlink($myFileUnlink)) {
                echo "Error deleting $myFileUnlink";
            }
            else{
                echo "Deleted file $myFileUnlink";
            }
            //unlink($myFileUnlink) or die("Ne peut pas supprimer le fichier");
        }
           */ ?>
            <p><label>Retourner :</label><input type="submit" name="retour" value="Retour"></p>
        <?php
        if ($retour) {
            header("Location: index.php");
        }
        ?>
        </form>
    </body>
</html>
