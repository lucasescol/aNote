<?php
    include("Connection.php");

    $connection = new Connection();
    $conn = $connection->connectDB();

    $data = $_POST;

    if ($data['type'] == "create") {
        //Create
        $sql = $conn->prepare("INSERT into task VALUES (null, ?, false)");
        $sql->execute(array($data["task"]));

    } else if ($data['type'] == "delete") {
        //Delete
        $sql = $conn->prepare("DELETE FROM task WHERE id = ?");
        $sql->execute(array($data["id"]));

    } else if ($data['type'] == "update") {
        //Update
        $sql = $conn->prepare("UPDATE task SET title = ? WHERE id = ?");
        $sql->execute(array($data["task"], $data["id"]));

    } else if ($data["type"] == "switch") {
        //Alterna o checkbox da tarefa
        $sql = $conn->prepare("UPDATE task SET isDone = ? WHERE id = ?");
        $sql->execute(array(!$data["isDone"], $data["id"]));
    }

    //Redireciona para o index
    header("Location: /anote/");
