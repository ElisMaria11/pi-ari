<?php
include('./conexao.php');
session_start();

if (empty($_POST['nomeSerie']) || empty($_POST["temporada"]) || empty($_POST["episodio"])) {
    header('Location: ../php/adicionarSerie.php');
    exit();
}

$nomeSerie = mysqli_real_escape_string($mysqli, $_POST['nomeSerie']);
$temporada = mysqli_real_escape_string($mysqli, $_POST['temporada']);
$episodio = mysqli_real_escape_string($mysqli, $_POST['episodio']);
$descricao = mysqli_real_escape_string($mysqli, $_POST['descricao']);

$sqlInsert = "INSERT INTO TB_SERIES 
            (SRS_NOME, SRS_TEMPORADA, SRS_EPISODIO, SRS_DESCRICAO)
            VALUES('$nomeSerie','$temporada','$episodio', '$descricao')";

$consultaUser = "SELECT USR_ID FROM TB_USUARIOS WHERE USR_EMAIL = '{$_SESSION['email']}' ";
$resultConsultaUser = $mysqli->query($consultaUser);
$rowConsultaUser = $resultConsultaUser->fetch_assoc();

$a = $rowConsultaUser['USR_ID'];

$sqlInsertFK = "INSERT INTO TB_SERIESUSUARIOS
                (SUS_USR_ID)
                VALUES( '$a') ";

if ($mysqli->query($sqlInsert) === true && ($mysqli->query($sqlInsertFK)) === true) {
    $_SESSION['status_serie'] = true;
}

$mysqli->close();
header('Location: adicionarSerie.php');
exit;

?>