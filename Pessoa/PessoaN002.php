<?php
extract($_POST);
require_once '../core/conexaoDB.php';

$query = "SELECT * FROM pessoa WHERE emailPessoa LIKE '$emailPessoa'";

$result = mysqli_query($con, $query);
$qtdRegistros = mysqli_num_rows($result);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

if ($qtdRegistros > 0) {
    $senhaSalva = $array[0]['senhaPessoa'];

    if ($senhaSalva == $senhaPessoa) {

        $id = $array[0]['idPessoa'];
        if ($id > 0) {
            setcookie("idPessoaCookie", null, -1, '/');
            setcookie("idPessoaCookie", $id, (time() + 24 * 3600), '/');

            echo '1';
        } else {
            echo '0';
        }
    } else {
        echo '-3';
    }
} else {
    echo '-2';
}
