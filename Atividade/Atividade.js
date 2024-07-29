// redirecionamentos
function redirecionarFazerAtividade(idModulo, completoModulo) {
    console.log(completoModulo);
    $('#idModulo01').val(idModulo);
    $('#completoModulo').val(completoModulo);
    $('#idFormFazerAtividade').trigger('submit');
}

function ajaxFormFazerAtividade() {
    $('#idFormInserirFazerAtividade').ajaxForm({
        beforeSend: function () {
            $('#buttoninserirFazerAtividade').prop('disabled', true);
        },
        success: function (data) {
            $('#buttoninserirFazerAtividade').prop('disabled', false);
            try {
                const obj = JSON.parse(data);
                if (obj.erro === '0') {
                    swal({
                        title: 'Bom trabalho!',
                        text: 'Resposta cadastrada com sucesso! Você será redirecionado para a revisão.',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ok!',
                        closeOnConfirm: true
                    }, function (isConfirm) {
                        redirecionarModulo();
                    });
                } else {
                    exibirMensagemErro(obj.erro);
                }
            } catch (error) {
                exibirMensagemErro('9');
            }
        }
    });
}