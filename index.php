<?php
    // Criando uma conexão entre o PHP e o MySql
    $dsn = 'mysql:host=localhost;dbname=php_com_pdo';
    $usuario = 'root';
    $senha = '';
    try {
        $conexao = new PDO($dsn, $usuario, $senha);

        /*$query = '
            create table if not exists tb_usuarios(
                id int not null primary key auto_increment,
                nome varchar(50) not null,
                email varchar(100) not null,
                senha varchar(32) not null
            )
        ';

        $retorno = $conexao->exec($query);
        echo $retorno; */

        $query = '
            select * from tb_usuarios
        ';

        $stmt = $conexao->query($query);
        $lista = $stmt->fetchAll(PDO::FETCH_OBJ); // FETCH_ASSOC, FETCH_NUM, FETCH_BOTH

        echo '<pre>';
        print_r($lista);
        echo '</pre>';

        echo $lista[1]->nome;

    } catch(PDOException $e) {
        // Caso ocorra algum erro na conexão (registrar erro)
        echo 'Erro: ' . $e->getCode() .' Mensagem: '. $e->getMessage();
    }
