<?php
require_once './core/conexaoDB.php';
require_once 'headeraprendizagem.php';
extract($_POST);

if (isset($idModulo)) {
    $cmd = "SELECT * FROM modulo m
    LEFT JOIN atividade a ON m.idModulo = a.idModulo
    WHERE m.idModulo = $idModulo";
    $result = mysqli_query($con, $cmd);
    $qtdRegistros = mysqli_num_rows($result);
    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
    <div style="padding: 2%;">
        <h3>Nivel <?= $array[0]['nivelModulo'] ?> </h3>
        <hr>
        <div class="card">
            <div class="card-body">
                <h4><?= $array[0]['tituloModulo'] ?> :</h4>
                <h5 class="card-title"><?= $array[0]['descricaoModulo'] ?></h5>
                <br>
                <h4>Responda:</h4>
                <br>
                <?php
                for ($i = 0; $i < $qtdRegistros; $i++) {
                    $arrayAtividade = $array[$i];
                    $j = $i + 1;
                ?>
                    <p><b>Atividade <?= $j ?>:</b></p>
                    <p><?= $arrayAtividade['perguntaAtividade'] ?></p>
                    <div class="activity-container">
                        <!-- <input type="radio" name="atividade" value="<?= $arrayAtividade['perguntaAtividade'] ?>" id="atividade<?=$j ?>">
                        <label for="atividade<?=$j ?>"> <?= $arrayAtividade['perguntaAtividade'] ?></label> -->
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

<?php
} else {
    echo "<div class='alert alert-danger' role='alert'> Nenhum registro encontrado</div>";
}
?>

<?php require_once 'footer.php'; ?>
