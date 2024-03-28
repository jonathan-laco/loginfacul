<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Sistema</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="shortcut icon" href="assets/img/icons/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="ring">
        <i style="--clr: #00ff0a"></i>
        <i style="--clr: #ff0057"></i>
        <i style="--clr: #fffd44"></i>
        <div class="login">
            <h2> SISTEMA</h2>
            <form method="post" action="login.php">
                <div class="inputBx">
                    <input type="email" name="email" placeholder="E-mail" required />
                </div>
                <div class="inputBx">
                    <input type="password" name="password" placeholder="Senha" required />
                </div>
                <div class="inputBx">
                    <input type="submit" value="Login" />
                </div>
            </form>
            <div class="links">
                <a href="register.php">Inscrever-se</a>
            </div>
        </div>
    </div>
</body>
</html>
