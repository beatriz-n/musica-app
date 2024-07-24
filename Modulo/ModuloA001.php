<?php
extract($_POST);
require_once '../core/includeCore.php';

$query = "UPDATE Modulo SET  
        tituloModulo = '$tituloModulo',
        descricaoModulo = '$descricaoModulo',
        statusModulo = '$statusModulo',
        nivelModulo = '$nivelModulo'
        WHERE idModulo = $idModulo";

$result = mysqli_query($con, $query);

if ($result) {
    echo 1;
} else {
    echo 0;
}
