<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
$usuario = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM usuarios WHERE nome = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['senha'])) {
        session_start();

        $_SESSION['login_time'] = time();

        $_SESSION['username'] = $usuario;

        header("Location: dash.php");
        exit();
    } else {
        echo "<script>alert('Senha incorreta.'); window.location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Usuário não encontrado. Por favor, registre-se.'); window.location.href='register.php';</script>";
    exit();
}
$stmt->close();
$conn->close();
?>

