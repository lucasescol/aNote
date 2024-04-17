<!-- Modal de Edição -->
<div class="modal fade" id="meuModal<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="meuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="./config/process.php" id="insertForm">
                <div class="modal-header">
                    <h3 class="modal-title" id="meuModalLabel">Editar Tarefa</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?= $task["id"] ?>">
                    <input class="form-control" type="text" name="task" value="<?= $task["title"] ?>" placeholder="Insira uma tarefa"
                        aria-label="default input example">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>