<?php
require_once '../core/includeCore.php';
extract($_POST);

$query2 = "SELECT * FROM modulo WHERE idModulo = $idModulo";

$result2 = mysqli_query($con, $query2);
$tituloModulo = mysqli_fetch_all($result2, MYSQLI_ASSOC)[0]['tituloModulo'];

?>

<div style="max-width: 75%;" class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nova Atividades Cadastradas no Módulo - <?= $tituloModulo ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php if (isset($idModulo)) { ?>
            <form id="formAtividadeInserir" method="post" action="./Modulo/ModuloI002.php">
                <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                    <h3 class="h5 mb-2 text-gray-800">Informações da atividade:</h3>
                    <br>

                    <div class="form-group">
                        <label for="perguntaAtividade">Pergunta</label>
                        <textarea class="form-control" name="perguntaAtividade" id="perguntaAtividade"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="statusAtividade">Status</label>
                        <select class="form-control" id="statusAtividade" name="statusAtividade">
                            <option value="">Selecione o status</option>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>

                    <hr>
                    <h3 class="h5 mb-2 text-gray-800">Alternativas:</h3>
                    <br>
                    <div id="alternativas">
                        <div class="form-group">
                            <label for="alternativa1">Alternativa A</label>
                            <input type="text" class="form-control" name="alternativa[]" required>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="alternativaCorreta" id="alternativaCorretaA" value="0">
                                <label class="form-check-label" for="alternativaCorretaA">
                                    Correta
                                </label>
                            </div>
                        </div>                        
                        <input type="hidden" name="idModulo" id="idModulo10" value="<?= $idModulo ?>">
                    </div>
                    <button type="button" class="btn btn-success mb-3" onclick="adicionarAlternativa()">+</button>

                </div>
                <div class="modal-footer">
                    <div style="padding-left: 1%;">
                        <button id="buttonFormAtividadeInserir" type="submit" class="btn btn-primary">Salvar</button>
                        <button id="fecharModal" type="button" onclick="abreModalAtividade(<?= $idModulo ?>)" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <div style="margin: 1%;" class="alert alert-danger" role="alert">
                Ocorreu um erro 😢
            </div>
        <?php } ?>
    </div>
</div>

<!-- Fim Pagina Módulos Novo -->
<script src="Modulo/Modulo.js"></script>

<script>
    $(document).ready(function() {
        ajaxInserirAtividade();
    });
</script>