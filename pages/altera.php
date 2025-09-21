<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <h1>Editar Tarefa</h1>
        <a href="../index.php">Voltar</a>
    </header>
    <main>
    
        <?php

            require '../functions/inicia.php';

            $id = isset($_GET['id_tarefa']) ? (int) $_GET['id_tarefa'] : null;
            if(empty($id)){
                echo "id não encontrado";
                exit;
            }

            $PDO = conectarBD();
            $stmt = $PDO->prepare("SELECT id_tarefa, titulo, autor, descricao FROM tarefas WHERE id_tarefa = :id_tarefa");
            $stmt->bindParam(':id_tarefa', $id, PDO:: PARAM_INT);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if(!is_array($resultado)){
                echo "tarefa não encontrada";
                exit;
            }

        ?>

        <form name="mudarLivro" class="formulario" action="../functions/update.php" method="post">
            <input value="<?php echo $resultado['titulo']?>" name="titulo" class="campoTxt" type="text">
            <input value="<?php echo $resultado['autor']?>" name="autor" class="campoTxt" type="text">
            <input value="<?php echo $resultado['descricao']?>" name="descricao" class="campoTxt" type="text">
            <input value="<?php echo $resultado['id_tarefa']?>" name="id_tarefa" type="hidden">
            <input class="botao" type="submit" value="Alterar" name="enviar" id="enviar">
        </form>
    
    </main>
</body>
</html>