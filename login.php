<?php
$User = $_POST["email"];
$senha = $_POST["password"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "moodle_accounts";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Error connecting to Database: " . $conn->connect_error);
}

session_start();

// Preparar a consulta SQL usando consultas preparadas
$stmt = $conn->prepare("SELECT * FROM aluno WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $User, $senha);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar se a conta existe
if ($resultado->num_rows <= 0) {
    echo "<script>alert('As credenciais inseridas estão inválidas... Tente Novamente!!!'); window.location.href = 'login.html';</script>";
} else {
    $_SESSION["autenticacao"] = true;
    $_SESSION["user_email"] = $User;  // Corrigi a sessão para armazenar o email do usuário corretamente
    $url = "index.php";
    header("Location: " . $url);
    exit();  // Adicionar exit após header para garantir que o script pare de executar
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>
