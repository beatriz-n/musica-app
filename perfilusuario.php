 <?php require_once 'headeraprendizagem.php'; ?>
 <!-- Começo Página de Perfil -->
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col-9">
                     <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
                 </div>
                 <div class="d-flex col-3 justify-content-end">
                     <a href="dashboard.php" class="btn btn-primary">Voltar</a>
                     <a href="perfileditar.php" class="btn btn-primary">Editar Perfil</a>
                 </div>
             </div>
         </div>

         <div class="card-body">
             <div class="row">
                 <div class="col-md-6">
                     <img width="400" height="400" src="img/undraw_profile.svg" class="img-profile rounded-circle" alt="Imagem de Perfil">
                 </div>
                 <div class="align-self-center col-md-6">
                     <h1>Douglas McGee</h1>
                     <p><strong>Email:</strong> douglas@gmail.com</p>
                     <p><strong>Data Nascimento:</strong> 05/01/1999</p>
                     <p><strong>Telefone:</strong> (11) 99999-9999</p>
                 </div>
             </div>
         </div>

     </div>

 </div>
 <!-- Fim Página de Perfil -->
 <?php require_once 'footer.php'; ?>