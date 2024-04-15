<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Phosphor -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">

    <title>aNote</title>
</head>
<body>   
    <?php
        include("Connection.php");

        $connection = new Connection();
        $conn = $connection->connectDB();
    ?>

    <header>
        <h1  style="font-weight: 700;">aNote</h1>
    </header>

    <main>
        <div class="addTask">
            <h3>Adicionar Tarefa</h3>

            <form method="POST" action="process.php" id="insertForm">
                <input type="hidden" name="type" value="create">
                <input class="form-control" type="text" name="task" placeholder="Insira uma tarefa" aria-label="default input example">
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
            
        </div>
        <div class="taskList">
            <h3>Lista de Tarefas</h3>

            <?php
                $sql = $conn->prepare("SELECT * FROM task");
                $sql->execute();

                $fetchTasks = $sql->fetchAll();
            ?>

            <?php foreach ($fetchTasks as $i => $task): ?>
                <?php if ($task["isDone"] == false): ?>
                    <div class='task'>
                        <div class='content'>
                            <svg class="taskSquare" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            </svg>

                            <p id='title'><?= $task['title'] ?></p>
                        </div>

                        <div class="actions">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#meuModal<?=$i?>">Editar</button>

                            <?php include("edit.php") ?>

                            <form action="process.php" method="POST">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <button type="submit" class="btn btn-danger">X</button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <div class='task'>
                        <div class='content'>
                            <svg class="taskSquare" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z"/>
                                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0"/>
                            </svg>
                            
                            <p id='titleDone'><?= $task['title'] ?></p>
                        </div>

                        <div class="actions">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#meuModal<?=$i?>">Editar</button>

                            <?php include("edit.php") ?>

                            <form action="process.php" method="POST">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                <button type="submit" class="btn btn-danger">X</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
    </main>
    
    <script>
       
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>