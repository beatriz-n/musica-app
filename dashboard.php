<?php
require_once './core/conexaoDB.php';
require_once 'headeraprendizagem.php';

$cmd = "SELECT * FROM modulo WHERE statusModulo = 1";
$result = mysqli_query($con, $cmd);
$qtdRegistros = mysqli_num_rows($result);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

$arrayNivel = [];
$nivelMenor = 999;
$qtdCompletos = 0;
$completoModulo = 0;

for ($i = 0; $i < $qtdRegistros; $i++) {
    $dados = $array[$i];
    $idModulo = $dados['idModulo'];
    $nivelModulo = $dados['nivelModulo'];

    // criando array nivel
    $arrayNivel[] = [
        'id' => $idModulo,
        'nivel' => $nivelModulo
    ];
}

// ordena o array pelo nível
usort($arrayNivel, function ($a, $b) {
    return $a['nivel'] <=> $b['nivel'];
});
?>

<div class="container-fluid d-flex flex-column align-items-center justify-content-center overflow" style="padding: 200px;">
    <?php

    for ($j = 0; $j < count($arrayNivel); $j++) {
        $idModuloOrdenado = $arrayNivel[$j]['id'];
        $nivelModuloOrdenado = $arrayNivel[$j]['nivel'];
        $cmd2 = "SELECT * FROM modulo
        WHERE idModulo = $idModuloOrdenado";
        $result2 = mysqli_query($con, $cmd2);
        $array2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        // titulo do modulo ordenado
        $tituloModuloOrdenado = $array2[0]['tituloModulo'];

        // quantidade de atividades em cada modulo no total
        $cmd3 = "SELECT * FROM atividade
        WHERE idModulo = $idModuloOrdenado AND statusAtividade = 1";
        $result3 = mysqli_query($con, $cmd3);
        $qtdRegistro3 = mysqli_num_rows($result3);
        $array3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);

        // quantidade de atividades com resposta pelo usuario
        $cmd4 = "SELECT * FROM pessoaatividade pa
        LEFT JOIN atividade a ON pa.idAtividade = a.idAtividade
        WHERE idModulo = $idModuloOrdenado AND idPessoa = $idPessoaSession";
        $result4 = mysqli_query($con, $cmd4);
        $qtdRegistro4 = mysqli_num_rows($result4);
        $array4 = mysqli_fetch_all($result4, MYSQLI_ASSOC);
        if (($qtdRegistro4 == $qtdRegistro3) && ($qtdRegistro4 != 0)) {
            $qtdCompletos++;
            $completoModulo = 1;
        } else {
            if ($j == 0 && $qtdRegistro3 == 0) {
                $completoModulo = 2;
            }else if($qtdRegistro3 > 0){
                $completoModulo = 0;
            }
            if ($qtdRegistro3 == 0 && !empty($array2[0]['descricaoModulo'])) {
                if ($completoModulo == 1 || $completoModulo == 2) {
                    $qtdCompletos++;
                    $completoModulo = 2;
                } else {
                    $completoModulo = 0;
                }
            }
        }
        // acha nivel menor
        if (($nivelModuloOrdenado < $nivelMenor) && $completoModulo == 0) {
            $nivelMenor = $nivelModuloOrdenado;
        }

        // idmodulo atual é o id do modulo com o nivel menor e incompleto
        if ($completoModulo == 1) {
            $status = "card-focus-completa";
        }else if ($nivelModuloOrdenado == $nivelMenor) {
            $status = "card-focus-atual";
        } else if ($nivelModuloOrdenado > $nivelMenor) {
            $status = "card-focus-incompleta";
        }else if ($completoModulo == 2) {
            $status = "card-focus-leitura";
        }

    ?>
<div class="card w-50 mb-3 <?= $status ?>" onclick="if (this.classList.contains('card-focus-incompleta')) return; redirecionarFazerAtividade(<?= $idModuloOrdenado?>, <?= $completoModulo ?>);">
    <div class="card-body text-center">
        Nível <?= $nivelModuloOrdenado ?> - <?= $tituloModuloOrdenado ?><?php if ($completoModulo == 2) { echo " (Apenas Leitura)"; } ?>
    </div>
</div>

    <?php
    }
    // calculo do progresso do aluno
    $progresso = (100 * $qtdCompletos) / $qtdRegistros;
    ?>
    <!-- Barra de Progresso -->
    <div class="fixed-bottom">
        <div class="xp-bar-label">Barra de Progresso</div>
        <div class="xp-bar-container">
            <div class="xp-bar">
                <div class="xp-bar-fill" style="width: <?= $progresso ?>%;"></div> <!-- style width define o quanto a barra vai estar preenchida -->
            </div>
        </div>
    </div>

</div>
<?php require_once 'footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // rola a tela para o card atual
        const focusedCard = document.querySelector('.card-focus-atual');
        if (focusedCard) {
            focusedCard.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    });
</script>

<script>
        // Define o título dinamicamente usando JavaScript
        var tituloModulo = "<?= htmlspecialchars($tituloModulo) ?>";
        document.getElementById('cardFocusLeitura').setAttribute('title', '📒 ' + tituloModulo);
    </script>

<form id="idFormFazerAtividade" action="fazeratividade.php" method="post">
    <input id="idModulo01" name="idModulo" type="hidden">
    <input id="completoModulo" name="completoModulo" type="hidden">
</form>

<script src="Atividade/Atividade.js"></script>
