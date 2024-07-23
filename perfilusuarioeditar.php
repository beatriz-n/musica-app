 <?php require_once 'headeraprendizagem.php'; ?>
 <!-- Começo Página de Perfil Editar-->

 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col-9">
                     <h1 class="h3 mb-0 text-gray-800">Editar Perfil</h1>
                 </div>
                 <div class="d-flex col-3 justify-content-end">
                     <a href="perfilusuario.php" class="btn btn-primary">Voltar</a>
                 </div>
             </div>
         </div>
         <div class="card-body">
             <form action="perfileditar.php" method="POST" enctype="multipart/form-data">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="nomePessoa">Nome</label>
                             <input type="text" class="form-control" id="nomePessoa" name="nomePessoa" value="Douglas McGee">
                         </div>
                         <div class="form-group">
                             <label for="email">Email</label>
                             <input type="email" class="form-control" id="emailPessoa" name="emailPessoa" value="douglas@gmail.com">
                         </div>
                         <div class="form-group">
                             <label for="data_nascimento">Data de Nascimento</label>
                             <input type="date" class="form-control" id="nascimento" name="nascimentoPessoa" value="1999-01-05">
                         </div>
                         <div class="form-group">
                             <label for="telefone">Telefone</label>
                             <input type="text" class="form-control" id="telefonePessoa" name="telefonePessoa" value="(11) 99999-9999">
                         </div>
                         <div class="form-group">
                             <label for="instagram">Instagram</label>
                             <input type="text" class="form-control" id="instagramPessoa" name="instagramPessoa" value="@dmcgee">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="imagem_perfil">Imagem de Perfil</label>
                             <input type="file" class="form-control-file" id="imagem_perfil" name="imagem_perfil">
                             <img width="400" height="400" src="img/undraw_profile.svg" class="img-profile rounded-circle mt-3" alt="Imagem de Perfil">
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-12 text-center">
                         <button type="submit" class="btn btn-success">Salvar Alterações</button>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Fim Página de Perfil -->
 <?php require_once 'footer.php'; ?>