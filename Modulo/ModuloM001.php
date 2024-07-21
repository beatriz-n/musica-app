<?php
extract($_POST);
echo $idModulo;
?>

<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
    <div class="modal-content" style="max-width: 75%;">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Atividades Cadastradas no Módulo - [Título do Módulo Aqui]</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php if (isset($idModulo)) { ?>
            <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
                <div class="table-responsive">
                    <a onclick="abreModalAtividadeNovo(1)" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i> Adicionar Atividade
                    </a>
                    <br>
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
                                    <a title="Editar Atividade" onclick="abreModalAtividadeEditar(1)" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a title="Excluir Atividade" href="#" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">12/05/2024</td>
                                <td>Notas Músicais 2</td>
                                <td style="text-align: center;"><span class="badge badge-success">Ativo</span></td>
                                <td style="text-align: center;">
                                    <a title="Editar Atividade" onclick="abreModalAtividadeEditar(2)" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a title="Excluir Atividade" href="#" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">15/05/2024</td>
                                <td>Notas Músicais 3</td>
                                <td style="text-align: center;"><span class="badge badge-danger">Inativo</span></td>
                                <td style="text-align: center;">
                                    <a title="Editar Atividade" onclick="abreModalAtividadeEditar(3)" class="btn btn-primary btn-sm">
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
