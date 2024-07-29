<br>
<?php
require_once './core/conexaoDB.php';
require_once 'headeraprendizagem.php';
extract($_POST);

$cmd = "SELECT * FROM modulo m
    LEFT JOIN atividade a ON m.idModulo = a.idModulo
    WHERE m.idModulo = $idModulo";
$result = mysqli_query($con, $cmd);
$qtdRegistros = mysqli_num_rows($result);
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (!empty($array[0]['idAtividade'])) {
?>
    <form action="Atividade/AtividadeI001.php" method="POST" id="formFazerAtividade">
        <div style="padding: 2%;">
            <?php if ($completoModulo != 0) { ?>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Você já completou este Nível!</h4>
                    <p>Agora você está visualizando a <b>revisão</b></p>
                </div>
            <?php } ?>
            <h3>Nível <?= $array[0]['nivelModulo'] ?> </h3>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h4><?= $array[0]['tituloModulo'] ?> :</h4>
                    <h5 class="card-title"><?= $array[0]['descricaoModulo'] ?></h5>
                    <br>
                    <h4>Responda:</h4>
                    <br>
                    <?php
                    $arrayAlternativa = [];
                    for ($i = 0; $i < $qtdRegistros; $i++) {
                        $arrayAtividade = $array[$i];
                        $j = $i + 1;

                        $jsonString = $arrayAtividade['alternativaAtividade'];

                        // verificando o formato do JSON que vem do banco
                        if (strpos($jsonString, "'") !== false) {
                            $jsonString = str_replace("'", '"', $jsonString);
                        }

                        // Decodificar o JSON
                        $arrayAlternativa = json_decode($jsonString, true);

                    ?>
                        <p><b>Atividade <?= $j ?>:</b></p>
                        <p><?= $arrayAtividade['perguntaAtividade'] ?></p>
                        <div class="activity-container">
                            <?php if (is_array($arrayAlternativa)) {
                                foreach ($arrayAlternativa as $alternativa) { ?>
                                    <input type="radio" name="respostaAtividadePessoa<?= $i ?>" value="<?= $i ?>" id="respostaAtividadePessoa<?= $i ?>">
                                    <label for="respostaAtividadePessoa<?= $i ?>"> <?= $alternativa[0] ?></label>
                                    <input type="hidden" id="resultadoPessoaAtividade<?= $i ?>" name="resultadoPessoaAtividade<?= $i ?>" value="<?= $alternativa[1] ?>">
                                    <br>
                            <?php }
                            } ?>
                        </div>
                    <?php
                    }
                    if ($completoModulo == 0) {
                    ?>
                        <br>
                        <button class="btn btn-primary" id="btnEnviar" type="submit">Enviar</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </form>

<?php
} else {
    echo "<div class='alert alert-danger' role='alert'> Volte para a <a href='dashboard.php'><b> Dashboard</b></a> não encontramos nenhuma Atividade cadastrada aqui.</div>";
}
?>

<?php require_once 'footer.php'; ?>

<script src="Atividade/Atividade.js"></script>