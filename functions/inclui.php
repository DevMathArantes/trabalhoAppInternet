<?php

    require_once 'inicia.php';

    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $autor = isset($_POST['autor']) ? $_POST['autor'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;

    if(empty($titulo) || empty($autor) || empty($descricao)){
        echo "<p>Preencha todos os campos</p>";
        exit;
    }

    $PDO = conectarBD();
    $sql = "SELECT ";
    $sql = "INSERT INTO tarefas(titulo, autor, descricao) VALUES (:titulo, :autor, :descricao)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam('descricao', $descricao);

    if($stmt->execute()){
        header('Location: ../pages/formulario.php');
    } else{
        echo "Ocorreu um erro no registro ";
        print_r($stmt->errorInfo());
    }
?>