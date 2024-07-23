<?php
require_once './core/conexaoDB.php';
require_once 'headeraprendizagem.php';

$cmd = "SELECT * FROM modulo";
$result = mysqli_query($con, $cmd);
$qtdRegistros = mysqli_num_rows($result);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

$arrayNivel = [];
$nivelMenor = 999;
$qtdCompletos = 0;

for ($i = 0; $i < $qtdRegistros; $i++) {
    $dados = $array[$i];
    $idModulo = $dados['idModulo'];
    $nivelModulo = $dados['nivelModulo'];
    $completoModulo = $dados['completoModulo'];
    // acha o nivel menor incompleto
    if (($nivelModulo < $nivelMenor) && $completoModulo == 0) {
        $nivelMenor = $nivelModulo;
        $idModuloAtual = $idModulo;
    }

    // criando array nivel
    $arrayNivel[] = [
        'id' => $idModulo,
        'nivel' => $nivelModulo
    ];
}
echo $nivelMenor;

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

        $cmd2 = "SELECT * FROM modulo WHERE idModulo = $idModuloOrdenado";
        $result2 = mysqli_query($con, $cmd2);
        $array2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
        // titulo do modulo ordenado
        $tituloModuloOrdenado = $array2[0]['tituloModulo'];
        // completo modulo
        $completoModuloOrdenado = $array2[0]['completoModulo'];

        // contador de niveis completos para calculo de progresso
        if ($completoModuloOrdenado == 1) {
            $qtdCompletos++;
        }

        // idmodulo atual é o id do modulo com o nivel menor e incompleto
        if ($nivelModuloOrdenado == $nivelMenor) {
            $status = "card-focus-atual";
        } else if ($nivelModuloOrdenado > $nivelMenor) {
            $status = "card-focus-incompleta";
        } else if ($completoModuloOrdenado == 1) {
            $status = "card-focus-completa";
        }

    ?>
        <div class="card w-50 mb-3 <?= $status ?>" onclick="focusCard(this)">
            <div class="card-body text-center">
                Nível <?= $nivelModuloOrdenado ?> - <?= $tituloModuloOrdenado ?>
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
                <div class="xp-bar-fill" style="width: <?=$progresso?>%;"></div> <!-- style width define o quanto a barra vai estar preenchida -->
            </div>
        </div>
    </div>

</div>
<?php require_once 'footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Scroll the card with the class 'card-focus-incompleta' into view
        const focusedCard = document.querySelector('.card-focus-incompleta');
        if (focusedCard) {
            focusedCard.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    });
</script>