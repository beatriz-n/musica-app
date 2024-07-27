function editarPessoa(idPessoa) {
    $('#idPessoa03').val(idPessoa);
    $('#idFormEditarPessoa').trigger('submit');
}

function ajaxInserirPessoa() {
    $('#formPessoaInserir').ajaxForm({
        beforeSend: function () {
            $('#buttonFormPessoaInserir').prop('disabled', true);
        },
        success: function (data) {
            $('#buttonFormPessoaInserir').prop('disabled', false);
            try {
                if (data > '0') {
                    swal({
                        title: 'Bom trabalho!',
                        text: 'Cadastro realizado com sucesso!',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Ok!',
                        closeOnConfirm: true
                    }, function (isConfirm) {
                        location.href = 'perfilusuario.php';
                    });
                } else if (data == '-1') {
                    swal('Erro!', 'O e-mail já está cadastrado!', 'error');
                }
                else {
                    swal('Erro!', 'Houve um erro ao tentar cadastrar!', 'error');
                }
            } catch (error) {
                swal('Erro!', 'Erro inesperado!', 'error');
            }
        }
    });
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

function excluirPessoa(idPessoa) {
    swal({
        title: 'Atenção',
        text: 'Deseja realmente excluir essa conta?',
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
                url: 'Pessoa/PessoaE001.php',
                async: true,
                data: {
                    idPessoa: idPessoa
                }, success: function (data) {
                    if (data == 1) {
                        //location.href = "dashboard.php";
                        sair();
                        swal('Sucesso!', 'Conta Excluída!', 'success');
                    } else {
                        swal('Erro!', 'Houve um erro ao tentar excluir a conta!', 'error');
                    }
                }
            });
        }
    });
}



function sair() {
    $.ajax({
        type: 'POST',
        url: 'Pessoa/PessoaN001.php',
        async: true,
        data: {
        }, success: function (data) {
            location.href = 'login.php';
        }
    });
}