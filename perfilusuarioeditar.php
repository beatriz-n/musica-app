<?php
extract($_POST);
require_once 'headeraprendizagem.php';

$query = "SELECT * FROM pessoa WHERE idPessoa = $idPessoa";

$result = mysqli_query($con, $query);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);
$pessoa = $array[0];

?>
<!-- Começo Página de Perfil Editar-->

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-9">
                    <h1 class="h3 mb-0 text-gray-800">Editar Perfil</h1>
                </div>
                <div class="d-flex col-3 justify-content-end">
                    <a href="perfilusuario.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="formPessoaAlterar" action="./Pessoa/PessoaA001.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idPessoa" value="<?php echo $idPessoa; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nomePessoa">Nome</label>
                            <input type="text" class="form-control" id="nomePessoa" name="nomePessoa" value="<?php echo $pessoa['nomePessoa']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="emailPessoa" name="emailPessoa" value="<?php echo $pessoa['emailPessoa']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" class="form-control" id="nascimentoPessoa" name="nascimentoPessoa" value="<?php echo $pessoa['nascimentoPessoa']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefonePessoa" name="telefonePessoa" value="<?php echo $pessoa['telefonePessoa']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input type="text" class="form-control" id="instagramPessoa" name="instagramPessoa" value="<?php echo $pessoa['instagramPessoa']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imagem_perfil">Imagem de Perfil</label>
                            <input type="file" class="form-control-file" id="imagem_perfil" name="imagem_perfil">
                            <img width="400" height="400" src="<?php echo 'Pessoa/img/perfil/' . $pessoa['imagemPessoa']; ?> " class="img-profile rounded-circle mt-3" alt="Imagem de Perfil">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button id="buttonFormPessoaAlterar" type="submit" class="btn btn-success">Salvar Alterações</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<form id="idFormEditarPessoa" action="perfilusuarioeditar.php" method="post">
    <input id="idPessoa03" name="idPessoa" type="hidden">
</form>

<!-- Fim Página de Perfil -->
<?php require_once 'footer.php'; ?>

<script src="Pessoa/Pessoa.js"></script>

<script>
    $(document).ready(function() {
        ajaxAlterarPessoa();
    });
</script>