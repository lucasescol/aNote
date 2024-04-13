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
            <form action="#">
                <input type="text">
                <input type="button" value="Adicionar">
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
        <?php
            include("Conexao.php");
            $connection = new Conexao();
            $connection->conectaDB();
        ?>
    </main>
</body>
</html>