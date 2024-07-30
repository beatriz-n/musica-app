<?php
extract($_POST);
require_once '../core/includeCore.php';
for ($j = 0; $j <= $i; $j++) {

      for ($l = 0; $l < $h; $l++) {
            if (isset($_POST['respostaPessoaAtividade' . $j . $l]) && isset($_POST['resultadoPessoaAtividade' . $j . $l])) {
                  $respostaPessoaAtividade = $_POST['respostaPessoaAtividade' . $j . $l];
                  $resultadoPessoaAtividade = $_POST['resultadoPessoaAtividade' . $j . $l];
                  $idAtividade = $_POST['idAtividade' . $j];

                  $query = "INSERT INTO pessoaatividade
                  (respostaPessoaAtividade, resultadoPessoaAtividade, idAtividade, idPessoa)
            VALUES('$respostaPessoaAtividade', '$resultadoPessoaAtividade', '$idAtividade', '$idPessoa')
";

                  $result = mysqli_query($con, $query);
                  $idPessoaAtividade = mysqli_insert_id($con);
                  if ($idPessoaAtividade > 0) {
                        echo $idPessoaAtividade;
                  } else {
                        echo 0;
                  }
            }
      }
}
