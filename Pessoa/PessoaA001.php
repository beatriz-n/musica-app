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

// Gera o novo nome do arquivo com a data e hora exata
if (!empty($_FILES['imagem_perfil'])) {
    $imagemNomeNovo = "";
    $imagem = $_FILES['imagem_perfil'];
    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
    $imagemNomeNovo = date('Y_m_d_H-i-s') . '.' . $extensao;

    // Move o arquivo para o diretório img/perfil/
    $diretorio = '../img/perfil/';
    $caminhoCompleto = $diretorio . $imagemNomeNovo;

    move_uploaded_file($imagem['tmp_name'], $caminhoCompleto);
}

$result = false;

if ($idPessoa != null) {
    $query = "UPDATE pessoa SET
        nomePessoa = '$nomePessoa',
        emailPessoa = '$emailPessoa',
        nascimentoPessoa = '$nascimentoPessoa',
        telefonePessoa = '$telefonePessoa',
        instagramPessoa = '$instagramPessoa'
        WHERE idPessoa = $idPessoa";

    $result = mysqli_query($con, $query);

    if (isset($imagemNomeNovo)) {
        $query2 = "UPDATE pessoa SET 
            imagemPessoa = '$imagemNomeNovo'
            WHERE idPessoa = $idPessoa";
        mysqli_query($con, $query2);
    }
}

if ($result) {
    echo 1;
} else {
    echo 0;
}
