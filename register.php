<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crie seu cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="shortcut icon" href="assets/img/icons/favicon.ico" type="image/x-icon">
    <style>
        .progress-bar {
            width: 100%;
            height: 10px; /* Ajuste a altura da barra de progresso */
            background-color: #f2f2f2;
            border-radius: 5px;
            margin-top: 10px;
            overflow: hidden;
        }

        .progress {
            width: 0;
            height: 100%;
            border-radius: 5px;
            transition: width 0.3s ease;
        }

        /* Definição das cores da barra de progresso */
        .red { background-color: #ff6347; }
        .yellow { background-color: #ffd700; }
        .green { background-color: #32cd32; }

        /* Estilização do texto */
        #nivelSenha {
            color: white;
            font-weight: bold;
        }
    </style>
    <script>
        function verificarSenha() {
            var senha = document.getElementById("senha").value;
            var nivelSenha = document.getElementById("nivelSenha");
            var progressBar = document.getElementById("progressBar");
            var regexUpper = /[A-Z]/;
            var regexNumber = /[0-9]/;
            var regexSpecial = /[^A-Za-z0-9]/;
            var largura = calcularLargura(senha);

            progressBar.style.width = largura + "%";

            if (largura >= 100) {
                nivelSenha.innerHTML = "Nível de senha: Forte";
                progressBar.className = "progress green";
            } else if (largura >= 50) {
                nivelSenha.innerHTML = "Nível de senha: Médio";
                progressBar.className = "progress yellow";
            } else {
                nivelSenha.innerHTML = "Nível de senha: Fraco (A senha deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, números e caracteres especiais)";
                progressBar.className = "progress red";
            }
        }

        function calcularLargura(senha) {
            var pontuacao = 0;
            pontuacao += (senha.length >= 8) ? 25 : 0;
            pontuacao += (senha.match(/[A-Z]/)) ? 25 : 0;
            pontuacao += (senha.match(/[0-9]/)) ? 25 : 0;
            pontuacao += (senha.match(/[^A-Za-z0-9]/)) ? 25 : 0;
            return pontuacao;
        }


    </script>
</head>
<body>
    <div class="ring">
        <i style="--clr: #00ff0a"></i>
        <i style="--clr: #ff0057"></i>
        <i style="--clr: #fffd44"></i>
        <div class="login">
            <h2> <b>CRIE O CADASTRO</b></h2>
            <form method="post" action="processa_registro.php" onsubmit="exibirAlerta()">
                <div class="inputBx">
                    <input type="text" name="nome" placeholder="Nome" required />
                </div>
                <div class="inputBx">
                    <input type="email" name="email" placeholder="Email" required />
                </div>
                <div class="inputBx">
                    <input type="password" id="senha" name="senha" placeholder="Senha" required oninput="verificarSenha()" />
                </div>
                <div class="progress-bar">
                    <div id="progressBar" class="progress"></div>
                </div>
                <div id="nivelSenha" class="inputBx"></div>
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
