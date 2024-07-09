<?php
$User = $_POST["email"];
$senha = $_POST["password"];

$defaultUserAdmin  = 'eunice@gmail.com';
$defaultPassAdmin = '12345';

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

$_SESSION['LogAdmin'] = false;

if ($User == $defaultUserAdmin && $senha == $defaultPassAdmin) {
    $_SESSION['LogAdmin'] = true;
    header('location:' . "../Moodle/Administrador/index.php");
} else {
    // Preparar a consulta SQL usando consultas preparadas
    $stmt = $conn->prepare("SELECT * FROM aluno WHERE email = ? AND passe = ?");
    $stmt->bind_param("ss", $User, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar se a conta existe
    if ($resultado->num_rows <= 0) {
        echo "<script>alert('As credenciais inseridas estão inválidas... Tente Novamente!!!'); window.location.href = 'login.html';</script>";
    } else {
        StatusUpdate($User);
        $_SESSION["autenticacao"] = true;
        $_SESSION["user_email"] = $User;  // Corrigi a sessão para armazenar o email do usuário corretamente
        $url = "index.php";
        header("Location: " . $url);
        exit();  // Adicionar exit após header para garantir que o script pare de executar
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}


function StatusUpdate($User) {
    // Mudar status para Online

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "moodle_accounts";

    // Criar conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $query = "UPDATE aluno SET estado = ? WHERE email = ?";

    // Prepara a query
    if ($stmt = $conn->prepare($query)) {
        // Vincula os parâmetros
        $status = 'Online';
        $stmt->bind_param("ss", $status, $User);

        // Executa a query
        if ($stmt->execute()) {
            echo "<script>console.log('Status: Online')</script>";
        } else {
            echo "<script>console.log('Status: Erro ao Atualizar na BD')</script>";
        }

        // Fecha a declaração
        $stmt->close();
    } else {
        echo "Erro na preparação da query: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>
