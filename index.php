<?php
if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
    // Criando uma conexão entre o PHP e o MySql
    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $usuario = 'root';
    $senha = '';
    try {
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = "
            select * from tb_usuarios where
        ";
        $query .= " email = :usuario ";
        $query .= " and senha = :senha ";

        $stmt = $conexao -> prepare($query);

        $stmt -> bindValue(':usuario', $_POST['usuario']);
        $stmt -> bindValue(':senha', $_POST['senha'], PDO::PARAM_INT);

        $stmt -> execute();
        $usuario = $stmt -> fetch();

        echo '<pre>';
        print_r($usuario);
        echo '</pre>';

    } catch (PDOException $e) {
        // Caso ocorra algum erro na conexão (registrar erro)
        echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post" action="./index.php">
        <input type="text" placeholder="Usuario" name="usuario">
        <input type="password" name="senha" placeholder="senha">
        <button type="submit">Entrar</button>
    </form>
</body>

</html>