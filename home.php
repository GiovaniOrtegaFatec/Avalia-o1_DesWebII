<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php

        if(isset($_SESSION['login'])){
            include('Login.php');
        } else{
            include('Home.php');
        }

    ?>

    </body>
    </html>
