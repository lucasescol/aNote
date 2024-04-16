<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.icon-icons.com/icons2/39/PNG/128/editnote_pencil_edi_6175.png"
        type="image/x-icon">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">

    <title>aNote</title>
</head>

<body>
    <?php
    include ("./config/Connection.php");

    // Conecta com o banco de dados
    $connection = new Connection();
    $conn = $connection->connectDB();
    ?>

    <header>
        <h1 style="font-weight: 800;">aNote</h1>
    </header>

    <main>
        <div class="addTask">
            <h3>Adicionar Tarefa</h3>

            <form method="POST" action="./config/process.php" id="insertForm">
                <input type="hidden" name="type" value="create">
                <input class="form-control" type="text" name="task" placeholder="Insira uma tarefa"
                    aria-label="default input example">
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

            <?php include ("./components/task.php"); ?>

        </div>
    </main>

    <script defer>
        var tasks = document.querySelectorAll(".taskSquare")

        if (tasks) {
            tasks.forEach(task => {
                task.addEventListener("click", e => {
                    checkboxForm = e.target.nextElementSibling
                    checkboxForm.submit()
                })
            })
        }
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>