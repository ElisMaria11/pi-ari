<!DOCTYPE html>

<?php
session_start();
include("conexao.php");

$consultaUser = "SELECT USR_NOME, USR_ID FROM TB_USUARIOS WHERE USR_EMAIL = '{$_SESSION['email']}' ";

$resultUser = $mysqli->query($consultaUser);

$rowUser = $resultUser->fetch_assoc();

if (mysqli_num_rows($resultUser) != 1) {
    header('Location: login.php');
}

?>

<html>

<head>
    <meta charset="UTF-8" lang="pt-br">

    <link rel="stylesheet" href="../styles/mainpage.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>

<style>
    body {
        background: rgb(230, 230, 230)
    }

    .row,
    .card {
        display: inline-block;
        background: rgb(255, 250, 250);
    }

    form#editSerie {
        display: inline-block;
    }
</style>

<body>
    <header>
        <nav class="navbar" style="background: rgb(205, 150, 252);">
            <li class="nav-item" style="list-style-type:none">
                <p> <span style='font-size:20px;'>&#128516;</span> Bem vindo(a), <?php echo $rowUser['USR_NOME'] ?></p>
            </li>
            <div>
                <li class="nav-item" style="list-style-type:none">
                    <a href="./adicionarSerie.php">
                        <img width="30px" src="../src/plus-circle.svg">
                    </a>
                </li>
            </div>

            <a href="./login.php">Sair</a>

            </div>
        </nav>
    </header>

    <?php
    $consultaSeries = "SELECT * FROM TB_SERIES
                        JOIN TB_SERIESUSUARIOS ON SRS_ID = SUS_SRS_ID WHERE SUS_USR_ID = '{$rowUser['USR_ID']}' ";
    $resultadoSeries = $mysqli->query($consultaSeries);

    if ($resultadoSeries->num_rows > 0) {

        while ($rowSeries = $resultadoSeries->fetch_assoc()) {

    ?>

            <form action="editarSerie.php" method="POST" name="editSerie" id="editSerie">
                <div class="card mb-3" style="max-width: 1080px;">
                    <div class="row g-0">

                        <div class="col-xl-12">
                            <div class="card-body">
                                <h5 name="nomeSerie" class="card-title"> <?php echo $rowSeries["SRS_NOME"]; ?> </h5>

                                <label for="nomeSerie"></label>
                                <input autofocus style="display: none" value="<?php echo $rowSeries["SRS_NOME"] ?>" name="nomeSerie" type="text" placeholder="nomeSerie">

                                <p class="card-text"> <?php echo $rowSeries["SRS_DESCRICAO"] ?> </p>
                                <p class="card-text"> <?php echo "T" . $rowSeries["SRS_TEMPORADA"] . " - E" . $rowSeries["SRS_EPISODIO"] ?> </p>

                                <button>Editar</button>
                                <button formaction="./excluirSerieController.php">Excluir</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

    <?php

        }
    }

    ?>

</body>

</html>
