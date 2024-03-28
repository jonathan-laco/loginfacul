<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['senha'])) {
        session_start();

        $_SESSION['login_time'] = time();

        $_SESSION['email'] = $email; 

        header("Location: dash.php");
        exit();
    } else {
        echo "<script>alert('Senha incorreta.'); window.location.href='index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('E-mail não encontrado. Por favor, registre-se.'); window.location.href='register.php';</script>";
    exit();
}
$stmt->close();
$conn->close();
?>
