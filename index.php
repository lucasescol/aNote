<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
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
        <h1>aNote</h1>
    </header>

    <main>
        <div class="addTask">
            <h2>Adicione Tasks</h2>

            <form method="POST" action="process.php">
                <input type="hidden" name="type" value="create">
                <input type="text" name="task">
                <input type="submit" value="Adicionar">

            </form>
            
        </div>
        <div class="taskList">
            <h2>Lista de Task</h2>

            <?php
                $sql = $conn->prepare("SELECT * FROM task");
                $sql->execute();

                $fetchTasks = $sql->fetchAll();
            ?>

            <?php foreach ($fetchTasks as $task): ?>
                <div class='task'>
                    <div class='content'>
                        <i class='ph ph-circle'></i>
                        <h3 class='title'><?= $task['title'] ?></h3>
                    </div>
                    <form action="process.php" method="POST">
                        <input type="hidden" name="type" value="delete">
                        <input type="hidden" name="id" value="<?= $task['id'] ?>">
                        <button type="submit">
                            <i class='ph-fill ph-trash'></i>
                        </button>
                    </form>
                    
                </div>
            <?php endforeach; ?>

        </div>
    </main>
</body>
</html>