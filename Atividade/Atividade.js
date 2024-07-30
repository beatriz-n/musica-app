// redirecionamentos
function redirecionarFazerAtividade(idModulo, completoModulo) {
    $('#idModulo01').val(idModulo);
    $('#completoModulo').val(completoModulo);
    $('#idFormFazerAtividade').trigger('submit');
}
function ajaxInserirFazerAtividade() {
$('#idFormInserirFazerAtividade').ajaxForm({
    beforeSend: function () {
        $('#buttonFormFazerAtividadeInserir').prop('disabled', true);
    },
    success: function (data) {
        $('#buttonFormFazerAtividadeInserir').prop('disabled', false);
        try {
            if (data != '0') {
                swal({
                    title: 'Bom trabalho!',
                    text: 'Respostas cadastradas com sucesso.',
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Ok!',
                    closeOnConfirm: true
                }, function (isConfirm) {
                    location.href = 'dashboard.php';
                });
            } else {
                swal('Erro!', 'Houve um erro ao tentar cadastrar as repostas!', 'error');
            }
        } catch (error) {
            swal('Erro!', 'Erro inesperado!', 'error');
        }
    }
});
    
}