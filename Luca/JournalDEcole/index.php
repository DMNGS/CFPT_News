<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$file = "News.txt";
$action = filter_input(INPUT_POST, 'action');
$contenu = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING);


/* $content = serialize($contenu);
      file_put_contents($file, $content);
      $content = unserialize(file_get_contents($file)); */
$text = file_get_contents($file);

if ($action) {
    
    echo $text;
}
?>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="POST" action="index.php">
            <input type="text" name="text" value="">
            <input type="submit" name="action">
        </form>
        <article>
            <div><object data=""></object></div>
        </article>
        <?php  ?>
    </body>
</html>

