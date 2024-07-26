function editarPessoa(idPessoa) {
    $('#idPessoa03').val(idPessoa);
    $('#idFormEditarPessoa').trigger('submit');
}


function ajaxAlterarPessoa() {
    $('#formPessoaAlterar').ajaxForm({
        beforeSend: function () {
            $('#buttonFormPessoaAlterar').prop('disabled', true);
        },
        success: function (data) {
            $('#buttonFormPessoaAlterar').prop('disabled', false);
            try {
                if (data != '0') {
                    swal({
                        title: 'Bom trabalho!',
                        text: 'Perfil alterado com sucesso.',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ok!',
                        closeOnConfirm: true
                    }, function (isConfirm) {
                        location.href = 'perfilusuario.php';
                    });
                } else {
                    swal('Erro!', 'Houve um erro ao tentar editar o Perfil!', 'error');
                }
            } catch (error) {
                swal('Erro!', 'Erro inesperado!', 'error');
            }
        }
    });
}

function ajaxInserirPessoa() {
    $('#formPessoaInserir').ajaxForm({
        beforeSend: function () {
            $('#buttonFormPessoaInserir').prop('disabled', true);
        },
        success: function (data) {
            $('#buttonFormPessoaInserir').prop('disabled', false);
            try {
                if (data != '0') {
                    swal({
                        title: 'Bom trabalho!',
                        text: 'Cadastro realizado com sucesso',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ok!',
                        closeOnConfirm: true
                    }, function (isConfirm) {
                        location.href = 'perfilusuario.php';
                    });
                } else {
                    swal('Erro!', 'Houve um erro ao tentar cadastrar', 'error');
                }
            } catch (error) {
                swal('Erro!', 'Erro inesperado!', 'error');
            }
        }
    });
}