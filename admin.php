<?php
require_once 'header.php';
$qtdCompletos = 0;
// Consultas para obter as contagens de módulos, atividades e pessoas ativas
$query = "SELECT count(*) as qtdModulo FROM modulo WHERE statusModulo = 1";
$query2 = "SELECT count(*) as qtdAtividade FROM atividade WHERE statusAtividade = 1";
$query3 = "SELECT count(*) as qtdPessoa FROM pessoa WHERE statusPessoa = 1";

$result = mysqli_query($con, $query);
$array = mysqli_fetch_assoc($result);

$result2 = mysqli_query($con, $query2);
$array2 = mysqli_fetch_assoc($result2);

$result3 = mysqli_query($con, $query3);
$array3 = mysqli_fetch_assoc($result3);

$qtdModulo = $array['qtdModulo'];
$qtdAtividade = $array2['qtdAtividade'];
$qtdPessoa = $array3['qtdPessoa'];
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4" style="size: 40px;">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="dashboard.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Acesse o Módulo Aprendizagem</a>
    </div>

    <div class="row">
        <!-- Card de Módulos Ativos -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Quantidades de Módulos Ativos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $qtdModulo ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card de Atividades Ativas -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Quantidade de Atividades Ativas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $qtdAtividade ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card de Usuários Ativos -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Quantidade de Usuários Ativos</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $qtdPessoa ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="class= table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Usuário</th>
                    <th style="text-align: center;">Progresso</th>
                </tr>
            </thead>
            <tbody>
                <?php

                //quantidade de atividades com resposta pelo usuario
                $queryProgresso = "SELECT * FROM pessoa";
                $resultProgresso = mysqli_query($con, $queryProgresso);
                $arrayProgresso = mysqli_fetch_all($resultProgresso, MYSQLI_ASSOC);

                foreach ($arrayProgresso as $pessoa) {
                    $qtdCompletos = 0;
                    $idPessoaProgresso = $pessoa['idPessoa'];
                    $nomePessoa = $pessoa['nomePessoa'];

                    $cmdModulo = "SELECT * FROM modulo WHERE statusModulo = 1 ORDER BY nivelModulo";
                    $resultModulo = mysqli_query($con, $cmdModulo);
                    $qtdRegistroModulo = mysqli_num_rows($resultModulo);
                    $arrayModulo = mysqli_fetch_all($resultModulo, MYSQLI_ASSOC);
                    $completoModulo = 0;
                    for ($j = 0; $j < $qtdRegistroModulo; $j++) {
                        $idModulo = $arrayModulo[$j]['idModulo'];
                        // quantidade de atividade por modulo
                        $cmd3 = "SELECT * FROM atividade WHERE idModulo = $idModulo AND statusAtividade = 1";
                        $result3 = mysqli_query($con, $cmd3);
                        $qtdRegistro3 = mysqli_num_rows($result3);
                        $array3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);

                        $cmd4 = "SELECT * FROM pessoaatividade pa
                         LEFT JOIN atividade a ON pa.idAtividade = a.idAtividade
                         WHERE pa.idPessoa = $idPessoaProgresso AND idModulo = $idModulo";
                        $result4 = mysqli_query($con, $cmd4);
                        $qtdRegistro4 = mysqli_num_rows($result4);
                        if (($qtdRegistro4 == $qtdRegistro3) && ($qtdRegistro4 != 0)) {
                            $qtdCompletos++;
                            $completoModulo = 1;
                        } else {
                            if ($j == 0 && $qtdRegistro3 == 0) {
                                $completoModulo = 1;
                            }else if($qtdRegistro3 > 0){
                                $completoModulo = 0;
                            }
                            if ($qtdRegistro3 == 0 && !empty($arrayModulo[0]['descricaoModulo'])) {
                                if ($completoModulo == 1) {
                                    $qtdCompletos++;
                                } else {
                                    $completoModulo = 0;
                                }
                            }
                        }
                    }
                    $progresso = (100 * $qtdCompletos) / $qtdRegistroModulo;
                ?>

                    <tr>
                        <td><?= $nomePessoa ?></td>
                        <td style="text-align: center;"><?= $progresso ?>%</td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- End of Main Content -->

<?php require_once 'footer.php'; ?>