<?php
//extract($_POST);
require_once '../core/includeCore.php';

date_default_timezone_set('America/Sao_Paulo');


$nomePessoa = $_POST['nomePessoa'];
$emailPessoa = $_POST['emailPessoa'];
$nascimentoPessoa = $_POST['nascimentoPessoa'];
$telefonePessoa = $_POST['telefonePessoa'];
$instagramPessoa = $_POST['instagramPessoa'];
$idPessoa = $_POST['idPessoa'];

$imagemNomeNovo = "";

// Gera o novo nome do arquivo com a data e hora exata
if (isset($_FILES['imagem_perfil'])) {
    $imagem = $_FILES['imagem_perfil'];
    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
    $imagemNomeNovo = date('Y_m_d_H-i-s') . '.' . $extensao;

    // Move o arquivo para o diretório img/perfil/
    $diretorio = '../img/perfil/';
    $caminhoCompleto = $diretorio . $imagemNomeNovo;

    move_uploaded_file($imagem['tmp_name'], $caminhoCompleto);
}


$result = false;

//query do banco de dados
$query = "UPDATE pessoa SET
        nomePessoa = '$nomePessoa',
        emailPessoa = '$emailPessoa',
        nascimentoPessoa = '$nascimentoPessoa',
        telefonePessoa = '$telefonePessoa',
        instagramPessoa = '$instagramPessoa',
        imagemPessoa = '$imagemNomeNovo'
        WHERE idPessoa = $idPessoa";

$result = mysqli_query($con, $query);

if ($result) {
    echo 1;
} else {
    echo 0;
}
