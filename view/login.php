<!DOCTYPE html>

<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
    header("Location: ../index.php");
}
require_once '../controller/cLogin.php';
$login = new cLogin();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Tela de Login</h1>
        <form action= "<?php $login->logar(); ?>" method="POST">
            <input type="email" name="email" required placeholder="E-mail login"/>
            <br><br>
            <input type="password" name="pas" required placeholder="Senha..."/>
            <br><br>
            <input type="submit" name="logar" value="Logar"/>
        </form>
    </body>
</html>
