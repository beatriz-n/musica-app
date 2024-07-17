// redirecionamentos
function redirecionarAtividade(idModulo) {
    $('#idModulo01').val(idModulo);
    $('#idFormAtividade').trigger('submit');
}

function redirecionarAtividadeNovo(idModulo) {
    $('#idModulo02').val(idModulo);
    $('#idFormAtividadeNovo').trigger('submit');
}

// adiciona mais alternativas
var proximaLetra = 'E'; // Começa com a letra E para a próxima alternativa

function adicionarAlternativa() {
    var novaAlternativa = '<div class="form-group">' +
        '<label for="alternativa' + proximaLetra + '">Alternativa ' + proximaLetra + '</label>' +
        '<input type="text" class="form-control" name="alternativa[]" required>' +
        '<div class="form-check">' +
        '<input class="form-check-input" type="radio" name="alternativaCorreta" id="alternativaCorreta' + proximaLetra + '" value="' + proximaLetra + '">' +
        '<label class="form-check-label" for="alternativaCorreta' + proximaLetra + '">' +
        'Correta' +
        '</label>' +
        '</div>' +
        '</div>';

    $('#alternativas').append(novaAlternativa);
    proximaLetra = String.fromCharCode(proximaLetra.charCodeAt(0) + 1); // Incrementa a letra
}