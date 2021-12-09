<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h4>Cadastro de Usuário</h4>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome aqui ..."/>
            <br><br>
            <input type="email" name="email" placeholder="E-mail aqui ..."/>
            <br><br>
            <input type="password" name="pas" placeholder="Senha aqui ..."/>
            <br><br>
            <input type="submit" name="salvar" value="Salvar"/>
            <input type="reset" name="limpar" value="Limpar"/>
        </form>

        <?php
            if (isset($_POST['salvar'])) {
                echo "<br>.: Dados do Formulário :.";
                echo "<br> Nome: " . $_POST['nome'];
                echo "<br> E-mail: " . $_POST['email'];
                echo "<br> Senha: " . $_POST['pas'];
                $pas = $_POST['pas'];
                $criptoMD5 = md5($pas);
                $criptoSha1 = sha1($pas);
                $criptoSha2 = hash('sha256', $pas);
                $criptoSha3 = hash('sha512', $pas);
                $criptoBase64 = base64_encode($pas);           
                $criptoPassword_Hash = password_hash($pas, PASSWORD_DEFAULT);
                $pasBD = '$2y$10$m2B02wO7Oya2ip8PdboUM.0OJfSTdWxeGqE/5ywYgxfDUVtzxRe8O';
                echo "<br>.: Padrões de encriptação :.";
                echo "<br> MD5: " . $criptoMD5;
                echo "<br> Sha1: " . $criptoSha1;
                echo "<br> Sha2: " . $criptoSha2;
                echo "<br> Sha3: " . $criptoSha3;
                echo "<br> Base64: " . $criptoBase64;
                echo "<br> password_hash: " . $criptoPassword_Hash;
                if (password_verify($pas, $pasBD)) {
                    echo "<br>Senha Válida!";
                } else {
                    echo "<br>Senha Inválida!";
                }
            }
        ?>
    </body>
</html>
