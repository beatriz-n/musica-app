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

$query = "INSERT INTO atividade (perguntaAtividade, alternativaAtividade, statusAtividade, idModulo)
                     VALUES('$perguntaAtividade','$arrayAlternativasJsonEscaped','$statusAtividade','$idModulo')
";

$result = mysqli_query($con, $query);
$id = mysqli_insert_id($con);
if($id>0){
    echo $idModulo;
}else{
    echo 0;
}