<?php
extract($_POST);
require_once '../core/includeCore.php';

$query = "DELETE FROM Atividade WHERE idAtividade = $idAtividade";

$result = mysqli_query($con, $query);

if ($result) {
    echo 1;
} else {
    echo 0;
}
