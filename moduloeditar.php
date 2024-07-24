<?php
extract($_POST);
require 'header.php';

$query = "SELECT * FROM modulo WHERE idModulo = $idModulo";

$result = mysqli_query($con, $query);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);
$modulo = $array[0];

?>

<!-- Começo Pagina Editar Módulo -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800">Editar Módulo</h1>
            <br>
            <a href="modulo.php" class="btn btn-primary mb-3">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
        <div class="card-body">
            <form id="formModuloAlterar" method="post" action="./Modulo/ModuloA001.php">
                <input type="hidden" name="idModulo" value="<?php echo $idModulo; ?>">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="tituloModulo" name="tituloModulo" value="<?php echo $modulo['tituloModulo']; ?>" placeholder="Digite o título do módulo">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="statusModulo" name="statusModulo">
                        <option value="1" <?php echo $modulo['statusModulo'] == 1 ? 'selected' : ''; ?>>Ativo</option>
                        <option value="0" <?php echo $modulo['statusModulo'] == 0 ? 'selected' : ''; ?>>Inativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nivel">Nível</label>
                    <input type="number" min="0" class="form-control" id="nivelModulo" name="nivelModulo" value="<?php echo $modulo['nivelModulo']; ?>" placeholder="Digite o título do módulo">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricaoModulo" rows="3" placeholder="Digite a descrição do módulo"><?php echo $modulo['descricaoModulo']; ?></textarea>
                </div>
                <button id="buttonFormModuloAlterar" type="submit" class="btn btn-primary">Salvar</button>

                <br>
                <h1 class="h4 mt-5 mb-2 text-gray-800">Gerenciar Atividades</h1>
                <?php
                $query2 = "SELECT * FROM atividade WHERE idModulo = $idModulo";

                $result2 = mysqli_query($con, $query2);
                $qtdRegistros2 = mysqli_num_rows($result2);
                $array2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

                if ($qtdRegistros2 > 0) {

                ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Pergunta</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
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
                                        <a title="Excluir Atividade" onclick="excluirAtividadeModulo('<?= $idAtividade ?>','<?= $idModulo ?>')" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php

                } else {

                    echo "<div class='form-group'><h5>Nehuma atividade vinculada!</h5></div>";
                }
                ?>
            </form>
        </div>
    </div>
</div>

<form id="idFormEditarModulo" action="moduloeditar.php" method="post">
    <input id="idModulo03" name="idModulo" type="hidden">
</form>
<!-- Fim Pagina Editar Módulo -->


<?php require 'footer.php'; ?>

<script src="Modulo/Modulo.js"></script>

<script>
    $(document).ready(function() {
        ajaxAlterarModulo();
    });
</script>