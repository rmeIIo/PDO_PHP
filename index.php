<?php
    // Criando uma conexão entre o PHP e o MySql
    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $usuario = 'root';
    $senha = '';
    try {
        $conexao = new PDO($dsn, $usuario, $senha);

        $query = '
            create table if not exists tb_usuarios(
                id int not null primary key auto_increment,
                nome varchar(50) not null,
                email varchar(100) not null,
                senha varchar(32) not null
            )
        ';

        $retorno = $conexao->exec($query);
        echo $retorno;

        $query = '
            delete from tb_usuarios';
        $retorno = $conexao->exec($query);
        echo $retorno;

    } catch(PDOException $e) {
        // Caso ocorra algum erro na conexão (registrar erro)
        echo 'Erro: ' . $e->getCode() .' Mensagem: '. $e->getMessage();
    }
