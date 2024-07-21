<?php require_once 'header.php'; ?>
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Data do Cadastro</th>
                            <th>Nome</th>
                            <th style="text-align: center;">Status</th>
                            <th style="text-align: center;">Admin?</th>
                            <th style="text-align: center;">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">15/03/2024</td>
                            <td>Bruno Henrique</td>
                            <td style="text-align: center;"><span class="badge badge-success">Ativo</span></td>
                            <td style="text-align: center;">
                                <div class="d-flex justify-content-center">
                                    <input class="form-check-input" style="width: 1.5em; height: 1.5em;" type="checkbox" id="admcheckbox" name="admcheckbox" data-toggle="modal" data-target="#admModal">
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <a title="Editar Usuário" onclick="redirecionarUsuario(1)" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a title="Excluir Usuário" href="#" class="btn btn-danger btn-sm">
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
<!-- Fim Pagina Usuario -->
<?php require_once 'footer.php'; ?>
<script src="Usuario/Usuario.js"></script>


<form action="usuarioeditar.php" method="post" id="idFormUsuarioEditar">
    <input type="hidden" value="" name="idUsuario" id="idUsuario01"/>
</form>
