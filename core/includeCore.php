<?php
session_start();

require_once 'conexaoDB.php';

if (isset($_SESSION['idPessoaSession'])) {
    $idPessoaSession = $_SESSION['idPessoaSession'];
}

if (empty($idPessoaSession)) {
    if (isset($_COOKIE['idPessoaCookie'])) {
        $_SESSION['idPessoaSession'] = $_COOKIE['idPessoaCookie'];

        $idPessoaSession = $_SESSION['idPessoaSession'];
    } else {
        if ($_SERVER['PHP_SELF'] != 'index.php' && $_SERVER['PHP_SELF'] != '/musica-app/index.php') {
            echo $_COOKIE['idPessoaCookie'];
            header('Location: ./login.php');
        }
    }
} else {
    if ($_SERVER['PHP_SELF'] == 'index.php' || $_SERVER['PHP_SELF'] == '/musica-app/index.php') {
        header('Location: ./dashboard.php');
    }
}
