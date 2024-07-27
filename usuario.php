<?php
require_once 'header.php';

$query = "SELECT * FROM pessoa WHERE idPessoa";

$result = mysqli_query($con, $query);
$qtdRegistros = mysqli_num_rows($result);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!-- Começo Pagina Usuario -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Usuário</h1>
    <br>
    <!-- Botão para adicionar novo usuário -->
    <a href="usuarionovo.php" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Adicionar Usuários
    </a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listar Usuários</h6>
        </div>
        <div class="card-body">
            <?php
            if ($qtdRegistros > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Admin?</th>
                                <th style="text-align: center;">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < $qtdRegistros; $i++) {
                                $idPessoa = $array[$i]['idPessoa'];
                                $status = '';

                                if ($array[$i]['statusPessoa'] == 1) {
                                    $status = "Ativo";
                                } else {
                                    $status = "Inativo";
                                }
                            ?>
                                <tr>
                                    <!-- Nome -->
                                    <td class="col-6"><?= $array[$i]['nomePessoa'] ?></td>

                                    <!-- Status -->
                                    <td style="text-align: center;"><span class="badge badge-success"> <?= $status ?></span></td>

                                    <!-- Admin -->
                                    <td style="text-align: center;">
                                        <div class="d-flex justify-content-center">
                                            <input class="form-check-input" style="width: 1.5em; height: 1.5em;" type="checkbox" id="admcheckbox" name="admcheckbox" data-toggle="modal" data-target="#admModal">
                                        </div>
                                    </td>
                                    <td style="text-align: center;">

                                        <!-- Editar -->
                                        <a title="Editar Usuário" onclick="redirecionarUsuario($pessoa['idPessoa'])" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <?php if ($idPessoa != $idPessoaSession) { ?>
                                            <!-- Excluir -->
                                            <a title="Excluir Usuário" onclick="excluirUsuario(<?= $idPessoa ?>)" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        <?php
                                        }
                                        ?>
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
<!-- Fim Pagina Usuario -->
<?php require_once 'footer.php'; ?>

<script src="Usuario/Usuario.js"></script>

<form action="usuarioeditar.php" method="post" id="idFormUsuarioEditar">
    <input type="hidden" value="" name="idUsuario" id="idUsuario01" />
</form>