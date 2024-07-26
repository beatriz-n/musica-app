<?php
extract($_POST);
require_once '../core/includeCore.php';

$query = "INSERT INTO Pessoa
                  (nomePessoa,emailPessoa,senhaPessoa)
            VALUES('$nomePessoa','$emailPessoa','$senhaPessoa')
";

$result = mysqli_query($con, $query);
$id = mysqli_insert_id($con);

echo $id;
