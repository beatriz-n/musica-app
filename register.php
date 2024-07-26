<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Registrar</title>

    <!-- Fontes personalizadas para este template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Estilos personalizados para este template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Linha aninhada dentro do corpo do cartão -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crie sua conta!</h1>
                            </div>
                            <form id="formPessoaInserir" method="post" action="./Pessoa/PessoaI001.php" class="user needs-validation" novalidate>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nomePessoa" name="nomePessoa" placeholder="Nome Completo" required>
                                        <div class="invalid-feedback">
                                            Por favor, insira seu nome completo.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="emailPessoa" name="emailPessoa" placeholder="Email" required>
                                    <div class="invalid-feedback">
                                        Por favor, insira um endereço de email válido.
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="senhaPessoa" name="senhaPessoa" placeholder="Senha" required>
                                        <div class="invalid-feedback">
                                            Por favor, insira uma senha.
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="senhaPessoaValida" name="senhaPessoaValida" placeholder="Repita a Senha" required>
                                        <div class="invalid-feedback">
                                            As senhas devem coincidir.
                                        </div>
                                    </div>
                                </div>
                                <button id="buttonFormPessoaInserir" type="submit" class="btn btn-primary btn-user btn-block">
                                    Criar
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Já tem uma conta? Faça login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>

    <!-- Scripts personalizados para todas as páginas -->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- JavaScript para validação -->
    <script>
        $(document).ready(function() {
            var forms = $('.needs-validation');

            forms.each(function() {
                var form = $(this);

                form.on('submit', function(event) {
                    if (form[0].checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    var senhaPessoa = $('#senhaPessoa').val();
                    var senhaPessoaValida = $('#senhaPessoaValida').val();

                    if (senhaPessoa !== senhaPessoaValida) {
                        event.preventDefault();
                        event.stopPropagation();
                        $('#senhaPessoaValida')[0].setCustomValidity('Senhas não coincidem');
                    } else {
                        $('#senhaPessoaValida')[0].setCustomValidity('');
                    }

                    form.addClass('was-validated');
                });
            });
        });
    </script>

    <!-- Script personalizado -->
    <script src="Pessoa/Pessoa.js"></script>
    <script>
        $(document).ready(function() {
            ajaxInserirPessoa();
        });
    </script>
</body>

</html>