<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="../src/logo.jpg">
    <meta charset="UTF-8" lang="pt-br">
    <link rel="stylesheet" href="../styles/homepage.css">
</head>

<body>
    <main class="container">
        <p>- Login -</p>
        <br>
        <img class="logo" src="../src/logo.jpg" width="180px" height="180px">
        <form action="loginController.php" method="POST">

            <label for="email"></label>
            <div class="input-area">
                <input autofocus name="email" type="text" placeholder="Email">
            </div>
            <label for="senha"></label>
            <div class="input-area">
                <input autofocus name="senha" type="password" placeholder="Senha">
            </div>
            <button>Entrar</button>

            <br><br><a class="EnterOrRegister" style=" color: green;" href="register.php">Não possui uma conta?</a> <br>
        </form>

    </main>
</body>

</html>
