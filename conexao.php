<?php

// criar constantes para armazenar as informações de acesso ao banco de dados
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "agenda");
define("DB_PORT", 3306);

/**
 * Abre um conexão com o banco de dados e retorna um objeto de conexão
 * @return mysqli - que é um objetvo de conexão mysql
*/
function abrirBanco() {
    $conexaoComBanco = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

    //verificar se ocorreu algum erro durante a conexão
    if ($conexaoComBanco->connect_error) {
        die("Falha na conexão" . $conexaoComBanco->connect_error);
    }
    return $conexaoComBanco;
}

/**
 * fecha a conexao com o banco de dados
 */
function fecharBanco($conexaoComBanco) {
    $conexaoComBanco->close();
}

?>