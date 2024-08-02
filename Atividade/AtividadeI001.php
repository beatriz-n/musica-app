<?php
extract($_POST);
require_once '../core/includeCore.php';
for ($j = 0; $j <= $i; $j++) {

      for ($l = 0; $l < $h; $l++) {
            $flagAcerto = '0';

            if (isset($_POST['respostaPessoaAtividade' . $j]) && isset($_POST['resultadoPessoaAtividade' . $j . $l])) {
                  if ($_POST['respostaPessoaAtividade' . $j] == $l && $_POST['resultadoPessoaAtividade' . $j . $l] == '1') {
                        $flagAcerto = '1';
                  }
            }

            if ($l = $h - 1) {
                  $respostaPessoaAtividade = $_POST['respostaPessoaAtividade' . $j];
                  $resultadoPessoaAtividade = $_POST['resultadoPessoaAtividade' . $j . $l];
                  $idAtividade = $_POST['idAtividade' . $j];

                  $query = "INSERT INTO pessoaatividade
                  (respostaPessoaAtividade, resultadoPessoaAtividade, idAtividade, idPessoa)
            VALUES('$respostaPessoaAtividade', '$flagAcerto', '$idAtividade', '$idPessoa')
";

                  $result = mysqli_query($con, $query);
                  $idPessoaAtividade = mysqli_insert_id($con);
                  if ($idPessoaAtividade > 0 && is_numeric($idPessoaAtividade)) {
                        echo $idPessoaAtividade;
                  } else {
                        echo 0;
                  }
                  
            }
      }
}
