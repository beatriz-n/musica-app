
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