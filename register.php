<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php
include("conexao.php");

?>

<head>
    <link rel="icon" href="../src/logo.jpg">
    <meta charset="UTF-8" lang="pt-br">
    <link rel="stylesheet" href="../styles/homepage.css">
</head>

<body>
    <main class="container">
        <p>- Registro -</p> <br>
        <img class="logo" src="../src/logo.jpg" width="180px" height="180px">
        <form action="registerController.php" method="POST">

            <label for="nome"></label>
            <div class="input-area">
                <input autofocus name='nome' type="text" placeholder="Nome">
            </div>
            <label for="email"></label>
            <div class="input-area">
                <input autofocus name='email' type="text" placeholder="Email">
            </div>
            <label for="senha"></label>
            <div class="input-area">
                <input autofocus name='senha' type="password" placeholder="Senha">
            </div>
            <button>Registrar</button>

            <br><br><a class="EnterOrRegister" style="color: blue;" href="login.php">Já possui uma conta?</a> <br>
        </form>

    </main>
</body>

</html>