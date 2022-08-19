<?php
include('conexao.php');
$nomeSerie = mysqli_real_escape_string($mysqli, $_POST['nomeSerie']);

$sqlDelete = "DELETE FROM TB_SERIES WHERE SRS_NOME = '$nomeSerie' ";

if (mysqli_query($mysqli, $sqlDelete)) {
    $_SESSION['serie_delete'] = true;
}

$mysqli->close();
header('Location: mainpage.php');
exit;
