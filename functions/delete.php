<?php

    require_once 'inicia.php';

    $id=isset($_GET['id_tarefa']) ? $_GET['id_tarefa'] : null;

    if(empty($id)){
        echo "código não encontrado";
        exit;
    }

    $PDO = conectarBD();
    $sql = "DELETE FROM tarefas WHERE id_tarefa=:id_tarefa";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam('id_tarefa', $id, PDO::PARAM_INT);
    if($stmt->execute()){
        header('Location: ../index.php');
    } else{
        echo "erro ao excluir";
        print_r($stmt->errorInfo());
    }

?>