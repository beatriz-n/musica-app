// redirecionamentos
function redirecionarAtividade(idModulo) {
    $('#idModulo01').val(idModulo);
    $('#idFormAtividade').trigger('submit');
}

function redirecionarAtividadeNovo(idModulo) {
    $('#idModulo02').val(idModulo);
    $('#idFormAtividadeNovo').trigger('submit');
}

function editarModulo(idModulo) {
    $('#idModulo03').val(idModulo);
    $('#idFormEditarModulo').trigger('submit');
}

// adiciona mais alternativas
var proximaLetra = 'B'; // Começa com a letra B para a próxima alternativa
var proximoValor = '1'; 

function adicionarAlternativa() {
    var novaAlternativa = '<div class="form-group">' +
        '<label for="alternativa' + proximaLetra + '">Alternativa ' + proximaLetra + '</label>' +
        '<input type="text" class="form-control" name="alternativa[]" required>' +
        '<div class="form-check">' +
        '<input class="form-check-input" type="checkbox" name="alternativaCorreta" id="alternativaCorreta' + proximaLetra + '" value="' + proximoValor + '">' +
        '<label class="form-check-label" for="alternativaCorreta' + proximaLetra + '">' +
        'Correta' +
        '</label>' +
        '</div>' +
        '</div>';

    $('#alternativas').append(novaAlternativa);
    proximaLetra = String.fromCharCode(proximaLetra.charCodeAt(0) + 1); // Incrementa a letra
    proximoValor ++;
}

function adicionarAlternativaEditar() {
    var letra = $('#letraAlternativa').val();
    var valor = $('#valorAlternativa').val();

    var novaAlternativa = '<div class="form-group">' +
        '<label for="alternativa' + letra + '">Alternativa ' + letra + '</label>' +
        '<input type="text" class="form-control" name="alternativa[]" required>' +
        '<div class="form-check">' +
        '<input class="form-check-input" type="checkbox" name="alternativaCorreta" id="alternativaCorreta' + letra + '" value="' + valor + '">' +
        '<label class="form-check-label" for="alternativaCorreta' + letra + '">' +
        'Correta' +
        '</label>' +
        '</div>' +
        '</div>';

    $('#alternativas').append(novaAlternativa);
    letra = String.fromCharCode(letra.charCodeAt(0) + 1); // Incrementa a letra
    valor ++;
    $('#letraAlternativa').val(letra);
    $('#valorAlternativa').val(valor);
}

// atividade
function abreModalAtividade(idModulo) {
    $.ajax({
        type: 'POST',
        url: 'Modulo/ModuloM001.php',
        async: true,
        data: {
            idModulo: idModulo
        }, success: function (data) {
            $('#atividadeListar').html(data);
            $('#atividadeListar').modal('show');
        }
    });
}

function abreModalAtividadeNovo(idModulo) {
    $.ajax({
        type: 'POST',
        url: 'Modulo/ModuloM002.php',
        async: true,
        data: {
            idModulo: idModulo
        }, success: function (data) {
            $('#atividadeListar').modal('hide');
            $('#atividadeNovoListar').html(data);
            $('#atividadeNovoListar').modal('show');
        }
    });
}

function abreModalAtividadeEditar(idAtividade) {
    $.ajax({
        type: 'POST',
        url: 'Modulo/ModuloM003.php',
        async: true,
        data: {
            idAtividade: idAtividade
        }, success: function (data) {
            $('#atividadeListar').modal('hide');
            $('#atividadeEditarListar').html(data);
            $('#atividadeEditarListar').modal('show');
        }
    });
}

function ajaxInserirModulo() {
    $('#formModuloInserir').ajaxForm({
        beforeSend: function () {
            $('#buttonFormModuloInserir').prop('disabled', true);
        },
        success: function (data) {
            $('#buttonFormModuloInserir').prop('disabled', false);
            try {
                if (data != '0') {
                    swal({
                        title: 'Bom trabalho!',
                        text: 'Módulo inserido com sucesso.',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ok!',
                        closeOnConfirm: true
                    }, function (isConfirm) {
                        location.href = 'modulo.php';
                    });
                } else {
                    swal('Erro!', 'Houve um erro ao tentar inserir o Módulo!', 'error');
                }
            } catch (error) {
                swal('Erro!', 'Erro inesperado!', 'error');
            }
        }
    });
}

