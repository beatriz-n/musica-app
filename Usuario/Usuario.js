
// redirecionamentos
function redirecionarUsuario(idUsuario) {
    $('#idUsuario01').val(idUsuario);
    $('#idFormUsuarioEditar').trigger('submit');
}

// tratamento de botao de voltar no modal de alerta da permissao do administrador
let admcheckbox = document.getElementById('admcheckbox');

admcheckbox.addEventListener('change', function () {
    if (this.checked) {
        this.checked = false;
        $('#admModal').modal('show');
    }
});
// botao não
document.getElementById('modalCancel').addEventListener('click', function () {
    $('#admModal').modal('hide');
});

function ajaxInserirUsuario() {
    $('#formUsuarioInserir').ajaxForm({
        beforeSend: function () {
            $('#buttonformUsuarioInserir').prop('disabled', true);
        },
        success: function (data) {
            $('#buttonformUsuarioInserir').prop('disabled', false);
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
                        location.href = 'usuario.php';
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

// function ajaxAlterarPessoa() {
//     $('#formPessoaAlterar').ajaxForm({
//         beforeSend: function () {
//             $('#buttonFormPessoaAlterar').prop('disabled', true);
//         },
//         success: function (data) {
//             $('#buttonFormPessoaAlterar').prop('disabled', false);
//             try {
//                 if (data != '0') {
//                     swal({
//                         title: 'Bom trabalho!',
//                         text: 'Perfil alterado com sucesso.',
//                         type: 'success',
//                         showCancelButton: false,
//                         confirmButtonColor: '#DD6B55',
//                         confirmButtonText: 'Ok!',
//                         closeOnConfirm: true
//                     }, function (isConfirm) {
//                         location.href = 'perfilusuario.php';
//                     });
//                 } else {
//                     swal('Erro!', 'Houve um erro ao tentar editar o Perfil!', 'error');
//                 }
//             } catch (error) {
//                 swal('Erro!', 'Erro inesperado!', 'error');
//             }
//         }
//     });
// }


function excluirUsuario(idUsuario) {
    swal({
        title: 'Atenção',
        text: 'Deseja realmente excluir esse usuário?',
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
                url: 'Usuario/UsuarioE001.php',
                async: true,
                data: {
                    idUsuario: idUsuario
                }, success: function (data) {
                    if (data == 1) {
                        location.href = './usuario.php';
                        swal('Sucesso!', 'Usuário Excluído!', 'success');
                    } else {
                        swal('Erro!', 'Houve um erro ao tentar excluir o usuário!', 'error');
                    }
                }
            });
        }
    });
}