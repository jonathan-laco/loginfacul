<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crie seu cadastro</title>
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
            <h2> <b>CRIE O CADASTRO</b></h2>
            <form method="post" action="processa_registro.php">
                <div class="inputBx">
                    <input type="text" name="nome" placeholder="Nome" required />
                </div>
                <div class="inputBx">
                    <input type="email" name="email" placeholder="Email" required />
                </div>
                <div class="inputBx">
                    <input type="password" name="senha" placeholder="Senha" required />
                </div>
                <div class="inputBx">
                    <input type="submit" value="Cadastrar" />
                </div>
            </form>
            <div class="links">
                <a href="index.php">Já tem cadastro? clique aqui</a>
            </div>
        </div>
    </div>
</body>
</html>
