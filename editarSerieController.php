<?php
include('conexao.php');

$nomeSerie = mysqli_real_escape_string($mysqli, $_POST['nomeSerie']);
$nomeSerieAntigo = mysqli_real_escape_string($mysqli, $_POST['nomeSerieAntigo']);
$temporada = mysqli_real_escape_string($mysqli, $_POST['temporada']);
$episodio = mysqli_real_escape_string($mysqli, $_POST['episodio']);
$descricao = mysqli_real_escape_string($mysqli, $_POST['descricao']);

$sqlUpdate = "UPDATE TB_SERIES
            SET SRS_NOME = '$nomeSerie', SRS_TEMPORADA = '$temporada',
             SRS_EPISODIO = '$episodio', SRS_DESCRICAO = '$descricao' 
            WHERE SRS_NOME = '$nomeSerieAntigo'
             ";

if ($mysqli->query($sqlUpdate) === true) {
    $_SESSION['serie_edit'] = true;
}

$mysqli->close();
header('Location: mainpage.php');
exit;

?>