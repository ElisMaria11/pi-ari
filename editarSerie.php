<!DOCTYPE html>
<?php
include('conexao.php');

$nomeSerie = mysqli_real_escape_string($mysqli, $_POST['nomeSerie']);

$searchSerie = "SELECT * FROM TB_SERIES WHERE SRS_NOME = '{$nomeSerie}' ";

$resultSerie = $mysqli->query($searchSerie);

$rowSeries = $resultSerie->fetch_assoc();

?>


<html>



<head>
    <meta charset="UTF-8" lang="pt-br">
    <link rel="stylesheet" href="../styles/adicionarSerie.css">
</head>

<body>
    <main class="container">
        <form action="./editarSerieController.php" method="POST" id="editSerie" name="editSerie">
            <div class="input-area">
                <input style="display: none" value="<?php echo $rowSeries['SRS_NOME'] ?>" name="nomeSerieAntigo" type="text">
                <input value="<?php echo $rowSeries['SRS_NOME'] ?>" name="nomeSerie" autofocus type="text" placeholder="Nome da série" maxlength="60">
                <div class="input-area">
                    <input value="<?php echo $rowSeries['SRS_TEMPORADA'] ?>" name="temporada" type="text" placeholder="Temporada" min='0' max='99'>
                </div>
                <div class="input-area">
                    <input value="<?php echo $rowSeries['SRS_EPISODIO'] ?>" name="episodio" type="text" placeholder="Episódio" min='0' max='99'>
                </div>
                <br>
            </div>
            <textarea form="editSerie" name="descricao" maxlength="250" autofocus type="text" placeholder="Descrição da série"><?php echo $rowSeries['SRS_DESCRICAO'] ?></textarea>
            </div>
            <br>
            <button>Editar</button>
            <a href="./mainpage.php">Retornar</a>
        </form>
    </main>
</body>

</html>