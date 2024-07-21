<?php include 'header.php'; ?>
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Data do Cadastro</th>
                            <th>Título</th>
                            <th style="text-align: center;">Quantidade de Níveis Cadastrados</th> <!-- isso aqui é so um contador para contar as atividades -->
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">10/05/2024</td>
                            <td>Notas Músicais</td>
                            <td style="text-align: center;">3</td>
                            <td style="text-align: center;"><span class="badge badge-success">Ativo</span></td>
                            <td style="text-align: center;">
                                <a title="Adicionar Atividade" class="btn btn-warning btn-sm" onclick="abreModalAtividade(1)">
                                    <i class="fas fa-graduation-cap"></i>
                                </a>
                                <a title="Editar Módulo" href="moduloeditar.php" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a title="Excluir Módulo" href="#" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="atividadeListar" tabindex="-1" role="dialog" aria-labelledby="atividadeListarLabel" aria-hidden="true">
</div>

<div class="modal fade" id="atividadeNovoListar" tabindex="-1" role="dialog" aria-labelledby="atividadeNovoListarLabel" aria-hidden="true">
</div>

<div class="modal fade" id="atividadeEditarListar" tabindex="-1" role="dialog" aria-labelledby="atividadeEditarListarLabel" aria-hidden="true">
</div>
<!-- Fim Pagina Módulos -->
<?php include 'footer.php'; ?>

<script src="Modulo/Modulo.js"></script>

