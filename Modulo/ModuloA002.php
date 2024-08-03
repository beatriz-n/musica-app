<?php
extract($_POST);
require_once '../core/includeCore.php';

$arrayAlternativas = [];

if(!isset($alternativaCorreta)){
    $alternativaCorreta = 0;
}

for ($i = 0; $i < count($alternativa); $i++) {
    $flag = 0;
    if ($alternativaCorreta == $i) {
        $flag = 1;
    }

    $arrayAlternativas[] = [$alternativa[$i], $flag];
}

$arrayAlternativasJson = json_encode($arrayAlternativas);
$arrayAlternativasJsonEscaped = mysqli_real_escape_string($con, $arrayAlternativasJson);

$query = "UPDATE atividade SET  
        perguntaAtividade = '$perguntaAtividade',
        alternativaAtividade = '$arrayAlternativasJsonEscaped',
        statusAtividade = '$statusAtividade'
        WHERE idAtividade = $idAtividade";

$result = mysqli_query($con, $query);

if ($result) {
    echo $idModulo;
} else {
    echo 0;
}
