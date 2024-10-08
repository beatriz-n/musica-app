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
?>
<form action="Atividade/AtividadeI001.php" method="POST" id="idFormInserirFazerAtividade" class="needs-validation" novalidate>
    <div style="padding: 2%;">
        <?php if ($completoModulo == 1) { ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Você já completou este Nível!</h4>
                <p>Agora você está visualizando a <b>revisão</b></p>
            </div>
        <?php }
        if ($completoModulo == 2) { ?>
            <h3><i class="fas fa-book"></i> <?= $array[0]['tituloModulo'] ?> </h3>
        <?php } else { ?>
            <h3>Nível <?= $array[0]['nivelModulo'] ?> </h3>
        <?php } ?>

        <hr>
        <div class="card">
            <div class="card-body">
                <h4><?= $array[0]['tituloModulo'] ?> :</h4>
                <h5 class="card-title"><?= $array[0]['descricaoModulo'] ?></h5>
                <br>
                <?php if (!empty($array) && !empty($array[0]['idAtividade'])) { ?>
                    <h4>Responda:</h4>
                    <br>
                    <?php
                    for ($i = 0; $i < $qtdRegistros; $i++) {
                        $arrayAtividade = $array[$i];
                        $j = $i + 1;

                        $jsonString = $arrayAtividade['alternativaAtividade'];
                        $idAtividade = $arrayAtividade['idAtividade'];

                        $cmdRevisao = "SELECT * FROM pessoaatividade pa
                                        LEFT JOIN atividade a ON pa.idAtividade = a.idAtividade
                                        WHERE pa.idPessoa = $idPessoaSession AND a.idAtividade = $idAtividade";
                        $resultRevisao = mysqli_query($con, $cmdRevisao);
                        $qtdRegistrosRevisao = mysqli_num_rows($resultRevisao);
                        $arrayRevisao = mysqli_fetch_all($resultRevisao, MYSQLI_ASSOC);

                        // Verificar se tem dados no array de revisão (tratamento de erro)
                        $respostaPessoaAtividade = isset($arrayRevisao[0]['respostaPessoaAtividade']) ? $arrayRevisao[0]['respostaPessoaAtividade'] : null;
                        $resultadoPessoaAtividade = isset($arrayRevisao[0]['resultadoPessoaAtividade']) ? $arrayRevisao[0]['resultadoPessoaAtividade'] : null;

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
                            <?php
                            $h = 0;
                            foreach ($arrayAlternativa as $alternativa) {
                                $checked = ($respostaPessoaAtividade == $h) ? 'checked' : '';

                                if ($completoModulo == 1) {
                                    if (($resultadoPessoaAtividade == 1 && $resultadoPessoaAtividade == $alternativa[1]) || $alternativa[1] == 1) {
                                        $classe = "alert alert-success";
                                        $resultado = "Alternativa Correta";
                                    } else {
                                        $classe = "alert alert-danger";
                                        $resultado = "";
                                    }
                            ?>
                                    <div class="alert <?= $classe ?>" role="alert">
                                        <input type="radio" name="respostaPessoaAtividade<?= $i ?>" id="respostaPessoaAtividade<?= $i . $h ?>" <?= $checked ?> required>
                                        <label for="respostaPessoaAtividade<?= $i . $h ?>"> <?= $alternativa[0] ?></label>
                                        <input type="hidden" id="resultadoPessoaAtividade<?= $i . $h ?>" name="resultadoPessoaAtividade<?= $i . $h ?>" value="<?= $alternativa[1]; ?>">
                                        <p><?= $resultado ?></p>
                                        <div class="invalid-feedback">Por favor, selecione uma alternativa.</div>
                                    </div>
                                <?php
                                } else { ?>
                                    <input type="radio" name="respostaPessoaAtividade<?= $i ?>" value="<?= $h ?>" id="respostaPessoaAtividade<?= $i . $h ?>" required>
                                    <label for="respostaPessoaAtividade<?= $i . $h ?>"> <?= $alternativa[0] ?></label>
                                    <input type="hidden" id="resultadoPessoaAtividade<?= $i . $h ?>" name="resultadoPessoaAtividade<?= $i . $h ?>" value="<?= $alternativa[1]; ?>">
                                    <div class="invalid-feedback">Por favor, selecione uma alternativa.</div>
                                <?php
                                } ?>
                                <br>
                            <?php
                                $h++;
                            } ?>
                        </div>
                        <input type="hidden" id="h" name="h" value="<?= $h ?>">
                        <input type="hidden" id="i" name="i" value="<?= $i ?>">

                        <input type="hidden" id="idAtividade<?= $i ?>" name="idAtividade<?= $i ?>" value="<?= $idAtividade ?> ">
                        <input type="hidden" id="idPessoa" name="idPessoa" value="<?= $idPessoaSession ?> ">
                    <?php
                    }
                    if ($completoModulo == 0) { ?>
                        <br>
                        <button class="btn btn-primary" id="buttonFormFazerAtividadeInserir" type="submit">Enviar</button>
                <?php
                    }
                }
                ?>
                <a href="dashboard.php"><button class="btn btn-primary" id="buttonVoltar" type="button">Voltar</button></a>
            </div>
        </div>
    </div>
</form>

<?php require_once 'footer.php'; ?>

<script src="Atividade/Atividade.js"></script>
<script>
    $(document).ready(function() {
        ajaxInserirFazerAtividade();
    });

    // Adicione a validação de formulário personalizada do Bootstrap
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
