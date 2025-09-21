<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <h1>Nova Tarefa</h1>
        <a href="../index.php">Voltar</a>
    </header>
    <main>
       
    <form name="newLivro" class="formulario" action="../functions/insert.php" method="post">

        <h2>Nova Tarefa</h2>
        <input name="titulo" class="campoTxt" type="text" placeholder="Nomear Tarefa">
        <input name="autor" class="campoTxt" type="text" placeholder="Seu Nome">
        <input name="descricao" class="campoTxt" type="text" placeholder="Descrição">
        <input class="botao" type="reset" value="Limpar Formulário">
        <input class="botao" type="submit" value="Cadastrar" name="enviar" id="enviar">

    </form>

</body>
</html>