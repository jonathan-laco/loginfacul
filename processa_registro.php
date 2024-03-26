<?php
error_reporting(E_ALL);
// ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'config.php';

    // Recebe os dados do formulário e limpa possíveis códigos maliciosos
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // $usuario = mysqli_real_escape_string($conn, $_POST['username']); 
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT); // Criptografa a senha
    // Insere os dados na tabela de usuários
    $sql = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES ('$nome', '$email', '$usuario', '$senha_hash')";

    if ($conn->query($sql) === TRUE) {
        // Registro bem-sucedido, redireciona para a página de login
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao registrar usuário: " . $conn->error;
    }
    $conn->close();
}
?>
