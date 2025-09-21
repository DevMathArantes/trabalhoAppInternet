<?php
    require_once "functions/inicia.php";
    $PDO = conectarBD();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrado</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Lista de Tarefas</h1>
    </header>
    <main>
        
        <a class="botao" href="pages/formulario.php">Nova Tarefa</a>

        <h2>Lista de Tarefas</h2>
        <section class="retorno-bd">
            <?php
                $stmt_count = $PDO->prepare("SELECT COUNT(*) AS total FROM tarefas");
                $stmt_count->execute();
                $stmt = $PDO->prepare("SELECT id_tarefa, autor, titulo, descricao FROM tarefas ORDER BY id_tarefa");
                $stmt->execute();
                $total= $stmt_count->fetchColumn();
                
                if($total > 0): ?>

                    <?php while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    
                        
                        <div class="item-tabela">
                            <h3><?php echo $resultado['titulo']?></h3>
                            <p>Descrição: <?php echo $resultado['descricao']?></p>
                            <span>Autor: <?php echo $resultado['autor']?></span>
                            <a href="pages/altera.php?id_tarefa=<?php echo $resultado['id_tarefa']?>">Editar</a>
                            <a href="functions/delete.php?id_tarefa=<?php echo $resultado['id_tarefa']?>" onclick="return confirm('Excluir Registro ?');">Excluir</a>
                        </div>

                    
                    <?php endwhile; ?>

            <p>Total Cadastrados: <?php echo $total ?></p>
            <?php else: ?>
                <p>Nenhum livro cadastrado</p>
            <?php endif ?>
        </section>
        

    </main>
</body>
</html>