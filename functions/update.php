<?php

    require_once "inicia.php";

    $id = isset($_POST['id_tarefa']) ? $_POST['id_tarefa'] : null;
    $autor = isset($_POST['autor']) ? $_POST['autor'] : null;
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;

    if(empty($id) || empty($autor) || empty($titulo) || empty($descricao)){
        echo "preencha todos os campos";
        exit;
    }

    $PDO = conectarBD();
    $stmt = $PDO->prepare("UPDATE tarefas SET titulo=:titulo, autor=:autor, descricao=:descricao WHERE id_tarefa=:id_tarefa");
    
    $stmt->bindParam(':autor', $autor);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':id_tarefa', $id, PDO::PARAM_INT);

    if($stmt->execute()){
        header('Location: ../index.php');
    } else{
        echo "Algo deu errado";
        print_r($stmt->errorInfo());
    }

?>