<?php

    if ($_SESSION['black'] == "black") :
    ?>
    <style>
        body{
            background-color: black;
            color: white;
        }
        .subnav-content{
            background-image: linear-gradient(to right, #006bef 0%, black 97%);
        }
        .navbar {
        overflow: hidden;
        background-image: linear-gradient(to right, #006bef 0%, black 97%);
        }

    </style>
<?php
    endif;
