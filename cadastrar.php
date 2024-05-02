<?php

    include 'conexao.php';
    
    // echo "<pre>";
    // print_r($_SERVER);
    // echo "</pre>";
    // exit;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
     // captura os dados digitados no form e salva em variaveis
     // para facilitar a manipulção dos dados
         
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    // vamos abrir a conexão com o banco de dados
    $conexaoComBanco = abrirBanco(); 

    // vamos criar o sql para realizar o insert dos dados no BD
    $sql = "INSERT INTO pessoas (nome, sobrenome, nascimento, endereco, telefone)
            VALUES
            ('$nome', '$sobrenome', '$nascimento', '$endereco', '$telefone')";
         
         if ($conexaoComBanco->query($sql) === TRUE) {
            echo "Sucesso ao cadastrar o contato";
        } else {
            echo "Erro ao cadastrar o contato";
        }

        fecharBanco($conexaoComBanco);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <header> 
        <h1>Agenda de Contatos</h1>

    <nav>
        <ul>
            <li><a href="index.php">home</a></li>
            <li><a href="cadastrar.php">cadastrar</a></li>
        </ul>
    </nav>
    </header>
    <section>
        <h2>cadastrar Contatos</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>

            <label for="sobrenome">sobrenome</label>
            <input type="text" id="sobrenome" name="sobrenome" required>

            <label for="nascismento">nascimento</label>
            <input type="date" id="nascimento" name="nascimento" required>

            <label for="endereco">endereco</label>
            <input type="text" id="endereco" name="endereco" required>

            <label for="telefone">telefone</label>
            <input type="text" id="telefone" name="telefone" required>

            <button type="submit">cadastrar</button>
        </form>
    </section>
</body>
</html>