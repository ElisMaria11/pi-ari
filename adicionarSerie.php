```php
<!DOCTYPE html>
<?php
session_start();
include('conexao.php');

?>
<html>

<head>
    <meta charset="UTF-8" lang="pt-br">
    <link rel="stylesheet" href="../styles/adicionarSerie.css">
</head>

<body>
    <main class="container">
        <form action="./adicionarSerieController.php" method="POST" id="addSerie" name="addSerie">
            <div class="input-area">
                <input name="nomeSerie" autofocus type="text" placeholder="Nome da série" maxlength="60">
                <div class="input-area">
                    <input name="temporada" autofocus type="number" placeholder="Temporada" min='0' max='99'>
                </div>
                <div class="input-area">
                    <input name="episodio" autofocus type="number" placeholder="Episódio" min='0' max='99'>
                </div>
                <br>
            </div>

            <textarea form="addSerie" name="descricao" maxlength="250" autofocus type="text" placeholder="Descrição da série"></textarea>

            <br>
            <button>Adicionar</button>
            <a href="./mainpage.php">Retornar</a>
        </form>
    </main>
</body>

</html>
```