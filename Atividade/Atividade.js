// redirecionamentos
function redirecionarFazerAtividade(idModulo) {
    $('#idModulo01').val(idModulo);
    $('#idFormFazerAtividade').trigger('submit');
}