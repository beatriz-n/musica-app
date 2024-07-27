<?php
require_once '../core/includeCore.php';
extract($_POST);

$query = "SELECT * FROM atividade WHERE idAtividade = $idAtividade";

$result = mysqli_query($con, $query);
$qtdRegistros = mysqli_num_rows($result);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

$idModulo = $array[0]['idModulo'];

$query2 = "SELECT * FROM modulo WHERE idModulo = $idModulo";

$result2 = mysqli_query($con, $query2);
$tituloModulo = mysqli_fetch_all($result2, MYSQLI_ASSOC)[0]['tituloModulo'];

?>

<div style="max-width: 75%;" class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar Atividades Cadastradas no Módulo - <?= $tituloModulo ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php if (isset($idModulo)) { ?>
            <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                <form id="formAtividade" novalidate>
                    <h3 class="h5 mb-2 text-gray-800">Informações da atividade:</h3>
                    <br>
                    <div class="form-group">
                        <label for="tituloAtividade">Título</label>
                        <input type="text" class="form-control" id="tituloAtividade" name="tituloAtividade" placeholder="Digite o título da atividade">
                    </div>
                    <div class="form-group">
                        <label for="statusAtividade">Status</label>
                        <select class="form-control" id="statusAtividade" name="statusAtividade">
                            <option value="">Selecione o status</option>
                            <option value="1">Ativo</option>
                            <option value="0">Inativo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descricaoAtividade">Observação</label>
                        <input type="text" class="form-control" id="descricaoAtividade" name="descricaoAtividade" placeholder="Digite a descrição da atividade">
                    </div>
                    <hr>
                    <h3 class="h5 mb-2 text-gray-800">Alternativas:</h3>
                    <br>
                    <div id="alternativas">
                        <div class="form-group">
                            <label for="alternativa1">Alternativa A</label>
                            <input type="text" class="form-control" name="alternativa[]" required>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alternativaCorreta" id="alternativaCorretaA" value="A">
                                <label class="form-check-label" for="alternativaCorretaA">
                                    Correta
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alternativa2">Alternativa B</label>
                            <input type="text" class="form-control" name="alternativa[]" required>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alternativaCorreta" id="alternativaCorretaB" value="B">
                                <label class="form-check-label" for="alternativaCorretaB">
                                    Correta
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alternativa3">Alternativa C</label>
                            <input type="text" class="form-control" name="alternativa[]" required>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alternativaCorreta" id="alternativaCorretaC" value="C">
                                <label class="form-check-label" for="alternativaCorretaC">
                                    Correta
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alternativa4">Alternativa D</label>
                            <input type="text" class="form-control" name="alternativa[]" required>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="alternativaCorreta" id="alternativaCorretaD" value="D">
                                <label class="form-check-label" for="alternativaCorretaD">
                                    Correta
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-success mb-3" onclick="adicionarAlternativa()">+</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div style="padding-left: 1%;">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" onclick="abreModalAtividade(<?= $idModulo ?>)" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        <?php } else { ?>
            <div style="margin: 1%;" class="alert alert-danger" role="alert">
                Ocorreu um erro 😢
            </div>
        <?php } ?>
    </div>
</div>