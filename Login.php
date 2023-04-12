<form method="post">
    <label for="Usuario">Usuário:</label>
    <input type="text" name="login"> <br>
    <label for="senha">Senha:</label>
    <input type="password" name="senha"><br>
    <input type="submit" name="acao" value="Cadastrar">
</form>

<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php

        if(isset($_SESSION['login'])){
           
            if (isset($_POST['acao'])){
                $login = 'fatec';
                $senha = 'araras';

                $loginForm = $_POST['login'];
                $senhaForm = $_POST['senha'];

                if ($login == $loginForm && $senha == $senhaForm){
                    //login realizado
                    $_SESSION['login'] = TRUE;
                    header('Location: PaginaPrincipal.php');
                }else{
                    //login errado
                    echo 'Usuário ou senha inválidos!';
                }
            }
        }
    ?>

    </body>
    </html>