<?php
extract($_POST);
require_once '../core/conexaoDB.php';

date_default_timezone_set('America/Sao_Paulo');

$query = "SELECT * FROM pessoa WHERE emailPessoa LIKE '$emailUsuario'";

$result = mysqli_query($con, $query);
$qtdRegistros = mysqli_num_rows($result);


// Gera o novo nome do arquivo com a data e hora exata
if (isset($_FILES['imagemUsuario'])) {
    $imagem = $_FILES['imagemUsuario'];
    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
    $imagemNomeNovo = date('Y_m_d_H-i-s') . '.' . $extensao;

    // Move o arquivo para o diretório img/perfil/
    $diretorio = 'img/';
    $caminhoCompleto = $diretorio . $imagemNomeNovo;

    move_uploaded_file($imagem['tmp_name'], $caminhoCompleto);
}


if ($qtdRegistros == 0) {
    $query = "INSERT INTO Pessoa (nomePessoa, emailPessoa, senhaPessoa, imagemPessoa, nascimentoPessoa, statusPessoa, adminPessoa)
                  VALUES('$nomeUsuario','$emailUsuario','$senhaUsuario', '$imagemNomeNovo', '$nascimentoUsuario', '$statusUsuario', '0')";

    $result = mysqli_query($con, $query);
    $id = mysqli_insert_id($con);
    
    echo $id;
} else {
    echo '-1';
}
