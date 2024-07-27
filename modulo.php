<?php
include 'header.php';

$query = 'SELECT * FROM modulo WHERE 1';

$result = mysqli_query($con, $query);
$qtdRegistros = mysqli_num_rows($result);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!-- Começo Pagina Módulos -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Módulos</h1>
    <br>
    <!-- Botão para adicionar novo módulo -->
    <a href="modulonovo.php" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Adicionar Módulo
    </a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listar Módulos</h6>
        </div>
        <div class="card-body">
            <?php
            if ($qtdRegistros > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th style="text-align: center;">Quantidade de Atividades Cadastradas</th> <!-- isso aqui é so um contador para contar as atividades -->
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < $qtdRegistros; $i++) {
                                $idModulo = $array[$i]['idModulo'];
                                $query2 = "SELECT * FROM atividade WHERE idModulo = $idModulo";

                                $result2 = mysqli_query($con, $query2);
                                $qtdRegistros2 = mysqli_num_rows($result2);

                                $status = '';
                                if ($array[$i]['statusModulo'] == 1) {
                                    $status = "<span class=\"badge badge-success\">Ativo</span>";
                                } else {
                                    $status = "<span class=\"badge badge-danger\">Inativo</span>";
                                }

                            ?>
                                <tr>
                                    <td><?= $array[$i]['tituloModulo'] ?></td>
                                    <td style="text-align: center;"><?= $qtdRegistros2 ?></td>
                                    <td style="text-align: center;"><?= $status ?></td>
                                    <td style="text-align: center;">
                                        <a title="Adicionar Atividade" class="btn btn-warning btn-sm" onclick="abreModalAtividade(<?= $idModulo ?>)">
                                            <i class="fas fa-graduation-cap"></i>
                                        </a>
                                        <a title="Editar Módulo" onclick="editarModulo(<?= $idModulo ?>)" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a title="Excluir Módulo" onclick="excluirModulo(<?= $idModulo ?>)" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php

            } else {
                echo "<h3>Nenhum registro encontrado!</h3>";
            }
            ?>
        </div>
    </div>
</div>

<div class="modal fade" id="atividadeListar" tabindex="-1" role="dialog" aria-labelledby="atividadeListarLabel" aria-hidden="true">
</div>

<div class="modal fade" id="atividadeNovoListar" tabindex="-1" role="dialog" aria-labelledby="atividadeNovoListarLabel" aria-hidden="true">
</div>

<div class="modal fade" id="atividadeEditarListar" tabindex="-1" role="dialog" aria-labelledby="atividadeEditarListarLabel" aria-hidden="true">
</div>

<form id="idFormEditarModulo" action="moduloeditar.php" method="post">
    <input id="idModulo03" name="idModulo" type="hidden">
</form>

<!-- Fim Pagina Módulos -->
<?php include 'footer.php'; ?>

<script src="Modulo/Modulo.js"></script>