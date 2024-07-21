<?php require_once 'header.php'; ?>

<!-- Começo Pagina Novo Usuário -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Novo Usuário</h1>
    <br>

    <!-- Formulário para Adicionar Novo Usuário -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="processa_usuario.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nomeUsuario">Nome Completo</label>
                    <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" placeholder="Digite o nome completo" required>
                </div>

                <div class="form-group">
                    <label for="emailUsuario">E-mail</label>
                    <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" placeholder="Digite o e-mail" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Digite a senha" required>
                </div>

                <div class="form-group">
                    <label for="upload">Foto</label>
                    <input type="file" class="form-control-file" id="upload" name="upload">
                </div>

                <div class="form-group">
                    <label for="dataNascimentoUsuario">Data de Nascimento</label>
                    <input type="date" class="form-control" id="dataNascimentoUsuario" name="dataNascimento" required>
                </div>

                <div class="form-group">
                    <label for="statusUsuario">Status</label>
                    <select class="form-control" id="statusUsuario" name="statusUsuario" required>
                        <option value="">[Selecione]</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="usuario.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<!-- Fim Pagina Novo Usuário -->

<?php require_once 'footer.php'; ?>
