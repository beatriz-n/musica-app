<?php require 'header.php'; ?>
<!-- Começo Pagina Módulos Novo -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800">Novo Módulo</h1>
            <br>
            <a href="modulo.php" class="btn btn-primary mb-3">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
        <div class="card-body">
            <form id="formModuloInserir" method="post" action="./Modulo/ModuloI001.php" novalidate>
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="tituloModulo" name="tituloModulo" placeholder="Digite o título do módulo" required>
                    <div class="invalid-feedback">
                        Por favor, insira o título do módulo.
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="statusModulo" name="statusModulo" required>
                        <option value="">Selecione o status</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, selecione o status do módulo.
                    </div>
                </div>
                <div class="form-group">
                    <label for="nivel">Nível</label>
                    <input type="number" min="0" class="form-control" id="nivelModulo" name="nivelModulo" placeholder="Digite o título do módulo">
                </div>
                <div class="form-group">
                    <label for="descricaoModulo">Descrição</label>
                    <textarea class="form-control" id="descricaoModulo" name="descricaoModulo" rows="3" placeholder="Digite a descrição do módulo" required></textarea>
                    <div class="invalid-feedback">
                        Por favor, insira a descrição do módulo.
                    </div>
                </div>
                <button id="buttonFormModuloInserir" type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</div>
<!-- Fim Pagina Módulos Novo -->
<script src="Modulo/Modulo.js"></script>

<script>
    $(document).ready(function() {
        ajaxInserirModulo();
    });
</script>

<script>
    // Exemplo de JavaScript para desabilitar o envio do formulário se houver campos inválidos
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Pega todos os formulários que nós queremos aplicar validação Bootstrap customizada
            var forms = document.getElementsByClassName('needs-validation');
            // Faz um loop neles e previne o envio
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<?php require 'footer.php'; ?>