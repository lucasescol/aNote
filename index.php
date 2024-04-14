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
    <header>
        <h1>aNote</h1>
    </header>

    <main>
        <div class="addTask">
            <h2>Adicione Tasks</h2>

            <form method="POST">
                <input type="text" name="task">
                <input type="submit" value="Adicionar">

                <?php
                    include("Connection.php");

                    $connection = new Connection();
                    $conn = $connection->connectDB();
                
                    //Create
                    if (isset($_POST['task'])){
                        $sql = $conn->prepare("INSERT into task VALUES (null, ?, 0)");
                        $sql->execute(array($_POST['task']));
                        echo "Inserido com sucesso";
                    }
                ?>
            </form>
            
        </div>
        <div class="taskList">
            <h2>Lista de Task</h2>

            <div class="task">
                <div class="content">
                    <i class="ph ph-circle"></i>
                    <h3 class="title">Tarefa 1</h3>
                </div>
                <i class="ph-fill ph-trash" style="color: red;"></i>
            </div>

            <div class="task">
                <div class="content">
                    <i class="ph ph-circle"></i>
                    <h3 class="title">Tarefa 2</h3>
                </div>
                <i class="ph-fill ph-trash" style="color: red;"></i>
            </div>
        </div>
    </main>
</body>
</html>