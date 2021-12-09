<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['logado']) && $_SESSION['logado'] != true) {
    header("Location: login.php");
} else {
    echo $_SESSION['usuario'] . " | " . $_SESSION['email'];
    echo " | <a href='../controller/logout.php'>Sair</a>";
}
require_once '../controller/cUsuario.php';
$cadUser = new cUsuario();
$listaUser = $cadUser->getUsuario();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Language" content="pt-br">
        <title></title>
    </head>
    <body>
        <br><br>
        <button onclick="location.href = 'cadUsuario.php'">Voltar</button>
        <h1>Lista de Usuários</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuário</th>
                    <th>e-mail</th>
                    <th>Funções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaUser as $user): ?>
                    <tr>
                        <td><?php echo $user['idUser'] ?></td>
                        <td><?php echo $user['nomeUser'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td>
                            <?php if ($user['email'] != $_SESSION['email']) { ?>
                                <form action="../controller/deleteUser.php" method="post">
                                    <input type="hidden" value="<?php echo $user['idUser'] ?>" name="idUser"/>
                                    <input type="submit" name="deletar" value="Deletar"/>
                                </form>

                                <form action="editUsuario.php" method="POST"> 
                                    <input type="hidden" name="id" value="<?php echo $user['idUser']; ?>"/>  
                                    <input type="submit" name="updateUser" value="Editar"/>
                                </form>

                            <?php }; ?>
                        </td>
                    </tr>
                <?php endforeach;
                ?>               
            </tbody>
        </table>
    </body>
</html>
