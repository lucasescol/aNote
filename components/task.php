<?php foreach ($fetchTasks as $i => $task): ?>
    <?php if ($task["isDone"] == false): ?>
        <div class='task'>
            <div class='content'>
                <img src="./assets/square.svg" alt="square" id="checkbox" class="taskSquare">

                <form action="./config/process.php" method="POST">
                    <input type="hidden" name="type" value="switch">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <input type="hidden" name="isDone" value="<?= $task["isDone"] ?>">
                </form>

                <p id='title'><?= $task['title'] ?></p>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                    data-target="#meuModal<?= $i ?>">Editar</button>

                <?php include ("./components/edit.php") ?>

                <form action="./config/process.php" method="POST">
                    <input type="hidden" name="type" value="delete">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <button type="submit" class="btn btn-outline-danger">Deletar</button>
                </form>
            </div>
        </div>

    <?php else: ?>
        <div class='task'>
            <div class='content'>
                <img src="./assets/checked-square.svg" alt="teste" id="checkbox" class="taskSquare">

                <form action="./config/process.php" method="POST">
                    <input type="hidden" name="type" value="switch">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <input type="hidden" name="isDone" value="<?= $task["isDone"] ?>">
                </form>

                <p id='titleDone'><?= $task['title'] ?></p>
            </div>

            <div class="actions">
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                    data-target="#meuModal<?= $i ?>">Editar</button>

                <?php include ("./components/edit.php") ?>

                <form action="./config/process.php" method="POST">
                    <input type="hidden" name="type" value="delete">
                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                    <button type="submit" class="btn btn-outline-danger">Deletar</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>