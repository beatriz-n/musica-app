<?php
extract($_POST);
require_once 'header.php';

$query = "SELECT * FROM pessoa WHERE idPessoa = '$idUsuario'";

$result = mysqli_query($con, $query);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);
$pessoa = $array[0];
?>

<!-- Começo Pagina Novo Usuário -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Editar Usuário</h1>
    <br>

    <!-- Formulário para Adicionar Novo Usuário -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form id="formUsuarioEditar" action="./Usuario/UsuarioA001.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="nomeUsuario" name="nomeUsuario" placeholder="Digite o nome completo" value="<?= $pessoa['nomePessoa']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="emailUsuario" name="emailUsuario" placeholder="Digite o e-mail" value="<?= $pessoa['emailPessoa']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senhaUsuario" name="senhaUsuario" placeholder="Digite a senha" value="<?= $pessoa['senhaPessoa']; ?>" required>
                    <div class="input-group-append mt-2">
                        <span class="input-group-text" id="toggleSenha" style="cursor: pointer;">
                            Mostrar Senha &nbsp<i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="imagem">Foto</label>
                    <input type="file" class="form-control-file" id="imagemUsuario" name="imagemUsuario" value="<?= $pessoa['imagemPessoa']; ?>">
                </div>

                <div class="form-group">
                    <label for="dataNascimentoUsuario">Data de Nascimento</label>
                    <input type="date" class="form-control" id="dataNascimentoUsuario" name="dataNascimentoUsuario" value="<?= $pessoa['nascimentoPessoa']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="statusUsuario" name="statusUsuario" required>
                        <option value="1" <?php echo $pessoa['statusPessoa'] == 1 ? 'selected' : '' ?>>Ativo</option>
                        <option value="0" <?php echo $pessoa['statusPessoa'] == 0 ? 'selected' : '' ?>>Inativo</option>
                    </select>
                </div>

                <button id="buttonFormUsuarioEditar" type="submit" class="btn btn-primary">Salvar</button>
                <a href="usuario.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<form id="idFormUsuarioEditar" action="usuarioeditar.php" method="post">
    <input id="idUsuario01" name="idUsuario" type="hidden">
</form>

<script>
    document.getElementById('toggleSenha').addEventListener('click', function(e) {
        const senhaInput = document.getElementById('senhaUsuario');
        const icon = this.querySelector('i');
        if (senhaInput.type === 'password') {
            senhaInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            senhaInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
</script>
<!-- Fim Pagina Novo Usuário -->

<?php require_once 'footer.php'; ?>