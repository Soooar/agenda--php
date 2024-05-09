<?php

    include_once 'conexao.php';
    include_once 'funcoes.php';
    
    if (isset($_GET ['acao']) && $_GET['acao'] == 'editar') {

        //if tenarui
        $id = isset($_GET['id']) ? $_GET ['id']: 0; 

        // abrindo banco
        $conexaoComBanco = abrirBanco(); 

        $sql = "SELECT * FROM pessoas WHERE id = ?";
        // preparar o sql para consultar o id no banco de dados
        $pegarDados = $conexaoComBanco->prepare($sql);

        //substituir o ?
        $pegarDados->bind_param("i", $id);
        // executar o sql que preparamos
        $pegarDados->execute();
        $result = $pegarDados->get_result();

        if ($result->num_rows == 1) {
            $registro = $result->fetch_assoc();
            // dd($registro);
        } else {
            echo"Nenhum registro encontrado";
            exit;
        }

        $pegarDados->close();
        fecharBanco($conexaoComBanco);

        $resultado = $result->fetch_assoc();

    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

     $conexaoComBanco = abrirBanco(); 

    $sql = "UPDATE pessoas SET nome = '$nome', sobrenome = '$sobrenome', nascimento = '$nascimento',
    endereco = '$endereco', telefone = '$telefone' WHERE id = $id";
    
         if ($conexaoComBanco->query($sql) === TRUE) {
            echo "Sucesso ao atualizar o contato";
        } else {
            echo "Erro ao atualizar o contato";
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
            <li><a href="index.php">lista</a></li>
            <li><a href="cadastrar.php">cadastrar</a></li>
        </ul>
    </nav>
    </header>
    <section>
        <h2>atualizar contato</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= $registro['nome'] ?>" required>

            <label for="sobrenome">sobrenome</label>
            <input type="text" id="sobrenome" name="sobrenome" value="<?= $registro['sobrenome'] ?>" required>

            <label for="nascismento">nascimento</label>
            <input type="date" id="nascimento" name="nascimento" value="<?= $registro['nascimento'] ?>" required>

            <label for="endereco">endereco</label>
            <input type="text" id="endereco" name="endereco" value="<?= $registro['endereco'] ?>" required>

            <label for="telefone">telefone</label>
            <input type="text" id="telefone" name="telefone" value="<?= $registro['telefone'] ?>" required>

            <input type="hidden" id="id" name="id" value="<?= $registro['id']?>">

            <button type="submit">atualizar</button>
        </form>
    </section>
</body>
</html>