<?php
//extract($_POST);
require_once '../core/includeCore.php';

date_default_timezone_set('America/Sao_Paulo');

$nomePessoa = $_POST['nomeUsuario'];
$emailPessoa = $_POST['emailUsuario'];
$nascimentoPessoa = $_POST['dataNascimentoUsuario'];
$senhaPessoa = $_POST['senhaUsuario'];
$statusPessoa = $_POST['statusUsuario'];
$idPessoa = $_POST['idUsuario'];

$imagemNomeNovo = "";

// Gera o novo nome do arquivo com a data e hora exata
if (isset($_FILES['imagemUsuario'])) {
    $imagem = $_FILES['imagemUsuario'];
    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
    $imagemNomeNovo = date('Y_m_d_H-i-s') . '.' . $extensao;

    // Move o arquivo para o diretório img/perfil/
    $diretorio = '../img/perfil/';
    $caminhoCompleto = $diretorio . $imagemNomeNovo;

    move_uploaded_file($imagem['tmp_name'], $caminhoCompleto);
}

$result = false;

//query do banco de dados

if ($idPessoa != null) {
    $query = "UPDATE pessoa SET
        nomePessoa = '$nomePessoa',
        emailPessoa = '$emailPessoa',
        nascimentoPessoa = '$nascimentoPessoa',
        senhaPessoa = '$senhaPessoa',
        statusPessoa = '$statusPessoa',
        imagemPessoa = '$imagemNomeNovo'
        WHERE idPessoa = $idPessoa";

    $result = mysqli_query($con, $query);
}

if ($result) {
    echo 1;
} else {
    echo 0;
}