function ajaxInserirAtividade() {    
    $('#formAtividadeInserir').ajaxForm({
        beforeSend: function () {
            $('#buttonFormAtividadeInserir').prop('disabled', true);
        },
        success: function (data) {
            $('#buttonFormAtividadeInserir').prop('disabled', false);
            try {
                if (data != '0') {
                    swal({
                        title: 'Bom trabalho!',
                        text: 'Atividade inserida com sucesso.',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ok!',
                        closeOnConfirm: true
                    }, function (isConfirm) {
                        abreModalAtividade(data);
                        $('#fecharModal').trigger('click');
                    });
                } else {
                    swal('Erro!', 'Houve um erro ao tentar inserir a atividade!', 'error');
                }
            } catch (error) {
                swal('Erro!', 'Erro inesperado!', 'error');
            }
        }
    });
}

function ajaxAlterarAtividade() {    
    $('#formAtividadeAlterar').ajaxForm({
        beforeSend: function () {
            $('#buttonFormAtividadeAlterar').prop('disabled', true);
        },
        success: function (data) {
            $('#buttonFormAtividadeAlterar').prop('disabled', false);
            try {
                if (data != '0') {
                    swal({
                        title: 'Bom trabalho!',
                        text: 'Atividade alterado com sucesso.',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ok!',
                        closeOnConfirm: true
                    }, function (isConfirm) {
                        abreModalAtividade(data);
                        $('#fecharModal').trigger('click');
                    });
                } else {
                    swal('Erro!', 'Houve um erro ao tentar alterar a atividade!', 'error');
                }
            } catch (error) {
                swal('Erro!', 'Erro inesperado!', 'error');
            }
        }
    });
}

function ajaxAlterarModulo() {
    $('#formModuloAlterar').ajaxForm({
        beforeSend: function () {
            $('#buttonFormModuloAlterar').prop('disabled', true);
        },
        success: function (data) {
            $('#buttonFormModuloAlterar').prop('disabled', false);
            try {
                if (data != '0') {
                    swal({
                        title: 'Bom trabalho!',
                        text: 'Módulo alterado com sucesso.',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ok!',
                        closeOnConfirm: true
                    }, function (isConfirm) {
                        location.href = 'modulo.php';
                    });
                } else {
                    swal('Erro!', 'Houve um erro ao tentar alterar o Módulo!', 'error');
                }
            } catch (error) {
                swal('Erro!', 'Erro inesperado!', 'error');
            }
        }
    });
}

function excluirModulo(idModulo) {
    swal({
        title: 'Atenção',
        text: 'Deseja excluir o módulo?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'green',
        confirmButtonText: 'Sim!',
        cancelButtonText: 'Cancelar!',
        closeOnConfirm: false
    }, function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: 'POST',
                url: 'Modulo/ModuloE001.php',
                async: true,
                data: {
                    idModulo: idModulo
                }, success: function (data) {
                    if (data == 1) {
                        location.href = "modulo.php";
                        swal('Sucesso!', 'Módulo Excluído!', 'success');
                    } else {
                        swal('Erro!', 'Houve um erro ao tentar excluir o Módulo!', 'error');
                    }
                }
            });
        } else {

        }

    });
}

function excluirAtividadeModulo(idAtividade, idModulo, flagRedirect) {
    swal({
        title: 'Atenção',
        text: 'Deseja excluir a atividade do módulo atual?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'green',
        confirmButtonText: 'Sim!',
        cancelButtonText: 'Cancelar!',
        closeOnConfirm: false
    }, function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                type: 'POST',
                url: 'Modulo/ModuloE002.php',
                async: true,
                data: {
                    idAtividade: idAtividade,
                    idModulo: idModulo
                }, success: function (data) {
                    if (data == 1) {
                        if (flagRedirect == 1) {
                            abreModalAtividade(idModulo);
                        } else {
                            editarModulo(idModulo);
                        }
                        swal('Sucesso!', 'Atividade Excluída!', 'success');
                    } else {
                        swal('Erro!', 'Houve um erro ao tentar excluir a Atividade!', 'error');
                    }
                }
            });
        } else {

        }

    });
}