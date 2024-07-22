<?php require 'header.php'; ?>

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
            <form action="atualizar_modulo.php" method="POST">
                <input type="hidden" name="idModulo" value="<?php echo $idModulo; ?>">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="tituloModulo" name="tituloModulo" value="<?php echo $modulo['titulo']; ?>" placeholder="Digite o título do módulo">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="statusModulo" name="statusModulo">
                        <option value="1" <?php echo $modulo['status'] == 1 ? 'selected' : ''; ?>>Ativo</option>
                        <option value="0" <?php echo $modulo['status'] == 0 ? 'selected' : ''; ?>>Inativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricaoModulo" rows="3" placeholder="Digite a descrição do módulo"><?php echo $modulo['descricao']; ?></textarea>
                </div>


        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <h1 class="h4 mb-2 text-gray-800">Gerenciar Atividades</h1>
                        <thead>
                            <tr>

                                <th>Título</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Notas Músicais</td>
                                <td style="text-align: center;"><span class="badge badge-success">Ativo</span></td>
                                <td style="text-align: center;">
                                    <a title="Excluir Atividade" href="#" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Notas Músicais 2</td>
                                <td style="text-align: center;"><span class="badge badge-success">Ativo</span></td>
                                <td style="text-align: center;">
                                    <a title="Excluir Atividade" href="#" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Notas Músicais 3</td>
                                <td style="text-align: center;"><span class="badge badge-danger">Inativo</span></td>
                                <td style="text-align: center;">
                                    <a title="Excluir Atividade" href="#" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
<!-- Fim Pagina Editar Módulo -->

<?php require 'footer.php'; ?>

