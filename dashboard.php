<?php require_once 'headeraprendizagem.php'; ?>
<?php
//use essas classes que personalizei para demonstrar se está completa ou incompleta
// -> exemplo de uso da classe card-focus-completa quando completa as atividades
// -> 1 = completa; 0 = incompleta
$completaAtividade = 0;
if ($completaAtividade == 1) {
    $status = "card-focus-completa";
} else {
    //pegar o primeiro registro incompleto para colocar a classe card-focus-atual
    //que será "focalizada"
    $status = "card-focus-atual";
    $idAtual = "id='cardAtual'";
    //as demais incompletas não terão uma "estilização" css especial
}
?>
<!-- Begin Page Content -->
<div class="container-fluid d-flex flex-column align-items-center justify-content-center overflow" style="padding: 200px;">
    <div class="card w-50 mb-3 card-focus-completa" onclick="focusCard(this)">
        <div class="card-body text-center">
            Lição 1 - Notas musicais
        </div>
    </div>
    <div class="card w-50 mb-3 card-focus-completa" onclick="focusCard(this)">
        <div class="card-body text-center">
            Lição 2 - Ritmos
        </div>
    </div>
    <div class="card w-50 mb-3 card-focus-completa" onclick="focusCard(this)">
        <div class="card-body text-center">
            Lição 3 - Acordes
        </div>
    </div>
    <div class="card w-50 mb-3 card-focus-atual" onclick="focusCard(this)">
        <div class="card-body text-center">
            Lição 4 - Escalas
        </div>
    </div>
    <div class="card w-50 mb-3 card-focus-incompleta" onclick="focusCard(this)">
        <div class="card-body text-center">
            Lição 5 - Modulação
        </div>
    </div>

<!-- Barra de Progresso -->
<div class="fixed-bottom">
    <div class="xp-bar-label">Barra de Progresso</div>
    <div class="xp-bar-container">
        <div class="xp-bar">
            <div class="xp-bar-fill" style="width: 80%;"></div> <!-- style width define o quanto a barra vai estar preenchida -->
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
