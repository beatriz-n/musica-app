<?php
require_once '../core/includeCore.php';
extract($_POST);

$query = "SELECT * FROM modulo WHERE idModulo = $idModulo";

$result = mysqli_query($con, $query);
$tituloModulo = mysqli_fetch_all($result, MYSQLI_ASSOC)[0]['tituloModulo'];

?>

<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content" style="max-width: 75%;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Atividades Cadastradas no Módulo - <?= $tituloModulo ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php if (isset($idModulo)) { ?>
            <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                <div class="table-responsive">
                    <a onclick="abreModalAtividadeNovo(<?= $idModulo ?>)" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i> Adicionar Atividade
                    </a>
                    <br>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Atividade</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Opções</th>
                            </tr>
                        </thead>
                        <?php
                        $query2 = "SELECT * FROM atividade WHERE idModulo = $idModulo";

                        $result2 = mysqli_query($con, $query2);
                        $qtdRegistros2 = mysqli_num_rows($result2);
                        $array2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

                        ?>
                        <tbody>
                            <?php
                            if ($qtdRegistros2 > 0) {

                                for ($j = 0; $j < $qtdRegistros2; $j++) {
                                    $idAtividade = $array2[$j]['idAtividade'];

                                    $status = '';
                                    if ($array2[$j]['statusAtividade'] == 1) {
                                        $status = "<span class=\"badge badge-success\">Ativo</span>";
                                    } else {
                                        $status = "<span class=\"badge badge-danger\">Inativo</span>";
                                    }
                            ?>
                                    <tr>
                                        <td><?= $array2[$j]['perguntaAtividade'] ?></td>
                                        <td style="text-align: center;"><?= $status ?></td>
                                        <td style="text-align: center;">
                                            <a title="Editar Atividade" onclick="abreModalAtividadeEditar(<?= $idAtividade ?>)" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a title="Excluir Atividade" onclick="excluirAtividadeModulo(<?= $idAtividade ?>,<?= $idModulo ?>, 1)" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan=\"3\">Nehuma atividade cadastrada!</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        <?php } else { ?>
            <div style="margin: 1%;" class="alert alert-danger" role="alert">
                Ocorreu um erro 😢
            </div>
        <?php } ?>
    </div>
</div>
<script src="Modulo/Modulo.js"></script>