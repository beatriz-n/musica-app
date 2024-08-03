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
            <form id="formAtividadeAlterar" method="post" action="./Modulo/ModuloA002.php">
                <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                    <h3 class="h5 mb-2 text-gray-800">Informações da atividade:</h3>
                    <br>

                    <div class="form-group">
                        <label for="perguntaAtividade">Pergunta</label>
                        <textarea class="form-control" name="perguntaAtividade" id="perguntaAtividade"><?= $array[0]['perguntaAtividade'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="statusAtividade">Status</label>
                        <select class="form-control" id="statusAtividade" name="statusAtividade">
                            <option value="1" <?php echo $array[0]['statusAtividade'] == 1 ? 'selected' : ''; ?>>Ativo</option>
                            <option value="0" <?php echo $array[0]['statusAtividade'] == 0 ? 'selected' : ''; ?>>Inativo</option>
                        </select>
                    </div>

                    <hr>
                    <h3 class="h5 mb-2 text-gray-800">Alternativas:</h3>
                    <br>
                    <div id="alternativas">
                        <?php
                        $jsonString = str_replace("'", '"', $array[0]['alternativaAtividade']);
                        $alternativas = json_decode($jsonString, true);
                        $letra = "A";
                        for ($i = 0; $i < count($alternativas); $i++) {
                            $textoAlternativa = $alternativas[$i][0];
                            $alternativaCorreta = $alternativas[$i][1];

                        ?>
                            <div class="form-group">
                                <label for="alternativa1">Alternativa <?= $letra ?></label>
                                <input type="text" class="form-control" name="alternativa[]" value="<?= $textoAlternativa ?>" required>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="alternativaCorreta" id="alternativaCorreta<?= $letra ?>" value="<?= $i ?>" <?php echo ($alternativaCorreta == 1) ? "checked" : ""; ?>>
                                    <label class="form-check-label" for="alternativaCorreta<?= $letra ?>">
                                        Correta
                                    </label>
                                </div>
                            </div>
                        <?php
                            $letra++;
                        }
                        ?>
                        <input type="hidden" name="idModulo" id="idModulo20" value="<?= $idModulo ?>">
                        <input type="hidden" name="idAtividade" id="idAtividade20" value="<?= $idAtividade ?>">
                        <input type="hidden" name="letraAlternativa" id="letraAlternativa" value="<?= $letra ?>">
                        <input type="hidden" name="valorAlternativa" id="valorAlternativa" value="<?= $i ?>">
                    </div>
                    <button type="button" class="btn btn-success mb-3" onclick="adicionarAlternativaEditar()">+</button>
                </div>
                <div class="modal-footer">
                    <div style="padding-left: 1%;">
                        <button id="buttonFormAtividadeAlterar" type="submit" class="btn btn-primary">Salvar</button>
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
        ajaxAlterarAtividade();
    });
</script>