<?php
session_start();
include('conexao.php');

$nomeCadastro = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
$emailCadastro = mysqli_real_escape_string($mysqli, trim($_POST['email']));
$senhaCadastro = mysqli_real_escape_string($mysqli, trim($_POST['senha']));

$sqlVerification = "SELECT COUNT(*) AS total FROM TB_USUARIOS WHERE USR_EMAIL = '$emailCadastro'";
$resultVerification = mysqli_query($mysqli, $sqlVerification);
$row = mysqli_fetch_assoc($resultVerification);

// Verificar se usuário já existe no banco de dados

if ($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: register.php');
    exit;
}

$sqlVerification = "INSERT INTO TB_USUARIOS 
            (USR_NOME, USR_EMAIL, USR_SENHA, USR_DATACADASTRO) 
            VALUES('$nomeCadastro', '$emailCadastro', '$senhaCadastro', NOW())";

if ($mysqli->query($sqlVerification) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$mysqli->close();

header('Location: login.php');
exit;
?>
