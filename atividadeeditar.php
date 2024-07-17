<?php require 'header.php'; ?>
<!-- Começo Pagina atividades Novo -->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1 class="h3 mb-2 text-gray-800">Editar Atividade</h1>
            <br>
            <a onclick="redirecionarAtividade(1)" class="btn btn-primary mb-3">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
        <div class="card-body">
            <form id="formAtividade" novalidate>
                <h3 class="h5 mb-2 text-gray-800">Informações da atividade:</h3>
                <br>
                <div class="form-group">
                    <label for="tituloAtividade">Título</label>
                    <input type="text" class="form-control" id="tituloAtividade" name="tituloAtividade" placeholder="Digite o título da atividade">
                </div>
                <div class="form-group">
                    <label for="statusAtividade">Status</label>
                    <select class="form-control" id="statusAtividade" name="statusAtividade">
                        <option value="">Selecione o status</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricaoAtividade">Observação</label>
                    <input type="text" class="form-control" id="descricaoAtividade" name="descricaoAtividade" placeholder="Digite a descrição da atividade">
                </div>
                <hr>
                <h3 class="h5 mb-2 text-gray-800">Alternativas:</h3>
                <br>
                <div id="alternativas">
                    <div class="form-group">
                        <label for="alternativa1">Alternativa A</label>
                        <input type="text" class="form-control" name="alternativa[]" required>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alternativaCorreta" id="alternativaCorretaA" value="A">
                            <label class="form-check-label" for="alternativaCorretaA">
                                Correta
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alternativa2">Alternativa B</label>
                        <input type="text" class="form-control" name="alternativa[]" required>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alternativaCorreta" id="alternativaCorretaB" value="B">
                            <label class="form-check-label" for="alternativaCorretaB">
                                Correta
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alternativa3">Alternativa C</label>
                        <input type="text" class="form-control" name="alternativa[]" required>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alternativaCorreta" id="alternativaCorretaC" value="C">
                            <label class="form-check-label" for="alternativaCorretaC">
                                Correta
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alternativa4">Alternativa D</label>
                        <input type="text" class="form-control" name="alternativa[]" required>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alternativaCorreta" id="alternativaCorretaD" value="D">
                            <label class="form-check-label" for="alternativaCorretaD">
                                Correta
                            </label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-success mb-3" onclick="adicionarAlternativa()">+</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fim Pagina atividades Novo -->
 <script src="./Atividade/Atividade.js"></script>

<?php require 'footer.php'; ?>
<form action="atividade.php" method="post" id="idFormAtividade">
    <input type="hidden" value="1" name="idModulo" id="idModulo01"/>
</form>
