<?php
session_start();
    include("conexao.php");


    if (empty($_POST['email']) || empty($_POST["senha"])) {
        header('Location: ../php/login.php');
        exit();
    }


$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

$queryLogin = "SELECT USR_ID, USR_EMAIL FROM TB_USUARIOS WHERE USR_EMAIL = '{$email}' and USR_SENHA = '{$senha}'";

$result = $mysqli->query($queryLogin);

$row = mysqli_num_rows($result);

if($row == 1) {
    $_SESSION['email'] = $email;
    header('Location: mainpage.php');
    exit();
}  
else {
    header('Location: login.php');
}
