<?php
extract($_POST);
require_once '../core/conexaoDB.php';

$query = "SELECT * FROM pessoa WHERE emailPessoa LIKE '$emailPessoa'";

$result = mysqli_query($con, $query);
$qtdRegistros = mysqli_num_rows($result);

if ($qtdRegistros == 0) {
    $query = "INSERT INTO Pessoa (nomePessoa, emailPessoa, senhaPessoa, statusPessoa, adminPessoa)
                  VALUES('$nomePessoa','$emailPessoa','$senhaPessoa', '1', '0')";

    $result = mysqli_query($con, $query);
    $id = mysqli_insert_id($con);

    if ($id > 0) {
        setcookie("idPessoaCookie", null, -1, '/');
        setcookie("idPessoaCookie", $id, (time() + 24 * 3600), '/');
    }
    echo $id;
} else {
    echo '-1';
}