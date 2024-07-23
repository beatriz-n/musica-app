<?php
extract($_POST);
require_once '../core/includeCore.php';

$query = "INSERT INTO Modulo
                  (tituloModulo,descricaoModulo,statusModulo)
            VALUES('$tituloModulo','$descricaoModulo','$statusModulo')
";

$result = mysqli_query($con, $query);
$id = mysqli_insert_id($con);

echo $id;
