<?php
extract($_POST);
require_once '../core/includeCore.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imagem_perfil']) && $_FILES['imagem_perfil']['error'] === UPLOAD_ERR_OK) {
        $imagemTmpPath = $_FILES['imagem_perfil']['tmp_name'];
        $imagemOriginalName = $_FILES['imagem_perfil']['name'];
        $imagemSize = $_FILES['imagem_perfil']['size'];
        $imagemType = $_FILES['imagem_perfil']['type'];
        $imagemExtension = pathinfo($imagemOriginalName, PATHINFO_EXTENSION);

        // Verifica se a extensão é válida
        $validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array(strtolower($imagemExtension), $validExtensions)) {
            $imagemName = md5($imagemOriginalName . strtotime("now")) . "." . $imagemExtension;
            $uploadPath = 'img/perfil/' . $imagemName;

            // Verifica se o diretório existe e tenta criar se não existir
            if (!file_exists('img/perfil/')) {
                mkdir('img/perfil/', 0777, true);
            }

            // Move o arquivo para o diretório desejado
            move_uploaded_file($imagemTmpPath, $uploadPath);
        } else {
            echo "Extensão de arquivo inválida.";
        }
    } else {
        echo "Nenhum arquivo enviado ou ocorreu um erro no envio.";
    }
}

$query = "UPDATE pessoa SET  
        nomePessoa = '$nomePessoa',
        emailPessoa = '$emailPessoa',
        nascimentoPessoa = '$nascimentoPessoa',
        telefonePessoa = '$telefonePessoa',
        instagramPessoa = '$instagramPessoa',
        imagemPessoa = '$imagemName'
        WHERE idPessoa = $idPessoa";

$result = mysqli_query($con, $query);

if ($result) {
    echo 1;
} else {
    echo 0;
}
