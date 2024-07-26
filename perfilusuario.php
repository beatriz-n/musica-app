 <?php
    require_once 'headeraprendizagem.php';

    $query = 'SELECT * FROM pessoa WHERE 1';

    $result = mysqli_query($con, $query);
    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $pessoa = $array[0];
?>

 <!-- Começo Página de Perfil -->
 <div class="container-fluid">
     <div class="card">
         <div class="card-header">
             <div class="row">
                 <div class="col-9">
                     <h1 class="h3 mb-0 text-gray-800">Perfil</h1>
                 </div>
                 <div class="d-flex col-3 justify-content-end">
                     <a href="dashboard.php" class="btn btn-primary me-2">Voltar</a>
                     <a class="btn btn-primary ms-2" onclick="editarPessoa(<?= $pessoa['idPessoa']; ?>)">Editar Perfil</a>
                 </div>
             </div>
         </div>

         <div class="card-body">
             <div class="row">
                 <div class="col-md-6 d-flex justify-content-end pr-4">
                     <img width="400" height="400" src="<?php echo 'Pessoa/img/perfil/' . $pessoa['imagemPessoa']; ?>" class="img-profile rounded-circle" alt="Imagem de Perfil">
                 </div>
                 <div class="align-self-center col-md-6 pe-4">
                     <h1><?php echo $pessoa['nomePessoa']; ?></h1>
                     <p><strong>Email:</strong> <?php echo $pessoa['emailPessoa']; ?></p>
                     <p><strong>Data Nascimento:</strong><?php echo date(' d/m/Y', strtotime($pessoa['nascimentoPessoa'])); ?></p>
                     <p><strong>Telefone:</strong> <?php echo $pessoa['telefonePessoa']; ?></p>
                     <p><strong>Instagram:</strong> @<?php echo $pessoa['instagramPessoa']; ?></p>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <form id="idFormEditarPessoa" action="perfilusuarioeditar.php" method="post">
     <input id="idPessoa03" name="idPessoa" type="hidden">
 </form>

 <!-- Fim Página de Perfil -->
 <?php require_once 'footer.php'; ?>

 <script src="Pessoa/Pessoa.js"></script>