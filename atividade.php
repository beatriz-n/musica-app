<?php include 'header.php'; ?>
<!-- Começo Pagina Atividades -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Atividades Cadastradas no Módulo - [Titulo do Modulo aqui]</h1>
    <br>
    <!-- Botão para adicionar novo atividade -->
    <a onclick="redirecionarAtividadeNovo(1)" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Adicionar Atividade
    </a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listar Atividades</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Data do Cadastro</th>
                            <th>Título</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">10/05/2024</td>
                            <td>Notas Músicais</td>
                            <td style="text-align: center;"><span class="badge badge-success">Ativo</span></td>
                            <td style="text-align: center;">
                                <a title="Editar Atividade" href="atividadeeditar.php" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a title="Excluir Atividade" href="#" class="btn btn-danger btn-sm">
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
<!-- Fim Pagina Atividades -->
<?php include 'footer.php'; ?>
<script src="Atividade/Atividade.js"></script>

<form action="atividadenovo.php" method="post" id="idFormAtividadeNovo">
    <input type="hidden" value="1" name="idModulo" id="idModulo02"/>
</form>
